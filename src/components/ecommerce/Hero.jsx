import { Swiper, SwiperSlide } from 'swiper/react';
import { Autoplay, Pagination } from 'swiper/modules';

const slides = [
  { image: '/images/Banner_Ngang_5b89d.png', collection: 'fruitland', label: 'Fruitland' },
  { image: '/images/Banner_Ngang_4_613c644d-34b9-4f3d-b7f9-7c56bb32c377fc86.png', collection: 'pickleball', label: 'Pickleball' },
  { image: '/images/Banner_Ngang_3_8636facb-b4ab-4ea8-9cfc-dfc00fd4d65aaf23.png', collection: 'duy-meo', label: 'Đũy Mèo' },
  { image: '/images/Banner_Ngang_3_98ba563d-67cf-41fc-8727-118e7a30d77934ed.png', collection: 'love-bites', label: 'Love Bites' },
  { image: '/images/Banner_Ngang_21fdd.png', collection: 'cau-long', label: 'Cầu Lông' },
  { image: '/images/Banner_Ngang_1acba.png', collection: 'billiard', label: 'Billiard' },
];

export default function Hero() {
  return (
    <section className="hero">
      <Swiper
        modules={[Autoplay, Pagination]}
        autoplay={{ delay: 4000, disableOnInteraction: false }}
        pagination={{
          clickable: true,
          el: '.hero-pagination',
          type: 'bullets',
          bulletClass: 'hero-dot',
          bulletActiveClass: 'hero-dot--active',
        }}
        loop
        speed={600}
        className="hero-swiper"
      >
        {slides.map((slide, index) => (
          <SwiperSlide key={index}>
            <a href={`/collections/${slide.collection}`} className="hero-slide-link">
              <img
                src={slide.image}
                alt={slide.label}
                className="hero-image"
              />
            </a>
          </SwiperSlide>
        ))}
      </Swiper>
      <div className="hero-pagination" />
    </section>
  );
}
