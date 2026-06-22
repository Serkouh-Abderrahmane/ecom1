const photos = [
  '/images/24ac09c0de9e52c00b8f9b78.jpg',
  '/images/04de5e136200d55e8c110916.jpg',
  '/images/0e0c99c4a5d712894bc6461d.jpg',
  '/images/a62157ebd7b55beb02a4610a.jpg',
  '/images/267d93fae86865363c799cac.jpg',
  '/images/2b0be6d5668bead5b39a41a2.jpg',
  '/images/3639eb603c3eb060e92fa96e.jpg',
  '/images/5a8f76ea9efa29a470eb5c06.jpg',
];

export default function CustomerGallery() {
  return (
    <section className="customer-gallery">
      <div className="container">
        <div className="section-header">
          <h2 className="section-title">#LUONVUITUOI</h2>
          <p className="section-subtitle">Khách hàng của chúng tôi mặc đẹp mỗi ngày</p>
        </div>
        <div className="gallery-grid">
          {photos.map((src, i) => (
            <a key={i} href="#" className="gallery-card">
              <img src={src} alt={`Customer ${i + 1}`} loading="lazy" />
              <div className="gallery-card-overlay">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                  <circle cx="12" cy="13" r="4" />
                </svg>
              </div>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
}
