export default function Footer() {
  return (
    <footer className="footer">
      <div className="footer-main">
        <div className="container">
          <div className="footer-grid">
            <div className="footer-col">
              <h3 className="footer-col-title">LUON VUITUOI</h3>
              <p className="footer-brand-desc">
                Thương hiệu streetwear Việt Nam dành cho giới trẻ. Thiết kế độc đáo, chất liệu cao cấp, phong cách đường phố đích thực.
              </p>
              <div className="footer-social">
                <a href="#" aria-label="Facebook">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" /></svg>
                </a>
                <a href="#" aria-label="Instagram">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><rect x="2" y="2" width="20" height="20" rx="5" /><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" /><line x1="17.5" y1="6.5" x2="17.51" y2="6.5" /></svg>
                </a>
                <a href="#" aria-label="TikTok">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M9 12a4 4 0 1 0 4 4V2h3a5 5 0 0 0 5 5v3a8 8 0 0 1-5-1.5V16a6 6 0 0 1-6 6 6 6 0 0 1-6-6 6 6 0 0 1 5-5.9z" /></svg>
                </a>
                <a href="#" aria-label="YouTube">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z" /><polygon points="9.75 15.02 15.5 12 9.75 8.98" fill="#111" /></svg>
                </a>
              </div>
              <div className="footer-newsletter-form" style={{ maxWidth: '320px' }}>
                <input type="email" className="footer-newsletter-input" placeholder="Email của bạn" />
                <button className="footer-newsletter-btn">Đăng kí</button>
              </div>
            </div>

            <div className="footer-col">
              <h3 className="footer-col-title">Công Ty</h3>
              <a href="#">Giới thiệu</a>
              <a href="#">Tuyển dụng</a>
              <a href="#">Liên hệ</a>
              <a href="#">Blog</a>
            </div>

            <div className="footer-col">
              <h3 className="footer-col-title">Hỗ Trợ</h3>
              <a href="#">Chính sách giao hàng</a>
              <a href="#">Chính sách đổi trả</a>
              <a href="#">Chính sách bảo mật</a>
              <a href="#">Hướng dẫn mua hàng</a>
              <a href="#">FAQ</a>
            </div>

            <div className="footer-col">
              <h3 className="footer-col-title">Liên Hệ</h3>
              <p>Email: hello@xuongmaynhacong.com</p>
              <p>Hotline: 0386 524 760</p>
              <p>Thứ 2 - Thứ 7: 08:00 - 17:00</p>
              <p>Số 122 đường Khúc Hạo, An Biên, Hải Phòng</p>
            </div>
          </div>
        </div>
      </div>

      <div className="footer-bottom">
        <div className="container">
          <div className="footer-bottom-inner">
            <div className="footer-copyright">
              <p>© 2026 Luon Vuituoi. All rights reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
}
