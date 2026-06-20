<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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

<!-- ===== HERO SLIDESHOW ===== -->
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

<!-- ===== COLLECTION LIST ===== -->
<?php if (!empty($home_categories)) { ?>
<section class="m-section m-collection-list m-gradient m-color-default">
    <div class="m-collection-list__container">
        <div class="m-section__header" style="padding: 80px 20px 40px;">
            <h2 class="m-section__heading">Khám phá các bộ sưu tập</h2>
        </div>
        <div class="m-collection-list__content">
            <?php foreach (array_slice($home_categories, 0, 3) as $cat) { ?>
            <a href="<?= LANG_URL ?>/shop?category=<?= $cat['id'] ?>" class="m-collection-card">
                <div class="m-collection-card__media">
                    <?php if (isset($cat['image']) && $cat['image'] != '' && is_file('attachments/shop_images/' . $cat['image'])) { ?>
                        <img src="<?= base_url('attachments/shop_images/' . $cat['image']) ?>" alt="<?= htmlspecialchars($cat['name'], ENT_QUOTES, 'UTF-8') ?>">
                    <?php } else { ?>
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:#f0f0f0;color:#ccc;font-size:48px;">
                            <i class="fa fa-image"></i>
                        </div>
                    <?php } ?>
                </div>
                <div class="m-collection-card__info">
                    <h3 class="m-collection-card__title"><?= htmlspecialchars($cat['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <span class="m-collection-card__link">KHÁM PHÁ NGAY</span>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<!-- ===== FEATURED COLLECTION 1 ===== -->
<?php if (!empty($bestSellers)) { ?>
<section class="m-section m-featured-collection m-gradient m-color-default">
    <div class="m-section__header">
        <h2 class="m-section__heading">Trọn Bộ Hoodie Độc Lạ!</h2>
    </div>
    <div class="m-product-grid m-product-grid--6">
        <?php foreach (array_slice($bestSellers, 0, 4) as $article) {
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
                    <span class="m-product-card__tag-name">-<?= number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) ?>%</span>
                <?php } ?>
            </div>
            <div class="m-product-card__content">
                <div class="m-product-card__info">
                    <div class="m-product-card__title">
                        <a href="<?= $productUrl ?>" class="m-product-card__name"><?= character_limiter($article['title'], 50) ?></a>
                    </div>
                    <div class="m-product-card__price">
                        <?php if ($hasOld) { ?>
                            <span class="m-price m-price--on-sale">
                                <span class="m-price-item--last"><?= number_format($article['price'], 0) ?>₫</span>
                                <span class="m-price-item--regular"><?= number_format($article['old_price'], 0) ?>₫</span>
                            </span>
                        <?php } else { ?>
                            <span class="m-price">
                                <span class="m-price__regular"><?= $article['price'] != '' ? number_format($article['price'], 0) : 0 ?>₫</span>
                            </span>
                        <?php } ?>
                    </div>
                    <a href="<?= $productUrl ?>" class="m-product-card__btn">Mua Ngay</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>

<!-- ===== FEATURED COLLECTION 2 ===== -->
<?php if (!empty($newProducts)) { ?>
<section class="m-section m-featured-collection m-gradient m-color-default">
    <div class="m-section__header">
        <h2 class="m-section__heading">Các BST Sweater Mới Nhất!</h2>
    </div>
    <div class="m-product-grid m-product-grid--6">
        <?php foreach (array_slice($newProducts, 0, 4) as $article) {
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
            </div>
            <div class="m-product-card__content">
                <div class="m-product-card__info">
                    <div class="m-product-card__title">
                        <a href="<?= $productUrl ?>" class="m-product-card__name"><?= character_limiter($article['title'], 50) ?></a>
                    </div>
                    <div class="m-product-card__price">
                        <span class="m-price">
                            <span class="m-price__regular"><?= $article['price'] != '' ? number_format($article['price'], 0) : 0 ?>₫</span>
                        </span>
                    </div>
                    <a href="<?= $productUrl ?>" class="m-product-card__btn">Mua Ngay</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>

<!-- ===== NEWSLETTER ===== -->
<section class="m-newsletter-section">
    <h2><?= lang('newsletter_title') ?></h2>
    <p><?= lang('newsletter_description') ?></p>
    <form method="POST" class="m-newsletter-form">
        <input type="text" name="subscribeEmail" class="m-newsletter-input" placeholder="<?= lang('email_address') ?>">
        <button type="submit" class="m-button m-button--primary" onclick="checkEmailField()"><?= lang('subscribe') ?></button>
    </form>
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
