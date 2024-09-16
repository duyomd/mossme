<!-- ======= Confirm Modal ======= -->
<div class="modal fade" id="confirm-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-confirm">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5"><?= lang('App.confirm') ?></h1>
          <button id="confirm-btn-close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-light text-dark">
          <span><?= lang('App.msg_confirm') ?></span>
        </div>
        <div class="modal-footer">          
          <button type="submit" class="btn me-2" onclick="clickBtn('#hdn-delete');clickBtn('#confirm-btn-close')">
            <?= lang('App.btn_delete') ?></button>
          <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
            <?= lang('App.bookmark_btn_close') ?></button>
        </div>
      </div>
  </div>
</div>

<script type="text/javascript">
  const HIDDEN_KEY_COL_INDEX = 0;               // primary-key column index (hidden col)

  const CONTENT_FIELD               = 'field';

  const CONTENT_FIELD_EXTRA_SORT    = 'fieldExtraSort';
  const CONTENT_FIELD_EXTRA         = 'fieldExtra';
  const CONTENT_FIELD_EXTRA_HASH    = 'fieldExtraHash'; // hash character cannot be eval()
  const CONTENT_FIELD_EXTRA_END     = 'fieldExtraEnd';
  const CONTENT_FIELD_EXTRA_ONCLICK = 'fieldExtraOnclick';
  const CONTENT_FIELD_BOX_LABELS    = 'fieldBoxLabels';
  const CONTENT_FIELD_BOX_HREFS     = 'fieldBoxHrefs';
  const CONTENT_FIELD_STICKY        = 'fieldSticky';
  const CONTENT_FIELD_TRIM          = 'fieldTrim';
  const CONTENT_FIELD_SHORT_URL     = 'fieldShortUrl';

  const CONTENT_TYPE                = 'type';
  const CONTENT_TYPES               = { LINK: 'link', IMAGE: 'image', BOX: 'box', TEXT: 'text', };

  var FIELDS_FETCH,                             // all necessary fields to fetch from response-json
      FIELDS_TABLE,                             // table cell fields {type, db-field}
      FIELDS_TABLE_HEADER,                      // table header label
      FIELDS_TABLE_ORDERBYS;                    // table header sort orders
  var RADIO_SHOW_BUTTON_IDS;
  var _noRadio;                                 // radio button not used flag
  var _noMove;                                  // data move function not used flag
  var _currentSort;                             // sorting information {rpp, orders, current page...}

  function changeRpp(rpp) {
    loading(true);
    var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        try {
          if (this.readyState == 4) {
            if (this.status == 200) {
              loadTable(parseAjaxResponse(this.responseText));
              callbackFunc(false);
            } else {
              // TODO
            }
            loading(false);
          }
        } catch(e) {
          loading(false);
        }
      };
      xmlhttp.open("GET", "/rpp=" + rpp + "/conditions=" + getConditions() + "/url=" + "<?=$url?>", true);
      xmlhttp.send();
  }

  function changePage(pageNo, orderBys, sortOrders) {
    loading(true);
    var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        try {
          if (this.readyState == 4) {
            if (this.status == 200) {
              loadTable(parseAjaxResponse(this.responseText));
              callbackFunc(false);
            } else {
              // TODO
            }
            loading(false);
          }
        } catch(e) {
          loading(false);
        }
      };
      xmlhttp.open("GET", "/" + "<?=$url?>" + 
        "/p=" + pageNo + 
        "/orderby=" + orderBys +
        "/sortorder=" + sortOrders +
        "/conditions=" + getConditions(), true);
      xmlhttp.send();
  }

  function getConditions() {
    var conditions = document.getElementById('conditions').value;
    return conditions == null || conditions.length <= 0 ? '-1' : conditions;
  }

  function toggleMoveBtns(sort, row) {
    if (_noMove) return;
    // if [move], then show move buttons only when list is sorted by 'sequence' (this field always stays at the last column)
    if (String(sort.orderBys).startsWith(FIELDS_TABLE[FIELDS_TABLE.length - 1].CONTENT_FIELD)) {
      loopToggleCss(new Array('btn-move-up', 'btn-move-down'), 'disabled', '');
      if (!sort.hasPrevious && document.getElementById('selected_index').value <= 0) {
        loopToggleCss(new Array('btn-move-up'), '', 'disabled');
      }
      if (!sort.hasNext && row.nextElementSibling == null) {
        loopToggleCss(new Array('btn-move-down'), '', 'disabled');
      }
    }
  }

  /**
   * onSubmit
   */
  function setMode(mode) {
    loading(true);
    document.getElementById('mode').value = mode;
    var nor = document.querySelector('.table').children[1].children.length;
    var cpEle = document.getElementById('currentPage');
    var inEle = document.getElementById('selected_index');
    switch (mode) {
      case 'delete':      
        if (_currentSort.currentPage > 1 && nor <= 2) {
          cpEle.value = _currentSort.currentPage - 1;
        }
        break;
      case 'modify': 
        // TODO: edit action which can move item from list (ie. change entry's parent)
        
        break;
      case 'move-up':
        if (inEle.value <= 0) {
          cpEle.value = _currentSort.currentPage - 1;
          inEle.value = _currentSort.rpp - 1;
        } else {
          inEle.value = parseInt(inEle.value) - 1;
        }
        break;
      case 'move-down':
        if (inEle.value >= _currentSort.rpp - 1) {
          cpEle.value = _currentSort.currentPage + 1;
          inEle.value = 0;
        } else {
          inEle.value = parseInt(inEle.value) + 1;
        }
        break;
      case 'search':
        cpEle.value = 1;  
      default:
    }
  }

  function clickBtn(selector) {
    document.querySelector(selector).click();
  }

  function selectRow(row, index) {
    if (!row || _noRadio) return;

    // if dropdown or image link or ... 
    var e = this.event;
    if (typeof e == "undefined") {
      e = window.event;
    }
    if (e && e.srcElement && 
          (e.srcElement.classList.contains("cancel-row-selected")
            || e.srcElement.classList.contains("folder")
            || e.srcElement.tagName == "A"
          )) {      
      return;
    }

    loading(true);
    try {
      row.children[0].children[0].checked = true;
      document.getElementById('selected_key').value = row.children[1].childNodes[0].nodeValue.trim();
      document.getElementById('selected_index').value = index;

      loopToggleCssByElements(row.parentNode.children, 'table-active', '');
      loopToggleCssByElements(new Array(row), '', 'table-active');
      toggleMoveBtns(_currentSort, row);

      getItem(row);
    } catch(e) {
      loading(false);
    }
  }

  function reSelectRow(index) {
    var rowEle = document.querySelector('.table').children[1].children[parseInt(index) + 1];      
    selectRow(rowEle, index);
  }

  function getItem(row) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4) {
        if (this.status == 200) {
          var fields = JSON.parse(this.responseText);
          if (!fields) return;
          for (let i = 0; i < FIELDS_FETCH.length; i++) {
            // in case of hidden fields with same id
            var eles = document.querySelectorAll('#' + FIELDS_FETCH[i]);
            for (let j = 0; j < eles.length; j++) {
              eles[j].value = unescapeSlashes(fields[FIELDS_FETCH[i]]);  
            }
          }
          loopToggleCss(new Array('btn-modify', 'btn-delete'), 'hidden', 'd-inline-block');

          // extra callback operations
          callbackFunc(true);
        }
        loading(false);
      }
    };
    xmlhttp.open("GET", "/" + "<?=$url?>" + "/" + document.getElementById('selected_key').value, true);
    xmlhttp.send();
  }

  function callbackFunc(isLoadData) {
    if (typeof extraCallback === 'function') {
      extraCallback(isLoadData);
    }
  }

  function updateSortForPost(sort) {
    document.getElementById('currentPage').value = sort.currentPage;
    document.getElementById('orderBys').value = sort.orderBys.toString();
    document.getElementById('sortOrders').value = sort.sortOrders.toString();
  }

  function updateSearchForPost(conditions) {
    if (conditions) {
      document.getElementById('conditions').value = conditions;
    }
  }

  function resetForm() {
    if (RADIO_SHOW_BUTTON_IDS) {
      for (var i = 0; i < RADIO_SHOW_BUTTON_IDS.length; i++) {
        var ele = document.getElementById(RADIO_SHOW_BUTTON_IDS[i]);
        if (ele) {
          ele.className = ele.className.replaceAll('d-inline-block', 'hidden');
        }
      }
    }
    // clear form
    let formContainer = document.getElementById('input-form-container');
    if (formContainer) {
      formContainer.children[0].reset();
    }
  }

  /**
   * table overflow (horizontal responsively & rpp dropdown menu not hidden)
   */
  function rppOverflow() {
    let rppd = document.querySelector('#rpp-dropdown');
    if (!rppd) return;
    rppd.addEventListener('show.bs.dropdown', () => { 
      document.querySelector('.table-responsive').style = "overflow:inherit";
    });
    rppd.addEventListener('hide.bs.dropdown', () => { 
      document.querySelector('.table-responsive').style = "overflow:auto";
    });
  }

  function oncompleteLoadTable(selectedIndex) {
    // keep selected radio
    if (!_noRadio) {
      if (selectedIndex) {
        reSelectRow(selectedIndex);
      } else {
        resetForm();
      }
    }

    rppOverflow();
  }

  /**
   * String unescaping (for ex: from php addslashes())
   * @param {*} str 
   * @returns 
   */
  function unescapeSlashes(str) {
    if (str) {
      try {
        return str.replace(/(?:\\(.))/g, '$1');
      } catch (e) {
        return str;
      }
    }
    return '';
  }

  function parseAjaxResponse(responseText) {
    var json = JSON.parse(responseText);
    var jItems = json['items'];
    var items = new Array();
    for (var i = 0; i < jItems.length; i++) {
      let item = {};
      for (let j = 0; j < FIELDS_FETCH.length; j++) {
        let field = FIELDS_FETCH[j];          
        item[field] = jItems[i][field];
      }
      items.push(item);
    }

    var jSort = json['sort'];
    var sort = {
      rpp: jSort['rpp'],
      currentPage: jSort['currentPage'],
      pageTotal: jSort['pageTotal'],
      orderBys: jSort['orderBys'],
      sortOrders: jSort['sortOrders'],
      hasPrevious: jSort['currentPage'] > 1,
      hasNext: jSort['currentPage'] < jSort['pageTotal'],
    }
    updateSortForPost(sort);

    var conditions = json['conditions'];    
    updateSearchForPost(conditions);

    return {
      items: items,
      sort: sort,
      newSelectedIndex: json['newSelectedIndex'],
    };
  }

  function loadTable(data) {
    var items = data['items'];
    var sort = data['sort']; 
    _currentSort = sort;
    
    // order by 1 or many fields, alter the first field order          
    var newOrder = sort.sortOrders.length == 0 ? 'ASC' : sort.sortOrders[0] == 'ASC' ? 'DESC' : 'ASC';
    var newOrders = Array.from(sort.sortOrders); 
    // newOrders[0] = newOrder;
    for (var i = 0; i < newOrders.length; i++) {
      newOrders[i] = newOrder;
    }
    var sortingHeader = sort.orderBys.length < 1 ? null : sort.orderBys[0]; // FIXME: in case of complicated sort orders ...

    var selectedIndex = data['newSelectedIndex'];

    if (!items) return;
    var html = 
    '<table class="table table-dark table-striped">' +            
      '<thead>' +
        htmlTableHeader(sort, newOrders, sortingHeader) +
      '</thead>' +
      '<tbody>' +
        htmlTableMoveBtnsRow(sort) +
        htmlContentRows(items) +
      '</tbody>' +
      '<tfoot id="table-footer"><tfoot>' +
    '</table>';

    document.querySelector('.table-responsive').innerHTML = html;
    document.getElementById('table-footer').innerHTML = htmlTableFooter(sort);

    oncompleteLoadTable(selectedIndex);
  }

  function htmlTableHeader(sort, newOrders, sortingHeader) {
    var html =
    '<tr>';
    if (!_noRadio) {
      html +=
      '<th scope="col" data-field="state" data-radio="true"></th>';
    }
    for (let i = 0; i < FIELDS_TABLE_HEADER.length; i++) {
      let css = '';
      if (i == HIDDEN_KEY_COL_INDEX) {
        css += 'hidden';
      }
      if (FIELDS_TABLE[i].CONTENT_FIELD_STICKY) {
        css += ' col-sticky';
      }
      let orderCol = sortingHeader;
      if (FIELDS_TABLE[i].CONTENT_FIELD_EXTRA_SORT) {
        if (sort.orderBys.includes(FIELDS_TABLE[i].CONTENT_FIELD_EXTRA_SORT.toLowerCase())) {
          orderCol = FIELDS_TABLE[i].CONTENT_FIELD_EXTRA_SORT.toLowerCase();
        }
      }
      
      let text = FIELDS_TABLE[i].CONTENT_FIELD.toLowerCase();
      // in case of 'item.xxx'
      if (text.indexOf('.') >= 0) {
        text = text.substr(text.indexOf('.') + 1);
      }
      
        html +=
      '<th scope="col" class="' + css + '"' + '>' +
        '<a href="javascript:void(0)" ' + 
          'onclick="changePage(' + sort.currentPage + ',\'' + FIELDS_TABLE_ORDERBYS[i] + '\',\'' + newOrders.toString() + '\')">' + 
            FIELDS_TABLE_HEADER[i] + 
            (orderCol == text
              ? ' <i class="bi bi-small ' + (newOrders[0] == 'DESC' ? 'bi-caret-up-fill' : 'bi-caret-down-fill') + '"></i>'
              : '') +
        '</a>' + 
      '</th>';
    }
    if (!_noMove) {
      html += 
      '<th scope="col"></th>';
    }
    html +=    
    '</tr>';
    return html; 
  }

  function htmlTableMoveBtnsRow(sort) {
    var html =
    '<tr>';
    for (let i = 0; i < FIELDS_TABLE.length; i++) {
      html +=
      '<td class="p-0 border-0"' + (i == 1 ? ' hidden"' : '') + '></td>';
    }
    if (!_noMove) {
      html +=
      '<td rowspan="' + (sort.rpp + 1) + '" class="align-middle text-center col-move">' +
        '<a id="btn-move-up" onclick="clickBtn(\'#hdn-move-up\');" href="javascript:void(0)" ' + 
          'class="btn-move animated fadeInUp disabled">' +
          '<i class="bi bi-chevron-double-up"></i>' +
        '</a>' +
        '<a id="btn-move-down" onclick="clickBtn(\'#hdn-move-down\');" href="javascript:void(0)" ' + 
          'class="btn-move mt-2 animated fadeInUp disabled">' +
          '<i class="bi bi-chevron-double-down"></i>' +
        '</a>';
      } 
      html +=
      '</td>' +
    '</tr>';
    return html;
  }

  function htmlContentRows(items) {
    var html = '';
    for (var i = 0; i < items.length; i++) {
      var item = items[i];
      html += 
        '<tr onclick="selectRow(this, ' + i + ')">'; 
        if (!_noRadio) {
          html += 
          '<td><input type="radio" name="radioGroup"></td>';
        }
      for (let j = 0; j < FIELDS_TABLE.length; j++) {
        // sticky column
        let tdCss = '';
        if (FIELDS_TABLE[j].CONTENT_FIELD_STICKY)  tdCss = ' class="col-sticky" ';
        switch (FIELDS_TABLE[j].CONTENT_TYPE) {
          case CONTENT_TYPES.BOX:
            var box = 
            '<div class="dropdown entry-box">' +
              '<a class="d-flex align-items-center dropdown-toggle cancel-row-selected" ' +
                'href="javascript:void(0)" role="button" ' +
                'data-bs-toggle="dropdown" data-bs-auto-close="true">' +
                '<i><span class="cancel-row-selected">' + eval(unescapeSlashes(FIELDS_TABLE[j].CONTENT_FIELD)) + '</span></i>' +
              '</a>' +
              '<ul class="dropdown-menu">';
            for (var t = 0; t < FIELDS_TABLE[j].CONTENT_FIELD_BOX_LABELS.length; t++) {
                box +=
                '<li>' +
                  '<a class="dropdown-item text-truncate link-main" href="' + eval(FIELDS_TABLE[j].CONTENT_FIELD_BOX_HREFS[t]) + '">' + 
                    eval(FIELDS_TABLE[j].CONTENT_FIELD_BOX_LABELS[t]) + 
                  '</a>' +
                '</li>';
            }
            box +=
              '</ul>' +
            '</div>';
            html += 
            '<td' + tdCss + '>' + box + '</td>';
            break;

          case CONTENT_TYPES.LINK:
            if (FIELDS_TABLE[j].CONTENT_FIELD_SHORT_URL) {
              if (tdCss.length > 0) {
                tdCss = tdCss.slice(0, tdCss.length - 2) + " short-url" + tdCss.slice(tdCss.length - 2);
              } else {
                tdCss = ' class="short-url" ';
              }
            }
            let href = ''; hash = ''; let extra = ''; let onclick = '';
            if (FIELDS_TABLE[j].CONTENT_FIELD_EXTRA != null) {
              href = eval(FIELDS_TABLE[j].CONTENT_FIELD_EXTRA);
            }
            if (FIELDS_TABLE[j].CONTENT_FIELD_EXTRA_HASH != null) {
              hash = '#' + eval(unescapeSlashes(FIELDS_TABLE[j].CONTENT_FIELD_EXTRA_HASH));
            }
            if (FIELDS_TABLE[j].CONTENT_FIELD_EXTRA_END != null) {
              extra = ' ' + unescapeSlashes(FIELDS_TABLE[j].CONTENT_FIELD_EXTRA_END);
            }
            if (FIELDS_TABLE[j].CONTENT_FIELD_EXTRA_ONCLICK != null) {
              onclick = ' ' + 'onclick="' + eval(unescapeSlashes(FIELDS_TABLE[j].CONTENT_FIELD_EXTRA_ONCLICK)) + '"';
            }
            let a = 'href="' + href + hash + '"' + extra + onclick;
            let text = eval(unescapeSlashes(FIELDS_TABLE[j].CONTENT_FIELD));
            if (text == null) text = '';
            html +=
          '<td' + tdCss + '>' + 
            '<a ' + a + '>' + text + '</a>' + 
          '</td>';  
            break;

          case CONTENT_TYPES.IMAGE:
            let content = item[FIELDS_TABLE[j].CONTENT_FIELD];
            if (FIELDS_TABLE[j].CONTENT_FIELD_EXTRA != null) {
              content = eval(FIELDS_TABLE[j].CONTENT_FIELD_EXTRA);
            }
            html +=
          '<td' + tdCss + '>' + unescapeSlashes(content) + '</td>'; 
            break;

          case CONTENT_TYPES.FOLDER:
            break;

          default:
            let val = item[FIELDS_TABLE[j].CONTENT_FIELD];
            if (FIELDS_TABLE[j].CONTENT_FIELD_EXTRA != null) {
              val = eval(FIELDS_TABLE[j].CONTENT_FIELD_EXTRA);
            }
            if (j == HIDDEN_KEY_COL_INDEX) {
              tdCss = ' class="hidden" ';
            }
            html+=
          '<td' + tdCss + '>'; 
            if (FIELDS_TABLE[j].CONTENT_FIELD_TRIM && val) {
              html+=
              '<div class="trim" style="-webkit-line-clamp:' + FIELDS_TABLE[j].CONTENT_FIELD_TRIM + '">';
            }
            html +=
            unescapeSlashes(val);
            if (FIELDS_TABLE[j].CONTENT_FIELD_TRIM && val) {
              html +=
              '</div>';
            } 
            html +=
            '</td>';
        }
      }
      html +=
        '</tr>';
    }
    return html;
  }

  function htmlTableFooter(sort) {
    var numOfCols = document.querySelector('.table').children[0].children[0].children.length;
    var html =
      '<tr>' +
        '<td colspan="' + numOfCols + '" class="text-end">' +
          htmlTableFooterRppSelect(sort) +
          htmlTableFooterPagination(sort) +
        '</td>' +
      '</tr>';
    return html;
  }

  function htmlTableFooterRppSelect(sort) {
    var html =
    '<div id="rpp-dropdown" class="dropdown dropup pt-1 float-start">' +
      '<button class="btn btn-secondary dropdown-toggle" type="button"' +
        'data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">' +
          '<span>' + sort.rpp + " " + '<?=lang('App.num_rows_per_page')?>' + '</span>' +
      '</button>' +
      '<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown-main">';
        <?php foreach (App\Helpers\Utilities::PAGINATION_RPPS as $num) : ?>
          html +=
          '<li><span class="dropdown-item ' + (sort.rpp == <?=$num?> ? 'active' : '') + '" ' + 
                'onclick="' + (sort.rpp != <?=$num?> ? 'changeRpp(<?=$num?>)' : '') + '"><?=$num?></span>' +
          '</li>';
        <?php endforeach ?>
      html +=    
      '</ul>' +
    '</div>';
    return html;
  }

  function htmlTableFooterPagination(sort) {
    var html =
    '<div>' +
      '<nav aria-label="Page navigation">' +
        '<div class="d-none d-md-block">' +
          '<ul class="pagination justify-content-end mb-0">' +
            htmlTableFooterPaginationPrevious(sort);
            if (sort.pageTotal <= <?=App\Helpers\Utilities::PAGINATION_MAX_NUM?>) {
              html +=htmlTableFooterPaginationLong(sort);
            } else {
              html +=htmlTableFooterPaginationShort(sort);
            }
            html += htmlTableFooterPaginationNext(sort) +
          '</ul>' +
        '</div>' +
        '<div class="d-sm-block d-md-none">' +
          '<ul class="pagination justify-content-end mb-0">' +
            htmlTableFooterPaginationPrevious(sort) +
            htmlTableFooterPaginationShort(sort) +
            htmlTableFooterPaginationNext(sort) +
          '</ul>' +
        '</div>' +
      '</nav>' +
    '</div>';
    return html;
  }

  function htmlTableFooterPaginationPrevious(sort) {
    return (
      '<li class="page-item ' + (!sort.hasPrevious ? 'disabled' : '') + '">' +
        '<a class="page-link" aria-label="Previous" href="javascript:void(0)" ' + 
          'onclick="changePage(' + (sort.currentPage - 1) +
                        ', \'' + sort.orderBys.toString() + '\'' +
                        ', \'' + sort.sortOrders.toString() + '\')">' +
          '<span aria-hidden="true">&laquo;</span></a>' +
      '</li>'
    );
  }

  function htmlTableFooterPaginationNext(sort) {
    return (
      '<li class="page-item ' + (!sort.hasNext ? 'disabled' : '') + '">' +
        '<a class="page-link" aria-label="Next" href="javascript:void(0)" ' +
          'onclick="changePage(' + (sort.currentPage + 1) +
                        ', \'' + sort.orderBys.toString() + '\'' +
                        ', \'' + sort.sortOrders.toString() + '\')">' +
          '<span aria-hidden="true">&raquo;</span></a>' +
      '</li>'
    );
  }

  function htmlTableFooterPaginationLong(sort) {
    var html = '';
    for (var i = 1; i <= sort.pageTotal; i++) {
      html +=
      '<li class="page-item">' +
        '<a class="page-link ' + (sort.currentPage == i ? 'active' : '') + '" ' + 
          'href="javascript:void(0)"' +
          'onclick="changePage(' + i + 
                      ', \'' + sort.orderBys.toString() + '\'' +
                      ', \'' + sort.sortOrders.toString() + '\')">' + i + '</a>' +
      '</li>';
    }
    return html;
  }

  function htmlTableFooterPaginationShort(sort) {
    return (
    '<li class="page-item">' +
      '<span class="page-link">' + (sort.pageTotal <= 0 ? 0 : sort.currentPage) 
                                 + '<?=lang('App.forward_slash')?>' 
                                 + sort.pageTotal + '</span>' +
    '</li>'
    );
  }
  
  function initTable(option) {
    FIELDS_FETCH              = option.FIELDS_FETCH;
    FIELDS_TABLE              = option.FIELDS_TABLE;
    FIELDS_TABLE_HEADER       = option.FIELDS_TABLE_HEADER;
    FIELDS_TABLE_ORDERBYS     = option.FIELDS_TABLE_ORDERBYS;
    RADIO_SHOW_BUTTON_IDS     = option.RADIO_SHOW_BUTTON_IDS;
    _noMove                   = option.noMove;
    _noRadio                  = option.noRadio;
    
    let resJson = <?=json_encode($responseJsonList)?>;
    loadTable(parseAjaxResponse(resJson));
  }

  
</script>    