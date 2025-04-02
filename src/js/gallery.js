import Swiper from 'swiper';
import { Autoplay, EffectFade, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/effect-fade';

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
