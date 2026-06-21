const hoodieProducts = [
  { image: '/images/Tr_Ng_i_Non_Stop46df.png', name: 'Trẫm Ngự Non Stop Hoodie', price: '350.000₫' },
  { image: '/images/h_i_ngo_idd0b.png', name: 'Hải Ngoại Hoodie', price: '380.000₫' },
  { image: '/images/ngh_l8b83.png', name: 'Nghỉ Lễ Hoodie', price: '350.000₫' },
  { image: '/images/di_n_nh962d.png', name: 'Đi Điên Hoodie', price: '360.000₫' },
  { image: '/images/GameSWT164a.png', name: 'Game Over Hoodie', price: '390.000₫' },
];

const sweaterProducts = [
  { image: '/images/h_i_ngo_i_SWTb569.png', name: 'Hải Ngoại Sweater', price: '320.000₫' },
  { image: '/images/ngh_l_SWTa2a2.png', name: 'Nghỉ Lễ Sweater', price: '310.000₫' },
  { image: '/images/di_n_nh_SWT032b.png', name: 'Đi Điên Sweater', price: '320.000₫' },
  { image: '/images/love_SWTce35.png', name: 'Love Sweater', price: '330.000₫' },
  { image: '/images/Game_e927ebc6-0775-41a4-ba57-ee8013f36e81709f.png', name: 'Game Over Sweater', price: '340.000₫' },
];

const productMap = {
  hoodie: hoodieProducts,
  sweater: sweaterProducts,
};

export default function ProductCarousel({ title, type }) {
  const products = productMap[type] || [];

  return (
    <section className="section">
      <div className="container">
        <h2 className="section-title">{title}</h2>
        <p className="section-subtitle">Sản phẩm mới nhất đang chờ bạn</p>
        <div className="product-carousel">
          <div className="product-carousel-inner">
            {products.map((product, idx) => (
              <div key={idx} className="product-carousel-card">
                <div className="product-card">
                  <div className="product-card-image">
                    <img src={product.image} alt={product.name} loading="lazy" />
                  </div>
                  <div className="product-card-name">{product.name}</div>
                  <div className="product-card-price">{product.price}</div>
                  <button className="product-card-btn">Mua Ngay</button>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
