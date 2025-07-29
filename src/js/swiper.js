import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/pagination';
import { Pagination } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {
  document
    .querySelectorAll('.swiper:not(.gallery)')
    .forEach((swiperElement) => {
      new Swiper(swiperElement, {
        modules: [Pagination],
        speed: 500,
        slidesPerView: 3,
        spaceBetween: 24,
        /*         navigation: {
          nextEl: '.swiper-button-next-slider',
          prevEl: '.swiper-button-prev-slider',
        }, */
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
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
