const hamburger = document.querySelector('.header-hamburger');
const nav = document.querySelector('.header-nav--mobile');

hamburger.addEventListener('click', () => {
  const isExpanded = hamburger.getAttribute('aria-expanded') === 'true';
  hamburger.setAttribute('aria-expanded', !isExpanded);
  hamburger.classList.toggle('active');
  nav.classList.toggle('show');
});
