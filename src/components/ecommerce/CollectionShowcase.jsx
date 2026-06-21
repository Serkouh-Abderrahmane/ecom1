const collections = [
  {
    image: '/images/di_n_nh_SWT032b.png',
    name: 'Áo Sweater',
  },
  {
    image: '/images/GameSWT164a.png',
    name: 'Áo Thun',
  },
  {
    image: '/images/love_SWTce35.png',
    name: 'Áo Hoodie',
  },
];

export default function CollectionShowcase() {
  return (
    <section className="section">
      <div className="container">
        <h2 className="section-title">Khám phá các bộ sưu tập</h2>
        <p className="section-subtitle">Những thiết kế mới nhất dành cho bạn</p>
        <div className="collection-grid">
          {collections.map((col, idx) => (
            <div key={idx} className="collection-card">
              <img src={col.image} alt={col.name} loading="lazy" />
              <div className="collection-card-overlay" />
              <button className="collection-card-btn" aria-label="View collection">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                  <line x1="5" y1="12" x2="19" y2="12" />
                  <polyline points="12 5 19 12 12 19" />
                </svg>
              </button>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
