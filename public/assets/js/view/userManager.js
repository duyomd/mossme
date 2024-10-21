function initUserManager(params) {
  window.addEventListener('load', () => {
    addEventBanMessage();

    var option = {
      FIELDS_FETCH:           new Array('id', 'username', 'email', 'active', 'status', 'status_message', 'groups', 'last_login', 'created_at'),
      FIELDS_TABLE:           new Array({CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'id'}, 
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'username',
                                  CONTENT_FIELD_STICKY: 'true', },
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'email'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'active'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'status_message'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'groups'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'last_login'},
                                {CONTENT_TYPE: CONTENT_TYPES.TEXT, CONTENT_FIELD: 'created_at'}, ),
      FIELDS_TABLE_HEADER:    new Array('',
                                params.MSG_USERNAME,
                                params.MSG_EMAIL,
                                params.MSG_ACTIVE_STATUS,
                                params.MSG_BAN_STATUS,
                                params.MSG_BAN_MESSAGE,
                                params.MSG_GROUPS,
                                params.MSG_LAST_LOGIN,
                                params.MSG_CREATED_AT),
      FIELDS_TABLE_ORDERBYS:  new Array('',
                                params.ORDER_USERNAME,
                                params.ORDER_EMAIL,
                                params.ORDER_ACTIVE_STATUS,
                                params.ORDER_BAN_STATUS,
                                params.ORDER_BAN_MESSAGE,
                                params.ORDER_GROUPS,
                                params.ORDER_LAST_LOGIN,
                                params.ORDER_CREATED_AT),
      RADIO_SHOW_BUTTON_IDS:  new Array('btn-modify', 'btn-delete'),
      noMove:                 true,                                      
    };
    initTable(option);
  });
}

function toggleBanMsg() { 
  if (document.getElementById('status').value == '0') {
    document.getElementById('ban_msg_container').classList.add('hidden');
    document.getElementById('status_message').disabled = 'disabled';
  } else {
    document.getElementById('ban_msg_container').classList.remove('hidden');
    document.getElementById('status_message').disabled = '';
  } 
}

function addEventBanMessage() {
  addEvent(document.getElementById('status'), 'change', function() {
    toggleBanMsg();
  });
}

function triggerEventBanMessage() {
  let event = new Event('change');
  document.getElementById('status').dispatchEvent(event);
}

function groupsCheck() {
  let groupsEle = document.getElementById('groups');
  if (!groupsEle || !groupsEle.value || groupsEle.value.length == 0) return;

  let checkIds = new Array('superadmin', 'admin', 'developer', 'dataoperator', 'beta', 'user');
  let groups = groupsEle.value.split(',');
  for (let i = 0; i < checkIds.length; i++) {
    let checkId = checkIds[i];
    if (groups.includes(checkId)) {
      document.getElementById(checkId).checked = true;
    } else {
      document.getElementById(checkId).checked = false;
    }
  }
}

function extraCallback(isLoadData) {
  triggerEventBanMessage();
  if (isLoadData) {
    groupsCheck();
  }
}