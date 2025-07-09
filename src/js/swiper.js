import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/autoplay';
import { Navigation } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {
  document
    .querySelectorAll('.swiper:not(.gallery)')
    .forEach((swiperElement) => {
      new Swiper(swiperElement, {
        modules: [Navigation],
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 24,
        navigation: {
          nextEl: '.swiper-button-next-slider',
          prevEl: '.swiper-button-prev-slider',
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 2,
          },
          1200: {
            slidesPerView: 1,
          },
        },
      });
    });
});
