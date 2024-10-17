let _rootId;
let _parentId;

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

function autofillForm(option) {
  _rootId   = option.rootId;
  _parentId = option.parentId;

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
