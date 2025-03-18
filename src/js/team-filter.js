document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('team-filter-form');
  const teamItems = document.querySelectorAll('.team-overview__grid-item');
  const locationSelect = document.getElementById('location-filter');
  const urlParams = new URLSearchParams(window.location.search);

  if (!form || !teamItems) return;

  // Set initial state based on URL parameters
  const initialCategories = urlParams.getAll('category') || [];
  const initialLocation = urlParams.get('location') || '';

  if (initialCategories.length) {
    initialCategories.forEach((filter) => {
      const checkbox = document.querySelector(`input[value="${filter}"]`);
      if (checkbox) checkbox.checked = true;
    });
  }

  if (initialLocation && locationSelect) {
    locationSelect.value = initialLocation;
  }

  // Initial filter
  filterItems(initialCategories, initialLocation);

  // Event listener for filter changes
  form.addEventListener('change', () => {
    const selectedCategories = Array.from(
      form.querySelectorAll('input[name="category"]:checked')
    ).map((checkbox) => checkbox.value);

    const selectedLocation = locationSelect ? locationSelect.value : '';

    // Update URL parameters
    urlParams.delete('category');
    selectedCategories.forEach((value) => {
      urlParams.append('category', value);
    });

    if (selectedLocation) {
      urlParams.set('location', selectedLocation);
    } else {
      urlParams.delete('location');
    }

    window.history.pushState(
      {},
      '',
      `${window.location.pathname}${
        urlParams.toString() ? '?' + urlParams.toString() : ''
      }`
    );

    // Filter items
    filterItems(selectedCategories, selectedLocation);
  });

  // Function to show/hide items
  function filterItems(categories, location) {
    teamItems.forEach((item) => {
      // Check categories
      const itemCategories = Array.from(item.classList)
        .filter((className) => className.startsWith('category-'))
        .map((className) => className.replace('category-', ''));

      const matchesCategories =
        categories.length === 0 ||
        categories.some((filter) => itemCategories.includes(filter));

      // Check location
      const itemLocations = (item.dataset.locations || '').split(',');
      const matchesLocation = !location || itemLocations.includes(location);

      // Show/hide based on both filters
      item.classList.toggle(
        'is-hidden',
        !(matchesCategories && matchesLocation)
      );
    });
  }
});
