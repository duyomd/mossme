function initBookmarkManager(params) {
  window.addEventListener('load', () => {
    var option = {
      FIELDS_FETCH:           new Array('id', 'name', 'url', 'note', 'sequence'),
      FIELDS_TABLE:           new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.name', 
                                  CONTENT_FIELD_STICKY: 'true', 
                                  CONTENT_FIELD_EXTRA: 'item.url'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'note'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'sequence'}, ),
      FIELDS_TABLE_HEADER:    new Array('',
                                params.MSG_NAME, 
                                params.MSG_NOTE, 
                                params.MSG_SEQUENCE),
      FIELDS_TABLE_ORDERBYS:  new Array('',
                                params.ORDER_NAME, 
                                params.ORDER_NOTE, 
                                params.ORDER_SEQUENCE),
      RADIO_SHOW_BUTTON_IDS:  new Array('btn-modify', 'btn-delete'),
      noMove:                 false,                                      
    };
    initTable(option);
  });
}