document.addEventListener('DOMContentLoaded', function () {
  const elementsToAnimate = document.querySelectorAll(
    '.main-content > *:not(.page-header)'
  );

  // Function to run when elements intersect with the viewport
  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          observer.unobserve(entry.target);
        }
      });
    },
    {
      rootMargin: '0px',
      threshold: 0.05,
    }
  );

  // Observing each element
  elementsToAnimate.forEach((element) => {
    observer.observe(element);
  });
});
