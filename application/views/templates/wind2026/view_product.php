<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$productImage = base_url('/attachments/no-image-frontend.png');
if (is_file('attachments/shop_images/' . $product['image'])) {
    $productImage = base_url('/attachments/shop_images/' . $product['image']);
}
$addedCount = 0;
if (isset($_SESSION['shopping_cart']) && is_array($_SESSION['shopping_cart'])) {
    $result = array_count_values($_SESSION['shopping_cart']);
    if (isset($result[$product['id']])) { $addedCount = $result[$product['id']]; }
}
$discountPercent = 0;
if (!empty($product['old_price']) && $product['old_price'] > 0 && $product['price'] > 0) {
    $discountPercent = round(($product['old_price'] - $product['price']) / $product['old_price'] * 100);
}
?>
<div class="m-page">
    <div class="m-breadcrumb">
        <a href="<?= LANG_URL ?>">Trang chủ</a>
        <span>/</span>
        <a href="#!" class="go-category" data-categorie-id="<?= $product['shop_categorie'] ?>"><?= $product['categorie_name'] ?></a>
        <span>/</span>
        <span><?= htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8') ?></span>
    </div>

    <div class="m-pd-grid">
        <div>
            <div style="position:sticky;top:90px;">
                <div class="m-product-card__media" style="aspect-ratio:1;cursor:pointer;">
                    <img src="<?= $productImage; ?>" data-num="0" class="other-img-preview img-sl the-image" style="width:100%;height:100%;object-fit:cover;" alt="<?= str_replace('"', "'", $product['title']) ?>">
                    <?php if ($discountPercent > 0) { ?>
                        <span class="m-product-card__tag-name" style="background: rgb(var(--color-price-sale));">-<?= $discountPercent ?>%</span>
                    <?php } ?>
                </div>
                <?php if ($product['folder'] != null) {
                    $dir = "attachments/shop_images/" . $product['folder'] . '/'; ?>
                    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px;margin-top:12px;">
                        <button type="button" style="aspect-ratio:1;overflow:hidden;background:rgb(var(--color-background-secondary));border:1px solid rgb(var(--color-foreground));cursor:pointer;padding:0;">
                            <img src="<?= $productImage ?>" data-num="0" class="other-img-preview img-sl the-image" style="width:100%;height:100%;object-fit:cover;" alt="">
                        </button>
                        <?php if (is_dir($dir)) {
                            if ($dh = opendir($dir)) {
                                $i = 1;
                                while (($file = readdir($dh)) !== false) {
                                    if (is_file($dir . $file)) { ?>
                                        <button type="button" style="aspect-ratio:1;overflow:hidden;background:rgb(var(--color-background-secondary));border:1px solid rgb(var(--color-border));cursor:pointer;padding:0;">
                                            <img src="<?= base_url($dir . $file) ?>" data-num="<?= $i ?>" class="other-img-preview img-sl the-image" style="width:100%;height:100%;object-fit:cover;" alt="">
                                        </button>
                                    <?php $i++; }
                                } closedir($dh);
                            }
                        } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div>
            <h1 style="font-size:28px;font-weight:700;margin-bottom:12px;color:rgb(var(--color-heading));"><?= htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8') ?></h1>
            <div style="font-size:24px;font-weight:600;margin-bottom:20px;">
                <span class="m-price <?= $product['old_price'] != '' ? 'm-price--on-sale' : '' ?>">
                    <?php if ($product['old_price'] != '') { ?>
                        <span class="m-price__sale">
                            <span class="m-price-item--last"><?= $product['price'] . CURRENCY ?></span>
                            <span class="m-price-item--regular"><?= $product['old_price'] . CURRENCY ?></span>
                        </span>
                    <?php } else { ?>
                        <span class="m-price__regular"><?= $product['price'] . CURRENCY ?></span>
                    <?php } ?>
                </span>
            </div>

            <div style="border-top:1px solid rgb(var(--color-border));padding-top:24px;margin-top:24px;">
                <div style="margin-bottom:20px;">
                    <label class="m-label"><?= lang('size') ?></label>
                    <div style="display:flex;flex-wrap:wrap;gap:8px;">
                        <button type="button" class="m-button m-button--small m-button--secondary">XS</button>
                        <button type="button" class="m-button m-button--small m-button--primary">S</button>
                        <button type="button" class="m-button m-button--small m-button--secondary">M</button>
                        <button type="button" class="m-button m-button--small m-button--secondary">L</button>
                        <button type="button" class="m-button m-button--small m-button--secondary">XL</button>
                        <button type="button" class="m-button m-button--small m-button--secondary">XXL</button>
                    </div>
                </div>
                <div style="margin-bottom:20px;">
                    <label class="m-label"><?= lang('quantity') ?></label>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div class="m-quantity">
                            <button type="button" class="m-quantity__button" onclick="adjustQty(-1)">−</button>
                            <input type="number" id="product-qty" value="1" min="1" max="<?= $product['quantity'] ?>" class="m-quantity__input">
                            <button type="button" class="m-quantity__button" onclick="adjustQty(1)">+</button>
                        </div>
                        <?php if ($publicQuantity == 1) { ?>
                            <?php if ($product['quantity'] > 0) { ?>
                                <span style="font-size:13px;color:rgb(var(--color-success));font-weight:500;margin-left:8px;">&#10003; <?= lang('in_stock') ?></span>
                            <?php } else { ?>
                                <span style="font-size:13px;color:rgb(var(--color-error));font-weight:500;margin-left:8px;">&#10007; <?= lang('out_of_stock') ?></span>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php if ($hideBuyButtonsOfOutOfStock == 0 || $product['quantity'] > 0) { ?>
                <div style="display:flex;gap:12px;margin-top:24px;">
                    <a href="#!" data-id="<?= $product['id'] ?>" data-goto="<?= LANG_URL . '/checkout' ?>" class="add-to-cart m-button m-button--primary" style="flex:1;"><?= lang('add_to_cart') ?></a>
                    <a href="#!" data-id="<?= $product['id'] ?>" data-goto="<?= LANG_URL . '/checkout' ?>" class="add-to-cart m-button m-button--secondary" style="flex:1;"><?= lang('buy_now') ?></a>
                </div>
            <?php } else { ?>
                <div style="padding:16px;border:1px solid rgb(var(--color-border));text-align:center;font-weight:500;margin-top:24px;color:rgb(var(--color-foreground-secondary));"><?= lang('out_of_stock_product') ?></div>
            <?php } ?>

            <?php if ($publicDateAdded == 1) { ?>
                <div style="font-size:13px;color:rgb(var(--color-foreground-secondary));margin-top:12px;"><?= lang('added_on') ?>: <?= date('m.d.Y', $product['time']) ?></div>
            <?php } ?>

            <div style="border-top:1px solid rgb(var(--color-border));padding-top:24px;margin-top:24px;">
                <div style="font-weight:600;font-size:16px;margin-bottom:12px;"><?= lang('description') ?></div>
                <div style="font-size:15px;color:rgb(var(--color-foreground-secondary));line-height:1.8;"><?= $product['description'] ?></div>
            </div>

            <div style="margin-top:24px;"><?php include rtrim(APPPATH, '/') . '/views/main/social_share.php'; ?></div>
        </div>
    </div>

    <?php if (!empty($sameCagegoryProducts)) { ?>
    <div style="margin-top:60px;">
        <div style="text-align:center;margin-bottom:32px;">
            <div class="m-section__header">
                <div class="m-section__heading" style="font-size:24px;"><?= $product['categorie_name'] ?></div>
            </div>
        </div>
        <div class="m-product-grid">
            <?php foreach ($sameCagegoryProducts as $article) {
                $img = base_url('/attachments/no-image-frontend.png');
                if (is_file('attachments/shop_images/' . $article['image'])) { $img = base_url('/attachments/shop_images/' . $article['image']); }
                $url = $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'];
            ?>
            <div class="m-product-card">
                <div class="m-product-card__media">
                    <a href="<?= $url ?>"><img src="<?= $img ?>" alt="<?= htmlentities($article['title']) ?>"></a>
                    <div class="m-product-card__action">
                        <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                            <a href="#!" class="m-btn-add-cart add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>"><?= lang('add_to_cart') ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="m-product-card__content">
                    <div class="m-product-card__info">
                        <div class="m-product-card__title">
                            <a href="<?= $url ?>" class="m-product-card__name"><?= character_limiter($article['title'], 50) ?></a>
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
    </div>
    <?php } ?>
</div>
<div id="modalImagePreview" class="modal">
    <div class="image-preview-container">
        <div class="modal-content">
            <div class="inner-prev-container">
                <img id="img01" alt=""><span class="close">&times;</span><span class="img-series"></span>
            </div>
        </div>
        <a href="#!" class="inner-next"></a><a href="#!" class="inner-prev"></a>
    </div>
    <div id="caption"></div>
</div>
<script>
function adjustQty(change) {
    var input = document.getElementById('product-qty');
    var val = parseInt(input.value) || 1;
    var max = parseInt(input.max) || 999;
    var newVal = val + change;
    if (newVal >= 1 && newVal <= max) input.value = newVal;
}
</script>
<script src="<?= base_url('assets/js/image-preveiw.js') ?>"></script>
