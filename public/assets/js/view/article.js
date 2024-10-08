const DELAY_PERIOD = 370;

let MSG_PARALLELES_LOADING;
let MSG_PARALLELES_PATIENT;
let MSG_PARALLELES_ERROR;
let MSG_PARALLELES_FAILED;
let MSG_MONO_MONOLINGUAL;
let MSG_MONO_BILINGUAL;
let MSG_COMMENTARY_HIDDEN;
let MSG_COMMENTARY_DISPLAY;

let ENTRY_COUNT;
let TRANSLATIONS_DEFAULT;
let TRANSLATIONS_ALL;
let COMMENTARIES_DEFAULT;
let COMMENTARIES_ALL;

let FORWARD;

function articleGlobal(params) {
  MSG_PARALLELES_LOADING  = params.MSG_PARALLELES_LOADING;
  MSG_PARALLELES_PATIENT  = params.MSG_PARALLELES_PATIENT;
  MSG_PARALLELES_ERROR    = params.MSG_PARALLELES_ERROR;
  MSG_PARALLELES_FAILED   = params.MSG_PARALLELES_FAILED;
  MSG_MONO_MONOLINGUAL    = params.MSG_MONO_MONOLINGUAL;
  MSG_MONO_BILINGUAL      = params.MSG_MONO_BILINGUAL;
  MSG_COMMENTARY_HIDDEN   = params.MSG_COMMENTARY_HIDDEN;
  MSG_COMMENTARY_DISPLAY  = params.MSG_COMMENTARY_DISPLAY;

  ENTRY_COUNT             = params.ENTRY_COUNT;
  FORWARD                 = params.FORWARD;

  TRANSLATIONS_DEFAULT    = params.TRANSLATIONS_DEFAULT;
  TRANSLATIONS_ALL        = params.TRANSLATIONS_ALL;
  COMMENTARIES_DEFAULT    = params.COMMENTARIES_DEFAULT;
  COMMENTARIES_ALL        = params.COMMENTARIES_ALL;
}

var _bilingual = false;

var _parallelsOns = new Array(ENTRY_COUNT);
for (let i = 0; i < _parallelsOns.length; i++) {_parallelsOns[i] = false;}

function loadParallels(pars, i) {
  if (_parallelsOns[i]) return;        
  loading(true);
  var titleEle = document.querySelector('.parallels-title-' + i);
  var contentEle = document.querySelector('.parallels-content-' + i);
  parallelsSearching(titleEle, contentEle);
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      try {
        if (this.readyState == 4) {
          if (this.status == 200) {                  
            parallelsResult(titleEle, contentEle, this.responseText);                  
            _parallelsOns[i] = true;
          } else {                  
            parallelsError(titleEle, contentEle);
          }
          loading(false);
        }
      } catch(e) {
        parallelsError(titleEle, contentEle)
        loading(false);
      }
    };          
    xmlhttp.open("GET", "/parallels=" + pars, true);
    xmlhttp.send();
}

function parallelsSearching(titleEle, contentEle) {
  titleEle.innerHTML = MSG_PARALLELES_LOADING;
  contentEle.innerHTML = MSG_PARALLELES_PATIENT;
  contentEle.classList.remove('d-none');        
}

function parallelsResult(titleEle, contentEle, responseText) {
  var data = JSON.parse(responseText);
  var result = data['urls'];
  var msg = data['msg'];
  var content = '';
  for (var i = 0; i < result.length; i++) {
    par = result[i];
    if (content.length > 0) {
      content += ", ";
    }
    if (par.url) {
      content += '<a href="' + par.url + '">' + par.entry_id + '</a>';
    } else {
      content += '<span>' + par.entry_id + '</span>';
    }
  }
  contentEle.classList.add("text-uppercase");
  contentEle.innerHTML = content;
  titleEle.innerHTML = msg;  
}

function parallelsError(titleEle, contentEle) {
  contentEle.innerHTML = MSG_PARALLELES_ERROR;
  titleEle.innerHTML = MSG_PARALLELES_FAILED;
  titleEle.parentElement.removeAttribute("href");
  titleEle.parentElement.removeAttribute("onclick");
}

function gotoCmt() {
  var cmt = document.getElementById('commentary');
  if (!cmt || !cmt.className) return; 
  if (hasClass(cmt, 'collapse show')) {
    window.location.href = "#commentary";
  }
}

function commentary(e) {
  if (!e) return;
  // forbid continuously clicking
  document.getElementById(e.id).classList.add('disabled');

  var msg = '';
  if (hasClass(e, 'active')) {
    loopToggleCss(new Array(e.id), 'active', 'inactive');
    msg = MSG_COMMENTARY_HIDDEN;
  } else {
    loopToggleCss(new Array(e.id), 'inactive', 'active');
    msg = MSG_COMMENTARY_DISPLAY;
  }
  setToastMessage(msg);

  setTimeout(function(){
    gotoCmt();
    document.getElementById(e.id).classList.remove('disabled');
  }, DELAY_PERIOD);
}

function bilingual(e) {
  var col_mains = document.querySelectorAll('#col-main');
  if (col_mains == null || col_mains.length <= 0) return;
  
  var col_subs = document.querySelectorAll('#col-sub');
  var _bilingual = !hasClass(col_subs[0], 'hidden');
  for (var i = 0; i < col_mains.length; i++) {
    let col_main = col_mains[i];
    let col_sub = col_subs[i];
    if (!_bilingual) {
      col_main.className = 'col-6';
      col_sub.className = 'col-6'; 
    } else {
      col_main.className = '';
      col_sub.className = 'hidden'; 
    }
  }

  if (!e) return;
  var msg = '';
  if (_bilingual) {
    loopToggleCss(new Array(e.id), 'active', 'inactive');
    msg = MSG_MONO_MONOLINGUAL;
  } else {
    loopToggleCss(new Array(e.id), 'inactive', 'active');
    msg = MSG_MONO_BILINGUAL;
  }
  setToastMessage(msg);

  window.location.href = '#article';
}

function selectDropdownItem(type, e, i) {        
  if (!e) return;
  var css = type == 1 ? ('link-main-' + i) : type == 2 ? ('link-sub-' + i) : null;
  if (css == null) return;

  var items = document.querySelectorAll('.' + css);
  loopToggleCssByElements(items, 'active', '');
  loopToggleCssByElements(new Array(e), '', 'active');
}

function reloadContent(type, item, i) {
  if (!item) return;
  var ti, co, au;
  // main dropdown
  if (type == 1) {        
    ti = document.querySelectorAll('#title-main')[i];
    co = document.querySelectorAll('#content-main')[i];
    au = document.querySelectorAll('#dropdown-main')[i].children[0];
  // sub dropdown  
  } else if (type == 2) {
    ti = document.querySelectorAll('#title-sub')[i];
    co = document.querySelectorAll('#content-sub')[i];
    au = document.querySelectorAll('#dropdown-sub')[i].children[0];
  // commentary dropdown  
  } else if (type == 3) {
    ti = document.querySelectorAll('#title-comm')[i];
    co = document.querySelectorAll('#content-comm')[i];
    au = document.querySelectorAll('#dropdown-comm')[i].children[0];
  } else {
    return;
  }
  if (ti) {
    ti.innerHTML = item.title;
  }
  au.innerHTML = item.author;

  var maps = TRANSLATIONS_ALL;
  if (type == 3) {
    maps = COMMENTARIES_ALL;
  }
  if (maps[i].get(item.id) && maps[i].get(item.id).length > 0) {
      let tempElement = document.createElement('textarea');
      tempElement.innerHTML = maps[i].get(item.id);
      co.innerHTML = tempElement.value;
      tempElement.remove();
  } else {
    loadContent(type, item.id, co, i);
  }    
}

function loadContent(type, id, contentEle, i) {
  loading(true);
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      try {
        if (this.readyState == 4) {
          if (this.status == 200) {
            var content = this.responseText;
            if (type == 3) {
              COMMENTARIES_ALL[i].set(id, content);
            } else {
              TRANSLATIONS_ALL[i].set(id, content);
            }
            contentEle.innerHTML = content;
          } else {}
          loading(false);
        }
      } catch(e) {
        loading(false);
      }
    };
    xmlhttp.open("GET", "/articleContent/type=" + type + "/id=" + id, true);
    xmlhttp.send();
}

function initContent(trans, comms) {
  if (!trans || trans.length <= 0) return;
  for (var i = 0; i < trans.length; i++) {
    if (trans[i].author) {
      reloadContent(1, trans[i], i);
      reloadContent(2, trans[i], i);
    }
  }
  if (!comms || comms.length <= 0) return;
  for (var i = 0; i < comms.length; i++) {
    if (comms[i].author) {
      reloadContent(3, comms[i], i);
    }
  }
}

function initToastArticle() {
  initToast(['btn-commentary', 'btn-bilingual']);
}

function initDefaultState() {
  if (!FORWARD) return;
  if (FORWARD == 'commentary') {
    document.getElementById('btn-commentary').click();
  } else if (FORWARD == 'translation') {
    // setTimeout(function(){
    //   var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
    //   if (isChrome && window.location.hash) {
    //     window.location.hash = '';
    //   }
    //   window.location.hash = '#article';
    // }, DELAY_PERIOD);                   
  }
}

function dropdownOverflow() {
  dropdownArticle();
  dropdownCommentary();
}

function dropdownArticle() {
  let das = document.querySelectorAll('#dd-article');
  if (!das || das.length <= 0) return;
  let ar = document.querySelector('#article');
  for (var i = 0; i < das.length; i++) {
    let da = das[i];
    da.addEventListener('show.bs.dropdown', () => {
      ar.style.overflow = 'auto';
    });
    da.addEventListener('hide.bs.dropdown', () => { 
      ar.style.overflow = 'hidden';
    });
  }
}

function dropdownCommentary() {
  let dc = document.querySelector('#dd-commentary');
  if (!dc) return;
  let co = document.querySelector('#commentary');
  dc.addEventListener('show.bs.dropdown', () => {            
    var styleElem = document.head.appendChild(document.createElement("style"));
    styleElem.innerHTML = ".commentary:before {position: fixed;}";
    co.style.overflow = 'auto';
  });
  dc.addEventListener('hide.bs.dropdown', () => { 
    var styleElems = document.getElementsByTagName("style");
    for (let i = 0; i < styleElems.length; i++) {
      styleElems[i].remove();
    }
    co.style.overflow = 'hidden';
  });
}

window.onload = function() {
  initToastArticle();
  initContent(TRANSLATIONS_DEFAULT, COMMENTARIES_DEFAULT);
  initDefaultState();
  dropdownOverflow();
}
scrollToSectionWorkaround();