<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="m-page">
    <div style="display:grid;grid-template-columns:300px 1fr;gap:40px;">
        <aside>
            <div style="border:1px solid var(--color-border);padding:24px;">
                <h3 style="font-size:14px;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:16px;"><?= lang('archive') ?></h3>
                <div style="font-size:15px;color:#666;"><?= $archives ?></div>
                <a href="<?= LANG_URL . '/blog' ?>" class="m-btn m-btn-sm m-btn-outline" style="margin-top:16px;">← <?= lang('go_back') ?></a>
            </div>
        </aside>

        <main>
            <article style="border:1px solid var(--color-border);">
                <div style="padding:24px;border-bottom:1px solid var(--color-border);">
                    <div style="font-size:12px;color:#999;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:8px;">
                        <i class="fa fa-clock-o"></i> <?= date('M d, y', $article['time']) ?>
                    </div>
                    <h1 style="font-size:24px;font-weight:700;"><?= $article['title'] ?></h1>
                </div>
                <div style="background:#f5f5f5;">
                    <img src="<?= base_url('attachments/blog_images/' . $article['image']) ?>" style="width:100%;height:auto;display:block;" alt="<?= $article['title'] ?>">
                </div>
                <div style="padding:24px;">
                    <div style="font-size:15px;color:#666;line-height:1.8;"><?= $article['description'] ?></div>
                </div>
            </article>
        </main>
    </div>
</div>