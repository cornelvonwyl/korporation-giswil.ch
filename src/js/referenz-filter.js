import calculateLayout from './masonry';

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('referenzen-filter-form');
  const referenzenItems = document.querySelectorAll(
    '.referenzen-overview__item'
  );

  if (!form || referenzenItems.length === 0) return;

  const urlParams = new URLSearchParams(window.location.search);

  // === Apply initial filters from URL ===
  const initialFilters = urlParams.getAll('service');
  if (initialFilters.length > 0) {
    initialFilters.forEach((filter) => {
      const checkbox = form.querySelector(
        `input[name="service"][value="${filter}"]`
      );
      if (checkbox) checkbox.checked = true;
    });
    applyFilters(initialFilters);
  }

  // === Handle filter changes ===
  form.addEventListener('change', () => {
    const selectedFilters = Array.from(
      form.querySelectorAll('input[name="service"]:checked')
    ).map((checkbox) => checkbox.value);

    updateURL(selectedFilters);
    applyFilters(selectedFilters);
  });

  // === Show/hide items based on filters ===
  function applyFilters(filters) {
    referenzenItems.forEach((item) => {
      const match =
        filters.length === 0 ||
        filters.some((filter) => item.classList.contains(`service-${filter}`));
      item.classList.toggle('is-hidden', !match);
    });

    calculateLayout();
  }

  // === Sync selected filters with the URL ===
  function updateURL(filters) {
    const newParams = new URLSearchParams();
    filters.forEach((filter) => newParams.append('service', filter));

    const newUrl = `${window.location.pathname}?${newParams.toString()}`;
    window.history.pushState({}, '', newUrl);
  }
});
