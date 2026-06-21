const products = [
  {
    image: '/images/denc_n1_0b02b7fe-4ac3-45d6-a532-e9f173b9a76532dc.png',
    imageHover: '/images/c_n1kem_9926d2fa-fd9b-4038-a104-87e23e73cf85738b.png',
    name: 'Áo Thun Relaxed Fit Basic - Đen',
    price: '250.000₫',
    oldPrice: '350.000₫',
    badge: '-29%',
  },
  {
    image: '/images/c_n1kem_9926d2fa-fd9b-4038-a104-87e23e73cf85738b.png',
    imageHover: '/images/denc_n1_0b02b7fe-4ac3-45d6-a532-e9f173b9a76532dc.png',
    name: 'Áo Thun Relaxed Fit Basic - Kem',
    price: '250.000₫',
    oldPrice: '350.000₫',
    badge: '-29%',
  },
  {
    image: '/images/c_n1navy_0d4da791-5254-4141-9747-37016e41162757a5.png',
    imageHover: '/images/c_nsautr_ng_ed612b8e-3589-41bc-9aa2-cb4fbc0df685754f.png',
    name: 'Áo Thun Relaxed Fit Basic - Navy',
    price: '250.000₫',
    oldPrice: '350.000₫',
    badge: '-29%',
  },
  {
    image: '/images/c_nsautr_ng_ed612b8e-3589-41bc-9aa2-cb4fbc0df685754f.png',
    imageHover: '/images/c_n1navy_0d4da791-5254-4141-9747-37016e41162757a5.png',
    name: 'Áo Thun Relaxed Fit Basic - Trắng',
    price: '250.000₫',
    oldPrice: '350.000₫',
    badge: '-29%',
  },
  {
    image: '/images/Tr_Ng_i_Non_Stop46df.png',
    imageHover: '/images/GameSWT164a.png',
    name: 'Áo Hoodie Nỉ Bông Basic',
    price: '399.000₫',
    oldPrice: '598.000₫',
    badge: '-33%',
  },
  {
    image: '/images/h_i_ngo_i_SWTb569.png',
    imageHover: '/images/ngh_l_SWTa2a2.png',
    name: 'Áo Sweater Nỉ Bông Basic',
    price: '399.000₫',
    oldPrice: '499.000₫',
    badge: '-20%',
  },
];

export default function SoftRoutine() {
  return (
    <section className="soft-routine">
      <div className="container">
        <h2 className="section-title">Soft Routine</h2>
        <p className="section-subtitle" style={{ color: 'rgba(255,255,255,0.6)' }}>
          Basic essentials cho mọi ngày
        </p>
        <div className="soft-routine-grid">
          {products.map((product, idx) => (
            <div key={idx} className="m-product-card m-product-card--onsale m-product-card--show-second-img">
              <div className="m-product-card__media">
                <a className="m-product-card__link" href="#" aria-label={product.name}>
                  <div className="m-product-card__main-image">
                    <img src={product.image} alt={product.name} loading="lazy" />
                  </div>
                  <div className="m-product-card__hover-image">
                    <img src={product.imageHover} alt="" loading="lazy" />
                  </div>
                </a>
                {product.badge && (
                  <span className="m-product-tag m-product-tag--sale">-{product.badge}</span>
                )}
              </div>
              <div className="m-product-card__content">
                <h3 className="m-product-card__title">
                  <a href="#">{product.name}</a>
                </h3>
                <div className="m-product-card__price">
                  <span className="m-price-item m-price-item--sale">{product.price}</span>
                  <s className="m-price-item m-price-item--compare">{product.oldPrice}</s>
                </div>
              </div>
            </div>
          ))}
        </div>
        <div className="soft-routine-button">
          <a href="/collections/soft-routine" className="m-button m-button--primary">Xem Ngay!</a>
        </div>
      </div>
    </section>
  );
}
