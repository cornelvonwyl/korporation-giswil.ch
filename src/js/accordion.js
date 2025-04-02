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

    // Ensure proper initial ARIA state
    trigger.setAttribute('aria-expanded', 'false');
    content.setAttribute('hidden', '');

    // Add click event listener to trigger
    trigger.addEventListener('click', () => {
      const isExpanded = item.classList.contains('active');

      // Close all items first
      accordionItems.forEach((accItem) => {
        const itemContent = accItem.querySelector('.accordion__content');
        const itemTrigger = accItem.querySelector('.accordion__trigger');
        accItem.classList.remove('active');
        itemContent.style.maxHeight = '0px';
        itemTrigger.setAttribute('aria-expanded', 'false');
        itemContent.setAttribute('hidden', '');
      });

      // If the clicked item wasn't expanded, open it
      if (!isExpanded) {
        item.classList.add('active');
        // First remove hidden attribute to allow measuring content height
        content.removeAttribute('hidden');
        // Use setTimeout to ensure the hidden attribute is removed before measuring
        setTimeout(() => {
          content.style.maxHeight = content.scrollHeight + 'px';
          trigger.setAttribute('aria-expanded', 'true');
        }, 0);
      }
    });

    // Add keyboard navigation
    trigger.addEventListener('keydown', (event) => {
      if (event.key === 'Enter' || event.key === ' ') {
        event.preventDefault();
        trigger.click();
      }
    });
  });
});
