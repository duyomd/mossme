function initLanguageManager(params) {
  window.addEventListener('load', () => {
    var option = {
      FIELDS_FETCH:           new Array('code', 'language', 'status', 'status_name', 'sequence'),
      FIELDS_TABLE:           new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'code'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'code',
                                  CONTENT_FIELD_STICKY: 'true', }, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'language'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status_name'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'sequence'}, ),
      FIELDS_TABLE_HEADER:    new Array('',
                                params.MSG_CODE, 
                                params.MSG_LANGUAGE, 
                                params.MSG_STATUS, 
                                params.MSG_SEQUENCE),
      FIELDS_TABLE_ORDERBYS:  new Array('',
                                params.ORDER_CODE,
                                params.ORDER_LANGUAGE,
                                params.ORDER_STATUS,
                                params.ORDER_SEQUENCE),
      RADIO_SHOW_BUTTON_IDS:  new Array('btn-modify', 'btn-delete'),
      noMove:                 false,                                      
    };
    initTable(option);
  });
}