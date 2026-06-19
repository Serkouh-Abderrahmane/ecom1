<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="m-page-narrow" style="max-width:600px;">
    <div style="text-align:center;padding:60px 40px;border:1px solid var(--color-border);">
        <div style="width:60px;height:60px;border-radius:50%;background:#000;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;">
            <i class="fa fa-check" style="color:#fff;font-size:24px;"></i>
        </div>
        <h1 style="font-size:28px;font-weight:700;margin-bottom:12px;"><?= lang('order_confirmed') ?></h1>
        <p style="font-size:16px;color:#666;margin-bottom:32px;"><?= lang('thank_you_for_order') ?></p>
        <a href="<?= LANG_URL ?>" class="m-btn"><?= lang('back_to_shop') ?> →</a>
    </div>
</div>