class FurrerPower {
  constructor() {
    this.imageContainer = document.querySelector('[data-image-rotation]');
    if (!this.imageContainer) return;

    this.images = Array.from(
      this.imageContainer.querySelectorAll('[data-image-item]')
    );
    this.isTransitioning = false;
    this.intervalId = null;
    this.initialize();
  }

  shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  }

  async updateSingleImage(position) {
    // Get current image in this position
    const currentImage = this.images.find(
      (img) =>
        img.getAttribute('data-position') === position.toString() &&
        img.classList.contains('active')
    );

    // Get all inactive images
    const availableImages = this.images.filter(
      (img) => !img.classList.contains('active')
    );
    if (availableImages.length === 0) return;

    // Select random new image
    const newImage =
      availableImages[Math.floor(Math.random() * availableImages.length)];

    // Remove current image
    if (currentImage) {
      currentImage.classList.remove('active');
      // Wait for slide out animation
      await new Promise((resolve) => setTimeout(resolve, 500));
      currentImage.removeAttribute('data-position');
    }

    // Position and slide in new image
    newImage.setAttribute('data-position', position);
    // Small delay to ensure position attribute is set
    await new Promise((resolve) => setTimeout(resolve, 50));
    newImage.classList.add('active');

    // Wait for slide in animation to complete
    await new Promise((resolve) => setTimeout(resolve, 500));
  }

  async rotateImages() {
    if (this.isTransitioning) return;
    this.isTransitioning = true;

    // Create array of positions and shuffle them
    const positions = this.shuffleArray([1, 2, 3, 4]);

    // Update images in random position order
    for (let i = 0; i < positions.length; i++) {
      await this.updateSingleImage(positions[i]);
      if (i < positions.length - 1) {
        await new Promise((resolve) => setTimeout(resolve, 2000));
      }
    }

    this.isTransitioning = false;
  }

  initialize() {
    this.rotateImages();
    this.intervalId = setInterval(() => this.rotateImages(), 12000); // Complete cycle + extra delay
  }

  destroy() {
    if (this.intervalId) {
      clearInterval(this.intervalId);
      this.intervalId = null;
    }
  }
}

// Initialize on DOM load
document.addEventListener('DOMContentLoaded', () => {
  new FurrerPower();
});

export default FurrerPower;
