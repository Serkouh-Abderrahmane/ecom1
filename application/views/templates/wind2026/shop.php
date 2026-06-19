<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="max-w-7xl mx-auto px-4 py-8" id="shop-page">
    <div class="flex items-end justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900"><?= lang('shop') ?></h1>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
        <aside class="lg:col-span-3">
            <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-semibold text-slate-900"><?= lang('categories') ?></div>
                    <?php if (isset($_GET['category']) && $_GET['category'] != '') { ?>
                        <a href="javascript:void(0);" class="clear-filter text-sm font-semibold text-slate-600 hover:text-slate-900" data-type-clear="category">
                            <i class="fa fa-times"></i>
                        </a>
                    <?php } ?>
                </div>
                <a href="javascript:void(0);" id="show-xs-nav" class="mt-3 inline-flex w-full items-center justify-between rounded-xl bg-slate-50 px-3 py-2 text-sm font-semibold text-slate-900 ring-1 ring-inset ring-slate-200 lg:hidden">
                    <span class="show-sp"><?= lang('showXsNav') ?> <i class="fa fa-angle-down"></i></span>
                    <span class="hidde-sp hidden"><?= lang('hideXsNav') ?> <i class="fa fa-angle-up"></i></span>
                </a>
                <div id="nav-categories" class="mt-4">
                    <?php
                    function loop_tree_shop($pages, $is_recursion = false) { ?>
                        <ul class="<?= $is_recursion === true ? 'ml-4 mt-2 space-y-1' : 'space-y-1' ?>">
                            <?php foreach ($pages as $page) {
                                $children = (isset($page['children']) && !empty($page['children'])); ?>
                                <li>
                                    <a href="javascript:void(0);" data-categorie-id="<?= $page['id'] ?>" class="go-category block rounded-xl px-3 py-2 text-sm font-medium <?= isset($_GET['category']) && $_GET['category'] == $page['id'] ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-50' ?>">
                                        <?= htmlspecialchars($page['name'], ENT_QUOTES, 'UTF-8') ?>
                                    </a>
                                    <?php if ($children === true) { loop_tree_shop($page['children'], true); } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php }
                    loop_tree_shop($home_categories); ?>
                </div>
            </div>
            <?php if ($showBrands == 1) { ?>
                <div class="mt-6 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-semibold text-slate-900"><?= lang('brands') ?></div>
                        <?php if (isset($_GET['brand_id']) && $_GET['brand_id'] != '') { ?>
                            <a href="javascript:void(0);" class="clear-filter text-sm font-semibold text-slate-600 hover:text-slate-900" data-type-clear="brand_id"><i class="fa fa-times"></i></a>
                        <?php } ?>
                    </div>
                    <div class="mt-3 space-y-1">
                        <?php foreach ($brands as $brand) { ?>
                            <a href="javascript:void(0);" data-brand-id="<?= $brand['id'] ?>" class="brand block rounded-xl px-3 py-2 text-sm font-medium <?= isset($_GET['brand_id']) && $_GET['brand_id'] == $brand['id'] ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-50' ?>"><?= $brand['name'] ?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($showOutOfStock == 1) { ?>
                <div class="mt-6 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-semibold text-slate-900"><?= lang('store') ?></div>
                        <?php if (isset($_GET['in_stock']) && $_GET['in_stock'] != '') { ?>
                            <a href="javascript:void(0);" class="clear-filter text-sm font-semibold text-slate-600 hover:text-slate-900" data-type-clear="in_stock"><i class="fa fa-times"></i></a>
                        <?php } ?>
                    </div>
                    <div class="mt-3 space-y-1">
                        <a href="javascript:void(0);" data-in-stock="1" class="in-stock block rounded-xl px-3 py-2 text-sm font-medium <?= isset($_GET['in_stock']) && $_GET['in_stock'] == '1' ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-50' ?>"><?= lang('in_stock') ?> (<?= $countQuantities['in_stock'] ?>)</a>
                        <a href="javascript:void(0);" data-in-stock="0" class="in-stock block rounded-xl px-3 py-2 text-sm font-medium <?= isset($_GET['in_stock']) && $_GET['in_stock'] == '0' ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-50' ?>"><?= lang('out_of_stock') ?> (<?= $countQuantities['out_of_stock'] ?>)</a>
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
                <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <?php foreach ($products as $i => $article) {
                        $backgroundImageFile = base_url('/attachments/no-image-frontend.png');
                        if (is_file('attachments/shop_images/' . $article['image'])) {
                            $backgroundImageFile = base_url('/attachments/shop_images/' . $article['image']);
                        }
                        $productUrl = $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'];
                        $hasOld = ($article['old_price'] != '' && $article['old_price'] != 0 && $article['price'] != '' && $article['price'] != 0);
                    ?>
                    <div class="product-card group rounded-2xl bg-white overflow-hidden ring-1 ring-slate-100" style="animation: fadeInUp 0.4s ease-out <?= ($i % 8) * 0.06 ?>s both;">
                        <div class="img-zoom-container relative aspect-[4/5] bg-slate-50">
                            <a href="<?= $productUrl ?>">
                                <img src="<?= htmlentities($backgroundImageFile) ?>" class="w-full h-full object-cover" alt="<?= htmlentities($article['title']) ?>">
                            </a>
                            <?php if ($hasOld) { ?>
                                <div class="discount-badge absolute left-3 top-3 rounded-full px-3 py-1 text-xs font-bold text-white shadow-lg">-<?= number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) ?>%</div>
                            <?php } ?>
                            <div class="quick-actions absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/60 via-black/20 to-transparent">
                                <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                                    <a href="javascript:void(0);" class="add-to-cart block w-full bg-white text-slate-900 text-center text-sm font-semibold py-2.5 rounded-xl hover:bg-slate-100 transition-all shadow-lg" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">
                                        <i class="fa fa-shopping-bag mr-1.5"></i> <?= lang('add_to_cart') ?>
                                    </a>
                                <?php } ?>
                            </div>
                            <button class="add-to-cart absolute top-3 right-3 w-9 h-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white transition-all opacity-0 group-hover:opacity-100 shadow-lg" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>" title="Mua ngay">
                                <i class="fa fa-bolt text-slate-900 text-sm"></i>
                            </button>
                        </div>
                        <div class="p-4">
                            <a href="<?= $productUrl ?>" class="block text-sm font-medium text-slate-900 hover:text-slate-600 transition-colors leading-snug"><?= character_limiter($article['title'], 70) ?></a>
                            <div class="mt-2 flex items-center justify-between">
                                <div class="text-sm font-bold text-slate-900"><?= $article['price'] != '' ? number_format($article['price'], 2) : 0 ?><?= CURRENCY ?></div>
                                <?php if ($hasOld) { ?>
                                    <div class="text-xs text-slate-400 line-through"><?= number_format($article['old_price'], 2) . CURRENCY ?></div>
                                <?php } ?>
                            </div>
                            <div class="mt-3 flex gap-2">
                                <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                                    <a href="javascript:void(0);" class="add-to-cart inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-slate-900 px-3 py-2.5 text-xs font-semibold text-white hover:bg-slate-800 transition-all hover:shadow-lg btn-primary" data-goto="<?= LANG_URL . '/shopping-cart' ?>" data-id="<?= $article['id'] ?>">
                                        <i class="fa fa-plus"></i> <?= lang('add_to_cart') ?>
                                    </a>
                                    <a href="javascript:void(0);" class="add-to-cart inline-flex items-center justify-center rounded-xl bg-amber-50 px-3 py-2.5 text-xs font-semibold text-amber-700 ring-1 ring-inset ring-amber-200 hover:bg-amber-100 transition-all" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>" title="Mua ngay">
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
