import { Swiper, SwiperSlide } from 'swiper/react';

const hoodieSlides = [
  { image: '/images/Tr_Ng_i_Non_Stop46df.png', name: 'Trẫm Ngự Non Stop Hoodie', collection: 'tram-ngu-non-stop' },
  { image: '/images/h_i_ngo_idd0b.png', name: 'Hải Ngoại Hoodie', collection: 'hai-ngoai' },
  { image: '/images/ngh_l8b83.png', name: 'Nghỉ Lễ Hoodie', collection: 'nghi-le' },
  { image: '/images/di_n_nh962d.png', name: 'Đi Điên Hoodie', collection: 'di-dien' },
  { image: '/images/GameSWT164a.png', name: 'Game Over Hoodie', collection: 'game-over' },
  { image: '/images/love_SWTce35.png', name: 'Love Bites Hoodie', collection: 'love-bites' },
  { image: '/images/h_i_ngo_i_SWTb569.png', name: 'Hải Ngoại Hoodie', collection: 'hai-ngoai-hoodie' },
  { image: '/images/ngh_l_SWTa2a2.png', name: 'Nghỉ Lễ Hoodie', collection: 'nghi-le-hoodie' },
  { image: '/images/di_n_nh_SWT032b.png', name: 'Đi Điên Hoodie', collection: 'di-dien-hoodie' },
  { image: '/images/Game_e927ebc6-0775-41a4-ba57-ee8013f36e81709f.png', name: 'Game Over Hoodie', collection: 'game-over-hoodie' },
  { image: '/images/c_n1kem_9926d2fa-fd9b-4038-a104-87e23e73cf85738b.png', name: 'Áo Thun Basic', collection: 'ao-thun-basic' },
  { image: '/images/denc_n1_0b02b7fe-4ac3-45d6-a532-e9f173b9a76532dc.png', name: 'Áo Thun Basic Đen', collection: 'ao-thun-basic-den' },
  { image: '/images/c_n1navy_0d4da791-5254-4141-9747-37016e41162757a5.png', name: 'Áo Thun Basic Navy', collection: 'ao-thun-basic-navy' },
  { image: '/images/c_nsautr_ng_ed612b8e-3589-41bc-9aa2-cb4fbc0df685754f.png', name: 'Áo Thun Basic Trắng', collection: 'ao-thun-basic-trang' },
];

const sweaterSlides = [
  { image: '/images/h_i_ngo_i_SWTb569.png', name: 'Hải Ngoại Sweater', collection: 'hai-ngoai-sweater' },
  { image: '/images/ngh_l_SWTa2a2.png', name: 'Nghỉ Lễ Sweater', collection: 'nghi-le-sweater' },
  { image: '/images/di_n_nh_SWT032b.png', name: 'Đi Điên Sweater', collection: 'di-dien-sweater' },
  { image: '/images/love_SWTce35.png', name: 'Love Bites Sweater', collection: 'love-bites-sweater' },
  { image: '/images/Game_e927ebc6-0775-41a4-ba57-ee8013f36e81709f.png', name: 'Game Over Sweater', collection: 'game-over-sweater' },
  { image: '/images/Tr_Ng_i_Non_Stop46df.png', name: 'Trẫm Ngự Non Stop Sweater', collection: 'tram-ngu-non-stop-sweater' },
  { image: '/images/c_n1kem_9926d2fa-fd9b-4038-a104-87e23e73cf85738b.png', name: 'Áo Thun Relaxed Fit Kem', collection: 'ao-thun-relaxed-kem' },
  { image: '/images/denc_n1_0b02b7fe-4ac3-45d6-a532-e9f173b9a76532dc.png', name: 'Áo Thun Relaxed Fit Đen', collection: 'ao-thun-relaxed-den' },
  { image: '/images/c_n1navy_0d4da791-5254-4141-9747-37016e41162757a5.png', name: 'Áo Thun Relaxed Fit Navy', collection: 'ao-thun-relaxed-navy' },
  { image: '/images/c_nsautr_ng_ed612b8e-3589-41bc-9aa2-cb4fbc0df685754f.png', name: 'Áo Thun Relaxed Fit Trắng', collection: 'ao-thun-relaxed-trang' },
  { image: '/images/h_i_ngo_idd0b.png', name: 'Hải Ngoại Sweater', collection: 'hai-ngoai' },
  { image: '/images/ngh_l8b83.png', name: 'Nghỉ Lễ Sweater', collection: 'nghi-le' },
];

const slideMap = {
  hoodie: hoodieSlides,
  sweater: sweaterSlides,
};

export default function ProductCarousel({ title, type }) {
  const slides = slideMap[type] || [];

  return (
    <section className="section product-slider-section" style={{ background: '#fff' }}>
      <div className="container">
        <h2 className="section-title">{title}</h2>
        <div className="product-slider-wrapper">
          <Swiper
            spaceBetween={20}
            slidesPerView={6}
            loop
            speed={300}
            breakpoints={{
              0: { slidesPerView: 1.5, spaceBetween: 20 },
              640: { slidesPerView: 3, spaceBetween: 20 },
              1024: { slidesPerView: 6, spaceBetween: 20 },
            }}
            className="product-swiper"
          >
            {slides.map((slide, idx) => (
              <SwiperSlide key={idx}>
                <a href={`/collections/${slide.collection}`} className="product-slide-card">
                  <div className="product-slide-image">
                    <img src={slide.image} alt={slide.name} loading="lazy" />
                  </div>
                  <div className="product-slide-content">
                    <p className="product-slide-title">{slide.name}</p>
                    <span className="product-slide-btn">Mua Ngay !</span>
                  </div>
                </a>
              </SwiperSlide>
            ))}
          </Swiper>
        </div>
      </div>
    </section>
  );
}
