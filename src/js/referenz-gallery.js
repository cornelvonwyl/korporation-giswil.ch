import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/effect-fade';
import { Navigation } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {
  document
    .querySelectorAll('.single-referenz .swiper')
    .forEach((swiperElement) => {
      new Swiper(swiperElement, {
        modules: [Navigation],
        speed: 500,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        on: {
          init: function () {
            updateSlideNumbers(this);
          },
          slideChange: function () {
            updateSlideNumbers(this);
          },
        },
      });
    });
});

function updateSlideNumbers(swiperInstance) {
  const currentSlide = swiperInstance.realIndex + 1;
  const totalSlides = swiperInstance.slides.length;
  document.querySelector('.current-slide').textContent = currentSlide;
  document.querySelector('.total-slides').textContent = totalSlides;
}
