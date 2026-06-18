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
<div class="max-w-7xl mx-auto px-4 py-6">
    <nav class="flex items-center gap-2 text-xs font-medium text-slate-400 mb-6">
        <a href="<?= LANG_URL ?>" class="hover:text-slate-900 transition-colors">Trang chủ</a>
        <span>/</span>
        <a href="#!" class="go-category hover:text-slate-900 transition-colors" data-categorie-id="<?= $product['shop_categorie'] ?>"><?= $product['categorie_name'] ?></a>
        <span>/</span>
        <span class="text-slate-700 truncate max-w-[200px]"><?= htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8') ?></span>
    </nav>
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
        <div>
            <div class="sticky top-24">
                <div class="relative aspect-[4/5] bg-slate-50 rounded-2xl overflow-hidden group">
                    <img src="<?= $productImage; ?>" data-num="0" class="other-img-preview img-sl the-image w-full h-full object-cover cursor-pointer" alt="<?= str_replace('"', "'", $product['title']) ?>">
                    <?php if ($discountPercent > 0) { ?>
                        <span class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-lg">-<?= $discountPercent ?>%</span>
                    <?php } ?>
                </div>
                <?php if ($product['folder'] != null) {
                    $dir = "attachments/shop_images/" . $product['folder'] . '/'; ?>
                    <div class="mt-3 grid grid-cols-4 gap-2">
                        <button type="button" class="aspect-square rounded-xl overflow-hidden bg-slate-50 ring-1 ring-slate-200 hover:ring-slate-400 transition-all active">
                            <img src="<?= $productImage ?>" data-num="0" class="other-img-preview img-sl the-image w-full h-full object-cover" alt="">
                        </button>
                        <?php if (is_dir($dir)) {
                            if ($dh = opendir($dir)) {
                                $i = 1;
                                while (($file = readdir($dh)) !== false) {
                                    if (is_file($dir . $file)) { ?>
                                        <button type="button" class="aspect-square rounded-xl overflow-hidden bg-slate-50 ring-1 ring-slate-200 hover:ring-slate-400 transition-all">
                                            <img src="<?= base_url($dir . $file) ?>" data-num="<?= $i ?>" class="other-img-preview img-sl the-image w-full h-full object-cover" alt="">
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
            <h1 class="text-2xl md:text-3xl font-bold text-slate-900"><?= htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8') ?></h1>
            <div class="mt-4 flex items-baseline gap-3 flex-wrap">
                <span class="text-2xl font-bold text-slate-900"><?= $product['price'] . CURRENCY ?></span>
                <?php if ($product['old_price'] != '') { ?>
                    <span class="text-lg text-slate-400 line-through"><?= $product['old_price'] . CURRENCY ?></span>
                    <span class="text-sm font-semibold text-red-500 bg-red-50 px-2 py-0.5 rounded-lg">-<?= $discountPercent ?>%</span>
                <?php } ?>
            </div>

            <div class="mt-8 space-y-4">
                <div>
                    <label class="text-sm font-semibold text-slate-700"><?= lang('size') ?></label>
                    <div class="mt-2 flex flex-wrap gap-2">
                        <button type="button" class="px-4 py-2 text-sm font-medium rounded-xl border border-slate-200 hover:border-slate-900 hover:bg-slate-900 hover:text-white transition-all">XS</button>
                        <button type="button" class="px-4 py-2 text-sm font-medium rounded-xl border border-slate-900 bg-slate-900 text-white">S</button>
                        <button type="button" class="px-4 py-2 text-sm font-medium rounded-xl border border-slate-200 hover:border-slate-900 hover:bg-slate-900 hover:text-white transition-all">M</button>
                        <button type="button" class="px-4 py-2 text-sm font-medium rounded-xl border border-slate-200 hover:border-slate-900 hover:bg-slate-900 hover:text-white transition-all">L</button>
                        <button type="button" class="px-4 py-2 text-sm font-medium rounded-xl border border-slate-200 hover:border-slate-900 hover:bg-slate-900 hover:text-white transition-all">XL</button>
                        <button type="button" class="px-4 py-2 text-sm font-medium rounded-xl border border-slate-200 hover:border-slate-900 hover:bg-slate-900 hover:text-white transition-all">XXL</button>
                    </div>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-700"><?= lang('quantity') ?></label>
                    <div class="mt-2 flex items-center gap-2">
                        <button type="button" class="w-10 h-10 inline-flex items-center justify-center rounded-xl border border-slate-200 hover:bg-slate-50 transition-colors" onclick="adjustQty(-1)">
                            <i class="fa fa-minus text-sm"></i>
                        </button>
                        <input type="number" id="product-qty" value="1" min="1" max="<?= $product['quantity'] ?>" class="w-16 text-center rounded-xl border border-slate-200 px-3 py-2 text-sm font-semibold outline-none focus:ring-2 focus:ring-slate-900/10">
                        <button type="button" class="w-10 h-10 inline-flex items-center justify-center rounded-xl border border-slate-200 hover:bg-slate-50 transition-colors" onclick="adjustQty(1)">
                            <i class="fa fa-plus text-sm"></i>
                        </button>
                        <?php if ($publicQuantity == 1) { ?>
                            <?php if ($product['quantity'] > 0) { ?>
                                <span class="text-xs text-emerald-600 font-semibold ml-2">✔ <?= lang('in_stock') ?></span>
                            <?php } else { ?>
                                <span class="text-xs text-red-500 font-semibold ml-2">✘ <?= lang('out_of_stock') ?></span>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php if ($hideBuyButtonsOfOutOfStock == 0 || $product['quantity'] > 0) { ?>
                <div class="mt-8 flex flex-col sm:flex-row gap-3">
                    <a href="#!" data-id="<?= $product['id'] ?>" data-goto="<?= LANG_URL . '/checkout' ?>" class="add-to-cart flex-1 inline-flex items-center justify-center gap-2 rounded-2xl bg-slate-900 px-6 py-3.5 text-sm font-semibold text-white hover:bg-slate-800 transition-colors">
                        <i class="fa fa-shopping-bag"></i>
                        <?= lang('add_to_cart') ?>
                    </a>
                    <a href="#!" data-id="<?= $product['id'] ?>" data-goto="<?= LANG_URL . '/checkout' ?>" class="add-to-cart flex-1 inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-6 py-3.5 text-sm font-semibold text-slate-900 ring-1 ring-inset ring-slate-200 hover:bg-slate-50 transition-colors">
                        <?= lang('buy_now') ?>
                    </a>
                </div>
            <?php } else { ?>
                <div class="mt-8">
                    <div class="w-full rounded-2xl bg-slate-50 px-6 py-3.5 text-sm font-semibold text-slate-500 ring-1 ring-inset ring-slate-200 text-center"><?= lang('out_of_stock_product') ?></div>
                </div>
            <?php } ?>

            <?php if ($publicDateAdded == 1) { ?>
                <div class="mt-4 text-xs text-slate-400"><?= lang('added_on') ?>: <?= date('m.d.Y', $product['time']) ?></div>
            <?php } ?>

            <div class="mt-8 border-t border-slate-100 pt-6">
                <div class="text-sm font-semibold text-slate-900 mb-3"><?= lang('description') ?></div>
                <div id="description" class="text-sm text-slate-600 leading-relaxed prose prose-slate max-w-none">
                    <?= $product['description'] ?>
                </div>
            </div>

            <div class="mt-6"><?php include rtrim(APPPATH, '/') . '/views/main/social_share.php'; ?></div>
        </div>
    </div>

    <?php if (!empty($sameCagegoryProducts)) { ?>
    <div class="mt-16">
        <div class="flex items-center justify-between mb-8">
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.15em] text-slate-400"><?= lang('more_from_category') ?></span>
                <h2 class="text-xl font-bold text-slate-900 mt-1"><?= $product['categorie_name'] ?></h2>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            <?php foreach ($sameCagegoryProducts as $article) {
                $img = base_url('/attachments/no-image-frontend.png');
                if (is_file('attachments/shop_images/' . $article['image'])) { $img = base_url('/attachments/shop_images/' . $article['image']); }
                $url = $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'];
            ?>
            <div class="group">
                <div class="relative aspect-[3/4] bg-slate-50 rounded-2xl overflow-hidden">
                    <a href="<?= $url ?>"><img src="<?= $img ?>" alt="<?= htmlentities($article['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500"></a>
                    <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                            <a href="#!" class="add-to-cart block w-full bg-white text-slate-900 text-center text-sm font-semibold py-2.5 rounded-xl hover:bg-slate-100" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>"><?= lang('add_to_cart') ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="<?= $url ?>" class="block text-sm font-medium text-slate-900 hover:text-slate-600"><?= character_limiter($article['title'], 50) ?></a>
                    <div class="mt-1 text-sm font-bold text-slate-900"><?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?></div>
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
