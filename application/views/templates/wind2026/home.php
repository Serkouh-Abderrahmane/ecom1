<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
$heroBg = base_url('/attachments/no-image-frontend.png');
$heroTitle = 'XƯỞNG MAY NHÀ CÔNG';
$heroSubtitle = 'Thương hiệu may mặc Việt Nam — chất lượng vải vóc cao cấp, thiết kế tinh tế.';
$heroBtnText = 'MUA NGAY';
$heroBtnLink = LANG_URL . '/shop';
if (is_file('attachments/shop_images/hero.jpg')) {
    $heroBg = base_url('/attachments/shop_images/hero.jpg');
}
if (count($sliderProducts) > 0 && is_file('attachments/shop_images/' . $sliderProducts[0]['image'])) {
    $heroBg = base_url('/attachments/shop_images/' . $sliderProducts[0]['image']);
}
?>
<section class="m-hero">
    <div class="m-hero-bg" style="background-image: url('<?= $heroBg ?>'); filter: brightness(0.6);"></div>
    <div class="m-hero-overlay"></div>
    <div class="m-hero-content">
        <h1><?= $heroTitle ?></h1>
        <p><?= $heroSubtitle ?></p>
        <a href="<?= $heroBtnLink ?>" class="m-hero-btn"><?= $heroBtnText ?></a>
    </div>
</section>

<?php if (!empty($bestSellers)) { ?>
<section class="m-section">
    <div class="m-section-header">
        <div class="m-section-title"><?= lang('best_sellers') ?></div>
        <div class="m-section-subtitle"><?= lang('featured') ?></div>
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
            <div class="m-product-card-image">
                <a href="<?= $productUrl ?>">
                    <img src="<?= $productImage ?>" alt="<?= htmlentities($article['title']) ?>">
                </a>
                <?php if ($hasOld) { ?>
                    <span class="m-badge">-<?= number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) ?>%</span>
                <?php } ?>
                <div class="m-product-card-actions">
                    <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                        <a href="#!" class="m-btn-add-cart add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">Thêm vào giỏ</a>
                    <?php } ?>
                </div>
            </div>
            <div class="m-product-card-info">
                <a href="<?= $productUrl ?>" class="m-product-card-title"><?= character_limiter($article['title'], 50) ?></a>
                <div class="m-product-card-price">
                    <?php if ($hasOld) { ?>
                        <span class="sale"><?= number_format($article['price'], 2) ?><?= CURRENCY ?></span>
                        <span class="compare"><?= number_format($article['old_price'], 2) . CURRENCY ?></span>
                    <?php } else { ?>
                        <?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="text-center mt-40">
        <a href="<?= LANG_URL ?>/shop" class="m-btn"><?= lang('view_all') ?></a>
    </div>
</section>
<?php } ?>

<?php if (!empty($home_categories)) { ?>
<section class="m-section" style="background: var(--color-bg-secondary);">
    <div class="m-section-header">
        <div class="m-section-title"><?= lang('shop_by_category') ?></div>
        <div class="m-section-subtitle"><?= lang('categories') ?></div>
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
    <div class="m-section-header">
        <div class="m-section-title"><?= lang('new_products') ?></div>
        <div class="m-section-subtitle"><?= lang('new_arrivals') ?></div>
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
            <div class="m-product-card-image">
                <a href="<?= $productUrl ?>">
                    <img src="<?= $productImage ?>" alt="<?= htmlentities($article['title']) ?>">
                </a>
                <div class="m-product-card-actions">
                    <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                        <a href="#!" class="m-btn-add-cart add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">Thêm vào giỏ</a>
                    <?php } ?>
                </div>
            </div>
            <div class="m-product-card-info">
                <a href="<?= $productUrl ?>" class="m-product-card-title"><?= character_limiter($article['title'], 50) ?></a>
                <div class="m-product-card-price"><?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?></div>
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
    <div style="display:grid;grid-template-columns:260px 1fr;gap:40px;">
        <aside>
            <div style="border:1px solid var(--color-border);padding:20px;">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
                    <div style="font-weight:600;font-size:15px;"><?= lang('categories') ?></div>
                    <?php if (isset($_GET['category']) && $_GET['category'] != '') { ?>
                        <a href="#!" class="clear-filter" data-type-clear="category" style="font-size:13px;color:#999;">✕</a>
                    <?php } ?>
                </div>
                <a href="#!" id="show-xs-nav" style="display:flex;justify-content:space-between;padding:10px;border:1px solid var(--color-border);font-size:14px;margin-bottom:12px;">
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
                                    <a href="#!" data-categorie-id="<?= $page['id'] ?>" class="go-category" style="display:block;padding:8px 0;font-size:15px;color:#666;border-bottom:1px solid #f5f5f5;">
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
                <div style="border:1px solid var(--color-border);padding:20px;margin-top:20px;">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
                        <div style="font-weight:600;font-size:15px;"><?= lang('brands') ?></div>
                        <?php if (isset($_GET['brand_id']) && $_GET['brand_id'] != '') { ?>
                            <a href="#!" class="clear-filter" data-type-clear="brand_id" style="font-size:13px;color:#999;">✕</a>
                        <?php } ?>
                    </div>
                    <?php foreach ($brands as $brand) { ?>
                        <a href="#!" data-brand-id="<?= $brand['id'] ?>" class="brand" style="display:block;padding:8px 0;font-size:15px;color:#666;border-bottom:1px solid #f5f5f5;"><?= $brand['name'] ?></a>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if ($showOutOfStock == 1) { ?>
                <div style="border:1px solid var(--color-border);padding:20px;margin-top:20px;">
                    <div style="font-weight:600;font-size:15px;margin-bottom:12px;"><?= lang('store') ?></div>
                    <a href="#!" data-in-stock="1" class="in-stock" style="display:block;padding:8px 0;font-size:15px;color:#666;"><?= lang('in_stock') ?> (<?= $countQuantities['in_stock'] ?>)</a>
                    <a href="#!" data-in-stock="0" class="in-stock" style="display:block;padding:8px 0;font-size:15px;color:#666;"><?= lang('out_of_stock') ?> (<?= $countQuantities['out_of_stock'] ?>)</a>
                </div>
            <?php } ?>
            <?php if ($shippingOrder != 0 && $shippingOrder != null) { ?>
                <div style="border:1px solid var(--color-border);padding:20px;margin-top:20px;">
                    <div style="font-weight:600;font-size:15px;"><?= lang('freeShippingHeader') ?></div>
                    <div style="margin-top:8px;font-size:14px;color:#666;">
                        <?= str_replace(array('%price%', '%currency%'), array($shippingOrder, CURRENCY), lang('freeShipping')) ?>!
                    </div>
                </div>
            <?php } ?>
        </aside>
        <main id="products-side">
            <div style="display:flex;justify-content:space-between;align-items:center;padding:16px;border:1px solid var(--color-border);margin-bottom:20px;">
                <div style="font-weight:600;font-size:15px;">
                    <?= lang('products') ?>
                    <?php if (!empty($products)) { ?>
                        <span style="color:#999;font-weight:400;">(<?= count($products) ?>)</span>
                    <?php } ?>
                </div>
                <div style="display:flex;gap:8px;">
                    <select class="order" data-order-to="order_new" style="padding:8px 12px;border:1px solid var(--color-border);border-radius:var(--radius-input);font-size:14px;font-family:var(--font-body);">
                        <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "desc" ? 'selected' : '' ?> <?= !isset($_GET['order_new']) || $_GET['order_new'] == "" ? 'selected' : '' ?> value="desc"><?= lang('new') ?></option>
                        <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('old') ?></option>
                    </select>
                    <select class="order" data-order-to="order_price" style="padding:8px 12px;border:1px solid var(--color-border);border-radius:var(--radius-input);font-size:14px;font-family:var(--font-body);">
                        <option label="<?= lang('not_selected') ?>"></option>
                        <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('price_low') ?></option>
                        <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('price_high') ?></option>
                    </select>
                    <select class="order" data-order-to="order_procurement" style="padding:8px 12px;border:1px solid var(--color-border);border-radius:var(--radius-input);font-size:14px;font-family:var(--font-body);">
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
                        <div class="m-product-card-image">
                            <a href="<?= $productUrl ?>">
                                <img src="<?= htmlentities($backgroundImageFile) ?>" alt="<?= htmlentities($article['title']) ?>">
                            </a>
                            <?php if ($hasOld) { ?>
                                <span class="m-badge">-<?= number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) ?>%</span>
                            <?php } ?>
                            <div class="m-product-card-actions">
                                <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                                    <a href="#!" class="m-btn-add-cart add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">Thêm vào giỏ</a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="m-product-card-info">
                            <a href="<?= $productUrl ?>" class="m-product-card-title"><?= character_limiter($article['title'], 70) ?></a>
                            <div class="m-product-card-price">
                                <?php if ($hasOld) { ?>
                                    <span class="sale"><?= number_format($article['price'], 2) ?><?= CURRENCY ?></span>
                                    <span class="compare"><?= number_format($article['old_price'], 2) . CURRENCY ?></span>
                                <?php } else { ?>
                                    <?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?>
                                <?php } ?>
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