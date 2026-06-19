<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="m-page-narrow">
    <div style="text-align:center;margin-bottom:32px;">
        <h1 style="font-size:28px;font-weight:700;margin-bottom:8px;"><?= lang('create_account') ?></h1>
        <p style="font-size:15px;color:#666;"><?= lang('register_description') ?></p>
    </div>
    <div style="border:1px solid var(--color-border);padding:32px;">
        <form method="POST" action="">
            <div style="margin-bottom:16px;">
                <label class="m-label"><?= lang('name') ?></label>
                <input type="text" name="name" class="m-input" required>
            </div>
            <div style="margin-bottom:16px;">
                <label class="m-label"><?= lang('email_address') ?></label>
                <input type="email" name="email" class="m-input" required>
            </div>
            <div style="margin-bottom:16px;">
                <label class="m-label"><?= lang('phone') ?></label>
                <input type="text" name="phone" class="m-input" required>
            </div>
            <div style="margin-bottom:16px;">
                <label class="m-label"><?= lang('password') ?></label>
                <input type="password" name="pass" class="m-input" required>
            </div>
            <div style="margin-bottom:16px;">
                <label class="m-label"><?= lang('password_repeat') ?></label>
                <input type="password" name="pass_repeat" class="m-input" required>
            </div>
            <button type="submit" name="signup" class="m-btn" style="width:100%;"><?= lang('register') ?></button>
        </form>
        <div style="text-align:center;margin-top:20px;font-size:14px;color:#666;">
            <?= lang('have_account') ?> <a href="<?= LANG_URL . '/login' ?>" style="font-weight:600;text-decoration:underline;"><?= lang('login') ?></a>
        </div>
    </div>
</div>