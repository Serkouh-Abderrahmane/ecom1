<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl p-6 shadow-sm ring-1 ring-slate-200">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-slate-900 flex items-center justify-center text-white font-bold text-lg"><?= strtoupper(substr($userInfo['name'], 0, 1)) ?></div>
                    <div>
                        <h1 class="text-lg font-bold text-slate-900"><?= lang('my_acc') ?></h1>
                        <p class="text-sm text-slate-500"><?= lang('welcome_user') ?> <?= htmlspecialchars($userInfo['name'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </div>
                <form method="POST" action="" class="space-y-4">
                    <div>
                        <label class="text-sm font-medium text-slate-700"><?= lang('name') ?></label>
                        <input type="text" name="name" value="<?= htmlspecialchars($userInfo['name'], ENT_QUOTES, 'UTF-8') ?>" class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 transition-all">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-700"><?= lang('phone') ?></label>
                        <input type="text" name="phone" value="<?= htmlspecialchars($userInfo['phone'], ENT_QUOTES, 'UTF-8') ?>" class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 transition-all">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-700"><?= lang('email_address') ?></label>
                        <input type="email" name="email" value="<?= htmlspecialchars($userInfo['email'], ENT_QUOTES, 'UTF-8') ?>" class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 transition-all" required>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-700"><?= lang('password') ?></label>
                        <input type="password" name="pass" placeholder="<?= lang('password') ?> (<?= lang('new_pass_sended') ?>)" class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 transition-all">
                    </div>
                    <button type="submit" name="update" class="w-full rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800 transition-colors">
                        <i class="fa fa-save mr-1.5"></i><?= lang('update') ?>
                    </button>
                    <a href="<?= LANG_URL . '/logout' ?>" class="block w-full rounded-xl bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 text-center ring-1 ring-inset ring-slate-200 hover:bg-slate-50 transition-colors">
                        <i class="fa fa-sign-out mr-1.5"></i><?= lang('logout') ?>
                    </a>
                </form>
            </div>
        </div>
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl p-6 shadow-sm ring-1 ring-slate-200">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-slate-50 ring-1 ring-slate-200 flex items-center justify-center">
                        <i class="fa fa-history text-slate-500"></i>
                    </div>
                    <h2 class="text-lg font-bold text-slate-900"><?= lang('user_order_history') ?></h2>
                </div>
                <?php if (!empty($orders_history)) { ?>
                    <div class="space-y-4">
                        <?php foreach ($orders_history as $order) { ?>
                            <div class="rounded-xl border border-slate-100 p-4 hover:border-slate-200 transition-colors">
                                <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm">
                                    <div>
                                        <span class="text-slate-400"><?= lang('usr_order_id') ?></span>
                                        <span class="ml-2 font-semibold text-slate-900"><?= $order['order_id'] ?></span>
                                    </div>
                                    <div>
                                        <span class="text-slate-400"><?= lang('usr_order_date') ?></span>
                                        <span class="ml-2 font-semibold text-slate-900"><?= date('d.m.Y', $order['date']) ?></span>
                                    </div>
                                    <div>
                                        <span class="text-slate-400"><?= lang('usr_order_address') ?></span>
                                        <span class="ml-2 font-semibold text-slate-900"><?= htmlspecialchars($order['address'], ENT_QUOTES, 'UTF-8') ?></span>
                                    </div>
                                    <div>
                                        <span class="text-slate-400"><?= lang('usr_order_phone') ?></span>
                                        <span class="ml-2 font-semibold text-slate-900"><?= htmlspecialchars($order['phone'], ENT_QUOTES, 'UTF-8') ?></span>
                                    </div>
                                </div>
                                <?php
                                $arr_products = unserialize($order['products']);
                                if (!empty($arr_products)) { ?>
                                    <div class="mt-4 border-t border-slate-50 pt-4 space-y-3">
                                        <?php foreach ($arr_products as $product) { ?>
                                            <div class="flex items-center gap-4">
                                                <div class="w-16 h-16 rounded-lg bg-slate-50 overflow-hidden flex-shrink-0 ring-1 ring-slate-100">
                                                    <img src="<?= base_url('attachments/shop_images/' . $product['product_info']['image']) ?>" alt="" class="w-full h-full object-cover">
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <a href="<?= base_url($product['product_info']['url']) ?>" class="text-sm font-medium text-slate-900 hover:text-slate-600 truncate block">
                                                        <?= htmlspecialchars($product['product_info']['title'] ?? $product['product_info']['url'], ENT_QUOTES, 'UTF-8') ?>
                                                    </a>
                                                    <span class="text-xs text-slate-500"><?= lang('user_order_quantity') ?> <?= $product['product_quantity'] ?></span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if (isset($links_pagination)) { ?>
                        <div class="mt-6"><?= $links_pagination ?></div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="text-center py-12">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-slate-50 ring-1 ring-slate-200 mb-4">
                            <i class="fa fa-shopping-bag text-2xl text-slate-300"></i>
                        </div>
                        <p class="text-sm text-slate-400"><?= lang('usr_no_orders') ?></p>
                        <a href="<?= LANG_URL ?>" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-slate-900 hover:text-slate-700 transition-colors">
                            <i class="fa fa-arrow-left"></i> Tiếp tục mua sắm
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
