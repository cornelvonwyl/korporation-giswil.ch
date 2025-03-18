document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('news-filter-form');
  const newsItems = document.querySelectorAll('.news-overview__grid-item');
  const urlParams = new URLSearchParams(window.location.search);

  if (!form || !newsItems) return;

  // Set initial state based on URL parameter
  const initialFilters = urlParams.getAll('category') || [];
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
      form.querySelectorAll('input[name="category"]:checked')
    ).map((checkbox) => checkbox.value);

    // Update the URL parameter
    urlParams.delete('category');
    selectedValues.forEach((value) => {
      urlParams.append('category', value);
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
      newsItems.forEach((item) => {
        item.classList.remove('is-hidden');
      });
    } else {
      newsItems.forEach((item) => {
        const itemCategories = Array.from(item.classList)
          .filter((className) => className.startsWith('category-'))
          .map((className) => className.replace('category-', ''));

        const hasMatchingFilter = filters.some((filter) =>
          itemCategories.includes(filter)
        );

        item.classList.toggle('is-hidden', !hasMatchingFilter);
      });
    }
  }
});
