<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="m-page" id="vendor-page">
    <div style="padding:40px;background:#f9f9f9;border:1px solid var(--color-border);margin-bottom:32px;">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;">
            <div>
                <div style="font-size:12px;color:#999;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;"><?= lang('vendor') ?></div>
                <h1 style="font-size:28px;font-weight:700;"><?= $vendorInfo['name'] ?></h1>
            </div>
            <a href="<?= LANG_URL ?>" class="m-btn m-btn-outline m-btn-sm">← <?= lang('back_to_shop') ?></a>
        </div>
    </div>

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
        </aside>

        <main id="products-side">
            <div style="display:flex;justify-content:space-between;align-items:center;padding:16px;border:1px solid var(--color-border);margin-bottom:20px;">
                <div style="font-weight:600;font-size:15px;"><?= lang('products') ?></div>
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

            <div>
                <?php if (!empty($products)) { ?>
                    <?= $load::getProducts($products, '', false) ?>
                <?php } else { ?>
                    <script>
                        $(document).ready(function () {
                            ShowNotificator('alert-info', '<?= lang('no_results') ?>');
                        });
                    </script>
                <?php } ?>
            </div>

            <?php if ($links_pagination != '') { ?>
                <div style="margin-top:32px;"><?= $links_pagination ?></div>
            <?php } ?>
        </main>
    </div>
</div>