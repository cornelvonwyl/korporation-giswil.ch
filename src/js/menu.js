document.addEventListener('DOMContentLoaded', () => {
  const scrollThreshold = 100;

  // Add scroll event listener for header background
  window.addEventListener('scroll', () => {
    if (window.scrollY > scrollThreshold) {
      document.body.classList.add('scrolled');
    } else {
      document.body.classList.remove('scrolled');
    }
  });

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
      document.body.classList.toggle('no-scroll', !isExpanded);

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

  // Breakpoint for switching from mobile to desktop logic
  const mobileBreakpoint = 992;
  let currentMode = null; // 'mobile' or 'desktop'

  /**
   * ----------------------------
   *  HELPER: Show / Hide Submenu
   * ----------------------------
   */
  function showSubmenu(item, submenu) {
    // Make submenu visible
    submenu.style.visibility = 'visible';
    submenu.style.opacity = '1';

    // If there's a "link"/button, set aria-expanded
    const link = item.querySelector('[role="button"]');
    if (link) link.setAttribute('aria-expanded', 'true');
  }

  function hideSubmenu(item, submenu) {
    submenu.style.visibility = 'hidden';
    submenu.style.opacity = '0';

    const link = item.querySelector('[role="button"]');
    if (link) link.setAttribute('aria-expanded', 'false');
  }

  /**
   * ----------------------------
   *  DESKTOP: Simple Hover Mega Menu
   * ----------------------------
   */
  function handleDesktop(item) {
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
  }

  /**
   * ----------------------------
   *  MOBILE: Click-to-expand
   * ----------------------------
   */
  function handleMobile(item) {
    const link = item.querySelector('a');
    const submenu = item.querySelector('.sub-menu');
    if (!link || !submenu) return;

    // Make it look like an expandable toggle
    link.setAttribute('aria-haspopup', 'true');
    link.setAttribute('aria-expanded', 'false');

    // Click => toggle open/closed
    link.addEventListener('click', (event) => {
      // Prevent default nav
      event.preventDefault();

      const isOpen = submenu.classList.toggle('sub-menu--show');
      link.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

      if (isOpen) {
        // Show + measure this submenu
        // Expand: measure its total item height
        const menuItemsInside = submenu.querySelectorAll('.menu-item');
        const singleItemHeight = menuItemsInside[0]?.scrollHeight || 0;
        const expandedHeight = singleItemHeight * menuItemsInside.length;
        submenu.style.maxHeight = `${expandedHeight}px`;

        // Also set pink shape
        const subMenuHeight = submenu.offsetHeight;
        item.style.setProperty('--submenu-height', `${subMenuHeight}px`);
      } else {
        // Hide
        submenu.style.maxHeight = '0';
        item.style.removeProperty('--submenu-height');
      }

      // Close all other open submenus (Accordion approach)
      menuItems.forEach((otherItem) => {
        if (otherItem !== item) {
          const otherSubmenu = otherItem.querySelector('.sub-menu');
          const otherLink = otherItem.querySelector('a');
          if (
            otherSubmenu &&
            otherSubmenu.classList.contains('sub-menu--show')
          ) {
            otherSubmenu.classList.remove('sub-menu--show');
            otherSubmenu.style.maxHeight = '0';
            otherItem.style.removeProperty('--submenu-height');
            if (otherLink) otherLink.setAttribute('aria-expanded', 'false');
          }
        }
      });
    });
  }

  /**
   * ----------------------------
   *  Remove All Listeners
   * ----------------------------
   * Clones each .menu-item-has-children to remove old events before re-attaching.
   */
  function removeAllListeners() {
    menuItems.forEach((item) => {
      const newItem = item.cloneNode(true);
      if (item.parentNode) {
        item.parentNode.replaceChild(newItem, item);
      }
    });
  }

  /**
   * ----------------------------
   *  APPLY MENU BEHAVIOR
   * ----------------------------
   */
  function applyMenuBehavior() {
    const windowWidth = window.innerWidth;
    const newMode = windowWidth < mobileBreakpoint ? 'mobile' : 'desktop';

    if (newMode === currentMode) return; // No change

    // If we had a previous mode, remove old listeners
    if (currentMode !== null) {
      removeAllListeners();
    }

    // Re-query after cloning
    const updatedMenuItems = document.querySelectorAll(
      '.header__nav .menu-item-has-children'
    );

    // Attach new behavior
    updatedMenuItems.forEach((item) => {
      if (newMode === 'mobile') {
        handleMobile(item);
      } else {
        handleDesktop(item);
      }
    });

    currentMode = newMode;
  }

  // INITIALIZE
  applyMenuBehavior();

  // Re-run on window resize
  window.addEventListener('resize', applyMenuBehavior);
});
