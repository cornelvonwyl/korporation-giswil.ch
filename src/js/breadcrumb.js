document.addEventListener('DOMContentLoaded', function () {
  const breadcrumbLinks = document.querySelectorAll('.breadcrumb a');

  if (!breadcrumbLinks || breadcrumbLinks.length === 0) {
    return;
  }

  breadcrumbLinks.forEach((link) => {
    link.addEventListener('click', function (e) {
      e.preventDefault();

      const targetUrl = this.getAttribute('href');

      // Check if the target URL exists in the history
      if (window.history.length > 1) {
        const tempLink = document.createElement('a');
        tempLink.href = document.referrer;

        // Create URL objects to compare paths
        const previousUrlObj = new URL(tempLink.href);
        const targetUrlObj = new URL(targetUrl, window.location.origin);

        // If the previous page URL contains the breadcrumb link path
        if (previousUrlObj.pathname.includes(targetUrlObj.pathname)) {
          window.history.back();
        } else {
          window.location.href = targetUrl;
        }
      } else {
        window.location.href = targetUrl;
      }
    });
  });
});
