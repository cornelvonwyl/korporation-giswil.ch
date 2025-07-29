/**
 * Page Navigation - On-page navigation with smooth scrolling and active section detection
 */

// Global state
let pageNavState = {
  nav: null,
  navLinks: [],
  sections: [],
  currentActiveIndex: -1,
  scrollOffset: 240,
};

/**
 * Initialize page navigation
 */
function initPageNav() {
  pageNavState.nav = document.querySelector('.department__navigation');

  if (!pageNavState.nav) return;

  collectNavData();
  bindEvents();
  updateActiveSection();
}

/**
 * Collect navigation links and corresponding sections
 */
function collectNavData() {
  const links = pageNavState.nav.querySelectorAll('a[href^="#"]');

  // Reset arrays
  pageNavState.navLinks = [];
  pageNavState.sections = [];

  links.forEach((link) => {
    const targetId = link.getAttribute('href').substring(1);
    const section = document.getElementById(targetId);

    if (section) {
      pageNavState.navLinks.push(link);
      pageNavState.sections.push(section);
    }
  });
}

/**
 * Bind event listeners
 */
function bindEvents() {
  // Smooth scroll on navigation click
  pageNavState.navLinks.forEach((link, index) => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      scrollToSection(index);
    });
  });

  // Update active section on scroll
  let scrollTimeout;
  window.addEventListener('scroll', () => {
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(() => {
      updateActiveSection();
    }, 10);
  });

  // Update on resize
  window.addEventListener('resize', () => {
    updateActiveSection();
  });
}

/**
 * Scroll to a specific section
 * @param {number} index - Index of the section to scroll to
 */
function scrollToSection(index) {
  if (!pageNavState.sections[index]) return;

  const section = pageNavState.sections[index];
  const offsetTop = section.offsetTop - pageNavState.scrollOffset;

  window.scrollTo({
    top: offsetTop,
    behavior: 'smooth',
  });

  // Immediately update active state
  setActiveNavItem(index);
}

/**
 * Update which section is currently active based on scroll position
 */
function updateActiveSection() {
  const viewportTop = window.scrollY;
  const viewportBottom = viewportTop + window.innerHeight;
  const viewportCenter = viewportTop + (window.innerHeight / 2);
  
  let activeIndex = -1;
  let maxVisibleArea = 0;

  // Find the section with the most visible area in the viewport
  for (let i = 0; i < pageNavState.sections.length; i++) {
    const section = pageNavState.sections[i];
    const sectionTop = section.offsetTop;
    const sectionBottom = sectionTop + section.offsetHeight;

    // Calculate visible area of this section
    const visibleTop = Math.max(sectionTop, viewportTop);
    const visibleBottom = Math.min(sectionBottom, viewportBottom);
    const visibleArea = Math.max(0, visibleBottom - visibleTop);

    // If this section has more visible area, make it active
    if (visibleArea > maxVisibleArea) {
      maxVisibleArea = visibleArea;
      activeIndex = i;
    }
  }

  // Fallback: if no section is significantly visible, use center-based detection
  if (activeIndex === -1) {
    for (let i = 0; i < pageNavState.sections.length; i++) {
      const section = pageNavState.sections[i];
      const sectionTop = section.offsetTop;
      const sectionBottom = sectionTop + section.offsetHeight;

      if (viewportCenter >= sectionTop && viewportCenter < sectionBottom) {
        activeIndex = i;
        break;
      }
    }
  }

  // Final fallback: if we're at the very top, activate first section
  if (activeIndex === -1 && viewportTop < pageNavState.sections[0]?.offsetTop + 100) {
    activeIndex = 0;
  }

  setActiveNavItem(activeIndex);
}

/**
 * Set active navigation item
 * @param {number} index - Index of the navigation item to activate
 */
function setActiveNavItem(index) {
  if (pageNavState.currentActiveIndex === index) return;

  // Remove active class from all nav items
  pageNavState.navLinks.forEach((link) => {
    link.classList.remove('active');
    link.parentElement.classList.remove('active');
  });

  // Add active class to current nav item
  if (index >= 0 && pageNavState.navLinks[index]) {
    pageNavState.navLinks[index].classList.add('active');
    pageNavState.navLinks[index].parentElement.classList.add('active');
  }

  pageNavState.currentActiveIndex = index;
}

/**
 * Refresh navigation (useful if content is dynamically added)
 */
function refreshPageNav() {
  collectNavData();
  updateActiveSection();
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', initPageNav);
