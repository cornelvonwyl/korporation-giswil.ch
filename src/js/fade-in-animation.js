document.addEventListener('DOMContentLoaded', function () {
  // Match the exact selector from SCSS
  const elementsToAnimate = document.querySelectorAll(
    '.main-content > *:not(:first-child):not(.page-header):not(.team-overview):not(.news-overview):not(.services-overview):not(.referenzen):not(.jobs-overview):not(.sub-services), .sub-service, .full-element-link, .person'
  );

  // Add a small delay to prevent initial animation on page load
  setTimeout(() => {
    const observer = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            requestAnimationFrame(() => {
              entry.target.classList.add('in-view');
            });
            observer.unobserve(entry.target);
          }
        });
      },
      {
        rootMargin: '50px',
        threshold: 0.05,
      }
    );

    // Observing each element
    elementsToAnimate.forEach((element) => {
      observer.observe(element);
    });
  }, 100); // Small delay to prevent initial animation on page load
});
