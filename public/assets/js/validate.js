/**
* Ajax form submit
*/
(function () {
  "use strict";

  let forms = document.querySelectorAll('.ajax-form');

  forms.forEach( function(e) {    
    e.addEventListener('submit', function(event) {
      event.preventDefault();
      loading(true);

      let thisForm = this;

      let action = thisForm.getAttribute('action');
      let recaptcha = thisForm.getAttribute('data-recaptcha-site-key');
      
      if( ! action ) {
        displayError(thisForm, 'The form action property is not set!')
        loading(false)
        return;
      }
      
      let formData = new FormData( thisForm );

      if ( recaptcha ) {
        if(typeof grecaptcha !== "undefined" ) {
          grecaptcha.ready(function() {
            try {
              grecaptcha.execute(recaptcha, {action: 'ajax_form_submit'})
              .then(token => {
                formData.set('recaptcha-response', token);
                ajax_form_submit(thisForm, action, formData);
              })
            } catch(error) {
              displayError(thisForm, error)
            }
          });
        } else {
          displayError(thisForm, 'The reCaptcha javascript API url is not loaded!')
        }
      } else {
        ajax_form_submit(thisForm, action, formData);
      }
    });
  });

  function ajax_form_submit(thisForm, action, formData) {
    fetch(action, {
      method: 'POST',
      // body: formData,
      body: JSON.stringify(Object.fromEntries(formData.entries())),
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',},
    })
    .then(response => {
      if( response.ok ) {
        return response.text()
      } else {
        throw new Error(`${response.status} ${response.statusText} ${response.url}`); 
      }
    })
    .then(data => {
      let fields = JSON.parse(data);      
      let csrf_name = document.getElementById('csrf-name').value;
      let info = fields['info'];
      
      // Set all forms' crsf new key
      let hashEles = document.querySelectorAll("[id='"+ csrf_name + "']");      
      for (var i = 0; i < hashEles.length; i++) {
        hashEles[i].value = fields['hash'];
      }
      
      if (fields['succeed'] == true) {
        displaySuccess(thisForm, info);
        if (!fields['noResetForm']) {
          thisForm.reset();
        }
        
        // in case of input form with table list (but beware of sub form, for ex bookmark form from menu bar)
        let modalId = fields['modalId'];
        if (!modalId) {
          if (typeof loadTable === 'function') {
            loadTable(parseAjaxResponse(fields['responseJsonList']));
            callbackFunc(false);
          } else {
            // window.location.reload(true); // reload incase of unexpected event (js?) 
          }
        } else {
          // if modal is bookmark, main screen is bookmarkManager (bookmark list) then reload for new data
          if (modalId == 'bookmark-modal'
            && window.location.href.indexOf('bookmarks') > 0) {
            window.location.reload(true);
          }
          // close modal and show toast
          let modal = bootstrap.Modal.getInstance(document.getElementById(modalId));
          if (modal) modal.hide();
          setToastMessage(info);
          let toast = bootstrap.Toast.getInstance('.toast');
          if (toast) toast.show();
        }

        loading(false);
      } else {
        if (info) {
          displayError(thisForm, info);
        } else {
          throw new Error('Form submission failed and no error message returned from: ' + action); 
        }
      }
    })
    .catch((error) => {
      displayError(thisForm, error);
    });
  }

  function displayError(thisForm, error) {
    let successEle = thisForm.querySelector('.success-message');
    if (!successEle) return;
    successEle.classList.remove('d-block');
    var errEle = thisForm.querySelector('.error-message');
    errEle.innerHTML = error;
    errEle.classList.add('d-block');
    loading(false);
  }

  function displaySuccess(thisForm, success) {
    let errorEle = thisForm.querySelector('.error-message');
    if (!errorEle) return;
    errorEle.classList.remove('d-block');
    var sucEle = thisForm.querySelector('.success-message');
    sucEle.innerHTML = success;
    sucEle.classList.add('d-block');
  }

})();

/**
 * TODO: still tab-able
 * Currently, only 1 loading modal support. 
 */
function loading(mode) {
  let loadingEle = document.querySelector('.ajax-loading');
  if (!loadingEle) return;
  if (mode) {
    loadingEle.classList.add('d-block');
  } else {
    loadingEle.classList.remove('d-block');
  }
}

// Hide message node,  (no need to clear?)
function clearMsg(thisForm) {
  let errorEle = thisForm.querySelector('.error-message');
  if (errorEle) errorEle.classList.remove('d-block');
  let successEle = thisForm.querySelector('.success-message');
  if (successEle) successEle.classList.remove('d-block');
}
