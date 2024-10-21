function initCardTranslationManager(params) {
  window.addEventListener('load', () => {
    var option = {
      FIELDS_FETCH:               new Array('id', 'card_id', 'title', 'author', 'language_code', 'language', 
                                    'status', 'status_name', 'header_field', 'footer_field', 'content'),
      FIELDS_TABLE:               new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'card_id'},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'language'},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'author'},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'header_field',
                                      CONTENT_FIELD_TRIM: 4},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'content',
                                      CONTENT_FIELD_TRIM: 4},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'footer_field',
                                      CONTENT_FIELD_TRIM: 4},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status_name'},),
      FIELDS_TABLE_HEADER:        new Array('',
                                    params.MSG_CARD_ID, 
                                    params.MSG_LANGUAGE, 
                                    params.MSG_AUTHOR, 
                                    params.MSG_HEADER, 
                                    params.MSG_CONTENT,
                                    params.MSG_FOOTER, 
                                    params.MSG_STATUS),
      FIELDS_TABLE_ORDERBYS:      new Array('',
                                    params.ORDER_CARD_ID,
                                    params.ORDER_LANGUAGE,
                                    params.ORDER_AUTHOR,
                                    params.ORDER_HEADER,
                                    params.ORDER_CONTENT,
                                    params.ORDER_FOOTER,
                                    params.ORDER_STATUS),
      RADIO_SHOW_BUTTON_IDS: new Array('btn-modify', 'btn-delete'),
      noMove: true,                                      
    };
    initTable(option);
  });   
}