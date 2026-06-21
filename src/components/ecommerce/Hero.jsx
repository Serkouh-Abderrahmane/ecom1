import { useState, useEffect, useCallback } from 'react';

const slides = [
  {
    image: '/images/VN_Du_Hi_Banner13b1.png',
    title: 'PICKLEBALL COLLECTION',
    subtitle: 'Bộ sưu tập Pickleball mới nhất - Phong cách năng động cho người trẻ Việt',
  },
  {
    image: '/images/VN_Du_Hi_Bannerec1f.png',
    title: 'DU HÍ BANNER',
    subtitle: 'Khám phá phong cách đường phố đầy cá tính cùng LVT',
  },
  {
    image: '/images/VN_Du_Hi_Banner9dd7.png',
    title: 'SOFT ROUTINE',
    subtitle: 'Sự thoải mái trong từng đường kim mũi chỉ',
  },
];

export default function Hero() {
  const [current, setCurrent] = useState(0);

  const next = useCallback(() => {
    setCurrent((prev) => (prev + 1) % slides.length);
  }, []);

  useEffect(() => {
    const timer = setInterval(next, 5000);
    return () => clearInterval(timer);
  }, [next]);

  return (
    <section className="hero">
      {slides.map((slide, index) => (
        <div key={index} className={`hero-slide ${index === current ? 'active' : ''}`}>
          <img
            src={slide.image}
            alt={slide.title}
            className="hero-image"
          />
          <div className="hero-overlay" />
        </div>
      ))}
      <div className="hero-content">
        <h1 className="hero-title">{slides[current].title}</h1>
        <p className="hero-subtitle">{slides[current].subtitle}</p>
        <button className="btn btn-white">Mua ngay</button>
      </div>
      <div className="hero-dots">
        {slides.map((_, index) => (
          <button
            key={index}
            className={`hero-dot ${index === current ? 'active' : ''}`}
            onClick={() => setCurrent(index)}
            aria-label={`Slide ${index + 1}`}
          />
        ))}
      </div>
    </section>
  );
}
