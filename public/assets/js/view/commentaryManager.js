function initCommentaryManager(params) {
  window.addEventListener('load', () => {
    var option = {
      FIELDS_FETCH:               new Array('id', 'entry_id', 'author', 'language_code', 'language', 
                                    'status', 'status_name', 'author_note', 'notation', 'content'),
      FIELDS_TABLE:               new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'entry_id'},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'language'},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'author',
                                      CONTENT_FIELD_STICKY: 'true'},                                       
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'content',
                                      CONTENT_FIELD_TRIM: 4},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'author_note',
                                      CONTENT_FIELD_TRIM: 4},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'notation',
                                      CONTENT_FIELD_TRIM: 4},
                                    {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status_name'},),
      FIELDS_TABLE_HEADER:        new Array('',
                                    params.MSG_ENTRY_ID, 
                                    params.MSG_LANGUAGE, 
                                    params.MSG_AUTHOR, 
                                    params.MSG_CONTENT,
                                    params.MSG_AUTHOR_NOTE, 
                                    params.MSG_NOTATION, 
                                    params.MSG_STATUS),
      FIELDS_TABLE_ORDERBYS:      new Array('',
                                    params.ORDER_ENTRY_ID,
                                    params.ORDER_LANGUAGE,
                                    params.ORDER_AUTHOR,
                                    params.ORDER_CONTENT,
                                    params.ORDER_AUTHOR_NOTE,
                                    params.ORDER_NOTATION,
                                    params.ORDER_STATUS),
      RADIO_SHOW_BUTTON_IDS: new Array('btn-modify', 'btn-delete'),
      noMove: true,                                      
    };
    initTable(option);
  });
}

function backToEntry(parentId) {
  var url = '/entries';
  if (parentId && parentId != "''") {
    url = eval(getFolderUrl(parentId)).replaceAll('&quot;', '"');
  }
  window.location = url;
}

function getFolderUrl(entryId) {
  return "'/entries/conditions={&quot;parentId&quot;:&quot;' + " + entryId + " + '&quot;}'";
}