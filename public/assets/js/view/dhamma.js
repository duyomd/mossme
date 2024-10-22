document.addEventListener('DOMContentLoaded', function() {
  // chrome's hash bug workaround
  scrollToSectionWorkaround();

  // for seo
  addEvent(window, 'load', () => {
    const currentUrl = new URL(window.location.href);
    currentUrl.searchParams.set('lang', document.documentElement.lang);
    window.history.pushState(null, '', currentUrl);
  });
});