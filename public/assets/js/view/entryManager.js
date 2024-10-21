let _rootId;
let _parentId;

function initEntryManager(params) {
  window.addEventListener('load', () => {
    var option = {
      FIELDS_FETCH:           new Array('id', 'parent_id', 'root_id', 'section_id', 'section_name', 'type', 'serials', 'enumeration',
                                'image_id_header', 'image_id_content', 'image_id_commentary', 'image_id_footer', 
                                'image_url_header', 'image_url_content', 'image_url_commentary', 'image_url_footer', 
                                'image_name_header', 'image_name_content', 'image_name_commentary', 'image_name_footer', 
                                'reference_source', 'reference_url', 'video_url', 'sequence', 'tags', 
                                'children_groupable', 'children_groupable_name', 'status', 'status_name', 'created_by'),
      FIELDS_TABLE:           new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.type == 1 ? "" : "<i class=\'folder\'></i>";',
                                  CONTENT_FIELD_EXTRA: getFolderUrl('item.id')},  
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'section_name'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'root_id'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'parent_id'},                                      
                                    
                                {CONTENT_TYPE: CONTENT_TYPES.BOX, CONTENT_FIELD: 'item.id',
                                  CONTENT_FIELD_BOX_LABELS: [params.MSG_TRANSLATIONS, 
                                                             params.MSG_COMMENTARIES,
                                                             params.MSG_VIEW],
                                  CONTENT_FIELD_BOX_HREFS: [getTranslationUrl('item.id'), 
                                                            getCommentaryUrl('item.id'),
                                                            getViewUrl('item.id')],
                                },

                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'serials',
                                  CONTENT_FIELD_STICKY: 'true',
                                  CONTENT_FIELD_TRIM: 3},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'enumeration'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'children_groupable_name'},

                                {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.image_name_header',
                                  CONTENT_FIELD_EXTRA_HASH: '"content-modal"',
                                  CONTENT_FIELD_EXTRA_END: 'data-bs-toggle="modal"',
                                  CONTENT_FIELD_EXTRA_ONCLICK: '"setModalContent(`" + encodeURIComponent(item.image_name_header) + "`,`" + encodeURIComponent(item.image_url_header) + "`)"'},
                                {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.image_name_content',
                                  CONTENT_FIELD_EXTRA_HASH: '"content-modal"',
                                  CONTENT_FIELD_EXTRA_END: 'data-bs-toggle="modal"',
                                  CONTENT_FIELD_EXTRA_ONCLICK: '"setModalContent(`" + encodeURIComponent(item.image_name_content) + "`,`" + encodeURIComponent(item.image_url_content) + "`)"'},
                                {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.image_name_commentary',
                                  CONTENT_FIELD_EXTRA_HASH: '"content-modal"',
                                  CONTENT_FIELD_EXTRA_END: 'data-bs-toggle="modal"',
                                  CONTENT_FIELD_EXTRA_ONCLICK: '"setModalContent(`" + encodeURIComponent(item.image_name_commentary) + "`,`" + encodeURIComponent(item.image_url_commentary) + "`)"'},
                                {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.image_name_footer',
                                  CONTENT_FIELD_EXTRA_HASH: '"content-modal"',
                                  CONTENT_FIELD_EXTRA_END: 'data-bs-toggle="modal"',
                                  CONTENT_FIELD_EXTRA_ONCLICK: '"setModalContent(`" + encodeURIComponent(item.image_name_footer) + "`,`" + encodeURIComponent(item.image_url_footer) + "`)"'},                                                                                    

                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status_name'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'tags'},
                                {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.video_url',
                                  CONTENT_FIELD_EXTRA: 'item.video_url',
                                  CONTENT_FIELD_SHORT_URL: 'true',},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'reference_source'},
                                {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.reference_url',
                                  CONTENT_FIELD_EXTRA: 'item.reference_url',
                                  CONTENT_FIELD_SHORT_URL: 'true',},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'created_by'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'sequence',
                                  CONTENT_FIELD_EXTRA_SORT: 'sequence'}),
      FIELDS_TABLE_HEADER:    new Array('',
                                '',
                                params.MSG_SECTION,
                                params.MSG_ROOT,
                                params.MSG_PARENT,
                                params.MSG_ID,
                                params.MSG_SERIALS,
                                params.MSG_ENUMERATION,
                                params.MSG_CHILDREN_GROUPABLE,
                                params.MSG_IMAGE_HEADER,
                                params.MSG_IMAGE_CONTENT,
                                params.MSG_IMAGE_COMMENTARY,
                                params.MSG_IMAGE_FOOTER,
                                params.MSG_STATUS,
                                params.MSG_TAGS,
                                params.MSG_VIDEO_URL,
                                params.MSG_REF_SOURCE,
                                params.MSG_REF_URL,
                                params.MSG_CREATED_BY,
                                params.MSG_SEQUENCE),
      FIELDS_TABLE_ORDERBYS:  new Array('',
                                '',
                                params.ORDER_SECTION,
                                params.ORDER_ROOT,
                                params.ORDER_PARENT,
                                params.ORDER_ID,
                                params.ORDER_SERIALS,
                                params.ORDER_ENUMERATION,
                                params.ORDER_CHILDREN_GROUPABLE,
                                params.ORDER_IMAGE_HEADER,
                                params.ORDER_IMAGE_CONTENT,
                                params.ORDER_COMMENTARY,
                                params.ORDER_FOOTER,
                                params.ORDER_STATUS,
                                params.ORDER_TAGS,
                                params.ORDER_VIDEO_URL,
                                params.ORDER_REF_SOURCE,
                                params.ORDER_REF_URL,
                                params.ORDER_CREATED_BY,
                                params.ORDER_SEQUENCE),
      RADIO_SHOW_BUTTON_IDS:  new Array('btn-modify', 'btn-delete'),
      noMove:                 false,                                      
    };
    initTable(option);

    _rootId   = params.rootId;
    _parentId = params.parentId;
    autofillForm();  
  });  
}

function setModalContent(title, url) {
  document.querySelector('#content-modal-header').innerHTML = decodeURIComponent(title);
  document.querySelector('#content-modal-body').src = decodeURIComponent(url);
}

function getFolderUrl(entryId) {
  return "'/entries/conditions={&quot;parentId&quot;:&quot;' + " + entryId + " + '&quot;}'";
}

function getTranslationUrl(entryId) {
  return "'/translations/conditions={&quot;entryId&quot;:&quot;' + " + entryId + " + '&quot;}'";
}

function getCommentaryUrl(entryId) {
  return "'/commentaries/conditions={&quot;entryId&quot;:&quot;' + " + entryId + " + '&quot;}'";
}

function getViewUrl(entryId) {
  return "'/article/' + " + entryId;
}

function upOneLevel(parentId) {
  var url = '/entries';
  if (parentId && parentId != "''") {
    url = eval(getFolderUrl(parentId)).replaceAll('&quot;', '"');
  }
  window.location = url;      
}

function extraCallback(isLoadData) {
  fillAncestors();
}

/**** Autofill ****/

const idEle = document.querySelector('#id');
const refNameEle = document.querySelector('#reference_source');
const refUrlEle = document.querySelector('#reference_url');
const enumEle = document.querySelector('#enumeration');
const seriEle = document.querySelector('#serials');

function fillReferenceUrl() {
  // For suttacentral.net only (atm)
  if (refNameEle.value.trim().toLowerCase() !== 'sutta central') return;

  let idVal = idEle.value;
  if (idVal == null || idVal.length < 2) return;
  idVal = idVal.trim();

  var checkPrefixes = ['sn', 'an'];
  if (startsWithAnyOfArr(idVal, checkPrefixes)) {
    if (idVal.length > 3 && idVal.indexOf('.') >= 2 && !idVal.endsWith('.') && /^[\d-]+$/.test(idVal.slice(idVal.indexOf('.') + 1))) {
      refUrlEle.value = 'https://suttacentral.net/' + idVal + '/en/sujato?lang=en&layout=linebyline&reference=main&notes=sidenotes&highlight=false&script=latin';
      enumEle.value = idVal.toUpperCase();
      return;
    }
  }

  checkPrefixes = ['dn', 'mn'];
  if (startsWithAnyOfArr(idVal, checkPrefixes)) {
    if (idVal.length > 2 && /^\d+$/.test(idVal.slice(2))) {
      refUrlEle.value = 'https://suttacentral.net/' + idVal + '/en/sujato?lang=en&layout=linebyline&reference=main&notes=sidenotes&highlight=false&script=latin';
      enumEle.value = idVal.toUpperCase();
      return;
    }
  }

  // TODO: other texts (later)...
  checkPrefixes = ['da', 'ma'];
}

function fillSerials() {
  let idVal = idEle.value;
  if (idVal == null || idVal.length < 2) return;
  if (seriEle.value.length >= idVal.length) {        
    seriEle.value = idVal + seriEle.value.slice(idVal.length);
  } else {
    seriEle.value = idVal;
  }
}

function fillAncestors() {
  document.querySelector('#root_id').value = _rootId;
  document.querySelector('#parent_id').value = _parentId;
}

function autofillForm() {
  autofillRef();
  autofillSerials();
  autofillAncestors();
}

function autofillRef() {
  addEvent(idEle, 'change', fillReferenceUrl);
  addEvent(refNameEle, 'change', fillReferenceUrl);
}

function autofillSerials() {
  addEvent(idEle, 'change', fillSerials);
}

function autofillAncestors() {
  fillAncestors();
}
