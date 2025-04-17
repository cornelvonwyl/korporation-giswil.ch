import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/effect-fade';
import { Navigation } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {
  document
    .querySelectorAll('.images-block .swiper')
    .forEach((swiperElement) => {
      new Swiper(swiperElement, {
        modules: [Navigation],
        speed: 500,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    });
});
