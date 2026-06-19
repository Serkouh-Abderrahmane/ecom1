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
                <div style="position:relative;aspect-ratio:1;background:#f5f5f5;overflow:hidden;">
                    <img src="<?= $productImage; ?>" data-num="0" class="other-img-preview img-sl the-image" style="width:100%;height:100%;object-fit:cover;cursor:pointer;" alt="<?= str_replace('"', "'", $product['title']) ?>">
                    <?php if ($discountPercent > 0) { ?>
                        <span class="m-badge">-<?= $discountPercent ?>%</span>
                    <?php } ?>
                </div>
                <?php if ($product['folder'] != null) {
                    $dir = "attachments/shop_images/" . $product['folder'] . '/'; ?>
                    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px;margin-top:12px;">
                        <button type="button" style="aspect-ratio:1;overflow:hidden;background:#f5f5f5;border:1px solid #000;cursor:pointer;padding:0;">
                            <img src="<?= $productImage ?>" data-num="0" class="other-img-preview img-sl the-image" style="width:100%;height:100%;object-fit:cover;" alt="">
                        </button>
                        <?php if (is_dir($dir)) {
                            if ($dh = opendir($dir)) {
                                $i = 1;
                                while (($file = readdir($dh)) !== false) {
                                    if (is_file($dir . $file)) { ?>
                                        <button type="button" style="aspect-ratio:1;overflow:hidden;background:#f5f5f5;border:1px solid var(--color-border);cursor:pointer;padding:0;">
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
            <h1 style="font-size:28px;font-weight:700;margin-bottom:12px;"><?= htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8') ?></h1>
            <div style="font-size:24px;font-weight:600;margin-bottom:20px;">
                <?= $product['price'] . CURRENCY ?>
                <?php if ($product['old_price'] != '') { ?>
                    <span style="font-size:16px;font-weight:400;color:#999;text-decoration:line-through;margin-left:8px;"><?= $product['old_price'] . CURRENCY ?></span>
                    <span style="font-size:14px;font-weight:600;color:var(--color-price-sale);margin-left:8px;">-<?= $discountPercent ?>%</span>
                <?php } ?>
            </div>

            <div style="border-top:1px solid var(--color-border);padding-top:24px;margin-top:24px;">
                <div style="margin-bottom:20px;">
                    <label style="font-size:14px;font-weight:500;display:block;margin-bottom:8px;"><?= lang('size') ?></label>
                    <div style="display:flex;flex-wrap:wrap;gap:8px;">
                        <button type="button" style="padding:8px 20px;border:1px solid var(--color-border);font-size:14px;font-weight:500;cursor:pointer;background:transparent;">XS</button>
                        <button type="button" style="padding:8px 20px;border:1px solid #000;font-size:14px;font-weight:500;cursor:pointer;background:#000;color:#fff;">S</button>
                        <button type="button" style="padding:8px 20px;border:1px solid var(--color-border);font-size:14px;font-weight:500;cursor:pointer;background:transparent;">M</button>
                        <button type="button" style="padding:8px 20px;border:1px solid var(--color-border);font-size:14px;font-weight:500;cursor:pointer;background:transparent;">L</button>
                        <button type="button" style="padding:8px 20px;border:1px solid var(--color-border);font-size:14px;font-weight:500;cursor:pointer;background:transparent;">XL</button>
                        <button type="button" style="padding:8px 20px;border:1px solid var(--color-border);font-size:14px;font-weight:500;cursor:pointer;background:transparent;">XXL</button>
                    </div>
                </div>
                <div style="margin-bottom:20px;">
                    <label style="font-size:14px;font-weight:500;display:block;margin-bottom:8px;"><?= lang('quantity') ?></label>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <button type="button" style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;border:1px solid var(--color-border);cursor:pointer;background:transparent;" onclick="adjustQty(-1)">−</button>
                        <input type="number" id="product-qty" value="1" min="1" max="<?= $product['quantity'] ?>" style="width:60px;text-align:center;padding:8px;border:1px solid var(--color-border);font-size:14px;font-weight:600;font-family:var(--font-body);">
                        <button type="button" style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;border:1px solid var(--color-border);cursor:pointer;background:transparent;" onclick="adjustQty(1)">+</button>
                        <?php if ($publicQuantity == 1) { ?>
                            <?php if ($product['quantity'] > 0) { ?>
                                <span style="font-size:13px;color:#3a8735;font-weight:500;margin-left:8px;">✔ <?= lang('in_stock') ?></span>
                            <?php } else { ?>
                                <span style="font-size:13px;color:#da3f3f;font-weight:500;margin-left:8px;">✘ <?= lang('out_of_stock') ?></span>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php if ($hideBuyButtonsOfOutOfStock == 0 || $product['quantity'] > 0) { ?>
                <div style="display:flex;gap:12px;margin-top:24px;">
                    <a href="#!" data-id="<?= $product['id'] ?>" data-goto="<?= LANG_URL . '/checkout' ?>" class="add-to-cart m-btn" style="flex:1;"><?= lang('add_to_cart') ?></a>
                    <a href="#!" data-id="<?= $product['id'] ?>" data-goto="<?= LANG_URL . '/checkout' ?>" class="add-to-cart m-btn m-btn-outline" style="flex:1;"><?= lang('buy_now') ?></a>
                </div>
            <?php } else { ?>
                <div style="padding:16px;border:1px solid var(--color-border);text-align:center;font-weight:500;margin-top:24px;color:#999;"><?= lang('out_of_stock_product') ?></div>
            <?php } ?>

            <?php if ($publicDateAdded == 1) { ?>
                <div style="font-size:13px;color:#999;margin-top:12px;"><?= lang('added_on') ?>: <?= date('m.d.Y', $product['time']) ?></div>
            <?php } ?>

            <div style="border-top:1px solid var(--color-border);padding-top:24px;margin-top:24px;">
                <div style="font-weight:600;font-size:16px;margin-bottom:12px;"><?= lang('description') ?></div>
                <div style="font-size:15px;color:#666;line-height:1.8;"><?= $product['description'] ?></div>
            </div>

            <div style="margin-top:24px;"><?php include rtrim(APPPATH, '/') . '/views/main/social_share.php'; ?></div>
        </div>
    </div>

    <?php if (!empty($sameCagegoryProducts)) { ?>
    <div style="margin-top:60px;">
        <div style="text-align:center;margin-bottom:32px;">
            <div style="font-size:14px;color:#999;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;"><?= lang('more_from_category') ?></div>
            <div style="font-size:24px;font-weight:700;"><?= $product['categorie_name'] ?></div>
        </div>
        <div class="m-product-grid">
            <?php foreach ($sameCagegoryProducts as $article) {
                $img = base_url('/attachments/no-image-frontend.png');
                if (is_file('attachments/shop_images/' . $article['image'])) { $img = base_url('/attachments/shop_images/' . $article['image']); }
                $url = $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'];
            ?>
            <div class="m-product-card">
                <div class="m-product-card-image">
                    <a href="<?= $url ?>"><img src="<?= $img ?>" alt="<?= htmlentities($article['title']) ?>"></a>
                    <div class="m-product-card-actions">
                        <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                            <a href="#!" class="m-btn-add-cart add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>"><?= lang('add_to_cart') ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="m-product-card-info">
                    <a href="<?= $url ?>" class="m-product-card-title"><?= character_limiter($article['title'], 50) ?></a>
                    <div class="m-product-card-price"><?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?></div>
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