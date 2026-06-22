const hoodieProducts = [
  { image: '/images/Tr_Ng_i_Non_Stop46df.png', name: 'Trẫm Ngự Non Stop Hoodie', price: '420.000₫' },
  { image: '/images/h_i_ngo_idd0b.png', name: 'Hải Ngoại Hoodie', price: '420.000₫' },
  { image: '/images/ngh_l8b83.png', name: 'Nghỉ Lễ Hoodie', price: '420.000₫' },
  { image: '/images/di_n_nh962d.png', name: 'Đi Điên Hoodie', price: '420.000₫' },
  { image: '/images/GameSWT164a.png', name: 'Game Over Hoodie', price: '420.000₫' },
  { image: '/images/love_SWTce35.png', name: 'Love Bites Hoodie', price: '420.000₫' },
  { image: '/images/h_i_ngo_i_SWTb569.png', name: 'Hải Ngoại Hoodie', price: '420.000₫' },
  { image: '/images/ngh_l_SWTa2a2.png', name: 'Nghỉ Lễ Hoodie', price: '420.000₫' },
];

const sweaterProducts = [
  { image: '/images/h_i_ngo_i_SWTb569.png', name: 'Hải Ngoại Sweater', price: '380.000₫' },
  { image: '/images/ngh_l_SWTa2a2.png', name: 'Nghỉ Lễ Sweater', price: '380.000₫' },
  { image: '/images/di_n_nh_SWT032b.png', name: 'Đi Điên Sweater', price: '380.000₫' },
  { image: '/images/love_SWTce35.png', name: 'Love Bites Sweater', price: '380.000₫' },
  { image: '/images/Game_e927ebc6-0775-41a4-ba57-ee8013f36e81709f.png', name: 'Game Over Sweater', price: '380.000₫' },
  { image: '/images/Tr_Ng_i_Non_Stop46df.png', name: 'Trẫm Ngự Non Stop Sweater', price: '380.000₫' },
  { image: '/images/c_n1kem_9926d2fa-fd9b-4038-a104-87e23e73cf85738b.png', name: 'Sweater Basic Kem', price: '320.000₫' },
  { image: '/images/denc_n1_0b02b7fe-4ac3-45d6-a532-e9f173b9a76532dc.png', name: 'Sweater Basic Đen', price: '320.000₫' },
];

const slideMap = {
  hoodie: hoodieProducts,
  sweater: sweaterProducts,
};

export default function ProductCarousel({ title, type }) {
  const products = slideMap[type] || [];

  return (
    <section className="product-grid-section">
      <div className="container">
        <div className="section-header section-header--left">
          <div>
            <h2 className="section-title">{title}</h2>
            <p className="section-subtitle">{type === 'hoodie' ? 'Áo hoodie chất lượng cao, thiết kế độc đáo' : 'Sweater ấm áp, phong cách đường phố'}</p>
          </div>
          <a href={`/collections/${type === 'hoodie' ? 'ao-hoodie' : 'ao-sweater'}`} className="section-link">Xem tất cả →</a>
        </div>
        <div className="product-grid">
          {products.map((p, i) => (
            <a key={i} href={`/collections/${p.name.toLowerCase().replace(/\s+/g, '-')}`} className="product-card">
              <div className="product-card-image">
                <img src={p.image} alt={p.name} loading="lazy" />
                <span className="product-card-quick-add">Thêm vào giỏ +</span>
              </div>
              <p className="product-card-title">{p.name}</p>
              <p className="product-card-price">{p.price}</p>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
}
