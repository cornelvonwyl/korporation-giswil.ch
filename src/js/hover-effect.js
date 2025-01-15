document.addEventListener('DOMContentLoaded', () => {
  const elements = document.querySelectorAll('.add-hover-effect > *');

  if (!elements) return;

  elements.forEach((element) => {
    element.addEventListener('mouseenter', () => {
      elements.forEach((sibling) => {
        if (sibling !== element) {
          sibling.classList.add('is-inactive');
        }
      });
    });

    element.addEventListener('mouseleave', () => {
      elements.forEach((sibling) => {
        sibling.classList.remove('is-inactive');
      });
    });
  });
});
