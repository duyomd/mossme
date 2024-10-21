const CLASSNAME_FLEX      = "d-flex";
const CLASSNAME_HIDDEN    = "hidden";
const CLASSNAME_DARKNESS  = "yami";

const hiddens = ["eye", "earth", "address", "email", "message-form", "footer"];
const yamis   = ["body"];
const dflexs  = ["topbar", "header"];

function toggleAnimation(elem) {
  if (elem) {
    elem.id.includes('eye') ?  hiru() : yami();
  }
}

function yami() {
  loopToggleCss(dflexs, CLASSNAME_FLEX, CLASSNAME_HIDDEN);
  loopToggleCss(yamis, "", CLASSNAME_DARKNESS);
  loopToggleCss(hiddens, "", CLASSNAME_HIDDEN);

  loopToggleCss(new Array(hiddens[0]), " " + CLASSNAME_HIDDEN);
}
function hiru() {
  loopToggleCss(dflexs, CLASSNAME_HIDDEN, CLASSNAME_FLEX);
  loopToggleCss(yamis, " " + CLASSNAME_DARKNESS);
  loopToggleCss(hiddens, " " + CLASSNAME_HIDDEN);

  loopToggleCss(new Array(hiddens[0]), "", CLASSNAME_HIDDEN);
}

var refreshBtn = document.querySelector(".refresh-captcha");
refreshBtn.addEventListener('click', () => {
  document.querySelector(".captcha-image").src = '/captcha?' + Date.now();
});