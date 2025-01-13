import Swiper from 'swiper';
import { Autoplay, EffectFade, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/effect-fade';

document.querySelectorAll('.images-block .swiper').forEach((swiperElement) => {
  new Swiper(swiperElement, {
    modules: [Navigation, Autoplay, EffectFade],
    speed: 1000,
    crossFade: true,
    autoplay: {
      delay: 5000,
    },
    loop: true,
    effect: 'fade',
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
});
