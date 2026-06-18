<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if (count($sliderProducts) > 0) { ?>
<section class="relative bg-slate-900 overflow-hidden min-h-[80vh] flex items-center">
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent z-10"></div>
    <div class="max-w-7xl mx-auto px-4 py-20 md:py-32 relative z-20 w-full">
        <div class="max-w-2xl">
            <span class="inline-block text-xs font-semibold uppercase tracking-[0.2em] text-white/50 mb-4"><?= lang('new_collection') ?></span>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold text-white leading-tight tracking-tight">
                SOFT ROUTINE
            </h1>
            <p class="mt-4 text-lg md:text-xl text-white/80 max-w-lg leading-relaxed">
                Flash Sale giảm đến 50% — Bộ sưu tập mới nhất đã về. Mua sắm ngay hôm nay!
            </p>
            <div class="flex flex-wrap gap-3 mt-8">
                <a href="#!" class="inline-flex items-center justify-center bg-white text-slate-900 rounded-xl px-8 py-3.5 text-sm font-bold hover:bg-slate-100 transition-all shadow-lg">
                    MUA NGAY
                    <i class="fa fa-arrow-right ml-2"></i>
                </a>
                <a href="#featured-products" class="inline-flex items-center justify-center bg-white/10 text-white rounded-xl px-8 py-3.5 text-sm font-semibold ring-1 ring-inset ring-white/30 hover:bg-white/20 transition-all">
                    <?= lang('view_collection') ?>
                </a>
            </div>
        </div>
    </div>
    <?php $heroImg = base_url('/attachments/no-image-frontend.png');
    if (is_file('attachments/shop_images/' . $sliderProducts[0]['image'])) {
        $heroImg = base_url('/attachments/shop_images/' . $sliderProducts[0]['image']);
    } ?>
    <div class="absolute inset-0 z-0">
        <img src="<?= $heroImg ?>" alt="" class="w-full h-full object-cover">
    </div>
</section>
<?php } ?>

<?php if (!empty($bestSellers)) { ?>
<section id="featured-products" class="py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-end justify-between mb-10">
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.15em] text-slate-400"><?= lang('featured') ?></span>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mt-2"><?= lang('best_sellers') ?></h2>
            </div>
            <a href="#!" class="hidden md:inline-flex text-sm font-semibold text-slate-900 hover:text-slate-600 transition-colors">
                <?= lang('view_all') ?> <i class="fa fa-arrow-right ml-1.5"></i>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            <?php foreach (array_slice($bestSellers, 0, 8) as $article) {
                $productImage = base_url('/attachments/no-image-frontend.png');
                if (is_file('attachments/shop_images/' . $article['image'])) {
                    $productImage = base_url('/attachments/shop_images/' . $article['image']);
                }
                $productUrl = $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'];
                $hasOld = ($article['old_price'] != '' && $article['old_price'] != 0 && $article['price'] != '' && $article['price'] != 0);
            ?>
            <div class="group">
                <div class="relative aspect-[3/4] bg-slate-50 rounded-2xl overflow-hidden">
                    <a href="<?= $productUrl ?>">
                        <img src="<?= $productImage ?>" alt="<?= htmlentities($article['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500">
                    </a>
                    <?php if ($hasOld) { ?>
                        <span class="absolute top-3 left-3 bg-rose-600 text-white text-xs font-bold px-2.5 py-1 rounded-full">
                            -<?= number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) ?>%
                        </span>
                    <?php } ?>
                    <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                            <a href="#!" class="add-to-cart block w-full bg-white text-slate-900 text-center text-sm font-semibold py-2.5 rounded-xl hover:bg-slate-100 transition-colors" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">
                                Thêm vào giỏ
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="<?= $productUrl ?>" class="block text-sm font-medium text-slate-900 hover:text-slate-600 transition-colors"><?= character_limiter($article['title'], 50) ?></a>
                    <div class="mt-1 flex items-center gap-2">
                        <span class="text-sm font-bold text-slate-900"><?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?></span>
                        <?php if ($hasOld) { ?>
                            <span class="text-xs text-slate-400 line-through"><?= number_format($article['old_price'], 2) . CURRENCY ?></span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<?php if (!empty($home_categories)) { ?>
<section class="py-16 md:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10">
            <span class="text-xs font-semibold uppercase tracking-[0.15em] text-slate-400"><?= lang('categories') ?></span>
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mt-2"><?= lang('shop_by_category') ?></h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <?php foreach (array_slice($home_categories, 0, 10) as $cat) { ?>
            <a href="#!" data-categorie-id="<?= $cat['id'] ?>" class="go-category group block relative aspect-square rounded-2xl overflow-hidden bg-slate-200">
                <?php if (isset($cat['image']) && $cat['image'] != '' && is_file('attachments/shop_images/' . $cat['image'])) { ?>
                    <img src="<?= base_url('attachments/shop_images/' . $cat['image']) ?>" alt="<?= htmlspecialchars($cat['name'], ENT_QUOTES, 'UTF-8') ?>" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500">
                <?php } else { ?>
                    <div class="w-full h-full flex items-center justify-center bg-slate-100">
                        <i class="fa fa-image text-slate-300 text-3xl"></i>
                    </div>
                <?php } ?>
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h3 class="text-sm font-semibold text-white"><?= htmlspecialchars($cat['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<?php if (!empty($newProducts)) { ?>
<section class="py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-end justify-between mb-10">
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.15em] text-slate-400"><?= lang('new_arrivals') ?></span>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mt-2"><?= lang('new_products') ?></h2>
            </div>
            <a href="#!" class="hidden md:inline-flex text-sm font-semibold text-slate-900 hover:text-slate-600 transition-colors">
                <?= lang('view_all') ?> <i class="fa fa-arrow-right ml-1.5"></i>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <?php foreach (array_slice($newProducts, 0, 6) as $article) {
                $productImage = base_url('/attachments/no-image-frontend.png');
                if (is_file('attachments/shop_images/' . $article['image'])) {
                    $productImage = base_url('/attachments/shop_images/' . $article['image']);
                }
                $productUrl = $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'];
            ?>
            <div class="group">
                <div class="relative aspect-[3/4] bg-slate-50 rounded-2xl overflow-hidden">
                    <a href="<?= $productUrl ?>">
                        <img src="<?= $productImage ?>" alt="<?= htmlentities($article['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500">
                    </a>
                    <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                            <a href="#!" class="add-to-cart block w-full bg-white text-slate-900 text-center text-sm font-semibold py-2.5 rounded-xl hover:bg-slate-100 transition-colors" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">
                                Thêm vào giỏ
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="<?= $productUrl ?>" class="block text-sm font-medium text-slate-900 hover:text-slate-600 transition-colors"><?= character_limiter($article['title'], 40) ?></a>
                    <div class="mt-1 text-sm font-bold text-slate-900"><?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<section class="py-16 md:py-24 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="text-xs font-semibold uppercase tracking-[0.2em] text-white/40"><?= lang('stay_connected') ?></span>
        <h2 class="text-2xl md:text-4xl font-bold mt-4"><?= lang('newsletter_title') ?></h2>
        <p class="mt-3 text-white/60 max-w-md mx-auto"><?= lang('newsletter_description') ?></p>
        <form method="POST" class="mt-8 max-w-md mx-auto">
            <div class="flex gap-2">
                <input type="text" name="subscribeEmail" class="flex-1 border-0 bg-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder:text-white/40 outline-none focus:ring-2 focus:ring-white/20" placeholder="<?= lang('email_address') ?>">
                <button type="submit" class="bg-white text-slate-900 rounded-xl px-6 py-3 text-sm font-semibold hover:bg-slate-100 transition-colors" onclick="checkEmailField()">
                    <?= lang('subscribe') ?>
                </button>
            </div>
        </form>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-8" id="home-page">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
        <aside class="lg:col-span-3">
            <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-semibold text-slate-900"><?= lang('categories') ?></div>
                    <?php if (isset($_GET['category']) && $_GET['category'] != '') { ?>
                        <a href="#!" class="clear-filter text-sm font-semibold text-slate-600 hover:text-slate-900" data-type-clear="category">
                            <i class="fa fa-times"></i>
                        </a>
                    <?php } ?>
                </div>
                <a href="#!" id="show-xs-nav" class="mt-3 inline-flex w-full items-center justify-between rounded-xl bg-slate-50 px-3 py-2 text-sm font-semibold text-slate-900 ring-1 ring-inset ring-slate-200 lg:hidden">
                    <span class="show-sp"><?= lang('showXsNav') ?> <i class="fa fa-angle-down"></i></span>
                    <span class="hidde-sp hidden"><?= lang('hideXsNav') ?> <i class="fa fa-angle-up"></i></span>
                </a>
                <div id="nav-categories" class="mt-4">
                    <?php
                    function loop_tree($pages, $is_recursion = false) { ?>
                        <ul class="<?= $is_recursion === true ? 'ml-4 mt-2 space-y-1' : 'space-y-1' ?>">
                            <?php foreach ($pages as $page) {
                                $children = (isset($page['children']) && !empty($page['children'])); ?>
                                <li>
                                    <a href="#!" data-categorie-id="<?= $page['id'] ?>" class="go-category block rounded-xl px-3 py-2 text-sm font-medium <?= isset($_GET['category']) && $_GET['category'] == $page['id'] ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-50' ?>">
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
                <div class="mt-6 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-semibold text-slate-900"><?= lang('brands') ?></div>
                        <?php if (isset($_GET['brand_id']) && $_GET['brand_id'] != '') { ?>
                            <a href="#!" class="clear-filter text-sm font-semibold text-slate-600 hover:text-slate-900" data-type-clear="brand_id"><i class="fa fa-times"></i></a>
                        <?php } ?>
                    </div>
                    <div class="mt-3 space-y-1">
                        <?php foreach ($brands as $brand) { ?>
                            <a href="#!" data-brand-id="<?= $brand['id'] ?>" class="brand block rounded-xl px-3 py-2 text-sm font-medium <?= isset($_GET['brand_id']) && $_GET['brand_id'] == $brand['id'] ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-50' ?>"><?= $brand['name'] ?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($showOutOfStock == 1) { ?>
                <div class="mt-6 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-semibold text-slate-900"><?= lang('store') ?></div>
                        <?php if (isset($_GET['in_stock']) && $_GET['in_stock'] != '') { ?>
                            <a href="#!" class="clear-filter text-sm font-semibold text-slate-600 hover:text-slate-900" data-type-clear="in_stock"><i class="fa fa-times"></i></a>
                        <?php } ?>
                    </div>
                    <div class="mt-3 space-y-1">
                        <a href="#!" data-in-stock="1" class="in-stock block rounded-xl px-3 py-2 text-sm font-medium <?= isset($_GET['in_stock']) && $_GET['in_stock'] == '1' ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-50' ?>"><?= lang('in_stock') ?> (<?= $countQuantities['in_stock'] ?>)</a>
                        <a href="#!" data-in-stock="0" class="in-stock block rounded-xl px-3 py-2 text-sm font-medium <?= isset($_GET['in_stock']) && $_GET['in_stock'] == '0' ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-50' ?>"><?= lang('out_of_stock') ?> (<?= $countQuantities['out_of_stock'] ?>)</a>
                    </div>
                </div>
            <?php } ?>
            <?php if ($shippingOrder != 0 && $shippingOrder != null) { ?>
                <div class="mt-6 rounded-2xl bg-sky-50 p-4 ring-1 ring-sky-200">
                    <div class="text-sm font-semibold text-slate-900"><?= lang('freeShippingHeader') ?></div>
                    <div class="mt-2 text-sm text-slate-700">
                        <span class="font-semibold"><?= lang('promo') ?></span> — <?= str_replace(array('%price%', '%currency%'), array($shippingOrder, CURRENCY), lang('freeShipping')) ?>!
                    </div>
                </div>
            <?php } ?>
        </aside>
        <main class="lg:col-span-9" id="products-side">
            <div class="flex flex-col gap-3 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200 md:flex-row md:items-center md:justify-between">
                <div class="text-sm font-semibold text-slate-900"><?= lang('products') ?></div>
                <div class="flex flex-col gap-2 md:flex-row md:items-center">
                    <select class="order w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 md:w-auto" data-order-to="order_new">
                        <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "desc" ? 'selected' : '' ?> <?= !isset($_GET['order_new']) || $_GET['order_new'] == "" ? 'selected' : '' ?> value="desc"><?= lang('new') ?></option>
                        <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('old') ?></option>
                    </select>
                    <select class="order w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 md:w-auto" data-order-to="order_price">
                        <option label="<?= lang('not_selected') ?>"></option>
                        <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('price_low') ?></option>
                        <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('price_high') ?></option>
                    </select>
                    <select class="order w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 md:w-auto" data-order-to="order_procurement">
                        <option label="<?= lang('not_selected') ?>"></option>
                        <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('procurement_desc') ?></option>
                        <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('procurement_asc') ?></option>
                    </select>
                </div>
            </div>
            <?php if (!empty($products)) { ?>
                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <?php foreach ($products as $article) {
                        $backgroundImageFile = base_url('/attachments/no-image-frontend.png');
                        if (is_file('attachments/shop_images/' . $article['image'])) {
                            $backgroundImageFile = base_url('/attachments/shop_images/' . $article['image']);
                        }
                        $productUrl = $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'];
                        $hasOld = ($article['old_price'] != '' && $article['old_price'] != 0 && $article['price'] != '' && $article['price'] != 0);
                    ?>
                    <div class="group overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200 hover:shadow-md transition-shadow">
                        <a href="<?= $productUrl ?>" class="block">
                            <div class="relative aspect-[4/5] bg-slate-50">
                                <img src="<?= htmlentities($backgroundImageFile) ?>" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" alt="<?= htmlentities($article['title']) ?>">
                                <?php if ($hasOld) { ?>
                                    <div class="absolute left-3 top-3 rounded-full bg-rose-600 px-3 py-1 text-xs font-bold text-white">-<?= number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) ?>%</div>
                                <?php } ?>
                            </div>
                        </a>
                        <div class="p-4">
                            <a href="<?= $productUrl ?>" class="block text-sm font-medium text-slate-900 hover:text-slate-600 transition-colors"><?= character_limiter($article['title'], 70) ?></a>
                            <div class="mt-2 flex items-baseline justify-between gap-2">
                                <div class="text-sm font-bold text-slate-900"><?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?></div>
                                <?php if ($hasOld) { ?>
                                    <div class="text-xs text-slate-400 line-through"><?= number_format($article['old_price'], 2) . CURRENCY ?></div>
                                <?php } ?>
                            </div>
                            <div class="mt-3 flex gap-2">
                                <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                                    <a href="#!" class="add-to-cart inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-slate-900 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-800 transition-colors" data-goto="<?= LANG_URL . '/shopping-cart' ?>" data-id="<?= $article['id'] ?>">
                                        <i class="fa fa-plus"></i> Thêm vào giỏ
                                    </a>
                                    <a href="#!" class="add-to-cart inline-flex items-center justify-center rounded-xl bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-900 ring-1 ring-inset ring-slate-200 hover:bg-slate-100 transition-colors" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">
                                        <i class="fa fa-bolt"></i>
                                    </a>
                                <?php } else { ?>
                                    <div class="flex-1 rounded-xl bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-600 ring-1 ring-inset ring-slate-200"><?= lang('out_of_stock_product') ?></div>
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
                <div class="mt-8"><?= $links_pagination ?></div>
            <?php } ?>
        </main>
    </div>
</div>
