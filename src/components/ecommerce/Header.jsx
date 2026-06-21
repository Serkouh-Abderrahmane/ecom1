import { useState } from 'react';

const menuItems = [
  'TRANG CHỦ',
  'ÁO THUN RELAXED FIT',
  'ÁO THUN RINGER',
  'TÚI CANVAS',
  'ÁO BA LỖ',
  'ÁO THUN DÀI TAY',
  'ÁO SWEATER',
  'ÁO HOODIE',
  'QUẦN JOGGER & QUẦN ỐNG SUÔNG',
  'SOFT ROUTINE',
];

export default function Header() {
  const [menuOpen, setMenuOpen] = useState(false);

  return (
    <>
      <header className="header">
        <div className="header-top">
          <button className="header-search" aria-label="Search">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              <circle cx="11" cy="11" r="8" />
              <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
          </button>

          <div className="header-logo">
            XƯỞNG MAY NHÀ CÔNG
          </div>

          <div className="header-actions">
            <button className="header-action header-mobile-toggle" onClick={() => setMenuOpen(true)} aria-label="Menu">
              <div className="hamburger">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </button>
            <button className="header-action" aria-label="User">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
              </svg>
            </button>
            <button className="header-action" aria-label="Cart">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <circle cx="9" cy="21" r="1" />
                <circle cx="20" cy="21" r="1" />
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
              </svg>
            </button>
          </div>
        </div>

        <div className="header-bottom">
          <nav className="header-nav">
            {menuItems.map((item) => (
              <a key={item} href="#">{item}</a>
            ))}
          </nav>
        </div>
      </header>

      <div className={`mobile-menu ${menuOpen ? 'open' : ''}`}>
        <div className="mobile-menu-header">
          <div className="header-logo">XƯỞNG MAY NHÀ CÔNG</div>
          <button className="mobile-menu-close" onClick={() => setMenuOpen(false)} aria-label="Close">
            &times;
          </button>
        </div>
        <nav>
          {menuItems.map((item) => (
            <a key={item} href="#" onClick={() => setMenuOpen(false)}>{item}</a>
          ))}
        </nav>
      </div>
    </>
  );
}
