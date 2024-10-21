const serialCkb   = document.getElementById('serial');
const contentCkb  = document.getElementById('content');
const authorCkb   = document.getElementById('author');
const commentCkb  = document.getElementById('commentary');

function eventCheckboxes() {
  let ckbs = [serialCkb, contentCkb, authorCkb, commentCkb];
  for (let i = 0; i < ckbs.length; i++) {
    addEvent(ckbs[i], 'change', toggleCkbs);
  }
}

function toggleCkbs(e) {
  let target = e.target;
  if (!target) return;
  if (target == serialCkb) {
    if (target.checked) {
      contentCkb.checked = false;
      authorCkb.checked = false;
      commentCkb.checked = false;
    }  
  } else {
    if (target.checked) {
      serialCkb.checked = false;
    }
  }
}

function initSearch(params) {
  window.addEventListener('load',() => {
    eventCheckboxes();
    var option = {
      FIELDS_FETCH:           new Array('id', 'found_in', 'matched_at', 'language', 'entry_id', 
                                        'title', 'title_link', 'title_hash', 'author', 'section', 'section_id'),
      FIELDS_TABLE:           new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'found_in', CONTENT_FIELD_EXTRA: 'item.matched_at'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'language'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'entry_id'},
                                {CONTENT_TYPE: CONTENT_TYPES.LINK, CONTENT_FIELD: 'item.title',
                                  CONTENT_FIELD_STICKY: 'true',  
                                  CONTENT_FIELD_EXTRA: 'item.title_link', CONTENT_FIELD_EXTRA_HASH: 'item.title_hash'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'author'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'section_id', CONTENT_FIELD_EXTRA: 'item.section'}, ),
      FIELDS_TABLE_HEADER:    new Array('',
                                params.MSG_MATCHED,
                                params.MSG_LANGUAGE,
                                params.MSG_CODE,
                                params.MSG_TITLE,
                                params.MSG_AUTHOR,
                                params.MSG_SECTION),
      FIELDS_TABLE_ORDERBYS:  new Array('',
                                params.ORDER_MATCHED,
                                params.ORDER_LANGUAGE,
                                params.ORDER_CODE,
                                params.ORDER_TITLE,
                                params.ORDER_AUTHOR,
                                params.ORDER_SECTION),
      noMove:                 true,
      noRadio:                true,
    };
    initTable(option);
  });
}