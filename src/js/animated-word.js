class AnimatedWordSlideUp {
  constructor(element, options = {}) {
    this.element = element;
    this.options = {
      delay: options.delay || 0,
      duration: options.duration || 0.75,
      once: options.once || false,
      amount: options.amount || 0.5,
      space: options.space || '0.25em',
    };

    this.init();
  }

  init() {
    // Check if element has text content
    if (!this.element.textContent.trim()) {
      return;
    }

    // Split text into words and filter out empty strings
    const text = this.element.textContent;
    const words = text.split(' ').filter((word) => word.trim() !== '');

    // Clear the element
    this.element.textContent = '';

    // Create word wrappers
    words.forEach((word, index) => {
      const wordWrapper = document.createElement('span');
      wordWrapper.className = 'word-wrapper';
      wordWrapper.style.marginRight = this.options.space;

      const wordSpan = document.createElement('span');
      wordSpan.className = 'word';
      wordSpan.textContent = word;
      wordSpan.style.transitionDelay = `${this.options.delay}s`;

      wordWrapper.appendChild(wordSpan);
      this.element.appendChild(wordWrapper);
    });

    // Set up intersection observer
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const words = entry.target.querySelectorAll('.word');
            words.forEach((word) => {
              word.classList.add('visible');
            });

            if (this.options.once) {
              observer.unobserve(entry.target);
            }
          }
        });
      },
      {
        threshold: this.options.amount,
      }
    );

    observer.observe(this.element);
  }
}

// Initialize the animation when the DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  const animatedTexts = document.querySelectorAll('.animated-text');

  if (animatedTexts.length === 0) {
    return;
  }

  animatedTexts.forEach((element) => {
    new AnimatedWordSlideUp(element);
  });
});
