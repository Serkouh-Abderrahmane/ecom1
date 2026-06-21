export default function Newsletter() {
  return (
    <section className="newsletter">
      <div className="container">
        <h2 className="newsletter-title">Đăng ký nhận tin</h2>
        <p className="newsletter-desc">
          Đăng ký để nhận thông tin về sản phẩm mới và các chương trình khuyến mãi đặc biệt.
        </p>
        <form className="newsletter-form" onSubmit={(e) => e.preventDefault()}>
          <input
            type="email"
            className="newsletter-input"
            placeholder="Email của bạn..."
            required
          />
          <button type="submit" className="newsletter-btn">
            Đăng ký
          </button>
        </form>
      </div>
    </section>
  );
}
