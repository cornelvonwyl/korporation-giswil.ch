document.addEventListener('DOMContentLoaded', function () {
  // Find all sections with the animate-bg class
  const animatedSections = document.querySelectorAll('.animate-bg');

  // Only proceed if there are animated sections
  if (animatedSections.length === 0) {
    return;
  }

  // Initial background color
  const defaultBgColor = '#ffffff';
  document.body.style.backgroundColor = defaultBgColor;

  // Function to convert hex to RGB for interpolation
  function hexToRgb(hex) {
    // Remove # if present
    hex = hex.replace('#', '');

    // Parse the hex values
    const r = parseInt(hex.substring(0, 2), 16);
    const g = parseInt(hex.substring(2, 4), 16);
    const b = parseInt(hex.substring(4, 6), 16);

    return [r, g, b];
  }

  // Function to convert RGB to hex
  function rgbToHex(r, g, b) {
    return '#' + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
  }

  // Function to interpolate between colors
  function interpolateColor(startColor, endColor, factor) {
    const start = hexToRgb(startColor);
    const end = hexToRgb(endColor);

    const r = Math.round(start[0] + factor * (end[0] - start[0]));
    const g = Math.round(start[1] + factor * (end[1] - start[1]));
    const b = Math.round(start[2] + factor * (end[2] - start[2]));

    return rgbToHex(r, g, b);
  }

  // Function to calculate viewport coverage
  function calculateViewportCoverage(element) {
    const rect = element.getBoundingClientRect();
    const windowHeight = window.innerHeight;

    // Calculate the visible height of the section
    let visibleHeight = 0;

    if (rect.bottom <= 0 || rect.top >= windowHeight) {
      // Section is not visible
      visibleHeight = 0;
    } else {
      // Section is partially or fully visible
      const topVisible = Math.max(0, rect.top);
      const bottomVisible = Math.min(windowHeight, rect.bottom);
      visibleHeight = bottomVisible - topVisible;
    }

    // Return percentage of viewport covered
    return (visibleHeight / windowHeight) * 100;
  }

  // Function to update background color based on section visibility
  function updateBackgroundColor() {
    let highestCoverage = 0;
    let activeSectionColor = null;
    let activeSectionThreshold = 0;
    let activeSectionCoverage = 0;

    // Check each section to find the one with highest coverage
    animatedSections.forEach((section) => {
      const coverage = calculateViewportCoverage(section);
      const threshold = parseFloat(section.dataset.threshold || 25);
      const bgColor = section.dataset.bgColor;

      // Only consider sections with a valid color that meet their threshold
      if (bgColor && coverage >= threshold && coverage > highestCoverage) {
        highestCoverage = coverage;
        activeSectionColor = bgColor;
        activeSectionThreshold = threshold;
        activeSectionCoverage = coverage;
      }
    });

    // If we have an active section that meets its threshold
    if (activeSectionColor) {
      // Calculate the interpolation factor (0 to 1)
      const remainingRange = 100 - activeSectionThreshold;
      const factor =
        (activeSectionCoverage - activeSectionThreshold) / remainingRange;

      // Interpolate between white and the target color
      const backgroundColor = interpolateColor(
        defaultBgColor,
        activeSectionColor,
        Math.min(1, Math.max(0, factor))
      );

      // Apply the color
      document.body.style.backgroundColor = backgroundColor;
    } else {
      // Reset to default if no section meets threshold
      document.body.style.backgroundColor = defaultBgColor;
    }
  }

  // Handle scroll event
  window.addEventListener('scroll', updateBackgroundColor);

  // Also update on resize (in case section dimensions change)
  window.addEventListener('resize', updateBackgroundColor);

  // Trigger initial calculation
  updateBackgroundColor();
});
