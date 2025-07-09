document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('news-filter-form');
  const newsItems = document.querySelectorAll('.news-overview__grid-item');
  const urlParams = new URLSearchParams(window.location.search);

  if (!form || !newsItems) return;

  // Set initial state based on URL parameter
  const initialFilters = urlParams.getAll('bereich') || [];
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
      form.querySelectorAll('input[name="bereich"]:checked')
    ).map((checkbox) => checkbox.value);

    // Update the URL parameter
    urlParams.delete('bereich');
    selectedValues.forEach((value) => {
      urlParams.append('bereich', value);
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
    const noResultsMessage = document.querySelector(
      '.news-overview__no-results'
    );
    let visibleItemsCount = 0;

    if (filters.length === 0) {
      newsItems.forEach((item) => {
        item.classList.remove('is-hidden');
        visibleItemsCount++;
      });
    } else {
      newsItems.forEach((item) => {
        const itemBereiche = Array.from(item.classList)
          .filter((className) => className.startsWith('bereich-'))
          .map((className) => className.replace('bereich-', ''));

        const hasMatchingFilter = filters.some((filter) =>
          itemBereiche.includes(filter)
        );

        item.classList.toggle('is-hidden', !hasMatchingFilter);

        if (hasMatchingFilter) {
          visibleItemsCount++;
        }
      });
    }

    // Show/hide no results message
    if (noResultsMessage) {
      noResultsMessage.style.display =
        visibleItemsCount === 0 ? 'block' : 'none';
    }
  }
});
