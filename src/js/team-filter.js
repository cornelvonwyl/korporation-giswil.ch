/**
 * Team Filter JavaScript
 *
 * Handles filtering of team members based on categories and locations
 * Updates URL parameters to maintain filter state
 */

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('team-filter-form');
  const teamItems = document.querySelectorAll('.team-overview__grid-item');
  const locationSelect = document.getElementById('location-filter');
  const emptyState = document.querySelector('.team-overview__empty');
  const urlParams = new URLSearchParams(window.location.search);

  if (!form || !teamItems.length) return;

  // Get initial filter state from URL
  const initialCategories = urlParams.getAll('category') || [];
  const initialLocation = urlParams.get('location') || '';

  // Set initial state
  setInitialState(initialCategories, initialLocation);

  // Add event listeners
  form.addEventListener('change', handleFilterChange);

  /**
   * Sets the initial state of filters based on URL parameters
   * @param {string[]} categories - Array of category slugs
   * @param {string} location - Location ID
   */
  function setInitialState(categories, location) {
    // Set category checkboxes
    categories.forEach((category) => {
      const checkbox = document.querySelector(`input[value="${category}"]`);
      if (checkbox) checkbox.checked = true;
    });

    // Set location select
    if (location && locationSelect) {
      locationSelect.value = location;
    }

    // Apply initial filters
    filterItems(categories, location);
  }

  /**
   * Handles filter change events
   */
  function handleFilterChange() {
    const selectedCategories = Array.from(
      form.querySelectorAll('input[name="category"]:checked')
    ).map((checkbox) => checkbox.value);

    const selectedLocation = locationSelect ? locationSelect.value : '';

    // Update URL
    updateUrlParams(selectedCategories, selectedLocation);

    // Apply filters
    filterItems(selectedCategories, selectedLocation);
  }

  /**
   * Updates URL parameters based on current filter state
   * @param {string[]} categories - Array of category slugs
   * @param {string} location - Location ID
   */
  function updateUrlParams(categories, location) {
    // Clear existing parameters
    urlParams.delete('category');
    urlParams.delete('location');

    // Add new parameters
    categories.forEach((category) => {
      urlParams.append('category', category);
    });

    if (location) {
      urlParams.set('location', location);
    }

    // Update URL without page reload
    window.history.pushState(
      {},
      '',
      `${window.location.pathname}${
        urlParams.toString() ? '?' + urlParams.toString() : ''
      }`
    );
  }

  /**
   * Filters team items based on selected categories and location
   * @param {string[]} categories - Array of category slugs
   * @param {string} location - Location ID
   */
  function filterItems(categories, location) {
    let visibleCount = 0;

    teamItems.forEach((item) => {
      // Get item categories
      const itemCategories = Array.from(item.classList)
        .filter((className) => className.startsWith('category-'))
        .map((className) => className.replace('category-', ''));

      // Get item locations
      const itemLocations = (item.dataset.locations || '').split(',');

      // Check if item matches filters
      const matchesCategories =
        categories.length === 0 ||
        categories.some((category) => itemCategories.includes(category));
      const matchesLocation = !location || itemLocations.includes(location);

      // Show/hide item
      const isVisible = matchesCategories && matchesLocation;
      item.classList.toggle('is-hidden', !isVisible);

      if (isVisible) visibleCount++;
    });

    // Show/hide empty state
    if (emptyState) {
      emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    }
  }

  /**
   * Updates location select options based on visible items
   */
  function updateLocationOptions() {
    if (!locationSelect) return;

    // Get visible items
    const visibleItems = Array.from(teamItems).filter(
      (item) => !item.classList.contains('is-hidden')
    );

    // Get available location IDs
    const availableLocationIds = new Set();
    visibleItems.forEach((item) => {
      const locations = item.dataset.locations;
      if (locations) {
        locations.split(',').forEach((id) => availableLocationIds.add(id));
      }
    });

    // Update select options
    Array.from(locationSelect.options).forEach((option) => {
      if (option.value === '') return; // Skip "Standort" option
      option.style.display = availableLocationIds.has(option.value)
        ? ''
        : 'none';
    });

    // Reset selection if current location is no longer available
    if (
      locationSelect.value &&
      !availableLocationIds.has(locationSelect.value)
    ) {
      locationSelect.value = '';
    }
  }
});
