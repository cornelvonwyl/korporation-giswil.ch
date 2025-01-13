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
