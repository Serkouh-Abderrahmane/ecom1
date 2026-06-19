<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="m-page">
    <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:32px;">
        <div>
            <h1 style="font-size:28px;font-weight:700;"><?= lang('latest_blog') ?></h1>
            <p style="font-size:15px;color:#666;"><?= lang('search') ?> · <?= lang('archive') ?></p>
        </div>
        <a href="<?= LANG_URL ?>" class="m-btn m-btn-outline m-btn-sm">← <?= lang('home') ?></a>
    </div>

    <div style="display:grid;grid-template-columns:300px 1fr;gap:40px;">
        <aside>
            <div style="border:1px solid var(--color-border);padding:24px;margin-bottom:24px;">
                <h3 style="font-size:14px;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:16px;"><?= lang('search') ?></h3>
                <form method="GET" action="" style="display:flex;gap:8px;">
                    <input type="text" class="m-input" value="<?= isset($_GET['find']) ? htmlspecialchars($_GET['find']) : '' ?>" name="find" placeholder="<?= lang('search') ?>">
                    <button class="m-btn m-btn-sm" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <div style="border:1px solid var(--color-border);padding:24px;margin-bottom:24px;">
                <h3 style="font-size:14px;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:16px;"><?= lang('archive') ?></h3>
                <div style="font-size:15px;color:#666;"><?= $archives ?></div>
            </div>

            <div style="border:1px solid var(--color-border);padding:24px;">
                <h3 style="font-size:14px;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:16px;"><?= lang('best_sellers') ?></h3>
                <div><?= $load::getProducts($bestSellers, '', true) ?></div>
            </div>
        </aside>

        <main>
            <?php if (!empty($posts)) { ?>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
                    <?php foreach ($posts as $post) { ?>
                        <article style="border:1px solid var(--color-border);">
                            <a href="<?= LANG_URL . '/blog/' . $post['url'] ?>">
                                <div style="aspect-ratio:16/9;overflow:hidden;background:#f5f5f5;">
                                    <img src="<?= base_url('attachments/blog_images/' . $post['image']) ?>" style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s;" alt="<?= $post['title'] ?>">
                                </div>
                            </a>
                            <div style="padding:20px;">
                                <div style="font-size:12px;color:#999;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:8px;">
                                    <i class="fa fa-clock-o"></i> <?= date('M d, y', $post['time']) ?>
                                </div>
                                <a href="<?= LANG_URL . '/blog/' . $post['url'] ?>" style="font-size:16px;font-weight:600;display:block;margin-bottom:8px;"><?= character_limiter($post['title'], 85) ?></a>
                                <p style="font-size:14px;color:#666;line-height:1.6;margin-bottom:16px;"><?= character_limiter(strip_tags($post['description']), 240) ?></p>
                                <a href="<?= LANG_URL . '/blog/' . $post['url'] ?>" class="m-btn m-btn-sm"><?= lang('read_mode') ?> →</a>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div style="padding:24px;border:1px solid var(--color-border);font-size:15px;color:#666;"><?= lang('no_posts') ?></div>
            <?php } ?>

            <?php if (trim($links_pagination) != '') { ?>
                <div style="margin-top:32px;"><?= $links_pagination ?></div>
            <?php } ?>
        </main>
    </div>
</div>