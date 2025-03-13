import calculateLayout from './masonry';

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('referenzen-filter-form');
  const referenzenItems = document.querySelectorAll('.referenzen-list__item');
  const urlParams = new URLSearchParams(window.location.search);

  if (!form || !referenzenItems) return;

  // Set initial state based on URL parameter
  const initialFilters = urlParams.getAll('dienstleistung') || [];
  if (initialFilters.length) {
    initialFilters.forEach((filter) => {
      const checkbox = document.querySelector(`input[value="${filter}"]`);
      if (checkbox) checkbox.checked = true;
    });
    filterItems(initialFilters);
  }

  // Event listener for filter change
  form.addEventListener('change', () => {
    const selectedValues = Array.from(
      form.querySelectorAll('input[name="dienstleistung"]:checked')
    ).map((checkbox) => checkbox.value);

    // Update the URL parameter
    urlParams.delete('dienstleistung');
    selectedValues.forEach((value) => {
      urlParams.append('dienstleistung', value);
    });
    window.history.pushState(
      {},
      '',
      `${window.location.pathname}?${urlParams}`
    );

    // Filter items
    filterItems(selectedValues);
  });

  // Function to show/hide items
  function filterItems(filters) {
    if (filters.length === 0) {
      referenzenItems.forEach((item) => {
        item.classList.remove('is-hidden');
      });
    } else {
      referenzenItems.forEach((item) => {
        const hasMatchingFilter = filters.some((filter) =>
          item.classList.contains(`service-${filter}`)
        );

        item.classList.toggle('is-hidden', !hasMatchingFilter);
      });
    }

    // Recalculate layout after filtering
    calculateLayout();
  }
});
