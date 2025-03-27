document.addEventListener('DOMContentLoaded', () => {
  const scrollThreshold = 100;

  // Function to check scroll position and update header
  const checkScroll = () => {
    if (window.scrollY > scrollThreshold) {
      document.body.classList.add('scrolled');
    } else {
      document.body.classList.remove('scrolled');
    }
  };

  // Check on page load
  checkScroll();

  // Check on scroll
  window.addEventListener('scroll', checkScroll);

  const hamburger = document.querySelector('.header__hamburger');
  const nav = document.querySelector('.header__nav--mobile');
  const mainContent = document.querySelector('main');
  const footer = document.querySelector('footer');

  if (hamburger && nav) {
    hamburger.addEventListener('click', () => {
      const isExpanded = hamburger.getAttribute('aria-expanded') === 'true';

      hamburger.setAttribute('aria-expanded', isExpanded ? 'false' : 'true');
      hamburger.setAttribute(
        'aria-label',
        isExpanded ? 'Menü öffnen' : 'Menü schliessen'
      );
      hamburger.classList.toggle('header__hamburger--active');
      nav.classList.toggle('header__nav--show');

      // Prevent scrolling when menu is open
      document.documentElement.classList.toggle('no-scroll', !isExpanded);

      // Use 'inert' to disable main content and footer interaction
      if (mainContent) {
        mainContent.inert = !isExpanded;
      }
      if (footer) {
        footer.inert = !isExpanded;
      }
    });
  }
});

document.addEventListener('DOMContentLoaded', () => {
  // All items that contain sub-menus
  const menuItems = document.querySelectorAll(
    '.header__nav .menu-item-has-children'
  );
  if (menuItems.length < 1) return;

  /**
   * ----------------------------
   *  HELPER: Show / Hide Submenu
   * ----------------------------
   */
  function showSubmenu(item, submenu) {
    submenu.classList.add('sub-menu--show');

    const link = item.querySelector('[role="button"]');
    if (link) link.setAttribute('aria-expanded', 'true');
  }

  function hideSubmenu(item, submenu) {
    submenu.classList.remove('sub-menu--show');

    const link = item.querySelector('[role="button"]');
    if (link) link.setAttribute('aria-expanded', 'false');
  }

  /**
   * ----------------------------
   *  DESKTOP: Simple Hover Mega Menu
   * ----------------------------
   */
  menuItems.forEach((item) => {
    const link = item.querySelector('a');
    const submenu = item.querySelector('.sub-menu');
    if (!link || !submenu) return;

    // Remove href and make it a button for accessibility
    link.removeAttribute('href');
    link.setAttribute('role', 'button');
    link.setAttribute('tabindex', '0');
    link.setAttribute('aria-haspopup', 'true');
    link.setAttribute('aria-expanded', 'false');

    // Simple hover behavior
    item.addEventListener('mouseenter', () => {
      showSubmenu(item, submenu);

      // Add is-sibling class to previous and next siblings
      const prevSibling = item.previousElementSibling;
      const nextSibling = item.nextElementSibling;
      if (prevSibling) prevSibling.classList.add('is-sibling-before');
      if (nextSibling) nextSibling.classList.add('is-sibling-after');
    });

    item.addEventListener('mouseleave', () => {
      hideSubmenu(item, submenu);

      // Remove is-sibling class from previous and next siblings
      const prevSibling = item.previousElementSibling;
      const nextSibling = item.nextElementSibling;
      if (prevSibling) prevSibling.classList.remove('is-sibling-before');
      if (nextSibling) nextSibling.classList.remove('is-sibling-after');
    });

    // Keyboard support
    link.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        const isExpanded = link.getAttribute('aria-expanded') === 'true';
        if (isExpanded) {
          hideSubmenu(item, submenu);
        } else {
          showSubmenu(item, submenu);
        }
      }
    });
  });
});
