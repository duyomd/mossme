function initImageUrlManager(params) {
  window.addEventListener('load', () => {
    var option = {
      FIELDS_FETCH:               new Array('id', 'image_name', 'image_url', 'sequence'),
      FIELDS_TABLE:               new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'}, 
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'image_name',
                                      CONTENT_FIELD_STICKY: 'true', }, 
                                    {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.image_url',
                                      CONTENT_FIELD_EXTRA_HASH: '"content-modal"',
                                      CONTENT_FIELD_EXTRA_END: 'data-bs-toggle="modal"',
                                      CONTENT_FIELD_EXTRA_ONCLICK: '"setModalContent(`" + encodeURIComponent(item.image_name) + "`,`" + encodeURIComponent(item.image_url) + "`)"'},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'sequence'}, ),
      FIELDS_TABLE_HEADER:        new Array('',
                                    params.MSG_NAME, 
                                    params.MSG_URL, 
                                    params.MSG_SEQUENCE),
      FIELDS_TABLE_ORDERBYS:      new Array('',
                                    params.ORDER_NAME,
                                    params.ORDER_URL,
                                    params.ORDER_SEQUENCE),
      RADIO_SHOW_BUTTON_IDS:      new Array('btn-modify', 'btn-delete'),
      noMove:                     false,                                      
    };
    initTable(option);
  });
}

function setModalContent(title, url) {
  document.querySelector('#content-modal-header').innerHTML = decodeURIComponent(title);
  document.querySelector('#content-modal-body').src = decodeURIComponent(url);
}