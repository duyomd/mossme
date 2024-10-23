document.addEventListener('DOMContentLoaded', function() {
  // chrome's hash bug workaround
  scrollToSectionWorkaround();

  // for seo
  replaceUrl();

  // boost load time
  lazyloadBackgrounds();
});

function replaceUrl() {
  addEvent(window, 'load', () => {
    const currentUrl = new URL(window.location.href);
    currentUrl.searchParams.set('lang', document.documentElement.lang);
    window.history.replaceState(null, '', currentUrl);
  });
}