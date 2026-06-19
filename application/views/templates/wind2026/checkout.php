<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="m-page" id="checkout-page">
    <?php if (isset($cartItems['array']) && $cartItems['array'] != null) { ?>
        <?php if ($shippingOrder != 0 && $shippingOrder != null) { ?>
            <div style="padding:16px;border:1px solid rgb(var(--color-border));margin-bottom:24px;">
                <div style="font-weight:600;font-size:15px;color:rgb(var(--color-foreground));"><?= lang('freeShippingHeader') ?></div>
                <div style="margin-top:4px;font-size:14px;color:rgb(var(--color-foreground-secondary));">
                    <?= str_replace(array('%price%', '%currency%'), array($shippingOrder, CURRENCY), lang('freeShipping')) ?>!
                </div>
            </div>
        <?php } ?>

        <div style="display:grid;grid-template-columns:1fr 360px;gap:40px;">
            <div>
                <div style="border:1px solid rgb(var(--color-border));padding:24px;">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
                        <h1 style="font-size:22px;font-weight:700;color:rgb(var(--color-heading));"><?= lang('checkout') ?></h1>
                        <a href="<?= LANG_URL . '/shopping-cart' ?>" style="font-size:14px;color:rgb(var(--color-foreground-secondary));">← <?= lang('shopping_cart') ?></a>
                    </div>

                    <?php if ($this->session->flashdata('submit_error')) { ?>
                        <div style="padding:16px;border:1px solid rgb(var(--color-error));margin-bottom:16px;font-size:14px;color:rgb(var(--color-foreground));">
                            <div style="font-weight:600;margin-bottom:8px;"><?= lang('finded_errors') ?></div>
                            <?php foreach ($this->session->flashdata('submit_error') as $error) { ?>
                                <div style="color:rgb(var(--color-error));">• <?= $error ?></div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <form method="POST" id="goOrder">
                        <div style="margin-bottom:20px;">
                            <label class="m-label"><?= lang('choose_payment') ?></label>
                            <select name="payment_type" class="m-input">
                                <?php if ($cashondelivery_visibility == 1) { ?>
                                    <option value="cashOnDelivery"><?= lang('cash_on_delivery') ?></option>
                                <?php } ?>
                                <?php if (filter_var($paypal_email, FILTER_VALIDATE_EMAIL)) { ?>
                                    <option value="PayPal"><?= lang('paypal') ?></option>
                                <?php } ?>
                                <?php if (isset($bank_account['iban']) && $bank_account['iban'] != null) { ?>
                                    <option value="Bank"><?= lang('bank_payment') ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                            <div>
                                <label class="m-label"><?= lang('first_name') ?> (<sup style="color:rgb(var(--color-error))">*</sup>)</label>
                                <input class="m-input" name="first_name" value="<?= htmlspecialchars((string)($_POST['first_name'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" type="text" placeholder="<?= lang('first_name') ?>">
                            </div>
                            <div>
                                <label class="m-label"><?= lang('last_name') ?> (<sup style="color:rgb(var(--color-error))">*</sup>)</label>
                                <input class="m-input" name="last_name" value="<?= htmlspecialchars((string)($_POST['last_name'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" type="text" placeholder="<?= lang('last_name') ?>">
                            </div>
                            <div>
                                <label class="m-label"><?= lang('email_address') ?> (<sup style="color:rgb(var(--color-error))">*</sup>)</label>
                                <input class="m-input" name="email" value="<?= htmlspecialchars((string)($_POST['email'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" type="text" placeholder="email@example.com">
                            </div>
                            <div>
                                <label class="m-label"><?= lang('phone') ?> (<sup style="color:rgb(var(--color-error))">*</sup>)</label>
                                <input class="m-input" name="phone" value="<?= htmlspecialchars((string)($_POST['phone'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" type="text" placeholder="<?= lang('phone') ?>">
                            </div>
                            <div style="grid-column:1/-1;">
                                <label class="m-label"><?= lang('address') ?> (<sup style="color:rgb(var(--color-error))">*</sup>)</label>
                                <textarea class="m-input" name="address" rows="3"><?= htmlspecialchars((string)($_POST['address'] ?? ''), ENT_QUOTES, 'UTF-8') ?></textarea>
                            </div>
                            <div>
                                <label class="m-label"><?= lang('city') ?> (<sup style="color:rgb(var(--color-error))">*</sup>)</label>
                                <input class="m-input" name="city" value="<?= htmlspecialchars((string)($_POST['city'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" type="text" placeholder="<?= lang('city') ?>">
                            </div>
                            <div>
                                <label class="m-label"><?= lang('post_code') ?></label>
                                <input class="m-input" name="post_code" value="<?= htmlspecialchars((string)($_POST['post_code'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" type="text" placeholder="<?= lang('post_code') ?>">
                            </div>
                            <div style="grid-column:1/-1;">
                                <label class="m-label"><?= lang('notes') ?></label>
                                <textarea class="m-input" name="notes" rows="3"><?= htmlspecialchars((string)($_POST['notes'] ?? ''), ENT_QUOTES, 'UTF-8') ?></textarea>
                            </div>
                        </div>

                        <?php if ($codeDiscounts == 1) { ?>
                            <div style="padding:16px;border:1px solid rgb(var(--color-border));margin-top:20px;">
                                <label class="m-label"><?= lang('discount_code') ?></label>
                                <div style="display:flex;gap:8px;margin-top:8px;">
                                    <input class="m-input" name="discountCode" value="<?= htmlspecialchars((string)($_POST['discountCode'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" placeholder="<?= lang('enter_discount_code') ?>" type="text">
                                    <a href="#!" class="m-button m-button--small m-button--secondary" onclick="checkDiscountCode(); return false;"><?= lang('check_code') ?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </form>

                    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:24px;padding-top:24px;border-top:1px solid rgb(var(--color-border));">
                        <a href="<?= LANG_URL ?>" class="m-button m-button--secondary">← <?= lang('continue_shopping') ?></a>
                        <a href="#!" class="m-button m-button--primary" onclick="document.getElementById('goOrder').submit(); return false;"><?= lang('place_order') ?> →</a>
                    </div>

                    <div style="display:flex;gap:16px;margin-top:16px;font-size:13px;color:rgb(var(--color-foreground-secondary));">
                        <a href="<?= LANG_URL ?>/contacts" style="text-decoration:underline;"><?= lang('payment_policy') ?></a>
                        <a href="<?= LANG_URL ?>/contacts" style="text-decoration:underline;"><?= lang('terms_of_service') ?></a>
                    </div>
                </div>
            </div>

            <aside>
                <div style="border:1px solid rgb(var(--color-border));padding:24px;">
                    <h3 style="font-size:16px;font-weight:600;margin-bottom:20px;padding-bottom:12px;border-bottom:1px solid rgb(var(--color-border));color:rgb(var(--color-heading));"><?= lang('order_summary') ?></h3>
                    <?php foreach ($cartItems['array'] as $item) { ?>
                        <?php
                        $productImage = base_url('/attachments/no-image-frontend.png');
                        if (is_file('attachments/shop_images/' . $item['image'])) {
                            $productImage = base_url('/attachments/shop_images/' . $item['image']);
                        }
                        ?>
                        <div style="display:flex;gap:12px;padding:12px 0;border-bottom:1px solid rgb(var(--color-background-secondary));">
                            <img src="<?= $productImage ?>" alt="" style="width:60px;height:60px;object-fit:cover;background:rgb(var(--color-background-secondary));">
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:14px;font-weight:500;color:rgb(var(--color-foreground));"><?= $item['title'] ?></div>
                                <div style="font-size:13px;color:rgb(var(--color-foreground-secondary));">x<?= $item['num_added'] ?></div>
                                <div style="font-size:14px;font-weight:600;margin-top:4px;color:rgb(var(--color-foreground));"><?= $item['sum_price'] . CURRENCY ?></div>
                            </div>
                        </div>
                        <input type="hidden" name="id[]" value="<?= $item['id'] ?>" form="goOrder">
                        <input type="hidden" name="quantity[]" value="<?= $item['num_added'] ?>" form="goOrder">
                    <?php } ?>

                    <div style="padding-top:16px;margin-top:8px;">
                        <div style="display:flex;justify-content:space-between;font-size:15px;margin-bottom:8px;">
                            <span style="color:rgb(var(--color-foreground-secondary));"><?= lang('subtotal') ?></span>
                            <span style="font-weight:600;color:rgb(var(--color-foreground));"><?= $cartItems['finalSum'] . CURRENCY ?></span>
                        </div>

                        <?php
                        $total_parsed = str_replace(' ', '', str_replace(',', '', $cartItems['finalSum']));
                        if ((int)$shippingAmount > 0 && ((int)$shippingOrder > $total_parsed)) {
                        ?>
                            <div style="display:flex;justify-content:space-between;font-size:15px;margin-bottom:8px;">
                                <span style="color:rgb(var(--color-foreground-secondary));"><?= lang('shipping') ?></span>
                                <span style="font-weight:600;color:rgb(var(--color-foreground));"><?= (int)$shippingAmount ?><?= CURRENCY ?></span>
                            </div>
                        <?php } else { ?>
                            <div style="display:flex;justify-content:space-between;font-size:15px;margin-bottom:8px;">
                                <span style="color:rgb(var(--color-success));"><?= lang('shipping') ?></span>
                                <span style="font-weight:600;color:rgb(var(--color-success));"><?= lang('free') ?></span>
                            </div>
                        <?php } ?>

                        <div style="display:flex;justify-content:space-between;font-size:18px;font-weight:700;padding-top:16px;border-top:1px solid rgb(var(--color-border));">
                            <span style="color:rgb(var(--color-foreground));"><?= lang('total') ?></span>
                            <span style="color:rgb(var(--color-foreground));"><?= $cartItems['finalSum'] ?><?= CURRENCY ?></span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    <?php } else { ?>
        <div style="padding:24px;border:1px solid rgb(var(--color-border));font-size:15px;color:rgb(var(--color-foreground-secondary));"><?= lang('no_products_in_cart') ?></div>
    <?php } ?>
</div>

<?php if ($this->session->flashdata('deleted')) { ?>
    <script>
        $(document).ready(function () {
            ShowNotificator('alert-info', '<?= $this->session->flashdata('deleted') ?>');
        });
    </script>
<?php } ?>
<?php if ($codeDiscounts == 1 && isset($_POST['discountCode'])) { ?>
    <script>
        $(document).ready(function () {
            checkDiscountCode();
        });
    </script>
<?php } ?>