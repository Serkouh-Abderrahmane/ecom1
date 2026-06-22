import { Swiper, SwiperSlide } from 'swiper/react';
import { Autoplay, Pagination } from 'swiper/modules';

const slides = [
  {
    image: '/images/Banner_Ngang_5b89d.png',
    collection: 'fruitland',
    label: 'Fruitland',
    title: 'DŨY MÈO COLLECTION',
    subtitle: 'Streetwear inspired by cat lovers. Phiên bản giới hạn.',
    cta1: { text: 'Shop Collection', href: '/collections/fruitland' },
    cta2: { text: 'New Arrivals', href: '/collections/hang-moi' },
  },
  {
    image: '/images/Banner_Ngang_4_613c644d-34b9-4f3d-b7f9-7c56bb32c377fc86.png',
    collection: 'pickleball',
    label: 'Pickleball',
    title: 'PICKLEBALL CLUB',
    subtitle: 'Năng động và phong cách. Trang phục thể thao đường phố.',
    cta1: { text: 'Shop Collection', href: '/collections/pickleball' },
    cta2: { text: 'Best Sellers', href: '/collections/ban-chay' },
  },
  {
    image: '/images/Banner_Ngang_3_8636facb-b4ab-4ea8-9cfc-dfc00fd4d65aaf23.png',
    collection: 'duy-meo',
    label: 'Đũy Mèo',
    title: 'ĐŨY MÈO X STREETWEAR',
    subtitle: 'Sự kết hợp hoàn hảo giữa cá tính và thoải mái.',
    cta1: { text: 'Shop Collection', href: '/collections/duy-meo' },
    cta2: { text: 'New Collection', href: '/collections/ao-thun' },
  },
];

export default function Hero() {
  return (
    <section className="hero">
      <Swiper
        modules={[Autoplay, Pagination]}
        autoplay={{ delay: 5000, disableOnInteraction: false }}
        pagination={{
          clickable: true,
          el: '.hero-pagination',
          type: 'bullets',
          bulletClass: 'hero-dot',
          bulletActiveClass: 'hero-dot--active',
        }}
        loop
        speed={700}
        className="hero-swiper"
      >
        {slides.map((slide, index) => (
          <SwiperSlide key={index}>
            <div className="hero-slide-link">
              <img src={slide.image} alt={slide.label} className="hero-image" />
              <div className="hero-overlay" />
              <div className="hero-content">
                <h1>{slide.title}</h1>
                <p>{slide.subtitle}</p>
                <div className="hero-cta-group">
                  <a href={slide.cta1.href} className="hero-btn hero-btn--primary">
                    {slide.cta1.text} →
                  </a>
                  <a href={slide.cta2.href} className="hero-btn hero-btn--secondary">
                    {slide.cta2.text}
                  </a>
                </div>
              </div>
            </div>
          </SwiperSlide>
        ))}
      </Swiper>
      <div className="hero-pagination" />
    </section>
  );
}
