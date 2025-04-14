class WordRotate {
  constructor(container) {
    this.duration = 2000;
    this.terms = [
      'Stromer',
      'Solar-Spezialistä',
      'Schaltahlage-Strategä',
      'Strom-Architektä',
      'Automation-Genies',
      'Büro-Heldä',
      'Schwach-Strömler',
      'IT-Gurus',
      'Kabler',
      'Chrampfer',
      'Macher',
      'FurrerFighters',
      'Handwärcher',
    ];
    this.container = container;
    this.elements = [];
    this.intervalId = null;
    this.currentIndex = 0;

    this.initializeElements();
    this.startRotation();
  }

  initializeElements() {
    const titleContainer = this.container.querySelector('.hero__title');
    const lastElement = titleContainer.querySelector('.hero__title--highlight');

    // Remove the last element temporarily
    lastElement.remove();

    // Select 4 random terms
    const randomTerms = this.getRandomTerms(4);

    // Create spans for random terms
    randomTerms.forEach((term) => {
      const span = document.createElement('span');
      span.className = 'hero__title--highlight';
      span.textContent = term;
      span.style.opacity = '0';
      span.style.display = 'block';
      span.style.transform = 'translateY(100%)';
      titleContainer.appendChild(span);
      this.elements.push(span);
    });

    // Add back the last element
    lastElement.style.opacity = '0';
    lastElement.style.display = 'block';
    lastElement.style.transform = 'translateY(100%)';
    titleContainer.appendChild(lastElement);
    this.elements.push(lastElement);

    // Show first element
    this.elements[0].style.opacity = '1';
    this.elements[0].style.transform = 'translateY(0%)';
  }

  getRandomTerms(count) {
    const shuffled = [...this.terms].sort(() => 0.5 - Math.random());
    return shuffled.slice(0, count);
  }

  startRotation() {
    this.intervalId = setInterval(() => {
      const currentElement = this.elements[this.currentIndex];
      const nextElement = this.elements[this.currentIndex + 1];

      if (!currentElement || !nextElement) {
        this.cleanup();
        return;
      }

      currentElement.style.opacity = '0';
      currentElement.style.transform = 'translateY(-100%)';

      setTimeout(() => {
        nextElement.style.opacity = '1';
        nextElement.style.transform = 'translateY(0%)';
      }, 100);

      this.currentIndex++;
    }, this.duration);
  }

  cleanup() {
    if (this.intervalId) {
      clearInterval(this.intervalId);
      this.intervalId = null;
    }
  }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  const heroSections = document.querySelectorAll('.hero');
  heroSections.forEach((heroSection) => {
    new WordRotate(heroSection);
  });
});
