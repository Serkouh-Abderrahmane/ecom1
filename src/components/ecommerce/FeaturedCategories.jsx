const categories = [
  { name: 'Áo Thun Graphic', count: '45 mẫu', image: '/images/Banner_1_913eba2c-50de-4efb-9407-118b1c8bfc7dd0a0.png', href: '/collections/ao-thun' },
  { name: 'Áo Hoodie', count: '32 mẫu', image: '/images/Banner_1_2717fb60-b7c2-4ece-bd0d-484b06d6017f414d.png', href: '/collections/ao-hoodie' },
  { name: 'Bán Chạy', count: '78 mẫu', image: '/images/Banner_1_fbec5677-2c49-4b22-8704-75627aabbf1248ad.png', href: '/collections/ban-chay' },
  { name: 'Hàng Mới', count: '54 mẫu', image: '/images/Banner_1_245e9bd2-f0c9-401d-93a8-5d16666a4eca2171.png', href: '/collections/hang-moi' },
];

export default function FeaturedCategories() {
  return (
    <section className="featured-categories">
      <div className="container">
        <div className="featured-grid">
          {categories.map((cat, i) => (
            <a key={i} href={cat.href} className="featured-card">
              <img src={cat.image} alt={cat.name} loading="lazy" />
              <div className="featured-overlay" />
              <div className="featured-label">
                <h3>{cat.name}</h3>
                <span>{cat.count}</span>
              </div>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
}
