<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="m-page" id="shopping-cart">
    <h1 style="font-size:28px;font-weight:700;margin-bottom:8px;"><?= lang('shopping_cart') ?></h1>
    <p style="font-size:15px;color:#666;margin-bottom:32px;"><?= lang('checkout_top_header') ?></p>

    <?php if (!isset($cartItems['array']) || $cartItems['array'] == null) { ?>
        <div style="padding:24px;border:1px solid var(--color-border);font-size:15px;color:#666;"><?= lang('no_products_in_cart') ?></div>
    <?php } else { ?>
        <div style="border:1px solid var(--color-border);">
            <?php foreach ($cartItems['array'] as $item) { ?>
                <?php
                $productImage = base_url('/attachments/no-image-frontend.png');
                if (is_file('attachments/shop_images/' . $item['image'])) {
                    $productImage = base_url('/attachments/shop_images/' . $item['image']);
                }
                ?>
                <div class="m-cart-item">
                    <a href="<?= LANG_URL . '/' . $item['url'] ?>">
                        <img src="<?= $productImage ?>" alt="" class="m-cart-item-image">
                    </a>
                    <div style="flex:1;min-width:0;">
                        <a href="<?= LANG_URL . '/' . $item['url'] ?>" style="font-weight:600;font-size:15px;display:block;margin-bottom:4px;"><?= $item['title'] ?></a>
                        <div style="font-size:14px;color:#666;">
                            <?= $item['price'] . CURRENCY ?> &middot; <?= lang('total') ?>: <?= $item['sum_price'] . CURRENCY ?>
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <a class="add-to-cart refresh-me" data-id="<?= $item['id'] ?>" href="#!" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;border:1px solid var(--color-border);font-size:14px;<?= $item['quantity'] <= $item['num_added'] ? 'opacity:0.4;pointer-events:none;' : '' ?>">+</a>
                        <span style="min-width:36px;text-align:center;font-weight:600;font-size:15px;"><?= $item['num_added'] ?></span>
                        <a onclick="removeProduct(<?= $item['id'] ?>, true); return false;" href="#!" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;border:1px solid var(--color-border);font-size:14px;">−</a>
                        <a href="<?= base_url('home/removeFromCart?delete-product=' . $item['id'] . '&back-to=shopping-cart') ?>" style="color:var(--color-error);padding:8px;">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </div>
                </div>
            <?php } ?>

            <div style="display:flex;justify-content:space-between;align-items:center;padding:24px;border-top:1px solid var(--color-border);">
                <div style="font-size:16px;font-weight:600;">
                    <?= lang('total') ?>: <span style="font-weight:700;"><?= $cartItems['finalSum'] . CURRENCY ?></span>
                </div>
                <div style="display:flex;gap:12px;">
                    <a href="<?= LANG_URL ?>" class="m-btn m-btn-outline">← <?= lang('continue_shopping') ?></a>
                    <a href="<?= LANG_URL . '/checkout' ?>" class="m-btn"><?= lang('checkout') ?> →</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
if ($this->session->flashdata('deleted')) {
    ?>
    <script>
        $(document).ready(function () {
            ShowNotificator('alert-info', '<?= $this->session->flashdata('deleted') ?>');
        });
    </script>
<?php } ?>