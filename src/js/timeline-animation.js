document.addEventListener('DOMContentLoaded', function () {
  const timeline = document.querySelector('.history-timeline');
  if (!timeline) return;

  let ticking = false;
  let lastScrollY = window.scrollY;

  function updateTimeline() {
    const rect = timeline.getBoundingClientRect();
    const timelineTop = rect.top + window.scrollY;
    const timelineHeight = rect.height;
    const windowHeight = window.innerHeight;

    // Calculate how far the timeline is in the viewport
    let timelineProgress =
      (window.scrollY - timelineTop) / (timelineHeight - windowHeight);

    // Add 2% to the progress and ensure it doesn't exceed 100%
    timelineProgress = Math.min(timelineProgress + 0.02, 100);

    // Apply the animation with a delay
    requestAnimationFrame(() => {
      timeline.style.setProperty(
        '--timeline-progress',
        `${timelineProgress * 100}%`
      );
    });
  }

  function onScroll() {
    lastScrollY = window.scrollY;

    if (!ticking) {
      window.requestAnimationFrame(() => {
        updateTimeline();
        ticking = false;
      });
      ticking = true;
    }
  }

  window.addEventListener('scroll', onScroll, { passive: true });

  updateTimeline();
});
