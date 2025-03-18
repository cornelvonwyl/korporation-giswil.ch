document.addEventListener('DOMContentLoaded', () => {
  calculateLayout();
  window.addEventListener('resize', calculateLayout);
});

export default function calculateLayout() {
  const masonry = document.querySelector('.referenzen-overview__items');
  const items = Array.from(
    document.querySelectorAll('.referenzen-overview__item')
  ).filter((item) => item.classList.contains('is-hidden') === false);

  if (!masonry || !items.length) return;

  // If mobile, set items to full width
  if (window.innerWidth < 640) {
    items.forEach((item) => {
      item.style.width = '100%';
      item.style.position = 'relative';
      item.style.top = '0';
      item.style.left = '0';
    });

    masonry.style.position = 'relative';
    masonry.style.height = 'auto';
    return;
  }

  // Define gutter based on window width
  let gutter = 60; // Default gutter

  if (window.innerWidth >= 992) {
    gutter = 80;
  }

  if (window.innerWidth >= 1400) {
    gutter = 120;
  }

  const containerWidth = masonry.clientWidth;
  const columnCount = 2;
  const columnWidth =
    (containerWidth - (columnCount - 1) * gutter) / columnCount;

  // Initialize column heights
  const columnHeights = Array(columnCount).fill(0);

  // Set item widths and positions
  items.forEach((item) => {
    item.style.width = `${columnWidth}px`;

    const shortestColumnIndex = columnHeights.indexOf(
      Math.min(...columnHeights)
    );
    const top = columnHeights[shortestColumnIndex];
    const left = shortestColumnIndex * (columnWidth + gutter);

    item.style.position = 'absolute';
    item.style.top = `${top}px`;
    item.style.left = `${left}px`;

    columnHeights[shortestColumnIndex] += item.offsetHeight + gutter;
  });

  // Set masonry container height to encompass all items
  masonry.style.position = 'relative';
  masonry.style.height = `${Math.max(...columnHeights)}px`;
}
