export default function Footer() {
  return (
    <footer className="footer">
      <div className="footer-main">
        <div className="container">
          <div className="footer-grid">
            <div className="footer-col footer-col-newsletter">
              <h3 className="footer-col-title">SIGN UP AND SAVE</h3>
              <p className="footer-newsletter-desc">
                Đăng ký để nhận ưu đãi đặc biệt, free giveaways và các thông tin khác.
              </p>
              <form className="footer-newsletter-form" onSubmit={(e) => e.preventDefault()}>
                <input
                  type="email"
                  className="footer-newsletter-input"
                  placeholder="Email của bạn"
                  required
                />
                <button type="submit" className="footer-newsletter-btn">
                  Đăng kí
                </button>
              </form>
            </div>

            <div className="footer-col">
              <h3 className="footer-col-title">CÔNG TY TNHH ZANET</h3>
              <p>MST: 0202291489</p>
              <p>Ngày cấp: 12/06/2025, Sở Tài Chính Thành Phố Hải Phòng (Phòng Đăng Ký Kinh Doanh Và Quản Lý Doanh Nghiệp)</p>
              <p>Số 122 đường Khúc Hạo, Phường An Biên, TP Hải Phòng</p>
            </div>

            <div className="footer-col">
              <h3 className="footer-col-title">THÔNG TIN & HỖ TRỢ KHÁCH HÀNG</h3>
              <a href="#">Chính sách bảo mật thông tin</a>
              <a href="#">Chính sách giao, nhận hàng và kiểm hàng</a>
              <a href="#">Chính sách đổi trả</a>
              <a href="#">Chính sách thanh toán</a>
              <a href="#">Điều khoản dịch vụ</a>
              <a href="#">Giới thiệu</a>
              <a href="#">Liên Hệ</a>
            </div>

            <div className="footer-col">
              <h3 className="footer-col-title">LIÊN HỆ</h3>
              <p>Email: hello@xuongmaynhacong.com</p>
              <p>Hotline: 0386524760</p>
              <p>Thứ 2 - Thứ 7 (08h00 - 17h00)</p>
            </div>

            <div className="footer-col footer-col-badge">
              <a href="http://online.gov.vn/Home/WebDetails/142331" target="_blank" rel="noopener noreferrer">
                <img src="/images/bct_badge.png" alt="Đã thông báo Bộ Công Thương" loading="lazy" />
              </a>
            </div>
          </div>
        </div>
      </div>

      <div className="footer-bottom">
        <div className="container">
          <div className="footer-bottom-inner">
            <div className="footer-copyright">
              <p>Copyright (c) 2026, Luon Vuituoi.</p>
            </div>
            <div className="footer-payment-icons">
              <span className="sr-only">Các lựa chọn thanh toán: </span>
              <ul className="footer-payment-list" />
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
}
