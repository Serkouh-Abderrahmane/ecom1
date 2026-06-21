const products = [
  {
    image: '/images/denc_n1_0b02b7fe-4ac3-45d6-a532-e9f173b9a76532dc.png',
    name: 'Áo Thun Relaxed Fit Basic - Đen',
    price: '250.000₫',
    oldPrice: '350.000₫',
    badge: '-29%',
  },
  {
    image: '/images/c_n1kem_9926d2fa-fd9b-4038-a104-87e23e73cf85738b.png',
    name: 'Áo Thun Relaxed Fit Basic - Kem',
    price: '250.000₫',
    oldPrice: '350.000₫',
    badge: '-29%',
  },
  {
    image: '/images/c_n1navy_0d4da791-5254-4141-9747-37016e41162757a5.png',
    name: 'Áo Thun Relaxed Fit Basic - Navy',
    price: '250.000₫',
    oldPrice: '350.000₫',
    badge: '-29%',
  },
  {
    image: '/images/c_nsautr_ng_ed612b8e-3589-41bc-9aa2-cb4fbc0df685754f.png',
    name: 'Áo Thun Relaxed Fit Basic - Trắng',
    price: '250.000₫',
    oldPrice: '350.000₫',
    badge: '-29%',
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
            <div key={idx} className="soft-routine-card">
              <div className="soft-routine-card-image">
                <img src={product.image} alt={product.name} loading="lazy" />
                {product.badge && (
                  <span className="soft-routine-badge">{product.badge}</span>
                )}
              </div>
              <div className="soft-routine-card-body">
                <div className="soft-routine-card-name">{product.name}</div>
                <div className="soft-routine-card-price">
                  {product.price}
                  {product.oldPrice && (
                    <span className="soft-routine-card-price-old">{product.oldPrice}</span>
                  )}
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
