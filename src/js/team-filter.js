document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('team-filter-form');
  const teamItems = document.querySelectorAll('.team-overview__grid-item');
  const locationSelect = document.getElementById('location-filter');
  const urlParams = new URLSearchParams(window.location.search);
  const teamGrid = document.querySelector('.team-overview__grid');
  const emptyState = document.querySelector('.team-overview__empty');

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

  // Function to update location filter options based on visible people
  function updateLocationOptions() {
    if (!locationSelect) return;

    // Get all visible people after category filtering
    const visiblePeople = Array.from(teamItems).filter(
      (item) => !item.classList.contains('is-hidden')
    );

    // Get all unique location IDs from visible people
    const visibleLocationIds = new Set();
    visiblePeople.forEach((person) => {
      const locations = person.getAttribute('data-locations');
      if (locations) {
        locations.split(',').forEach((id) => visibleLocationIds.add(id));
      }
    });

    // Update location select options
    Array.from(locationSelect.options).forEach((option) => {
      if (option.value === '') return; // Keep the "Standort" option
      option.style.display = visibleLocationIds.has(option.value) ? '' : 'none';
    });

    // Reset location selection if current selection is no longer available
    if (locationSelect.value && !visibleLocationIds.has(locationSelect.value)) {
      locationSelect.value = '';
    }
  }

  // Initial filter
  filterItems(initialCategories, initialLocation);
  updateLocationOptions();

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
    updateLocationOptions();
  });

  // Function to show/hide items
  function filterItems(categories, location) {
    let visibleCount = 0;

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
      const isVisible = matchesCategories && matchesLocation;
      item.classList.toggle('is-hidden', !isVisible);

      if (isVisible) {
        visibleCount++;
      }
    });

    // Handle empty state
    if (emptyState) {
      emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    }
  }
});
