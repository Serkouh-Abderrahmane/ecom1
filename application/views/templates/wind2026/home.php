<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
$slides = [
    ['img' => 'slide-1.png', 'title' => 'BỘ SƯU TẬP MỚI', 'desc' => 'Phong cách đường phố cá tính', 'btn' => 'KHÁM PHÁ NGAY', 'link' => LANG_URL . '/shop'],
    ['img' => 'slide-2.png', 'title' => 'ÁO THUN CHẤT LƯỢNG', 'desc' => 'Thoải mái và bền bỉ theo thời gian', 'btn' => 'MUA NGAY', 'link' => LANG_URL . '/shop?category=1'],
    ['img' => 'slide-3.png', 'title' => 'PHONG CÁCH RIÊNG', 'desc' => 'Thể hiện cá tính qua từng đường may', 'btn' => 'XEM THÊM', 'link' => LANG_URL . '/shop'],
    ['img' => 'slide-4.png', 'title' => 'XƯỞNG MAY NHÀ CÔNG', 'desc' => 'Thương hiệu may mặc Việt Nam', 'btn' => 'MUA NGAY', 'link' => LANG_URL . '/shop'],
    ['img' => 'slide-5.png', 'title' => 'ÁO THUN DÀI TAY', 'desc' => 'Ấm áp và phong cách', 'btn' => 'MUA NGAY', 'link' => LANG_URL . '/shop?category=5'],
    ['img' => 'slide-6.png', 'title' => 'PHỤ KIỆN THỜI TRANG', 'desc' => 'Hoàn thiện phong cách của bạn', 'btn' => 'XEM THÊM', 'link' => LANG_URL . '/shop'],
];
$heroBtnText = 'MUA NGAY';
$heroBtnLink = LANG_URL . '/shop';
?>
<section class="m-hero">
    <div class="m-slideshow-wrapper" id="hero-slideshow">
        <?php foreach ($slides as $i => $slide) { ?>
        <div class="m-hero__slide<?= $i === 0 ? ' active' : '' ?>">
            <div class="m-hero__media">
                <div class="m-hero__image" style="background-image: url('<?= base_url('assets/imgs/slideshow/' . $slide['img']) ?>'); background-size: cover; background-position: center; width: 100%; height: 100%;"></div>
            </div>
            <div class="m-hero__overlay"></div>
            <div class="m-hero__content">
                <h1 class="m-hero__title"><?= $slide['title'] ?></h1>
                <p class="m-hero__description"><?= $slide['desc'] ?></p>
                <a href="<?= $slide['link'] ?>" class="m-button m-button--white"><?= $slide['btn'] ?></a>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="m-slideshow-nav" id="hero-nav">
        <button class="m-slideshow-prev" id="hero-prev">&#8249;</button>
        <button class="m-slideshow-next" id="hero-next">&#8250;</button>
    </div>
    <div class="m-slideshow-dots" id="hero-dots">
        <?php foreach ($slides as $i => $slide) { ?>
        <span class="m-slideshow-dot<?= $i === 0 ? ' active' : '' ?>" data-index="<?= $i ?>"></span>
        <?php } ?>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var slides = document.querySelectorAll('#hero-slideshow .m-hero__slide');
    var dots = document.querySelectorAll('#hero-dots .m-slideshow-dot');
    var prev = document.getElementById('hero-prev');
    var next = document.getElementById('hero-next');
    var current = 0;
    function showSlide(idx) {
        slides.forEach(function(s, i) { s.classList.toggle('active', i === idx); });
        dots.forEach(function(d, i) { d.classList.toggle('active', i === idx); });
        current = idx;
    }
    if (next) { next.addEventListener('click', function() { showSlide((current + 1) % slides.length); }); }
    if (prev) { prev.addEventListener('click', function() { showSlide((current - 1 + slides.length) % slides.length); }); }
    dots.forEach(function(dot) {
        dot.addEventListener('click', function() { showSlide(parseInt(this.getAttribute('data-index'))); });
    });
    setInterval(function() { showSlide((current + 1) % slides.length); }, 5000);
});
</script>

<?php if (!empty($bestSellers)) { ?>
<section class="m-section">
    <div class="m-section__header">
        <div class="m-section__heading"><?= lang('best_sellers') ?></div>
        <div class="m-section__description"><?= lang('featured') ?></div>
    </div>
    <div class="m-product-grid">
        <?php foreach (array_slice($bestSellers, 0, 8) as $i => $article) {
            $productImage = base_url('/attachments/no-image-frontend.png');
            if (is_file('attachments/shop_images/' . $article['image'])) {
                $productImage = base_url('/attachments/shop_images/' . $article['image']);
            }
            $productUrl = $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'];
            $hasOld = ($article['old_price'] != '' && $article['old_price'] != 0 && $article['price'] != '' && $article['price'] != 0);
        ?>
        <div class="m-product-card">
            <div class="m-product-card__media">
                <a href="<?= $productUrl ?>">
                    <img src="<?= $productImage ?>" alt="<?= htmlentities($article['title']) ?>">
                </a>
                <?php if ($hasOld) { ?>
                    <span class="m-product-card__tag-name" style="background: rgb(var(--color-price-sale));">-<?= number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) ?>%</span>
                <?php } ?>
                <div class="m-product-card__action">
                    <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                        <a href="#!" class="m-btn-add-cart add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">Thêm vào giỏ</a>
                    <?php } ?>
                </div>
            </div>
            <div class="m-product-card__content">
                <div class="m-product-card__info">
                    <div class="m-product-card__title">
                        <a href="<?= $productUrl ?>" class="m-product-card__name"><?= character_limiter($article['title'], 50) ?></a>
                    </div>
                    <div class="m-product-card__price">
                        <?php if ($hasOld) { ?>
                            <span class="m-price m-price--on-sale">
                                <span class="m-price__sale">
                                    <span class="m-price-item--last"><?= number_format($article['price'], 2) ?><?= CURRENCY ?></span>
                                    <span class="m-price-item--regular"><?= number_format($article['old_price'], 2) . CURRENCY ?></span>
                                </span>
                            </span>
                        <?php } else { ?>
                            <span class="m-price">
                                <span class="m-price__regular"><?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?></span>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="text-center mt-40">
        <a href="<?= LANG_URL ?>/shop" class="m-button m-button--primary"><?= lang('view_all') ?></a>
    </div>
</section>
<?php } ?>

<?php if (!empty($home_categories)) { ?>
<section class="m-section" style="background: rgb(var(--color-background-secondary));">
    <div class="m-section__header">
        <div class="m-section__heading"><?= lang('shop_by_category') ?></div>
        <div class="m-section__description"><?= lang('categories') ?></div>
    </div>
    <div class="m-cat-grid">
        <?php foreach (array_slice($home_categories, 0, 10) as $cat) { ?>
        <a href="#!" data-categorie-id="<?= $cat['id'] ?>" class="m-cat-card go-category">
            <?php if (isset($cat['image']) && $cat['image'] != '' && is_file('attachments/shop_images/' . $cat['image'])) { ?>
                <img src="<?= base_url('attachments/shop_images/' . $cat['image']) ?>" alt="<?= htmlspecialchars($cat['name'], ENT_QUOTES, 'UTF-8') ?>">
            <?php } else { ?>
                <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:#f0f0f0;color:#ccc;font-size:32px;">
                    <i class="fa fa-image"></i>
                </div>
            <?php } ?>
            <div class="m-cat-card-overlay"></div>
            <div class="m-cat-card-title"><?= htmlspecialchars($cat['name'], ENT_QUOTES, 'UTF-8') ?></div>
        </a>
        <?php } ?>
    </div>
</section>
<?php } ?>

<?php if (!empty($newProducts)) { ?>
<section class="m-section">
    <div class="m-section__header">
        <div class="m-section__heading"><?= lang('new_products') ?></div>
        <div class="m-section__description"><?= lang('new_arrivals') ?></div>
    </div>
    <div class="m-product-grid">
        <?php foreach (array_slice($newProducts, 0, 8) as $article) {
            $productImage = base_url('/attachments/no-image-frontend.png');
            if (is_file('attachments/shop_images/' . $article['image'])) {
                $productImage = base_url('/attachments/shop_images/' . $article['image']);
            }
            $productUrl = $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'];
        ?>
        <div class="m-product-card">
            <div class="m-product-card__media">
                <a href="<?= $productUrl ?>">
                    <img src="<?= $productImage ?>" alt="<?= htmlentities($article['title']) ?>">
                </a>
                <div class="m-product-card__action">
                    <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                        <a href="#!" class="m-btn-add-cart add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">Thêm vào giỏ</a>
                    <?php } ?>
                </div>
            </div>
            <div class="m-product-card__content">
                <div class="m-product-card__info">
                    <div class="m-product-card__title">
                        <a href="<?= $productUrl ?>" class="m-product-card__name"><?= character_limiter($article['title'], 50) ?></a>
                    </div>
                    <div class="m-product-card__price">
                        <span class="m-price">
                            <span class="m-price__regular"><?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>

<section class="m-newsletter-section">
    <h2><?= lang('newsletter_title') ?></h2>
    <p><?= lang('newsletter_description') ?></p>
    <form method="POST" class="m-newsletter-form">
        <input type="text" name="subscribeEmail" class="m-footer-newsletter-input" placeholder="<?= lang('email_address') ?>">
        <button type="submit" class="m-footer-newsletter-btn" onclick="checkEmailField()"><?= lang('subscribe') ?></button>
    </form>
</section>

<div class="m-page" id="home-page">
    <div class="m:grid" style="grid-template-columns:260px 1fr;gap:40px;margin:0;">
        <aside>
            <div class="m-sidebar">
                <div class="m-sidebar__header">
                    <div class="m-sidebar__title"><?= lang('categories') ?></div>
                    <?php if (isset($_GET['category']) && $_GET['category'] != '') { ?>
                        <a href="#!" class="clear-filter" data-type-clear="category" style="font-size:13px;color:rgb(var(--color-foreground-secondary));">&#10005;</a>
                    <?php } ?>
                </div>
                <a href="#!" id="show-xs-nav" style="display:flex;justify-content:space-between;padding:10px;border:1px solid rgb(var(--color-border));font-size:14px;margin-bottom:12px;">
                    <span class="show-sp"><?= lang('showXsNav') ?></span>
                    <span class="hidde-sp hidden"><?= lang('hideXsNav') ?></span>
                </a>
                <div id="nav-categories">
                    <?php
                    function loop_tree($pages, $is_recursion = false) { ?>
                        <ul style="<?= $is_recursion ? 'margin-left:16px;' : '' ?>">
                            <?php foreach ($pages as $page) {
                                $children = (isset($page['children']) && !empty($page['children'])); ?>
                                <li>
                                    <a href="#!" data-categorie-id="<?= $page['id'] ?>" class="m-sidebar__item go-category">
                                        <?= htmlspecialchars($page['name'], ENT_QUOTES, 'UTF-8') ?>
                                    </a>
                                    <?php if ($children === true) { loop_tree($page['children'], true); } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php }
                    loop_tree($home_categories); ?>
                </div>
            </div>
            <?php if ($showBrands == 1) { ?>
                <div class="m-sidebar" style="margin-top:20px;">
                    <div class="m-sidebar__header">
                        <div class="m-sidebar__title"><?= lang('brands') ?></div>
                        <?php if (isset($_GET['brand_id']) && $_GET['brand_id'] != '') { ?>
                            <a href="#!" class="clear-filter" data-type-clear="brand_id" style="font-size:13px;color:rgb(var(--color-foreground-secondary));">&#10005;</a>
                        <?php } ?>
                    </div>
                    <?php foreach ($brands as $brand) { ?>
                        <a href="#!" data-brand-id="<?= $brand['id'] ?>" class="m-sidebar__item brand"><?= $brand['name'] ?></a>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if ($showOutOfStock == 1) { ?>
                <div class="m-sidebar" style="margin-top:20px;">
                    <div class="m-sidebar__title" style="margin-bottom:12px;"><?= lang('store') ?></div>
                    <a href="#!" data-in-stock="1" class="m-sidebar__item in-stock"><?= lang('in_stock') ?> (<?= $countQuantities['in_stock'] ?>)</a>
                    <a href="#!" data-in-stock="0" class="m-sidebar__item in-stock"><?= lang('out_of_stock') ?> (<?= $countQuantities['out_of_stock'] ?>)</a>
                </div>
            <?php } ?>
            <?php if ($shippingOrder != 0 && $shippingOrder != null) { ?>
                <div class="m-sidebar" style="margin-top:20px;">
                    <div class="m-sidebar__title" style="margin-bottom:8px;"><?= lang('freeShippingHeader') ?></div>
                    <div style="font-size:14px;color:rgb(var(--color-foreground-secondary));">
                        <?= str_replace(array('%price%', '%currency%'), array($shippingOrder, CURRENCY), lang('freeShipping')) ?>!
                    </div>
                </div>
            <?php } ?>
        </aside>
        <main id="products-side">
            <div style="display:flex;justify-content:space-between;align-items:center;padding:16px;border:1px solid rgb(var(--color-border));margin-bottom:20px;">
                <div style="font-weight:600;font-size:15px;">
                    <?= lang('products') ?>
                    <?php if (!empty($products)) { ?>
                        <span style="color:rgb(var(--color-foreground-secondary));font-weight:400;">(<?= count($products) ?>)</span>
                    <?php } ?>
                </div>
                <div style="display:flex;gap:8px;">
                    <select class="order" data-order-to="order_new" style="padding:8px 12px;border:1px solid rgb(var(--color-border));border-radius:var(--inputs-radius);font-size:14px;font-family:var(--font-body);">
                        <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "desc" ? 'selected' : '' ?> <?= !isset($_GET['order_new']) || $_GET['order_new'] == "" ? 'selected' : '' ?> value="desc"><?= lang('new') ?></option>
                        <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('old') ?></option>
                    </select>
                    <select class="order" data-order-to="order_price" style="padding:8px 12px;border:1px solid rgb(var(--color-border));border-radius:var(--inputs-radius);font-size:14px;font-family:var(--font-body);">
                        <option label="<?= lang('not_selected') ?>"></option>
                        <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('price_low') ?></option>
                        <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('price_high') ?></option>
                    </select>
                    <select class="order" data-order-to="order_procurement" style="padding:8px 12px;border:1px solid rgb(var(--color-border));border-radius:var(--inputs-radius);font-size:14px;font-family:var(--font-body);">
                        <option label="<?= lang('not_selected') ?>"></option>
                        <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('procurement_desc') ?></option>
                        <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('procurement_asc') ?></option>
                    </select>
                </div>
            </div>
            <?php if (!empty($products)) { ?>
                <div class="m-product-grid" style="margin:0;padding:0;">
                    <?php foreach ($products as $i => $article) {
                        $backgroundImageFile = base_url('/attachments/no-image-frontend.png');
                        if (is_file('attachments/shop_images/' . $article['image'])) {
                            $backgroundImageFile = base_url('/attachments/shop_images/' . $article['image']);
                        }
                        $productUrl = $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'];
                        $hasOld = ($article['old_price'] != '' && $article['old_price'] != 0 && $article['price'] != '' && $article['price'] != 0);
                    ?>
                    <div class="m-product-card">
                        <div class="m-product-card__media">
                            <a href="<?= $productUrl ?>">
                                <img src="<?= htmlentities($backgroundImageFile) ?>" alt="<?= htmlentities($article['title']) ?>">
                            </a>
                            <?php if ($hasOld) { ?>
                                <span class="m-product-card__tag-name" style="background: rgb(var(--color-price-sale));">-<?= number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) ?>%</span>
                            <?php } ?>
                            <div class="m-product-card__action">
                                <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                                    <a href="#!" class="m-btn-add-cart add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">Thêm vào giỏ</a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="m-product-card__content">
                            <div class="m-product-card__info">
                                <div class="m-product-card__title">
                                    <a href="<?= $productUrl ?>" class="m-product-card__name"><?= character_limiter($article['title'], 70) ?></a>
                                </div>
                                <div class="m-product-card__price">
                                    <?php if ($hasOld) { ?>
                                        <span class="m-price m-price--on-sale">
                                            <span class="m-price__sale">
                                                <span class="m-price-item--last"><?= number_format($article['price'], 2) ?><?= CURRENCY ?></span>
                                                <span class="m-price-item--regular"><?= number_format($article['old_price'], 2) . CURRENCY ?></span>
                                            </span>
                                        </span>
                                    <?php } else { ?>
                                        <span class="m-price">
                                            <span class="m-price__regular"><?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?></span>
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <script>$(document).ready(function () { ShowNotificator('alert-info', '<?= lang('no_results') ?>'); });</script>
            <?php } ?>
            <?php if ($links_pagination != '') { ?>
                <div class="mt-40"><?= $links_pagination ?></div>
            <?php } ?>
        </main>
    </div>
</div>
