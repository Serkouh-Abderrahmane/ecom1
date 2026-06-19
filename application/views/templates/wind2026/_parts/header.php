<!DOCTYPE html>
<html lang="<?= MY_LANGUAGE_ABBR ?>">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?= htmlspecialchars($description ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="keywords" content="<?= htmlspecialchars($keywords ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta property="og:title" content="<?= htmlspecialchars($title ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta property="og:description" content="<?= htmlspecialchars($description ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta property="og:url" content="<?= LANG_URL ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?= isset($image) && !is_null($image) ? $image : base_url('assets/img/site-overview.png') ?>" />
    <title><?= htmlspecialchars($title ?? '', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/imgs/logo.png') ?>" />
    <link rel="apple-touch-icon" href="<?= base_url('assets/imgs/logo.png') ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>" />
    <link href="<?= base_url('assets/css/minimog.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('templatecss/custom.css') ?>" rel="stylesheet" />
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('loadlanguage/all.js') ?>"></script>
    <?php if ($cookieLaw != false) { ?>
        <script type="text/javascript">
            window.cookieconsent_options = {"message": "<?= $cookieLaw['message'] ?>", "dismiss": "<?= $cookieLaw['button_text'] ?>", "learnMore": "<?= $cookieLaw['learn_more'] ?>", "link": "<?= $cookieLaw['link'] ?>", "theme": "<?= $cookieLaw['theme'] ?>"};
        </script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
    <?php } ?>
    <style>
        .topbar { background: #000; color: #fff; text-align: center; font-size: 13px; padding: 8px 20px; letter-spacing: 0.5px; }
        .m-site-header { position: sticky; top: 0; z-index: 100; background: #fff; border-bottom: 1px solid #eee; }
        .m-header-inner { display: flex; align-items: center; justify-content: space-between; height: 70px; max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .m-header-left { flex: 0 0 auto; }
        .m-header-center { flex: 1; display: flex; justify-content: center; }
        .m-header-right { flex: 0 0 auto; display: flex; align-items: center; gap: 4px; }
        .m-logo img { height: 40px; width: auto; display: block; }
        .m-nav { display: flex; gap: 0; list-style: none; margin: 0; padding: 0; }
        .m-nav > li { position: relative; }
        .m-nav > li > a { display: block; padding: 10px 16px; font-size: 15px; font-weight: 500; color: #262626; letter-spacing: 0.3px; text-decoration: none; transition: color 0.2s; }
        .m-nav > li > a:hover { color: #000; }
        .m-nav > li:hover .m-mega { display: block; }
        .m-mega { display: none; position: absolute; top: 100%; left: 50%; transform: translateX(-50%); background: #fff; border: 1px solid #eee; border-top: 2px solid #000; padding: 30px; min-width: 200px; z-index: 200; box-shadow: 0 10px 40px rgba(0,0,0,0.08); white-space: nowrap; }
        .m-mega a { display: block; padding: 6px 0; font-size: 15px; color: #666; text-decoration: none; transition: color 0.2s; }
        .m-mega a:hover { color: #000; }
        .m-icon { width: 44px; height: 44px; display: inline-flex; align-items: center; justify-content: center; color: #262626; text-decoration: none; position: relative; }
        .m-icon:hover { color: #000; }
        .m-icon svg { width: 22px; height: 22px; }
        .m-cart-count { position: absolute; top: 4px; right: 2px; background: #da3f3f; color: #fff; font-size: 10px; font-weight: 600; min-width: 18px; height: 18px; border-radius: 9px; display: flex; align-items: center; justify-content: center; }
        .m-mobile-toggle { display: none; width: 44px; height: 44px; align-items: center; justify-content: center; cursor: pointer; background: none; border: none; color: #262626; }
        .m-mobile-toggle svg { width: 24px; height: 24px; }
        @media (max-width: 768px) {
            .m-nav, .m-header-center { display: none; }
            .m-mobile-toggle { display: flex; }
            .m-header-inner { height: 56px; }
            .m-logo img { height: 32px; }
        }
        .m-mobile-menu { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #fff; z-index: 200; overflow-y: auto; }
        .m-mobile-menu.active { display: block; }
        .m-mobile-header { display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; border-bottom: 1px solid #eee; }
        .m-mobile-close { width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; cursor: pointer; background: none; border: none; font-size: 24px; color: #262626; }
        .m-mobile-nav { padding: 0 20px; }
        .m-mobile-nav li { border-bottom: 1px solid #eee; }
        .m-mobile-nav li a { display: block; padding: 14px 0; font-size: 16px; font-weight: 500; color: #262626; text-decoration: none; }
        .m-search-bar { display: none; border-top: 1px solid #eee; background: #fff; }
        .m-search-bar.active { display: block; }
        .m-search-inner { max-width: 1200px; margin: 0 auto; padding: 16px 20px; display: flex; gap: 8px; }
        .m-search-input { flex: 1; border: 1px solid #eee; border-radius: 5px; padding: 10px 16px; font-size: 15px; font-family: 'Jost', sans-serif; outline: none; }
        .m-search-input:focus { border-color: #000; }
        .m-search-btn { background: #000; color: #fff; border: none; border-radius: 5px; padding: 10px 20px; font-size: 15px; font-weight: 600; cursor: pointer; }
    </style>
</head>
<body>
    <div id="wrapper">
        <div id="content">

        <div class="topbar">MIỄN PHÍ VẬN CHUYỂN CHO ĐƠN HÀNG TRÊN 500.000₫</div>

        <header class="m-site-header">
            <div class="m-header-inner">
                <div class="m-header-left">
                    <a href="<?= base_url() ?>" class="m-logo">
                        <img src="<?= base_url('assets/imgs/logo.png') ?>" alt="XƯỞNG MAY NHÀ CÔNG">
                    </a>
                </div>

                <div class="m-header-center">
                    <ul class="m-nav">
                        <li><a href="<?= LANG_URL ?>">TRANG CHỦ</a></li>
                        <li>
                            <a href="<?= LANG_URL ?>/shop?category=1">ÁO THUN RELAXED FIT</a>
                            <div class="m-mega">
                                <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Thể Thao">Thể Thao</a>
                                <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Chuyện Phòng Gym">Chuyện Phòng Gym</a>
                                <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Thèm Đi Biển">Thèm Đi Biển</a>
                                <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Love Bites">Love Bites</a>
                                <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Nghề Nghiệp">Nghề Nghiệp</a>
                                <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Trơi Bời">Trơi Bời</a>
                            </div>
                        </li>
                        <li>
                            <a href="<?= LANG_URL ?>/shop?category=2">ÁO THUN RINGER</a>
                            <div class="m-mega">
                                <a href="<?= LANG_URL ?>/shop?category=2&subcategory=Áo Thun Ringer Job">Áo Thun Ringer Job</a>
                                <a href="<?= LANG_URL ?>/shop?category=2&subcategory=Áo Thun Ringer Đũy Mèo">Áo Thun Ringer Đũy Mèo</a>
                                <a href="<?= LANG_URL ?>/shop?category=2&subcategory=Áo Thun Ringer Pickleball">Áo Thun Ringer Pickleball</a>
                                <a href="<?= LANG_URL ?>/shop?category=2&subcategory=Áo Thun Ringer Love Bites">Áo Thun Ringer Love Bites</a>
                            </div>
                        </li>
                        <li><a href="<?= LANG_URL ?>/shop?category=3">TÚI CANVAS</a></li>
                        <li>
                            <a href="<?= LANG_URL ?>/shop?category=4">ÁO BA LỖ</a>
                            <div class="m-mega">
                                <a href="<?= LANG_URL ?>/shop?category=4&subcategory=Áo Ba Lỗ Bóng Đá">Áo Ba Lỗ Bóng Đá</a>
                                <a href="<?= LANG_URL ?>/shop?category=4&subcategory=Áo Ba Lỗ Pickleball">Áo Ba Lỗ Pickleball</a>
                                <a href="<?= LANG_URL ?>/shop?category=4&subcategory=Áo Ba Lỗ Đũy Mèo">Áo Ba Lỗ Đũy Mèo</a>
                                <a href="<?= LANG_URL ?>/shop?category=4&subcategory=Áo Ba Lỗ Love Bites">Áo Ba Lỗ Love Bites</a>
                                <a href="<?= LANG_URL ?>/shop?category=4&subcategory=Áo Ba Lỗ Fruitland">Áo Ba Lỗ Fruitland</a>
                            </div>
                        </li>
                        <li>
                            <a href="<?= LANG_URL ?>/shop?category=5">ÁO THUN DÀI TAY</a>
                            <div class="m-mega">
                                <a href="<?= LANG_URL ?>/shop?category=5&subcategory=Nghỉ Lễ Hết Cỡ">Nghỉ Lễ Hết Cỡ</a>
                                <a href="<?= LANG_URL ?>/shop?category=5&subcategory=Đời Game Thủ">Đời Game Thủ</a>
                                <a href="<?= LANG_URL ?>/shop?category=5&subcategory=Nghề Nghiệp">Nghề Nghiệp</a>
                                <a href="<?= LANG_URL ?>/shop?category=5&subcategory=Việt Nam Du Hí">Việt Nam Du Hí</a>
                            </div>
                        </li>
                        <li><a href="<?= LANG_URL ?>/shop?category=6">ÁO SWEATER</a></li>
                        <li><a href="<?= LANG_URL ?>/shop?category=7">ÁO HOODIE</a></li>
                        <li><a href="<?= LANG_URL ?>/shop?category=8">QUẦN</a></li>
                    </ul>
                </div>

                <div class="m-header-right">
                    <a href="#" class="m-icon" id="search-toggle">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                    </a>
                    <a href="<?= LANG_URL . '/login' ?>" class="m-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 21v-1a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v1"/></svg>
                    </a>
                    <a href="<?= LANG_URL . '/shopping-cart' ?>" class="m-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                        <?php $itemsCount = isset($sumOfItems) ? (int)$sumOfItems : 0; if ($itemsCount > 0) { ?>
                            <span class="m-cart-count sumOfItems"><?= $itemsCount ?></span>
                        <?php } ?>
                    </a>
                    <button type="button" class="m-mobile-toggle" id="mobile-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                    </button>
                </div>
            </div>

            <div class="m-search-bar" id="search-bar">
                <div class="m-search-inner">
                    <form method="GET" action="<?= LANG_URL ?>" id="bigger-search" style="display:flex;gap:8px;width:100%">
                        <input type="text" value="<?= isset($_GET['search_in_title']) ? htmlspecialchars($_GET['search_in_title']) : '' ?>" name="search_in_title" class="m-search-input" placeholder="Tìm kiếm sản phẩm...">
                        <button type="submit" class="m-search-btn"><i class="fa fa-search"></i></button>
                    </form>
                    <button type="button" id="search-close" style="background:none;border:none;cursor:pointer;padding:8px;color:#999;font-size:18px">&times;</button>
                </div>
            </div>
        </header>

        <div class="m-mobile-menu" id="mobile-menu">
            <div class="m-mobile-header">
                <img src="<?= base_url('assets/imgs/logo.png') ?>" alt="XƯỞNG MAY NHÀ CÔNG" style="height:32px;width:auto">
                <button type="button" class="m-mobile-close" id="mobile-menu-close">&times;</button>
            </div>
            <ul class="m-mobile-nav">
                <li><a href="<?= LANG_URL ?>">TRANG CHỦ</a></li>
                <li><a href="<?= LANG_URL ?>/shop?category=1">ÁO THUN RELAXED FIT</a></li>
                <li><a href="<?= LANG_URL ?>/shop?category=2">ÁO THUN RINGER</a></li>
                <li><a href="<?= LANG_URL ?>/shop?category=3">TÚI CANVAS</a></li>
                <li><a href="<?= LANG_URL ?>/shop?category=4">ÁO BA LỖ</a></li>
                <li><a href="<?= LANG_URL ?>/shop?category=5">ÁO THUN DÀI TAY</a></li>
                <li><a href="<?= LANG_URL ?>/shop?category=6">ÁO SWEATER</a></li>
                <li><a href="<?= LANG_URL ?>/shop?category=7">ÁO HOODIE</a></li>
                <li><a href="<?= LANG_URL ?>/shop?category=8">QUẦN</a></li>
                <li style="border-top:1px solid #eee;margin-top:8px;padding-top:8px"><a href="<?= LANG_URL . '/login' ?>">Đăng nhập</a></li>
                <li><a href="<?= LANG_URL . '/register' ?>">Đăng ký</a></li>
                <li><a href="<?= LANG_URL . '/shopping-cart' ?>">Giỏ hàng</a></li>
                <li><a href="<?= LANG_URL . '/contacts' ?>">Liên hệ</a></li>
            </ul>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var menuBtn = document.getElementById('mobile-menu-btn');
            var menuClose = document.getElementById('mobile-menu-close');
            var mobileMenu = document.getElementById('mobile-menu');
            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', function() { mobileMenu.classList.add('active'); });
            }
            if (menuClose && mobileMenu) {
                menuClose.addEventListener('click', function() { mobileMenu.classList.remove('active'); });
            }
            var searchToggle = document.getElementById('search-toggle');
            var searchBar = document.getElementById('search-bar');
            var searchClose = document.getElementById('search-close');
            if (searchToggle && searchBar) {
                searchToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    searchBar.classList.toggle('active');
                });
            }
            if (searchClose && searchBar) {
                searchClose.addEventListener('click', function() { searchBar.classList.remove('active'); });
            }
        });
        </script>
