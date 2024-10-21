function initMessageManager(params) {
  window.addEventListener('load', () => {
    var option = {
      FIELDS_FETCH:           new Array('id', 'read_state', 'sender', 'ip_address', 'user_language_code', 'language', 'name', 'email', 
                                        'subject', 'content', 'content_str', 'status', 'status_str', 'sent_at', 'sent_at_str'),
      FIELDS_TABLE:           new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.IMAGE, CONTENT_FIELD: 'read_state', 
                                  CONTENT_FIELD_EXTRA: 'item.read_state == 1 ? "" : "<i class=\'unread\'></i>";'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'sender'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'name'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.subject',
                                  CONTENT_FIELD_STICKY: 'true', 
                                  CONTENT_FIELD_EXTRA_HASH: '"content-modal"',
                                  CONTENT_FIELD_EXTRA_END: 'data-bs-toggle="modal"',
                                  CONTENT_FIELD_EXTRA_ONCLICK: '"setModalContent(`" + encodeURIComponent(item.subject) + "`,`" + encodeURIComponent(item.content) + "`,`" + item.read_state + "`,`" + item.id + "`)"'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'content', 
                                  CONTENT_FIELD_EXTRA: 'item.content_str'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'email'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'ip_address'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'language'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status', 
                                  CONTENT_FIELD_EXTRA: 'item.status_str'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'sent_at',
                                  CONTENT_FIELD_EXTRA: 'item.sent_at_str'}, ),
      FIELDS_TABLE_HEADER:    new Array('',
                                '<i class="bi bi-eye"></i>', 
                                params.MSG_SENDER, 
                                params.MSG_NAME, 
                                params.MSG_SUBJECT,
                                params.MSG_CONTENT,
                                params.MSG_EMAIL,
                                params.MSG_IP, 
                                params.MSG_ULC, 
                                params.MSG_STATUS, 
                                params.MSG_SENT_AT),
      FIELDS_TABLE_ORDERBYS:  new Array('',
                                params.ORDER_READ_STATE,
                                params.ORDER_SENDER, 
                                params.ORDER_NAME, 
                                params.ORDER_SUBJECT,
                                params.ORDER_CONTENT,
                                params.ORDER_EMAIL,
                                params.ORDER_IP, 
                                params.ORDER_ULC, 
                                params.ORDER_STATUS, 
                                params.ORDER_SENT_AT),
      RADIO_SHOW_BUTTON_IDS:  new Array('btn-modify', 'btn-delete'),
      noMove:                 true,                                      
    };
    initTable(option);
  });
}

function setModalContent(title, content, readState, id) {
  document.querySelector('#content-modal-header').innerHTML = decodeURIComponent(title);
  document.querySelector('#content-modal-body').innerHTML = decodeURIComponent(content);
  if (readState != '1') {
    markAsRead(id);
  }
}

function markAsRead(id) {
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
  xmlhttp.open("GET", "/" + _url + 
    "/id=" + id +
    "/p=" + _currentSort.currentPage + 
    "/orderby=" + _currentSort.orderBys.toString() +
    "/sortorder=" + _currentSort.sortOrders.toString() +
    "/conditions=" + getConditions(), true);
  xmlhttp.send();
}