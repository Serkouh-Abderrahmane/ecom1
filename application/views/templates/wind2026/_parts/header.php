<!DOCTYPE html>
<html lang="<?= MY_LANGUAGE_ABBR ?>">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0" />
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
</head>
<body>
    <div id="wrapper">
        <div id="content">

        <div class="m-announcement-bar">
            <div class="m-announcement-bar__content">MIỄN PHÍ VẬN CHUYỂN CHO ĐƠN HÀNG TRÊN 500.000₫</div>
        </div>

        <header class="m-header__desktop">
            <div class="m-header__desktop-inner">
                <div class="m-header__left">
                    <a href="<?= base_url() ?>" class="m-logo">
                        <img class="m-logo__image" src="<?= base_url('assets/imgs/logo.png') ?>" alt="XƯỞNG MAY NHÀ CÔNG">
                    </a>
                </div>

                <div class="m-header__center">
                    <ul class="m-menu">
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

                <div class="m-header__icons">
                    <a href="#" class="m-icon" id="search-toggle">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                    </a>
                    <a href="<?= LANG_URL . '/login' ?>" class="m-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 21v-1a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v1"/></svg>
                    </a>
                    <a href="<?= LANG_URL . '/shopping-cart' ?>" class="m-icon m-cart-icon-bubble">
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
                    <button type="button" id="search-close" class="m-drawer__close" style="font-size:18px;color:rgb(var(--color-foreground-secondary))">&times;</button>
                </div>
            </div>
        </header>

        <div class="m-drawer__wrapper" id="mobile-menu">
            <div class="m-drawer__content">
                <div class="m-drawer__header">
                    <img src="<?= base_url('assets/imgs/logo.png') ?>" alt="XƯỞNG MAY NHÀ CÔNG" style="height:32px;width:auto">
                    <button type="button" class="m-drawer__close" id="mobile-menu-close">&times;</button>
                </div>
                <div class="m-drawer__body">
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
                        <li style="border-top:1px solid rgb(var(--color-border));margin-top:8px;padding-top:8px"><a href="<?= LANG_URL . '/login' ?>">Đăng nhập</a></li>
                        <li><a href="<?= LANG_URL . '/register' ?>">Đăng ký</a></li>
                        <li><a href="<?= LANG_URL . '/shopping-cart' ?>">Giỏ hàng</a></li>
                        <li><a href="<?= LANG_URL . '/contacts' ?>">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
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
