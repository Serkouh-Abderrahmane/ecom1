<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
$productImage = base_url('/attachments/no-image-frontend.png');
if (is_file('attachments/shop_images/' . $product['image'])) {
    $productImage = base_url('/attachments/shop_images/' . $product['image']);
}
$addedCount = 0;
if (isset($_SESSION['shopping_cart']) && is_array($_SESSION['shopping_cart'])) {
    $result = array_count_values($_SESSION['shopping_cart']);
    if (isset($result[$product['id']])) {
        $addedCount = $result[$product['id']];
    }
}
?>
<div class="m-page" id="view-product">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:40px;">
        <div>
            <div style="overflow:hidden;background:#f5f5f5;display:flex;align-items:center;justify-content:center;padding:24px;">
                <img src="<?= $productImage; ?>" data-num="0" class="other-img-preview img-sl the-image" style="max-height:520px;width:auto;object-fit:contain;" alt="<?= str_replace('"', "'", $product['title']) ?>">
            </div>
            <?php if ($product['folder'] != null) { ?>
                <?php $dir = "attachments/shop_images/" . $product['folder'] . '/'; ?>
                <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px;margin-top:12px;">
                    <?php
                    if (is_dir($dir)) {
                        if ($dh = opendir($dir)) {
                            $i = 1;
                            while (($file = readdir($dh)) !== false) {
                                if (is_file($dir . $file)) { ?>
                                    <button type="button" style="overflow:hidden;border:1px solid var(--color-border);cursor:pointer;background:#f5f5f5;padding:4px;">
                                        <img src="<?= base_url($dir . $file) ?>" data-num="<?= $i ?>" class="other-img-preview img-sl the-image" style="height:80px;width:100%;object-fit:contain;" alt="">
                                    </button>
                                <?php $i++; }
                            } closedir($dh);
                        }
                    } ?>
                </div>
            <?php } ?>
            <div style="margin-top:16px;"><?php include rtrim(APPPATH, '/') . '/views/main/social_share.php'; ?></div>
        </div>

        <div style="border:1px solid var(--color-border);padding:32px;">
            <div style="font-size:12px;color:#999;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;"><?= lang('vendor') ?></div>
            <a href="<?= LANG_URL . '/vendor/view/' . $vendorInfo['url'] ?>" style="font-weight:600;font-size:15px;display:inline-flex;align-items:center;gap:4px;margin-bottom:12px;"><?= $vendorInfo['name'] ?> →</a>
            <h1 style="font-size:24px;font-weight:700;margin-bottom:16px;"><?= $product['title'] ?></h1>

            <div style="display:flex;gap:16px;align-items:baseline;margin-bottom:16px;">
                <span style="font-size:24px;font-weight:700;"><?= $product['price'] . CURRENCY ?></span>
                <?php if ($product['old_price'] != '') { ?>
                    <span style="font-size:16px;color:#999;text-decoration:line-through;"><?= $product['old_price'] . CURRENCY ?></span>
                <?php } ?>
            </div>

            <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:20px;">
                <?php if ($publicQuantity == 1) { ?>
                    <span style="padding:4px 12px;border:1px solid var(--color-border);font-size:13px;"><?= lang('in_stock') ?>: <?= $product['quantity'] ?></span>
                <?php } ?>
                <span style="padding:4px 12px;border:1px solid var(--color-border);font-size:13px;"><?= lang('num_added_to_cart') ?>: <?= $addedCount ?></span>
                <?php if ($publicDateAdded == 1) { ?>
                    <span style="padding:4px 12px;border:1px solid var(--color-border);font-size:13px;"><?= lang('added_on') ?>: <?= date('m.d.Y', $product['time']) ?></span>
                <?php } ?>
            </div>

            <div style="margin-bottom:20px;">
                <span style="font-weight:500;font-size:14px;"><?= lang('in_category') ?>: </span>
                <a href="#!" class="go-category" data-categorie-id="<?= $product['shop_categorie'] ?>" style="font-weight:600;font-size:14px;"><?= $product['categorie_name'] ?></a>
            </div>

            <div style="display:flex;gap:12px;">
                <?php if ($product['quantity'] > 0) { ?>
                    <a href="#!" data-id="<?= $product['id'] ?>" data-goto="<?= LANG_URL . '/shopping-cart' ?>" class="add-to-cart m-btn" style="flex:1;"><?= lang('add_to_cart') ?></a>
                    <a href="#!" data-id="<?= $product['id'] ?>" data-goto="<?= LANG_URL . '/checkout' ?>" class="add-to-cart m-btn m-btn-outline" style="flex:1;"><?= lang('buy_now') ?></a>
                <?php } else { ?>
                    <div style="padding:12px 20px;border:1px solid var(--color-border);font-weight:500;color:#999;text-align:center;flex:1;"><?= lang('out_of_stock_product') ?></div>
                <?php } ?>
            </div>

            <div style="border-top:1px solid var(--color-border);padding-top:24px;margin-top:24px;">
                <h3 style="font-weight:600;font-size:16px;margin-bottom:12px;"><?= lang('description') ?></h3>
                <div style="font-size:15px;color:#666;line-height:1.8;"><?= $product['description'] ?></div>
            </div>
        </div>
    </div>

    <div style="margin-top:60px;">
        <h3 style="font-size:20px;font-weight:700;margin-bottom:20px;"><?= lang('oder_from_category') ?></h3>
        <?php if (!empty($sameCagegoryProducts)) { ?>
            <?= $load::getProducts($sameCagegoryProducts, '', false) ?>
        <?php } else { ?>
            <div style="padding:24px;border:1px solid var(--color-border);color:#666;"><?= lang('no_same_category_products') ?></div>
        <?php } ?>
    </div>
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
<script src="<?= base_url('assets/js/image-preveiw.js') ?>"></script>