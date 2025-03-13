class WordRotate {
  constructor(container) {
    this.duration = 2000;
    this.elements = container.querySelectorAll('.hero__title--highlight');
    this.intervalId = null;

    // Only proceed if elements exist
    if (this.elements.length === 0) return;

    this.currentIndex = 0;

    this.elements.forEach((el, index) => {
      if (index !== 0) {
        el.style.opacity = '0';
        el.style.display = 'block';
        el.style.transform = 'translateY(50%)';
      } else {
        el.style.transform = 'translateY(-50%)';
        el.style.opacity = '1';
      }
    });

    this.startRotation();
  }

  startRotation() {
    this.intervalId = setInterval(() => {
      const currentElement = this.elements[this.currentIndex];
      const nextElement = this.elements[this.currentIndex + 1];

      // Add safety check for elements
      if (!currentElement || !nextElement) {
        this.cleanup();
        return;
      }

      currentElement.style.opacity = '0';
      currentElement.style.transform = 'translateY(-150%)';

      // Animate in next element
      setTimeout(() => {
        nextElement.style.opacity = '1';
        nextElement.style.transform = 'translateY(-50%)';
      }, 100);

      this.currentIndex++;
    }, this.duration);
  }

  cleanup() {
    if (this.intervalId) {
      clearInterval(this.intervalId);
      this.intervalId = null;
      console.log('WordRotate cleanup: interval cleared');
    }
  }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  const heroSections = document.querySelectorAll('.hero');

  // Initialize word rotation for each hero section independently
  heroSections.forEach((heroSection) => {
    if (heroSection.querySelectorAll('.hero__title--highlight').length > 1) {
      new WordRotate(heroSection);
    }
  });
});
