document.addEventListener('DOMContentLoaded', () => {
  // Get all buttons with the animated-button class
  const animatedButtons = document.querySelectorAll('.animated-button');

  if (animatedButtons.length === 0) return;

  // Process each button
  animatedButtons.forEach((button) => {
    // Get the current text content
    const buttonText = button.textContent.trim();

    // Clear the button content
    button.textContent = '';

    // Create wrapper div
    const wrapperDiv = document.createElement('div');
    wrapperDiv.classList.add('animated-button__text');

    // Create span for original text
    const originalSpan = document.createElement('span');
    originalSpan.textContent = buttonText;

    // Create span for duplicate text
    const duplicateSpan = document.createElement('span');
    duplicateSpan.textContent = buttonText;
    duplicateSpan.setAttribute('aria-hidden', 'true');

    // Add both spans to the wrapper div
    wrapperDiv.appendChild(originalSpan);
    wrapperDiv.appendChild(duplicateSpan);

    // Add the wrapper div to the button
    button.appendChild(wrapperDiv);
  });
});
