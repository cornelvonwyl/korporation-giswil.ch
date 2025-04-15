document.addEventListener('DOMContentLoaded', function () {
  const pageHeaders = document.querySelectorAll('.page-header');

  if (!pageHeaders.length) return;

  pageHeaders.forEach((pageHeader) => {
    const scrollLink = pageHeader.querySelector('.page-header__link');
    if (!scrollLink) return;

    scrollLink.addEventListener('click', function (e) {
      e.preventDefault();
      const nextSection = pageHeader.nextElementSibling;
      if (nextSection) {
        nextSection.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });
});
