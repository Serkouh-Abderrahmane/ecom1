import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation, Pagination } from 'swiper/modules';

const collections = [
  { name: 'Chuyện Phòng Gym', count: '45 mục', image: '/images/Banner_1_913eba2c-50de-4efb-9407-118b1c8bfc7dd0a0.png' },
  { name: 'PickleBall', count: '32 mục', image: '/images/Banner_1_2717fb60-b7c2-4ece-bd0d-484b06d6017f414d.png' },
  { name: 'Nhả Khói', count: '30 mục', image: '/images/Banner_1_57bc1583-aef2-488d-a82f-a3b5ff4db4007415.png' },
  { name: 'Việt Nam Du Hí', count: '33 mục', image: '/images/Banner_1_322104d1-b536-4a21-a645-e9c96a4583ee5cf0.png' },
  { name: 'Nhâm Nhi', count: '54 mục', image: '/images/Banner_1_245e9bd2-f0c9-401d-93a8-5d16666a4eca2171.png' },
  { name: 'Tuyệt Đối Điện Ảnh', count: '58 mục', image: '/images/Banner_1_59d63eae-70eb-45a9-b1ec-f84a220b5c9de0db.png' },
  { name: 'Đời Game Thủ', count: '41 mục', image: '/images/Banner_1_66ed26c5-bfa3-40e0-b822-8dc38a19de93e920.png' },
  { name: 'Nghỉ Lễ Hết Cỡ', count: '78 mục', image: '/images/Banner_1_fbec5677-2c49-4b22-8704-75627aabbf1248ad.png' },
  { name: 'Đũy Mèo', count: '119 mục', image: '/images/Banner_1_57bc1583-aef2-488d-a82f-a3b5ff4db400cb95.png' },
  { name: 'Trời Bời', count: '109 mục', image: '/images/Banner_3_4dee2781-251f-4705-80e4-7ff0ff90e8ef365e.png' },
  { name: 'Fruitland', count: '67 mục', image: '/images/Banner_4_46ac9945-069a-46c9-94a8-ee9e0fcd507696b1.png' },
  { name: 'Luôn Yêu Nước', count: '31 mục', image: '/images/Banner_3_4dee2781-251f-4705-80e4-7ff0ff90e8effddd.png' },
  { name: 'Love Bites', count: '134 mục', image: '/images/banner_niceboy1055.png' },
  { name: 'Mấy Chuyện Linh Tinh', count: '254 mục', image: '/images/banner_luonvuituoie08d.png' },
  { name: 'Nghề Nghiệp', count: '144 mục', image: '/images/Banner_Ler_LVTb561.png' },
  { name: 'Rạp Xiếc Động Vật', count: '84 mục', image: '/images/Banner_Web_VN38a1.png' },
  { name: 'Văn Hoá Việt Nam', count: '53 mục', image: '/images/Bannesr_1_d341f62c-0635-467f-b6b6-7d629fa1ee194bd1.png' },
];

export default function CollectionShowcase() {
  return (
    <section className="section collections-section">
      <div className="container">
        <div className="collections-header">
          <h2 className="section-title">Khám phá các bộ sưu tập</h2>
          <a href="/collections/ao-thun" className="collections-view-all">Xem thêm</a>
        </div>
        <div className="collections-slider-wrapper">
          <Swiper
            modules={[Navigation, Pagination]}
            spaceBetween={40}
            slidesPerView={3}
            navigation={{
              prevEl: '.collections-prev',
              nextEl: '.collections-next',
            }}
            pagination={{
              type: 'fraction',
              el: '.collections-fraction',
            }}
            breakpoints={{
              0: { slidesPerView: 1.5, spaceBetween: 16 },
              640: { slidesPerView: 2, spaceBetween: 16 },
              1024: { slidesPerView: 3, spaceBetween: 40 },
            }}
            className="collections-swiper"
          >
            {collections.map((col, idx) => (
              <SwiperSlide key={idx}>
                <div className="collection-card">
                  <a href={`/collections/${col.name.toLowerCase().replace(/\s+/g, '-')}`} className="collection-card-link">
                    <div className="collection-card-image">
                      <img src={col.image} alt={col.name} loading="lazy" />
                    </div>
                    <div className="collection-card-info">
                      <h3 className="collection-card-title">{col.name}</h3>
                      <p className="collection-card-count">{col.count}</p>
                      <span className="collection-card-arrow">
                        <svg width="14" height="13" fill="none" viewBox="0 0 14 13">
                          <path fill="currentColor" d="M6.78594.789062c.16406-.145833.31901-.145833.46484 0L12.9656 6.53125c.1641.14583.1641.29167 0 .4375L7.25078 12.7109c-.14583.1459-.30078.1459-.46484 0l-.54688-.5468c-.05469-.0547-.08203-.1276-.08203-.2188 0-.0911.02734-.1732.08203-.2461l4.23824-4.23826H1.15312c-.218745 0-.32812-.10938-.32812-.32813v-.76562c0-.21875.109375-.32813.32812-.32813h9.32418L6.23906 1.80078c-.14583-.16406-.14583-.31901 0-.46484l.54688-.546878z"/>
                        </svg>
                      </span>
                    </div>
                  </a>
                </div>
              </SwiperSlide>
            ))}
          </Swiper>
          <div className="collections-controls">
            <button className="collections-prev" aria-label="Previous">
              <span className="animate-icon" />
            </button>
            <div className="collections-fraction" />
            <button className="collections-next" aria-label="Next">
              <span className="animate-icon" />
            </button>
          </div>
        </div>
      </div>
    </section>
  );
}
