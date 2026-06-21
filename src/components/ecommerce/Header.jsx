import { useState } from 'react';

const menuData = [
  {
    label: 'TRANG CHỦ',
    href: '/',
    dropdown: false,
  },
  {
    label: 'ÁO THUN RELAXED FIT',
    href: '/collections/ao-thun',
    dropdown: true,
    columns: [
      {
        heading: 'Thể Thao',
        items: [
          { label: 'Pickleball', href: '/collections/pickleball' },
          { label: 'Bóng Đá', href: '/collections/bong-da' },
          { label: 'Cầu Lông', href: '/collections/cau-long' },
          { label: 'Billiard', href: '/collections/billiard' },
          { label: 'Bóng Rổ', href: '/collections/bong-ro' },
        ],
      },
      {
        items: [
          { label: 'Chuyện Phòng Gym', href: '/collections/chuyen-phong-gym' },
          { label: 'Thèm Đi Biển', href: '/collections/them-di-bien' },
          { label: 'Couple Goals', href: '/collections/couple-goals' },
          { label: 'Love Bites', href: '/collections/love-bites' },
          { label: 'Đũy Mèo', href: '/collections/duy-meo' },
          { label: 'Nghề Nghiệp', href: '/collections/nghe-nghiep' },
          { label: 'Rạp Xiếc Động Vật', href: '/collections/rap-xiec-dong-vat' },
          { label: 'Nhả Khói', href: '/collections/nha-khoi' },
          { label: 'Nhâm Nhi', href: '/collections/nham-nhi' },
          { label: 'Trơi Bời', href: '/collections/troi-boi' },
        ],
      },
      {
        items: [
          { label: 'Tuổi Ăn Học', href: '/collections/tuoi-an-hoc' },
          { label: 'Việt Nam Du Hí', href: '/collections/viet-nam-du-hi' },
          { label: 'Tuyệt Đối Điện Ảnh', href: '/collections/tuyet-doi-dien-anh' },
          { label: 'Đời Game Thủ', href: '/collections/doi-game-thu' },
          { label: 'Nghẹo Sĩ', href: '/collections/ngheo-si' },
          { label: 'Đơn Giản Hóa', href: '/collections/don-gian-hoa' },
          { label: 'Văn Hoá Việt Nam', href: '/collections/van-hoa-viet-nam' },
          { label: 'Alpha Best', href: '/collections/alpha-best' },
          { label: 'Băng Đĩa Hải Ngoại', href: '/collections/bang-dia-hai-ngoai' },
          { label: 'Mấy Chuyện Linh Tinh', href: '/collections/may-chuyen-linh-tinh' },
          { label: 'Fruitland', href: '/collections/fruitland' },
          { label: 'Nghỉ Lễ Hết Cỡ', href: '/collections/nghi-le-het-co' },
          { label: 'Luôn Yêu Nước', href: '/collections/luon-yeu-nuoc' },
        ],
      },
    ],
  },
  {
    label: 'ÁO THUN RINGER',
    href: '/collections/ao-thun-ringer',
    dropdown: true,
    items: [
      { label: 'Áo Thun Ringer Job', href: '/collections/ao-thun-ringer-job' },
      { label: 'Áo Thun Ringer Đũy Mèo', href: '/collections/ao-thun-ringer-duy-meo' },
      { label: 'Áo Thun Ringer Lifey Stuff', href: '/collections/ao-thun-ringer-lifey-stuff' },
      { label: 'Áo Thun Ringer Thèm Đi Biển', href: '/collections/ao-thun-ringer-them-di-bien' },
      { label: 'Áo Thun Ringer Pickleball', href: '/collections/ao-thun-ringer-pickleball' },
      { label: 'Áo Thun Ringer Trơi Bời', href: '/collections/ao-thun-ringer-troi-boi' },
      { label: 'Áo Thun Ringer Cầu Lông', href: '/collections/ao-thun-ringer-cau-long' },
      { label: 'Áo Thun Ringer Animal Circus', href: '/collections/ao-thun-ringer-animal-circus' },
      { label: 'Áo Thun Ringer Love Bites', href: '/collections/ao-thun-ringer-love-bites' },
      { label: 'Áo Thun Ringer Văn Hóa Việt Nam', href: '/collections/ao-thun-ringer-van-hoa-viet-nam' },
    ],
  },
  {
    label: 'TÚI CANVAS',
    href: '/collections/tui-tote',
    dropdown: false,
  },
  {
    label: 'ÁO BA LỖ',
    href: '/collections/ao-ba-lo',
    dropdown: true,
    items: [
      { label: 'Áo Ba Lỗ Bóng Đá', href: '/collections/ao-ba-lo-bong-da' },
      { label: 'Áo Ba Lỗ Pickleball', href: '/collections/ao-ba-lo-pickleball' },
      { label: 'Áo Ba Lỗ Chuyện Phòng Gym', href: '/collections/ao-ba-lo-chuyen-phong-gym' },
      { label: 'Áo Ba Lỗ Đũy Mèo', href: '/collections/ao-ba-lo-duy-meo' },
      { label: 'Áo Ba Lỗ Mấy Chuyện Linh Tinh', href: '/collections/ao-ba-lo-may-chuyen-linh-tinh' },
      { label: 'Áo Ba Lỗ Nghề Nghiệp', href: '/collections/ao-ba-lo-nghe-nghiep' },
      { label: 'Áo Ba Lỗ Trơi Bời', href: '/collections/ao-ba-lo-troi-boi' },
      { label: 'Áo Ba Lỗ Fruitland', href: '/collections/ao-ba-lo-fruitland' },
      { label: 'Áo Ba Lỗ Luôn Yêu Nước', href: '/collections/ao-ba-lo-luon-yeu-nuoc' },
      { label: 'Áo Ba Lỗ Love Bites', href: '/collections/ao-ba-lo-love-bites' },
      { label: 'Áo Ba Lỗ Nhả Khói', href: '/collections/ao-ba-lo-nha-khoi' },
      { label: 'Áo Ba Lỗ Nhâm Nhi', href: '/collections/ao-ba-lo-nham-nhi' },
      { label: 'Áo Ba Lỗ Đời Game Thủ', href: '/collections/ao-ba-lo-doi-game-thu' },
    ],
  },
  {
    label: 'ÁO THUN DÀI TAY',
    href: '/collections/ao-thun-dai-tay',
    dropdown: true,
    items: [
      { label: 'Nghỉ Lễ Hết Cỡ', href: '/collections/nghi-le-het-co' },
      { label: 'Tuyệt Đối Điện Ảnh', href: '/collections/tuyet-doi-dien-anh' },
      { label: 'Đời Game Thủ', href: '/collections/doi-game-thu' },
      { label: 'Nghề Nghiệp', href: '/collections/nghe-nghiep' },
      { label: 'Rạp Xiếc Động Vật', href: '/collections/rap-xiec-dong-vat' },
      { label: 'Mấy Chuyện Linh Tinh', href: '/collections/may-chuyen-linh-tinh' },
      { label: 'Fruitland', href: '/collections/fruitland' },
      { label: 'Đuỹ Mèo', href: '/collections/duy-meo' },
      { label: 'Văn Hóa Việt Nam', href: '/collections/van-hoa-viet-nam' },
      { label: 'Trơi Bời', href: '/collections/troi-boi' },
      { label: 'Việt Nam Du Hí', href: '/collections/viet-nam-du-hi' },
    ],
  },
  {
    label: 'ÁO SWEATER',
    href: '/collections/ao-sweater',
    dropdown: true,
    items: [
      { label: 'Nghỉ Lễ Hết Cỡ', href: '/collections/nghi-le-het-co' },
      { label: 'Đời Game Thủ', href: '/collections/doi-game-thu' },
      { label: 'Nghề Nghiệp', href: '/collections/nghe-nghiep' },
      { label: 'Tuyệt Đối Điện Ảnh', href: '/collections/tuyet-doi-dien-anh' },
      { label: 'Đũy Mèo', href: '/collections/duy-meo' },
      { label: 'Fruitland', href: '/collections/fruitland' },
      { label: 'Trơi Bời', href: '/collections/troi-boi' },
      { label: 'Văn Hóa Việt Nam', href: '/collections/van-hoa-viet-nam' },
      { label: 'Băng Đĩa Hải Ngoại', href: '/collections/bang-dia-hai-ngoai' },
      { label: 'Mấy Chuyện Linh Tinh', href: '/collections/may-chuyen-linh-tinh' },
      { label: 'Love Bites', href: '/collections/love-bites' },
      { label: 'Rạp Xiếc Động Vật', href: '/collections/rap-xiec-dong-vat' },
    ],
  },
  {
    label: 'ÁO HOODIE',
    href: '/collections/ao-hoodie',
    dropdown: true,
    items: [
      { label: 'Nghỉ Lễ Hết Cỡ', href: '/collections/nghi-le-het-co' },
      { label: 'Nghề Nghiệp', href: '/collections/nghe-nghiep' },
      { label: 'Đời Game Thủ', href: '/collections/doi-game-thu' },
      { label: 'Tuyệt Đối Điện Ảnh', href: '/collections/tuyet-doi-dien-anh' },
      { label: 'Đũy Mèo', href: '/collections/duy-meo' },
      { label: 'Fruitland', href: '/collections/fruitland' },
      { label: 'Trơi Bời', href: '/collections/troi-boi' },
      { label: 'Văn Hóa Việt Nam', href: '/collections/van-hoa-viet-nam' },
      { label: 'Băng Đĩa Hải Ngoại', href: '/collections/bang-dia-hai-ngoai' },
      { label: 'Mấy Chuyện Linh Tinh', href: '/collections/may-chuyen-linh-tinh' },
      { label: 'Love Bites', href: '/collections/love-bites' },
      { label: 'Rạp Xiếc Động Vật', href: '/collections/rap-xiec-dong-vat' },
    ],
  },
  {
    label: 'QUẦN JOOGER & QUẦN ỐNG SUÔNG',
    href: '/collections/quan-jogger-quan-ong-suong',
    dropdown: false,
  },
  {
    label: 'SOFT ROUTINE',
    href: '/collections/soft-routine',
    dropdown: false,
  },
];

function DropdownContent({ item }) {
  if (item.columns) {
    return (
      <div className="mega-menu-content">
        <div className="mega-menu-columns">
          {item.columns.map((col, ci) => (
            <div key={ci} className="mega-menu-col">
              {col.heading && <span className="mega-menu-heading">{col.heading}</span>}
              {col.items.map((sub, si) => (
                <a key={si} href={sub.href} className="mega-menu-link">{sub.label}</a>
              ))}
            </div>
          ))}
        </div>
      </div>
    );
  }
  if (item.items) {
    return (
      <div className="mega-menu-content mega-menu-content--simple">
        {item.items.map((sub, si) => (
          <a key={si} href={sub.href} className="mega-menu-link">{sub.label}</a>
        ))}
      </div>
    );
  }
  return null;
}

function MobileSubmenu({ item, onBack }) {
  const [subOpen, setSubOpen] = useState(null);

  const allItems = [];
  if (item.columns) {
    item.columns.forEach(col => {
      if (col.heading) allItems.push({ label: col.heading, heading: true });
      col.items.forEach(i => allItems.push(i));
    });
  } else if (item.items) {
    item.items.forEach(i => allItems.push(i));
  }

  return (
    <div className="mobile-submenu">
      <button className="mobile-submenu-back" onClick={onBack}>
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
          <line x1="19" y1="12" x2="5" y2="12" />
          <polyline points="12 19 5 12 12 5" />
        </svg>
        {item.label}
      </button>
      <div className="mobile-submenu-list">
        {allItems.map((sub, si) => (
          sub.heading ? (
            <span key={si} className="mobile-submenu-heading">{sub.label}</span>
          ) : (
            <a key={si} href={sub.href} className="mobile-submenu-link">{sub.label}</a>
          )
        ))}
      </div>
    </div>
  );
}

export default function Header() {
  const [menuOpen, setMenuOpen] = useState(false);
  const [activeDropdown, setActiveDropdown] = useState(null);
  const [mobileSubmenu, setMobileSubmenu] = useState(null);
  const [hoverTimeout, setHoverTimeout] = useState(null);

  const handleMouseEnter = (index) => {
    if (hoverTimeout) clearTimeout(hoverTimeout);
    setActiveDropdown(index);
  };

  const handleMouseLeave = () => {
    const t = setTimeout(() => {
      setActiveDropdown(null);
    }, 200);
    setHoverTimeout(t);
  };

  const openMobileSubmenu = (item) => {
    setMobileSubmenu(item);
  };

  const closeMobileSubmenu = () => {
    setMobileSubmenu(null);
  };

  return (
    <>
      <header className="header">
        <div className="header-top">
          <div className="header-left">
            <button className="header-icon" aria-label="Search">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
              </svg>
            </button>
            <button className="header-icon header-menu-line" aria-label="Menu" onClick={() => { setMenuOpen(true); setMobileSubmenu(null); }}>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="18" x2="21" y2="18" />
              </svg>
            </button>
          </div>

          <div className="header-logo">
            <a href="/">
              <img
                src="/images/Luon_Vuituoi_Bold_Den_Newa7e9.png"
                alt="Xưởng May Nhà Công"
                width="180"
                height="auto"
                className="header-logo-img"
              />
            </a>
          </div>

          <div className="header-right">
            <button className="header-icon" aria-label="User">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
              </svg>
            </button>
            <button className="header-icon" aria-label="Cart">
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
            {menuData.map((item, index) => (
              <div
                key={index}
                className={`header-nav-item${item.dropdown ? ' has-dropdown' : ''}${activeDropdown === index ? ' dropdown-open' : ''}`}
                onMouseEnter={() => handleMouseEnter(index)}
                onMouseLeave={handleMouseLeave}
              >
                <a href={item.href} className="header-nav-link">
                  {item.label}
                  {item.dropdown && (
                    <svg className="nav-arrow" width="8" height="5" viewBox="0 0 8 5" fill="none">
                      <path d="M1 1l3 3 3-3" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round" />
                    </svg>
                  )}
                </a>
                {item.dropdown && activeDropdown === index && (
                  <div className="mega-menu" onMouseEnter={() => { if (hoverTimeout) clearTimeout(hoverTimeout); setActiveDropdown(index); }} onMouseLeave={handleMouseLeave}>
                    <DropdownContent item={item} />
                  </div>
                )}
              </div>
            ))}
          </nav>
        </div>
      </header>

      {/* Mobile Menu Drawer */}
      <div className={`mobile-menu${menuOpen ? ' open' : ''}`}>
        <div className="mobile-menu-header">
          <div className="header-logo">
            <a href="/">
              <img
                src="/images/Luon_Vuituoi_Bold_Den_Newa7e9.png"
                alt="Xưởng May Nhà Công"
                width="140"
                height="auto"
                className="header-logo-img"
              />
            </a>
          </div>
          <button className="mobile-menu-close" onClick={() => { setMenuOpen(false); setMobileSubmenu(null); }} aria-label="Close">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              <line x1="18" y1="6" x2="6" y2="18" />
              <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
          </button>
        </div>

        {mobileSubmenu ? (
          <MobileSubmenu item={mobileSubmenu} onBack={closeMobileSubmenu} />
        ) : (
          <nav className="mobile-menu-nav">
            {menuData.map((item, index) => (
              <div key={index} className="mobile-menu-item">
                {item.dropdown ? (
                  <button className="mobile-menu-link mobile-menu-link--with-sub" onClick={() => openMobileSubmenu(item)}>
                    {item.label}
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                      <polyline points="9 18 15 12 9 6" />
                    </svg>
                  </button>
                ) : (
                  <a href={item.href} className="mobile-menu-link" onClick={() => setMenuOpen(false)}>
                    {item.label}
                  </a>
                )}
              </div>
            ))}
            <div className="mobile-menu-footer">
              <a href="/account/login" className="mobile-menu-link">Đăng nhập</a>
              <a href="/account/register" className="mobile-menu-link">Đăng ký</a>
            </div>
          </nav>
        )}
      </div>

      {/* Overlay */}
      <div className={`mobile-overlay${menuOpen ? ' open' : ''}`} onClick={() => { setMenuOpen(false); setMobileSubmenu(null); }} />
    </>
  );
}
