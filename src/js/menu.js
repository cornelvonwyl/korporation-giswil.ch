document.addEventListener('DOMContentLoaded', () => {
  const hamburger = document.querySelector('.header__hamburger');
  const nav = document.querySelector('.header__nav--mobile');
  const main = document.querySelector('main');

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
    });
  }
});

document.addEventListener('DOMContentLoaded', () => {
  const menuItem = document.querySelectorAll(
    '.header__nav .menu-item-has-children'
  );

  const windowWidth = window.innerWidth;

  if (menuItem.length < 1) {
    return;
  }

  menuItem.forEach((item) => {
    const link = item.querySelector('a');

    link.addEventListener('click', (event) => {
      event.preventDefault();
      const submenu = item.querySelector('.sub-menu');

      if (windowWidth < 992) {
        submenu.classList.toggle('sub-menu--show');

        // Remove all other submenus
        menuItem.forEach((otherItem) => {
          if (otherItem !== item) {
            otherItem
              .querySelector('.sub-menu')
              .classList.remove('sub-menu--show');
          }
        });
      } else {
        // Get first link in submenu
        const firstLink = submenu.querySelector('a');

        // Redirect to first link in submenu
        if (firstLink) {
          window.location.href = firstLink.href;
        }
      }
    });
  });
});
