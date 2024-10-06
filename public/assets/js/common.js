/**
 * Constants
 */
const TOAST_MESSAGE_ID = 'toast-msg';
const DELAY_PERIOD_ANCHOR = 370;

function changeLanguage(lang) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // window.location = window.location.href;
      window.location.reload(true);
    }
  };
  xmlhttp.open("GET", "/lang=" + lang, true);
  xmlhttp.send();
}

function changeTheme(theme) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      window.location.reload(true);
    }
  };
  xmlhttp.open("GET", "/theme=" + theme, true);
  xmlhttp.send();
}

function initUserDropdown() {        
  const ud = document.querySelector('.user-dropdown');
  if (!ud) return;
  const topbar = document.getElementById('topbar');
  ud.addEventListener('show.bs.dropdown', () => { 
    topbar.classList.add('topbar-user-opened');
  });
  ud.addEventListener('hide.bs.dropdown', () => { 
    topbar.classList.remove('topbar-user-opened');
  });
}

/**
 * Copy browser Url to clipboard (for sharing...)
 * @param {*} url 
 */
function copyUrl(url, msg) {
  if (!url) return;
  if (navigator.clipboard && window.isSecureContext) {
    navigator.clipboard.writeText(url);
  } else {
      // Use the 'out of viewport hidden text area' trick
      const textArea = document.createElement("textarea");
      textArea.value = url;
      // Move textarea out of the viewport so it's not visible
      textArea.style.position = "absolute";
      textArea.style.left = "-999999px";
      textArea.style.opacity = 0;
      //    
      document.body.prepend(textArea);
      textArea.select();
      try {
          document.execCommand('copy'); // any new solution?
      } catch (error) {
          console.error(error);
      } finally {
          textArea.remove();
      }
  }
  setToastMessage(msg);
}

/**
 * Replace classNames, or use ele.classList.add/remove...
 * @param {*} ids elements list
 * @param {*} source if blank => add class
 * @param {*} target target if blank => clear class
 */
function loopToggleCss(ids, source, target) {
  if (!ids) return;
  for (var i = 0; i < ids.length; i++) {
    var item = document.getElementById(ids[i]);
    if (source.length === 0) {
        item.className += " " + target;
    } else {
        item.className = item.className.replaceAll(source, target ? target : "");
    }        
  } 
}

/**
 * see above (but with elements param)
 */
function loopToggleCssByElements(elements, source, target) {
  if (!elements) return;
  for (var i = 0; i < elements.length; i++) {
    var item = elements[i];
    if (source.length === 0) {
        item.className += " " + target;
    } else {
        item.className = item.className.replaceAll(source, target ? target : "");
    }        
  } 
}

/**
 * Check if element contains css
 * @param {*} element 
 * @param {*} className 
 * @returns boolean
 */
function hasClass(element, className) {
  return (' ' + element.className + ' ').indexOf(' ' + className+ ' ') > -1;
}

/**
 * Add onclick onfocus... event handlers
 */
function addEvent(ele, type, func) {
  if (ele == null) return;
  if (ele.addEventListener) {
    ele.addEventListener(type, func, false);
  // old browsers like IE  
  } else if (ele.attachEvent) {
    ele.attachEvent("on" + type, func);
  }
}

/**
 * Set toast message content
 */
function setToastMessage(msg, elementId) {
  var id = elementId ? elementId : TOAST_MESSAGE_ID;
  var toast = document.getElementById(id);
  if (toast) {
      toast.innerHTML = msg;
  }
}

function initToast(elementIds, option) {
  if (!elementIds) return;
  var opt = option;
  if (!option) {
    opt = {
      animation: true,
      autohide: true,
      delay: 3000
    };
  }
  const toastElList = document.querySelectorAll('.toast');
  const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl, option));
  for (let i = 0; i < elementIds.length; i++) {
    addEvent(document.getElementById(elementIds[i]), "click", function() {
      toastList.forEach(toast => toast.show());
    });
  }
}

function initModal() {
  setBookmarkSuggestion();
}

function setBookmarkUrl() {
  let bmUrlEl = document.getElementById('bm-url');
  bmUrlEl.setAttribute('value', window.location.href);
}

function setBookmarkSuggestion() {
  let title = document.querySelector('.logo').children[0].childNodes[0].nodeValue.trim();
  document.querySelector('#bm-name').value = title;
}

/**
 * Toast for header's items initialization
 */
function initMenu() {
  initUserDropdown();
  initToast(['copy-link']);
  initModal();
}

/**
 * Workaround for Chrome issue, scrolling to a specified anchor from another page
 */
function scrollToSectionWorkaround() {
  let hash = window.location.hash;
  if (hash == null || hash.length <= 0) return;
  const sectionID = hash.substring(1);
  if (sectionID) {
    // Function to animate scrolling to the section with the specified ID
    function scrollToSection() {
      const section = document.getElementById(sectionID);
      if (section) {
        const sectionOffset = section.getBoundingClientRect().top;
        const currentScroll = window.pageYOffset;
        const targetScroll = currentScroll + sectionOffset;
        const duration = DELAY_PERIOD_ANCHOR; // Animation duration in milliseconds
        const startTime = performance.now();
        function scrollAnimation(currentTime) {
          const elapsedTime = currentTime - startTime;
          const scrollProgress = Math.min(elapsedTime / duration, 1);
          const easedProgress = easeOutCubic(scrollProgress);
          const scrollTo = currentScroll + (sectionOffset * easedProgress);
          window.scrollTo(0, scrollTo);
          if (elapsedTime < duration) {
            requestAnimationFrame(scrollAnimation);
          }
        }
        function easeOutCubic(t) {
          return (t - 1) * Math.pow(t, 2) + 1;
        }
        requestAnimationFrame(scrollAnimation);
      }
    }
    // Wait for the page to finish loading
    window.addEventListener("load", scrollToSection);
  }
}

/**
   * Check if a string starts with any elements in a given array of string
   * @param {*} str 
   * @param {*} arr 
   * @returns 
   */
function startsWithAnyOfArr(str, arr) {
  return arr.some(prefix => str.startsWith(prefix));
}