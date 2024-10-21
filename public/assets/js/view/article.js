const DELAY_PERIOD = 370;

let MSG_PARALLELES_LOADING;
let MSG_PARALLELES_PATIENT;
let MSG_PARALLELES_ERROR;
let MSG_PARALLELES_FAILED;
let MSG_MONO_MONOLINGUAL;
let MSG_MONO_BILINGUAL;
let MSG_COMMENTARY_HIDDEN;
let MSG_COMMENTARY_DISPLAY;
let MSG_EXPAND_ALL;
let MSG_COLLAPSE_ALL;
let MSG_TOGGLE_NODE;

let ENTRY_COUNT;
let TRANSLATIONS_DEFAULT;
let TRANSLATIONS_ALL;
let COMMENTARIES_DEFAULT;
let COMMENTARIES_ALL;

let ANCHOR;

function articleGlobal(params) {
  MSG_PARALLELES_LOADING  = params.MSG_PARALLELES_LOADING;
  MSG_PARALLELES_PATIENT  = params.MSG_PARALLELES_PATIENT;
  MSG_PARALLELES_ERROR    = params.MSG_PARALLELES_ERROR;
  MSG_PARALLELES_FAILED   = params.MSG_PARALLELES_FAILED;
  MSG_MONO_MONOLINGUAL    = params.MSG_MONO_MONOLINGUAL;
  MSG_MONO_BILINGUAL      = params.MSG_MONO_BILINGUAL;
  MSG_COMMENTARY_HIDDEN   = params.MSG_COMMENTARY_HIDDEN;
  MSG_COMMENTARY_DISPLAY  = params.MSG_COMMENTARY_DISPLAY;
  MSG_EXPAND_ALL          = params.MSG_EXPAND_ALL;
  MSG_COLLAPSE_ALL        = params.MSG_COLLAPSE_ALL;

  ENTRY_COUNT             = params.ENTRY_COUNT;
  ANCHOR                  = params.ANCHOR;

  TRANSLATIONS_DEFAULT    = params.TRANSLATIONS_DEFAULT;
  TRANSLATIONS_ALL        = params.TRANSLATIONS_ALL;
  COMMENTARIES_DEFAULT    = params.COMMENTARIES_DEFAULT;
  COMMENTARIES_ALL        = params.COMMENTARIES_ALL;
}

var _firstLoad = true;
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
  const newTab = ' target="_blank" rel="noreferrer noopener" ';
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
      content += '<a href="' + par.url + '"' + newTab + '>' + par.entry_id + '</a>';
    } else {
      let eId = par.entry_id.toLowerCase();
      // TODO: later...
      if (startsWithAnyOfArr(eId, ['kd', 'mvu', 'sht'])) {
        content += '<span>' + par.entry_id + '</span>';      
      } else {
        let url = 'https://suttacentral.net/' + eId;
        content += '<a class="ref" href="' + url + '"' + newTab + '>' + par.entry_id + '</a>';
      }
      
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
    ti.lang = item.lang;
  }
  au.innerHTML = item.author;
  // au.lang = item.lang;

  var maps = TRANSLATIONS_ALL;
  if (type == 3) {
    maps = COMMENTARIES_ALL;
  }
  let cached = maps[i].get(item.id);
  if (cached && cached.content && cached.content.length > 0) {
      let tempElement = document.createElement('textarea');
      tempElement.innerHTML = cached.content;
      co.innerHTML = tempElement.value;
      co.lang = cached.lang;
      tempElement.remove();
  } else {
    loadContent(type, item.id, co, i);
  }

  loadWindowLocation(type, item);
}

// change window href
function loadWindowLocation(type, item) {
  // only in single article mode
  if (window.location.href.indexOf('article-group') > 0) return;

  const currentUrl = new URL(window.location.href);
  if (type == 1 || type == 2) {
    currentUrl.searchParams.set('tid', item.id);
    currentUrl.searchParams.set('lang', item.lang);
  }
  if ((!_firstLoad && type != 3)  // when calling ajax to reload commentary content, no need to update (bad for navi but good for seo)
    || type == 1) {               // in initial page load, updating only for main dropdown event is enough
    currentUrl.searchParams.delete('anchor');
    currentUrl.searchParams.delete('aid');
    currentUrl.hash = '';

    window.history.pushState({tid: item.id}, '', currentUrl);
  }  
}

function loadContent(type, id, contentEle, i) {
  loading(true);
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      try {
        if (this.readyState == 4) {
          if (this.status == 200) {
            var result = JSON.parse(this.responseText);
            if (result) {
              if (type == 3) {
                COMMENTARIES_ALL[i].set(id, result);
              } else {
                TRANSLATIONS_ALL[i].set(id, result);
              }
              contentEle.innerHTML = result.content;
              contentEle.lang = result.lang;
            }
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
  if (!ANCHOR) return;
  if (ANCHOR == 'commentary') {
    document.getElementById('btn-commentary').click();
  } else if (ANCHOR == 'translation') {
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

function initArticle() {
  initToastArticle();
  initContent(TRANSLATIONS_DEFAULT, COMMENTARIES_DEFAULT);
  initDefaultState();
  dropdownOverflow();
  _firstLoad = false;
}

/****** Article Tree ******/

const SUFFIX_TOGGLE   = '-tree-i';
const SUFFIX_SUBTREE  = '-tree-ul';

const CSS_SHOW        = 'show';
const CSS_SUBTREE     = 'content-list-tree';
const CSS_EXPANDING   = 'bi-dash-square';
const CSS_COLLAPSING  = 'bi-plus-square-fill';

const MAX_CONCURRENT_REQUESTS = 5;  // Limit the number of concurrent requests

let requestQueue    = [];           // Queue to hold requests
let activeRequests  = 0;            // Track active requests

var _treemap = new Map();

function getTreeElement(eId, suffix) {
  return document.getElementById(eId.replaceAll('.', '\\.') + suffix);
}

function getEidFromTreeElement(treeE, suffix) {
  return treeE.id.slice(0, -1*(suffix).length);
}

function getToggleElement(eId) {
  return getTreeElement(eId, SUFFIX_TOGGLE);
}

function getSubtreeElement(eId) {
  return getTreeElement(eId, SUFFIX_SUBTREE);
}

function expandCss(eId) {
  getSubtreeElement(eId).classList.add(CSS_SHOW);
  getToggleElement(eId).classList.replace(CSS_COLLAPSING, CSS_EXPANDING);
}

function collapseCss(eId) {
  getSubtreeElement(eId).classList.remove(CSS_SHOW);
  getToggleElement(eId).classList.replace(CSS_EXPANDING, CSS_COLLAPSING);
}

function queueRequest(eId, isRecursive) {
  requestQueue.push({ eId, isRecursive });
  processQueue();
}

function processQueue() {
  if (activeRequests >= MAX_CONCURRENT_REQUESTS || requestQueue.length === 0) return;

  const { eId, isRecursive } = requestQueue.shift();
  activeRequests++;

  fetchChildNodes(eId, isRecursive)
    .finally(() => {
      activeRequests--;
      processQueue(); // Continue processing the queue after the request completes
    });
}

/**
 * Open/close folder tree
 *  @param {*} eId: entry_id
 *  @param {*} isRecursive: true when [expand all]
 */
function toggleNode(eId, isRecursive) {
  if (getToggleElement(eId).classList.contains(CSS_COLLAPSING)) {  
    queueRequest(eId, isRecursive);
  } else {
    closeNode(eId);
  }  
}

function openNode(eId, isRecursive) {
  let ulEle = getSubtreeElement(eId);
  let childLis = ulEle.children;
  if (childLis.length == 0) {
    queueRequest(eId, isRecursive);
  } else {
    if (isRecursive) {      
      for (let i = 0; i < childLis.length; i++) {
        // check if any of its direct children has subtree (whether this is a folder) (length < 3 is actually unnecessary)
        if (!Array.from(childLis[i].children).some(child => child.classList.contains(CSS_SUBTREE))
          || childLis[i].children.length < 3) {
          break;          
        }
        let childUl = childLis[i].querySelector('.' + CSS_SUBTREE);
        openNode(getEidFromTreeElement(childUl, SUFFIX_SUBTREE), isRecursive);
      }
    }
    expandCss(eId);
  }  
}

function closeNode(eId) {
  collapseCss(eId);  
}

function fetchChildNodes(parentEntryId, isRecursive) {
  return new Promise((resolve, reject) => {
    if (!parentEntryId) return resolve();

    if (_treemap.get(parentEntryId)) {
      expandCss(parentEntryId);
      return resolve();
    } else {
      _treemap.set(parentEntryId, true);
    }

    loading(true);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      try {
        if (this.readyState == 4) {
          if (this.status == 200) {
            let trans = JSON.parse(this.responseText);
            printChildNodes(parentEntryId, trans, isRecursive);
            resolve(); // Resolve promise after successful fetch
          } else {
            reject(); // Reject if status is not 200
          }
          loading(false);
        }
      } catch(e) {
        loading(false);
        reject(e); // Reject promise on error
      }
    };
    xmlhttp.open("GET", "/openFolder/" + parentEntryId, true);
    xmlhttp.send();
  });
}

function printChildNodes(parentEntryId, trans, isRecursive) {
  let parentUl = getSubtreeElement(parentEntryId);
  let fragment = document.createDocumentFragment(); // reducing reflow & repainting
  for (let i = 0; i < trans.length; i++) {
    let tran = trans[i];
    let li = document.createElement('li');
    let innerHTML = '';
    let isFolder = tran.type == 0;
    if (isFolder) {
      innerHTML += 
      '<a role="button" href="javascript:void(0)" aria-label="' + MSG_TOGGLE_NODE + '">' +  
        '<i id="' + tran.entry_id + SUFFIX_TOGGLE + '" data-bs-toggle="collapse" href="#' + tran.entry_id + SUFFIX_SUBTREE + '"' + 
          'class="d-inline bi ' + CSS_COLLAPSING + '" ' + 
          'onclick="toggleNode(`' + tran.entry_id + '`, false)"></i>' + 
      '</a>'
    }
    innerHTML += 
      '<a href="/article/' + tran.entry_id + '">' + 
        '<span class="' + (isFolder ? 'tree-folder' : 'tree-leaf') + '">' + tran.enum_title + '</span>' + 
      '</a>';
    if (isFolder) {
      innerHTML += 
      '<ul id="' + tran.entry_id + SUFFIX_SUBTREE + '" class="content-list ' + CSS_SUBTREE + ' collapse"></ul>';
    }
    li.innerHTML = innerHTML;
    fragment.appendChild(li);
  }
  parentUl.appendChild(fragment);  
  expandCss(parentEntryId);

  if (isRecursive) {
    for (let i = 0; i < trans.length; i++) {
      let tran = trans[i];
      if (tran.type == 0) {
        openNode(tran.entry_id, isRecursive);
      }
    }
  }
}

function toggleAllNodes() {  
  let toggleAllEle = document.getElementById('btn-toggle-all');
  if (!toggleAllEle) return;
  if (toggleAllEle.classList.contains('bi-grid-3x3-gap-fill')) {
    expandAll();
    toggleAllEle.nextElementSibling.innerHTML = MSG_COLLAPSE_ALL;
  } else {
    collapseAll();
    toggleAllEle.nextElementSibling.innerHTML = MSG_EXPAND_ALL;
  }
  toggleAllEle.classList.toggle('bi-grid-3x3-gap-fill');
  toggleAllEle.classList.toggle('bi-grid-3x3-gap');
}

function expandAll() {
  let roots = document.querySelectorAll('.tree-folder-no-parent');
  for (let i = 0; i < roots.length; i++) {
    openNode(getEidFromTreeElement(roots[i], SUFFIX_TOGGLE), true);
  }
}

function collapseAll() {
  let uls = document.querySelectorAll('.' + CSS_SUBTREE);
  for (let i = 1; i < uls.length; i++) {
    closeNode(getEidFromTreeElement(uls[i], SUFFIX_SUBTREE));
  }  
}

/****** Page Onload ******/

addEvent(window, "load", initArticle);
scrollToSectionWorkaround();