<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="m-page">
    <div style="display:grid;grid-template-columns:1fr 2fr;gap:40px;">
        <div style="border:1px solid var(--color-border);padding:32px;">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:24px;">
                <div style="width:48px;height:48px;border-radius:50%;background:#000;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:18px;"><?= strtoupper(substr($userInfo['name'], 0, 1)) ?></div>
                <div>
                    <h1 style="font-size:20px;font-weight:700;"><?= lang('my_acc') ?></h1>
                    <p style="font-size:14px;color:#666;"><?= lang('welcome_user') ?> <?= htmlspecialchars($userInfo['name'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </div>
            <form method="POST" action="">
                <div style="margin-bottom:16px;">
                    <label class="m-label"><?= lang('name') ?></label>
                    <input type="text" name="name" value="<?= htmlspecialchars($userInfo['name'], ENT_QUOTES, 'UTF-8') ?>" class="m-input">
                </div>
                <div style="margin-bottom:16px;">
                    <label class="m-label"><?= lang('phone') ?></label>
                    <input type="text" name="phone" value="<?= htmlspecialchars($userInfo['phone'], ENT_QUOTES, 'UTF-8') ?>" class="m-input">
                </div>
                <div style="margin-bottom:16px;">
                    <label class="m-label"><?= lang('email_address') ?></label>
                    <input type="email" name="email" value="<?= htmlspecialchars($userInfo['email'], ENT_QUOTES, 'UTF-8') ?>" class="m-input" required>
                </div>
                <div style="margin-bottom:16px;">
                    <label class="m-label"><?= lang('password') ?></label>
                    <input type="password" name="pass" placeholder="<?= lang('password') ?> (<?= lang('new_pass_sended') ?>)" class="m-input">
                </div>
                <button type="submit" name="update" class="m-btn" style="width:100%;"><?= lang('update') ?></button>
                <a href="<?= LANG_URL . '/logout' ?>" class="m-btn m-btn-outline" style="width:100%;margin-top:8px;text-align:center;"><?= lang('logout') ?></a>
            </form>
        </div>
        <div style="border:1px solid var(--color-border);padding:32px;">
            <h2 style="font-size:20px;font-weight:700;margin-bottom:24px;"><?= lang('user_order_history') ?></h2>
            <?php if (!empty($orders_history)) { ?>
                <div>
                    <?php foreach ($orders_history as $order) { ?>
                        <div style="border:1px solid var(--color-border);padding:16px;margin-bottom:16px;">
                            <div style="display:flex;flex-wrap:wrap;gap:16px;font-size:14px;margin-bottom:12px;">
                                <div><span style="color:#999;"><?= lang('usr_order_id') ?>:</span> <strong><?= $order['order_id'] ?></strong></div>
                                <div><span style="color:#999;"><?= lang('usr_order_date') ?>:</span> <strong><?= date('d.m.Y', $order['date']) ?></strong></div>
                                <div><span style="color:#999;"><?= lang('usr_order_address') ?>:</span> <strong><?= htmlspecialchars($order['address'], ENT_QUOTES, 'UTF-8') ?></strong></div>
                                <div><span style="color:#999;"><?= lang('usr_order_phone') ?>:</span> <strong><?= htmlspecialchars($order['phone'], ENT_QUOTES, 'UTF-8') ?></strong></div>
                            </div>
                            <?php
                            $arr_products = unserialize($order['products']);
                            if (!empty($arr_products)) { ?>
                                <div style="border-top:1px solid #f0f0f0;padding-top:12px;">
                                    <?php foreach ($arr_products as $product) { ?>
                                        <div style="display:flex;align-items:center;gap:12px;padding:8px 0;">
                                            <img src="<?= base_url('attachments/shop_images/' . $product['product_info']['image']) ?>" alt="" style="width:60px;height:60px;object-fit:cover;background:#f5f5f5;">
                                            <div>
                                                <a href="<?= base_url($product['product_info']['url']) ?>" style="font-weight:500;font-size:14px;"><?= htmlspecialchars($product['product_info']['title'] ?? $product['product_info']['url'], ENT_QUOTES, 'UTF-8') ?></a>
                                                <div style="font-size:13px;color:#666;"><?= lang('user_order_quantity') ?> <?= $product['product_quantity'] ?></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($links_pagination)) { ?>
                        <div class="mt-40"><?= $links_pagination ?></div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div style="text-align:center;padding:40px;">
                    <p style="font-size:15px;color:#999;margin-bottom:16px;"><?= lang('usr_no_orders') ?></p>
                    <a href="<?= LANG_URL ?>" class="m-btn m-btn-outline">← Tiếp tục mua sắm</a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>