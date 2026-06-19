<div class="m-footer-newsletter">
    <div class="m-footer-newsletter-inner">
        <h3><?= lang('newsletter') ?></h3>
        <p><?= lang('subscribe_to_newsletter') ?></p>
        <form method="POST" id="subscribeForm" class="m-footer-newsletter-form">
            <input type="text" name="subscribeEmail" class="m-footer-newsletter-input" placeholder="Email của bạn">
            <button type="button" class="m-footer-newsletter-btn" onclick="checkEmailField()"><?= lang('subscribe') ?></button>
        </form>
    </div>
</div>

<footer class="m-footer">
    <div class="m-footer--middle">
        <div class="m-footer--block">
            <img src="<?= base_url('assets/imgs/logo.png') ?>" alt="XƯỞNG MAY NHÀ CÔNG" class="m-footer__logo">
            <p class="m-footer__about"><?= $footerAboutUs ?? '' ?></p>
            <div class="social-media-links">
                <?php $fb = $footerSocialFacebook ?? ''; if ($fb != '') { ?><a href="<?= $fb ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php } ?>
                <?php $tw = $footerSocialTwitter ?? ''; if ($tw != '') { ?><a href="<?= $tw ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php } ?>
                <?php $pi = $footerSocialPinterest ?? ''; if ($pi != '') { ?><a href="<?= $pi ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php } ?>
                <?php $ig = $footerSocialInstagram ?? ''; if ($ig != '') { ?><a href="<?= $ig ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php } ?>
                <?php $yt = $footerSocialYoutube ?? ''; if ($yt != '') { ?><a href="<?= $yt ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php } ?>
            </div>
        </div>
        <div class="m-footer--block">
            <h4>CHÍNH SÁCH</h4>
            <ul class="m-link-lists">
                <li><a href="<?= LANG_URL . '/contacts' ?>">Chính sách bảo mật thông tin</a></li>
                <li><a href="<?= LANG_URL . '/contacts' ?>">Chính sách giao nhận hàng và kiểm hàng</a></li>
                <li><a href="<?= LANG_URL . '/contacts' ?>">Chính sách đổi trả</a></li>
                <li><a href="<?= LANG_URL . '/contacts' ?>">Chính sách thanh toán</a></li>
                <li><a href="<?= LANG_URL . '/contacts' ?>">Điều khoản dịch vụ</a></li>
                <li><a href="<?= LANG_URL . '/contacts' ?>">Giới thiệu</a></li>
                <li><a href="<?= LANG_URL . '/contacts' ?>">Liên hệ</a></li>
            </ul>
        </div>
        <div class="m-footer--block">
            <h4>THÔNG TIN CÔNG TY</h4>
            <ul>
                <li>MST: 0202291489</li>
                <li>Ngày cấp: 12/06/2025, Sở Tài Chính Thành Phố Hải Phòng</li>
                <li>Số 122 đường Khúc Hạo, Phường An Biên, TP Hải Phòng</li>
            </ul>
        </div>
        <div class="m-footer--block">
            <h4>LIÊN HỆ</h4>
            <ul>
                <li><i class="fa fa-envelope"></i> contact@xuongmaynhacong.vn</li>
                <li><i class="fa fa-phone"></i> 0386524760</li>
                <li><i class="fa fa-clock-o"></i> Thứ 2 - Thứ 7 (08h00 - 17h00)</li>
            </ul>
        </div>
    </div>
    <div class="m-footer--bottom">
        <div class="m-footer--bottom-inner">
            <p><?= $footercopyright ?? 'Copyright © 2026, Xưởng May Nhà Công' ?></p>
            <div class="m-footer__payments">
                <i class="fa fa-cc-visa"></i>
                <i class="fa fa-cc-mastercard"></i>
                <i class="fa fa-cc-amex"></i>
                <i class="fa fa-cc-paypal"></i>
            </div>
        </div>
    </div>
</footer>

<?php if ($this->session->flashdata('emailAdded')) { ?>
    <script>
        $(document).ready(function () {
            ShowNotificator('alert-info', '<?= lang('email_added') ?>');
        });
    </script>
<?php }
echo $addJs ?? '';
?>
</div>
</div>
<div id="notificator" class="alert"></div>
<script>
var variable = {
    clearShoppingCartUrl: "<?= base_url('clearShoppingCart') ?>",
    manageShoppingCartUrl: "<?= base_url('manageShoppingCart') ?>",
    discountCodeChecker: "<?= base_url('discountCodeChecker') ?>"
};
</script>
<script src="<?= base_url('assets/js/system.js') ?>"></script>
<script src="<?= base_url('templatejs/mine.js') ?>"></script>
</body>
</html>