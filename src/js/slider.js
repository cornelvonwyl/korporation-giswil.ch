import Swiper from 'swiper';
import { Autoplay, EffectFade, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/effect-fade';

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.swiper').forEach((swiperElement) => {
    new Swiper(swiperElement, {
      modules: [Navigation, Autoplay, EffectFade],
      speed: 1000,
      crossFade: true,
      slidesPerView: 3,
      spaceBetween: 16,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
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
