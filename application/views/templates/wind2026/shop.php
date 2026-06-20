<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="m-page m-page--shop m-gradient m-color-default">
    <div class="m-page__header">
        <h1 class="m-page__title"><?= lang('products') ?></h1>
    </div>

    <div class="m-shop-layout">
        <aside class="m-shop-sidebar">
            <div class="m-sidebar">
                <div class="m-sidebar__header">
                    <span class="m-sidebar__title"><?= lang('categories') ?></span>
                    <?php if (isset($_GET['category']) && $_GET['category'] != '') { ?>
                        <a href="javascript:void(0);" class="m-sidebar__clear" data-type-clear="category">&#10005;</a>
                    <?php } ?>
                </div>
                <a href="javascript:void(0);" class="m-sidebar__toggle" id="show-xs-nav">
                    <span class="show-sp"><?= lang('showXsNav') ?></span>
                    <span class="hidde-sp hidden"><?= lang('hideXsNav') ?></span>
                </a>
                <div id="nav-categories" class="m-sidebar__nav">
                    <?php
                    function loop_tree_shop($pages, $is_recursion = false) { ?>
                        <ul class="<?= $is_recursion ? 'm-sidebar__sublist' : 'm-sidebar__list' ?>">
                            <?php foreach ($pages as $page) {
                                $children = (isset($page['children']) && !empty($page['children'])); ?>
                                <li class="m-sidebar__item">
                                    <a href="javascript:void(0);" data-categorie-id="<?= $page['id'] ?>" class="m-sidebar__link go-category">
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
            <div class="m-sidebar">
                <div class="m-sidebar__header">
                    <span class="m-sidebar__title"><?= lang('brands') ?></span>
                    <?php if (isset($_GET['brand_id']) && $_GET['brand_id'] != '') { ?>
                        <a href="javascript:void(0);" class="m-sidebar__clear" data-type-clear="brand_id">&#10005;</a>
                    <?php } ?>
                </div>
                <div class="m-sidebar__nav">
                    <?php foreach ($brands as $brand) { ?>
                        <a href="javascript:void(0);" data-brand-id="<?= $brand['id'] ?>" class="m-sidebar__link brand"><?= $brand['name'] ?></a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>

            <?php if ($showOutOfStock == 1) { ?>
            <div class="m-sidebar">
                <div class="m-sidebar__header">
                    <span class="m-sidebar__title"><?= lang('store') ?></span>
                </div>
                <div class="m-sidebar__nav">
                    <a href="javascript:void(0);" data-in-stock="1" class="m-sidebar__link in-stock"><?= lang('in_stock') ?> (<?= $countQuantities['in_stock'] ?>)</a>
                    <a href="javascript:void(0);" data-in-stock="0" class="m-sidebar__link in-stock"><?= lang('out_of_stock') ?> (<?= $countQuantities['out_of_stock'] ?>)</a>
                </div>
            </div>
            <?php } ?>

            <?php if ($shippingOrder != 0 && $shippingOrder != null) { ?>
            <div class="m-sidebar">
                <div class="m-sidebar__header">
                    <span class="m-sidebar__title"><?= lang('freeShippingHeader') ?></span>
                </div>
                <div class="m-sidebar__content">
                    <p class="m-sidebar__text"><?= str_replace(array('%price%', '%currency%'), array($shippingOrder, CURRENCY), lang('freeShipping')) ?>!</p>
                </div>
            </div>
            <?php } ?>
        </aside>

        <main class="m-shop-main">
            <div class="m-shop-toolbar">
                <span class="m-shop-toolbar__count"><?= lang('products') ?></span>
                <div class="m-shop-toolbar__sort">
                    <select class="m-sort-select order" data-order-to="order_new">
                        <option <?= (isset($_GET['order_new']) && $_GET['order_new'] == "desc") || !isset($_GET['order_new']) || $_GET['order_new'] == "" ? 'selected' : '' ?> value="desc"><?= lang('new') ?></option>
                        <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('old') ?></option>
                    </select>
                    <select class="m-sort-select order" data-order-to="order_price">
                        <option label="<?= lang('not_selected') ?>"></option>
                        <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('price_low') ?></option>
                        <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('price_high') ?></option>
                    </select>
                    <select class="m-sort-select order" data-order-to="order_procurement">
                        <option label="<?= lang('not_selected') ?>"></option>
                        <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('procurement_desc') ?></option>
                        <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('procurement_asc') ?></option>
                    </select>
                </div>
            </div>

            <?php if (!empty($products)) { ?>
                <div class="m-product-grid m-product-grid--shop">
                    <?php foreach ($products as $article) {
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
                                <img src="<?= htmlentities($productImage) ?>" alt="<?= htmlentities($article['title']) ?>">
                            </a>
                            <?php if ($hasOld) { ?>
                                <span class="m-product-card__tag-name">-<?= number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) ?>%</span>
                            <?php } ?>
                        </div>
                        <div class="m-product-card__content">
                            <div class="m-product-card__info">
                                <div class="m-product-card__title">
                                    <a href="<?= $productUrl ?>" class="m-product-card__name"><?= character_limiter($article['title'], 70) ?></a>
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
                                <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                                    <a href="javascript:void(0);" class="m-product-card__btn add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>"><?= lang('add_to_cart') ?></a>
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
                <div class="m-pagination"><?= $links_pagination ?></div>
            <?php } ?>
        </main>
    </div>
</div>
