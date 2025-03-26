document.addEventListener('DOMContentLoaded', () => {
  const serviceTabsContainers = document.querySelectorAll('.sub-services');

  if (!serviceTabsContainers.length) return;

  serviceTabsContainers.forEach((container) => {
    const tabs = container.querySelectorAll('.sub-services__tab');
    const tabPanels = container.querySelectorAll('.sub-services__panel');

    if (tabs.length <= 1) return; // Don't initialize if there's only one tab

    // Set initial state - only show privat content
    tabs.forEach((tab) => {
      const isPrivat = tab.getAttribute('data-target') === 'privat';
      tab.setAttribute('aria-selected', isPrivat ? 'true' : 'false');
      tab.classList.toggle('is-active', isPrivat);
    });

    tabPanels.forEach((panel) => {
      const isPrivat = panel.getAttribute('data-group') === 'privat';
      panel.classList.toggle('is-active', isPrivat);
      panel.classList.toggle('is-hidden', !isPrivat);
    });

    tabs.forEach((tab) => {
      tab.addEventListener('click', () => {
        const target = tab.getAttribute('data-target');

        // Update tabs
        tabs.forEach((t) => {
          t.setAttribute('aria-selected', 'false');
          t.classList.remove('is-active');
        });
        tab.setAttribute('aria-selected', 'true');
        tab.classList.add('is-active');

        // Update panels
        tabPanels.forEach((panel) => {
          panel.classList.remove('is-active');
          panel.classList.add('is-hidden');
          if (panel.getAttribute('data-group') === target) {
            panel.classList.add('is-active');
            panel.classList.remove('is-hidden');
          }
        });
      });
    });
  });
});
