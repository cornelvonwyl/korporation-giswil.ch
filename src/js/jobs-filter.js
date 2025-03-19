document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('jobs-filter-form');
  const jobItems = document.querySelectorAll('.jobs-overview__grid-item');
  const urlParams = new URLSearchParams(window.location.search);

  if (!form || !jobItems) return;

  // Set initial state based on URL parameter
  const initialFilters = urlParams.getAll('location') || [];
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
      form.querySelectorAll('input[name="location"]:checked')
    ).map((checkbox) => checkbox.value);

    // Update the URL parameter
    urlParams.delete('location');
    selectedValues.forEach((value) => {
      urlParams.append('location', value);
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
      jobItems.forEach((item) => {
        item.classList.remove('is-hidden');
      });
    } else {
      jobItems.forEach((item) => {
        const jobLocation = item.getAttribute('data-location');
        const hasMatchingFilter = filters.some(
          (filter) => jobLocation === filter
        );

        item.classList.toggle('is-hidden', !hasMatchingFilter);
      });
    }
  }
});
