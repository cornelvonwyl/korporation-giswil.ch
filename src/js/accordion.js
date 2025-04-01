document.addEventListener('DOMContentLoaded', function () {
  const accordionItems = document.querySelectorAll('.accordion__item');

  if (accordionItems.length === 0) {
    return; // No accordion items found
  }

  // Initialize each accordion item
  accordionItems.forEach((item) => {
    const trigger = item.querySelector('.accordion__trigger');
    const content = item.querySelector('.accordion__content');

    // Set initial state
    content.style.maxHeight = '0px';
    content.style.overflow = 'hidden';
    content.style.transition = 'max-height 0.3s ease-out';

    // Add click event listener to trigger
    trigger.addEventListener('click', () => {
      const isExpanded = item.classList.contains('active');

      // Close all items first
      accordionItems.forEach((accItem) => {
        const itemContent = accItem.querySelector('.accordion__content');
        accItem.classList.remove('active');
        itemContent.style.maxHeight = '0px';
      });

      // If the clicked item wasn't expanded, open it
      if (!isExpanded) {
        item.classList.add('active');
        content.style.maxHeight = content.scrollHeight + 'px';
      }
    });
  });
});
