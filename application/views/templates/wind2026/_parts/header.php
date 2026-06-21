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
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/Luon_Vuituoi_Bold_Den_New.png') ?>" />
    <link rel="apple-touch-icon" href="<?= base_url('assets/images/Luon_Vuituoi_Bold_Den_New.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>" />
    <link href="<?= base_url('cdn/shop/t/4/assets/main0718.css') ?>" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= base_url('cdn/shop/t/4/assets/cart9e89.css') ?>" media="print" onload="this.media='all'">
    <noscript><link href="<?= base_url('cdn/shop/t/4/assets/cart9e89.css') ?>" rel="stylesheet" type="text/css" media="all" /></noscript>
    <link href="<?= base_url('cdn/shop/t/4/assets/vendor8d82.css') ?>" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= base_url('cdn/shop/t/4/assets/custom-styled8d7.css') ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="<?= base_url('cdn/shop/t/4/assets/custom72f8.css') ?>" media="print" onload="this.media='all'">
    <noscript><link href="<?= base_url('cdn/shop/t/4/assets/custom-styled8d7.css') ?>" rel="stylesheet" type="text/css" media="all" /></noscript>
    <noscript><link href="<?= base_url('cdn/shop/t/4/assets/custom72f8.css') ?>" rel="stylesheet" type="text/css" media="all" /></noscript>
    <style data-shopify>
      :root,.m-color-default { --color-background: 255,255,255; --color-background-secondary: 245,245,245; --gradient-background: #ffffff; --color-foreground: 38,38,38; --color-foreground-secondary: 43,43,43; --color-heading: 34,34,34; --color-button: 0,0,0; --color-button-text: 255,255,255; --color-outline-button: 0,0,0; --color-button-hover: 34, 34, 34; --color-button-text-hover: 255, 255, 255; --color-border: 238,238,238; --color-price-sale: 232,78,78; --color-price-regular: 0,0,0; --color-form-field: 255,255,255; --color-form-field-text: 0,0,0; --color-tooltip: 34,34,34; --color-tooltip-text: 255,255,255; }
      .m-color-dark { --color-background: 0,0,0; --color-background-secondary: 245,245,245; --gradient-background: #000000; --color-foreground: 255,255,255; --color-foreground-secondary: 255,255,255; --color-heading: 255,255,255; --color-button: 255,255,255; --color-button-text: 34,34,34; --color-outline-button: 255,255,255; --color-button-hover: 255, 255, 255; --color-button-text-hover: 34, 34, 34; --color-border: 75,75,75; --color-price-sale: 232,78,78; --color-price-regular: 255,255,255; --color-form-field: 255,255,255; --color-form-field-text: 34,34,34; --color-tooltip: 255,255,255; --color-tooltip-text: 34,34,34; }
      .m-color-footer { --color-background: 245,245,245; --color-background-secondary: 245,245,245; --gradient-background: #f5f5f5; --color-foreground: 0,0,0; --color-foreground-secondary: 102,102,102; --color-heading: 34,34,34; --color-button: 34,34,34; --color-button-text: 255,255,255; --color-outline-button: 34,34,34; --color-button-hover: 34, 34, 34; --color-button-text-hover: 255, 255, 255; --color-border: 222,222,222; --color-price-sale: 232,78,78; --color-price-regular: 0,0,0; --color-form-field: 255,255,255; --color-form-field-text: 0,0,0; --color-tooltip: 34,34,34; --color-tooltip-text: 255,255,255; }
      .m-color-badge-hot { --color-background: 154,132,200; --color-background-secondary: 245,245,245; --gradient-background: #9a84c8; --color-foreground: 255,255,255; --color-foreground-secondary: 255,255,255; --color-heading: 255,255,255; --color-button: 255,255,255; --color-button-text: 34,34,34; --color-outline-button: 255,255,255; --color-button-hover: 255, 255, 255; --color-button-text-hover: 34, 34, 34; --color-border: 222,222,222; --color-price-sale: 255,255,255; --color-price-regular: 255,255,255; --color-form-field: 255,255,255; --color-form-field-text: 0,0,0; --color-tooltip: 255,255,255; --color-tooltip-text: 34,34,34; }
      .m-color-badge-new { --color-background: 73,165,148; --color-background-secondary: 245,245,245; --gradient-background: #49a594; --color-foreground: 255,255,255; --color-foreground-secondary: 255,255,255; --color-heading: 255,255,255; --color-button: 255,255,255; --color-button-text: 34,34,34; --color-outline-button: 255,255,255; --color-button-hover: 255, 255, 255; --color-button-text-hover: 34, 34, 34; --color-border: 222,222,222; --color-price-sale: 255,255,255; --color-price-regular: 255,255,255; --color-form-field: 255,255,255; --color-form-field-text: 0,0,0; --color-tooltip: 255,255,255; --color-tooltip-text: 34,34,34; }
      .m-color-badge-sale { --color-background: 218,63,63; --color-background-secondary: 245,245,245; --gradient-background: #da3f3f; --color-foreground: 255,255,255; --color-foreground-secondary: 255,255,255; --color-heading: 255,255,255; --color-button: 255,255,255; --color-button-text: 34,34,34; --color-outline-button: 255,255,255; --color-button-hover: 255, 255, 255; --color-button-text-hover: 34, 34, 34; --color-border: 222,222,222; --color-price-sale: 255,255,255; --color-price-regular: 255,255,255; --color-form-field: 255,255,255; --color-form-field-text: 0,0,0; --color-tooltip: 255,255,255; --color-tooltip-text: 34,34,34; }
      .m-color-default, .m-color-dark, .m-color-footer, .m-color-badge-hot, .m-color-badge-new, .m-color-badge-sale { color: rgb(var(--color-foreground)); background-color: rgb(var(--color-background)); }
      :root { --m-duration-short: .1s; --m-duration-default: .25s; --m-duration-long: .5s; --m-duration-image: .65s; --m-duration-animate: 1s; --m-animation-duration: 600ms; --base-line-height: 28; --inputs-border-width: 1px; --inputs-radius: 5px; --btn-letter-spacing: 0px; --btn-border-radius: 5px; --btn-border-width: 1px; --btn-line-height: 23px; --color-cart-wishlist-count: #ffffff; --bg-cart-wishlist-count: #da3f3f; --color-image-overlay: #000000; --opacity-image-overlay: 0.2; --color-success: 58,135,53; --color-warning: 210,134,26; --color-error: 218, 63, 63; --color-error-bg: #fbeaea; --color-warning-bg: #faecd7; --color-success-bg: #d1eccf; --text-black: 0,0,0; --text-white: 255,255,255; --bg-black: 0,0,0; --bg-white: 255,255,255; --rounded-full: 9999px; --bg-card-placeholder: rgba(243,243,243,1); --arrow-select-box: url(cdn/shop/t/4/assets/ar-down8413.svg?v=92728264558441377851740233661); --font-base-size: 16; --font-btn-size: 16px; --font-btn-weight: 500; }
    </style>
    <script>window.MinimogTheme = {};window.MinimogLibs = {};</script>
    <script>
      window.MinimogStrings = {
        addToCart: "Thêm vào giỏ hàng", soldOut: "Bán hết", unavailable: "Không có sẵn",
        inStock: "Trong kho", lowStock: 'Sắp hết hàng',
        checkout: "Thanh toán", viewCart: "Xem giỏ hàng", cartRemove: "Xóa",
        itemAdded: "Sản phẩm được thêm vào giỏ hàng thành công",
        cartError: "Đã xảy ra lỗi khi cập nhật giỏ hàng của bạn. Vui lòng thử lại.",
        selectVariant: "Vui lòng chọn một mẫu mã trước khi thêm sản phẩm vào giỏ hàng của bạn."
      };
    </script>
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('loadlanguage/all.js') ?>"></script>
    <script src="<?= base_url('cdn/shop/t/4/assets/vendor36d2.js') ?>" defer="defer"></script>
    <script src="<?= base_url('cdn/shop/t/4/assets/theme-globalc2d1.js') ?>" defer="defer"></script>
    <script src="<?= base_url('cdn/shop/t/4/assets/product-list98d8.js') ?>" defer="defer"></script>
    <script src="<?= base_url('cdn/shop/t/4/assets/animationsb005.js') ?>" defer="defer"></script>
    <?php if ($cookieLaw != false) { ?>
        <script type="text/javascript">
            window.cookieconsent_options = {"message": "<?= $cookieLaw['message'] ?>", "dismiss": "<?= $cookieLaw['button_text'] ?>", "learnMore": "<?= $cookieLaw['learn_more'] ?>", "link": "<?= $cookieLaw['link'] ?>", "theme": "<?= $cookieLaw['theme'] ?>"};
        </script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
    <?php } ?>
</head>
<body class="<?= (($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') && $this->uri->segment(2) == '') ? 'template-index' : '' ?>">
    <div id="wrapper">
        <div id="content">

        <div class="m-announcement-bar">
            <div class="m-announcement-bar__content">MIỄN PHÍ VẬN CHUYỂN CHO ĐƠN HÀNG TRÊN 500.000₫</div>
        </div>

        <link href="<?= base_url('assets/css/theme/header.css') ?>" rel="stylesheet" type="text/css" media="all" />
        <m-header data-section-type="header" class="m-header m:block" data-transparent="false" data-sticky="always">
            <div class="m-header__wrapper">
                <header class="m-header__mobile container-fluid m:flex m:items-center m-gradient m-color-default" data-screen="m-header__mobile" data-transparent="false">
                    <span class="m-menu-button m:flex m:flex-1 m:w-3/12">
                        <div class="m-hamburger-box">
                            <div class="m-hamburger-box__inner"></div>
                        </div>
                    </span>

                    <div class="m-logo m-logo--mobile m:justify-center m:w-6/12 m-logo--has-image">
                        <a href="<?= base_url() ?>" class="m-logo__image m:block" title="XƯỞNG MAY NHÀ CÔNG">
                            <div class="m-logo__image-default m:display-flex m-image" style="--aspect-ratio: 9.09;--aspect-ratio-mobile: 9.09">
                                <img src="<?= base_url('assets/images/Luon_Vuituoi_Bold_Den_New.png') ?>" alt="XƯỞNG MAY NHÀ CÔNG" class="m:inline-block">
                            </div>
                        </a>
                    </div>

                    <div class="m-header__mobile-right m:w-3/12 m:flex m:flex-1 m:justify-end">
                        <m-search-popup class="m:flex m:justify-center m:items-center" data-open-search-popup="">
                            <span class="m-header__search-icon">
                                <svg class="m-svg-icon--medium" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"></path>
                                </svg>
                            </span>
                        </m-search-popup>
                        <a href="<?= LANG_URL . '/shopping-cart' ?>" class="m-cart-icon-bubble" aria-label="0" role="button">
                            <span class="m-tooltip m:block m-tooltip--bottom m-tooltip--style-2">
                                <svg class="m-svg-icon--medium" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path d="M352 128C352 57.42 294.579 0 224 0 153.42 0 96 57.42 96 128H0v304c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V128h-96zM224 48c44.112 0 80 35.888 80 80H144c0-44.112 35.888-80 80-80zm176 384c0 17.645-14.355 32-32 32H80c-17.645 0-32-14.355-32-32V176h48v40c0 13.255 10.745 24 24 24s24-10.745 24-24v-40h160v40c0 13.255 10.745 24 24 24s24-10.745 24-24v-40h48v256z"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </header>

                <header class="m-header__desktop m-gradient m-color-default" data-screen="m-header__desktop" data-transparent="false">
                    <div class="m-header__top">
                        <div class="m-header__container">
                            <div class="m-header__left m:w-4/12">
                                <m-search-popup class="m:flex m:items-center" data-open-search-popup="">
                                    <span class="m-header__search-icon">
                                        <svg class="m-svg-icon--medium" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"></path>
                                        </svg>
                                    </span>
                                </m-search-popup>
                            </div>

                            <div class="m-header__center m:w-4/12">
                                <div class="m-logo m-logo--desktop m-logo--has-image">
                                    <a href="<?= base_url() ?>" class="m-logo__image m:block" title="XƯỞNG MAY NHÀ CÔNG">
                                        <div class="m-logo__image-default m-image">
                                            <img src="<?= base_url('assets/images/Luon_Vuituoi_Bold_Den_New.png') ?>" alt="XƯỞNG MAY NHÀ CÔNG" width="180" height="20" style="--aspect-ratio: 9.09;">
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="m-header__right m:w-4/12">
                                <div class="m-header__icons-wrapper">
                                    <a href="<?= LANG_URL . '/login' ?>" class="m-header__icon">
                                        <span class="m-tooltip m:block m-tooltip--bottom m-tooltip--style-2">
                                            <svg class="m-svg-icon--medium" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="<?= LANG_URL . '/shopping-cart' ?>" class="m-header__icon m-cart-icon-bubble" aria-label="0">
                                        <span class="m-tooltip m:block m-tooltip--bottom m-tooltip--style-2">
                                            <svg class="m-svg-icon--medium" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <path d="M352 128C352 57.42 294.579 0 224 0 153.42 0 96 57.42 96 128H0v304c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V128h-96zM224 48c44.112 0 80 35.888 80 80H144c0-44.112 35.888-80 80-80zm176 384c0 17.645-14.355 32-32 32H80c-17.645 0-32-14.355-32-32V176h48v40c0 13.255 10.745 24 24 24s24-10.745 24-24v-40h160v40c0 13.255 10.745 24 24 24s24-10.745 24-24v-40h48v256z"></path>
                                            </svg>
                                        </span>
                                        <?php $itemsCount = isset($sumOfItems) ? (int)$sumOfItems : 0; if ($itemsCount > 0) { ?>
                                            <span class="m-cart-count sumOfItems"><?= $itemsCount ?></span>
                                        <?php } ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-header__nav">
                        <div class="m-header__container">
                            <nav class="m-nav">
                                <ul class="m-nav__list">
                                    <li class="m-nav__item"><a href="<?= LANG_URL ?>" class="m-nav__link">TRANG CHỦ</a></li>
                                    <li class="m-nav__item m-nav__item--dropdown">
                                        <a href="<?= LANG_URL ?>/shop?category=1" class="m-nav__link">ÁO THUN RELAXED FIT</a>
                                        <div class="m-nav__dropdown">
                                            <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Thể Thao">Thể Thao</a>
                                            <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Chuyện Phòng Gym">Chuyện Phòng Gym</a>
                                            <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Thèm Đi Biển">Thèm Đi Biển</a>
                                            <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Love Bites">Love Bites</a>
                                            <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Nghề Nghiệp">Nghề Nghiệp</a>
                                            <a href="<?= LANG_URL ?>/shop?category=1&subcategory=Trơi Bời">Trơi Bời</a>
                                        </div>
                                    </li>
                                    <li class="m-nav__item m-nav__item--dropdown">
                                        <a href="<?= LANG_URL ?>/shop?category=2" class="m-nav__link">ÁO THUN RINGER</a>
                                        <div class="m-nav__dropdown">
                                            <a href="<?= LANG_URL ?>/shop?category=2&subcategory=Áo Thun Ringer Job">Áo Thun Ringer Job</a>
                                            <a href="<?= LANG_URL ?>/shop?category=2&subcategory=Áo Thun Ringer Đũy Mèo">Áo Thun Ringer Đũy Mèo</a>
                                            <a href="<?= LANG_URL ?>/shop?category=2&subcategory=Áo Thun Ringer Pickleball">Áo Thun Ringer Pickleball</a>
                                            <a href="<?= LANG_URL ?>/shop?category=2&subcategory=Áo Thun Ringer Love Bites">Áo Thun Ringer Love Bites</a>
                                        </div>
                                    </li>
                                    <li class="m-nav__item"><a href="<?= LANG_URL ?>/shop?category=3" class="m-nav__link">TÚI CANVAS</a></li>
                                    <li class="m-nav__item m-nav__item--dropdown">
                                        <a href="<?= LANG_URL ?>/shop?category=4" class="m-nav__link">ÁO BA LỖ</a>
                                        <div class="m-nav__dropdown">
                                            <a href="<?= LANG_URL ?>/shop?category=4&subcategory=Áo Ba Lỗ Bóng Đá">Áo Ba Lỗ Bóng Đá</a>
                                            <a href="<?= LANG_URL ?>/shop?category=4&subcategory=Áo Ba Lỗ Pickleball">Áo Ba Lỗ Pickleball</a>
                                            <a href="<?= LANG_URL ?>/shop?category=4&subcategory=Áo Ba Lỗ Đũy Mèo">Áo Ba Lỗ Đũy Mèo</a>
                                            <a href="<?= LANG_URL ?>/shop?category=4&subcategory=Áo Ba Lỗ Love Bites">Áo Ba Lỗ Love Bites</a>
                                            <a href="<?= LANG_URL ?>/shop?category=4&subcategory=Áo Ba Lỗ Fruitland">Áo Ba Lỗ Fruitland</a>
                                        </div>
                                    </li>
                                    <li class="m-nav__item"><a href="<?= LANG_URL ?>/shop?category=5" class="m-nav__link">ÁO THUN DÀI TAY</a></li>
                                    <li class="m-nav__item"><a href="<?= LANG_URL ?>/shop?category=6" class="m-nav__link">ÁO SWEATER</a></li>
                                    <li class="m-nav__item"><a href="<?= LANG_URL ?>/shop?category=7" class="m-nav__link">ÁO HOODIE</a></li>
                                    <li class="m-nav__item"><a href="<?= LANG_URL ?>/shop?category=8" class="m-nav__link">QUẦN</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>
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
        <script src="<?= base_url('assets/js/theme/mega-menu.js') ?>" defer></script>
        <script src="<?= base_url('assets/js/theme/header.js') ?>" defer></script>
        <script src="<?= base_url('assets/js/theme/localization-form.js') ?>" defer></script>
        </m-header>

        <div class="m-drawer__wrapper" id="mobile-menu">
            <div class="m-drawer__content">
                <div class="m-drawer__header">
                    <img src="<?= base_url('assets/images/Luon_Vuituoi_Bold_Den_New.png') ?>" alt="XƯỞNG MAY NHÀ CÔNG" style="height:32px;width:auto">
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
            var menuBtn = document.querySelector('.m-menu-button');
            var menuClose = document.getElementById('mobile-menu-close');
            var mobileMenu = document.getElementById('mobile-menu');
            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', function() { mobileMenu.classList.toggle('active'); });
            }
            if (menuClose && mobileMenu) {
                menuClose.addEventListener('click', function() { mobileMenu.classList.remove('active'); });
            }
            var searchToggle = document.querySelector('[data-open-search-popup]');
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
            <?php if (isset($sumOfItems) && (int)$sumOfItems > 0) { ?>
            document.querySelectorAll('.m-cart-icon-bubble').forEach(function(el) {
                var count = el.querySelector('.m-cart-count');
                if (count) { count.textContent = '<?= (int)$sumOfItems ?>'; }
            });
            <?php } ?>
        });
        </script>
