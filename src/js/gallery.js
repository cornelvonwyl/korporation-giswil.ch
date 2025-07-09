import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/effect-fade';
import { Navigation, Keyboard } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {
  document
    .querySelectorAll('.images-block .swiper')
    .forEach((swiperElement) => {
      new Swiper(swiperElement, {
        modules: [Navigation, Keyboard],
        speed: 500,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next-gallery',
          prevEl: '.swiper-button-prev-gallery',
        },
        keyboard: {
          enabled: true,
          onlyInViewport: true,
        },
      });
    });
});
