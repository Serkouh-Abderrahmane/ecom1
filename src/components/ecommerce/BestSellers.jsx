const products = [
  {
    image: '/images/denc_n1_0b02b7fe-4ac3-45d6-a532-e9f173b9a76532dc.png',
    name: 'Áo Thun Relaxed Fit Basic - Đen',
    price: '250.000₫',
    oldPrice: '350.000₫',
    badge: 'Bán chạy',
  },
  {
    image: '/images/Tr_Ng_i_Non_Stop46df.png',
    name: 'Trẫm Ngự Non Stop Hoodie',
    price: '420.000₫',
    oldPrice: '598.000₫',
    badge: 'Hot',
  },
  {
    image: '/images/h_i_ngo_i_SWTb569.png',
    name: 'Hải Ngoại Sweater',
    price: '380.000₫',
    oldPrice: null,
    badge: null,
  },
  {
    image: '/images/c_n1kem_9926d2fa-fd9b-4038-a104-87e23e73cf85738b.png',
    name: 'Áo Thun Relaxed Fit Basic - Kem',
    price: '250.000₫',
    oldPrice: '350.000₫',
    badge: '-29%',
  },
];

export default function BestSellers() {
  return (
    <section className="best-sellers">
      <div className="container">
        <div className="section-header section-header--left">
          <div>
            <h2 className="section-title">🔥 Best Sellers</h2>
            <p className="section-subtitle">Sản phẩm bán chạy nhất của chúng tôi</p>
          </div>
          <a href="/collections/ban-chay" className="section-link">Xem tất cả →</a>
        </div>
        <div className="best-sellers-grid">
          {products.map((p, i) => (
            <a key={i} href="#" className="best-seller-card">
              <div className="best-seller-card-image">
                <img src={p.image} alt={p.name} loading="lazy" />
              </div>
              {p.badge && <span className="best-seller-badge">{p.badge}</span>}
              <div className="best-seller-card-content">
                <h3>{p.name}</h3>
                <div>
                  <span className="price">{p.price}</span>
                  {p.oldPrice && <span className="old-price">{p.oldPrice}</span>}
                </div>
              </div>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
}
