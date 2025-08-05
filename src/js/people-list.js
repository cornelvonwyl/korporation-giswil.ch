/**
 * People List Block JavaScript
 * Handles interactive functionality for the people list block
 */

document.addEventListener('DOMContentLoaded', () => {
  const peopleListBlocks = document.querySelectorAll('.people-list');

  peopleListBlocks.forEach((block) => {
    const tableRows = block.querySelectorAll('.people-list__table-row');
    const contactLinks = block.querySelectorAll('.people-list__contact');

    // Add keyboard navigation support for table rows
    tableRows.forEach((row) => {
      row.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          const contactLink = row.querySelector('.people-list__contact');
          if (contactLink) {
            contactLink.click();
          }
        }
      });

      // Add focus styles for accessibility
      row.setAttribute('tabindex', '0');
      row.setAttribute('role', 'row');
    });

    // Enhance contact links with better accessibility
    contactLinks.forEach((link) => {
      // Add aria-label for screen readers
      const email = link.textContent.trim();
      link.setAttribute('aria-label', `E-Mail senden an ${email}`);

      // Add keyboard event handling
      link.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
          e.preventDefault();
          link.click();
        }
      });
    });

    // Add smooth scrolling for anchor links
    const anchor = block.getAttribute('id');
    if (anchor) {
      const anchorLink = document.querySelector(`a[href="#${anchor}"]`);
      if (anchorLink) {
        anchorLink.addEventListener('click', (e) => {
          e.preventDefault();
          block.scrollIntoView({
            behavior: 'smooth',
            block: 'start',
          });
        });
      }
    }
  });
});
