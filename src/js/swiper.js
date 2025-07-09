import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/autoplay';
import { Keyboard, Navigation } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {
  document
    .querySelectorAll('.swiper:not(.gallery)')
    .forEach((swiperElement) => {
      new Swiper(swiperElement, {
        modules: [Navigation, Keyboard],
        speed: 500,
        slidesPerView: 3,
        spaceBetween: 24,
        navigation: {
          nextEl: '.swiper-button-next-slider',
          prevEl: '.swiper-button-prev-slider',
        },
        keyboard: {
          enabled: true,
          onlyInViewport: true,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 2,
          },
          1200: {
            slidesPerView: 3,
          },
        },
      });
    });
});
