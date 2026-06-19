<footer class="bg-slate-950 text-slate-300 mt-16">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-12">
            <div class="lg:col-span-4">
                <img src="<?= base_url('assets/imgs/logo.png') ?>" alt="XƯỞNG MAY NHÀ CÔNG" class="h-12 w-auto brightness-0 invert">
                <p class="mt-4 text-sm leading-relaxed text-slate-400"><?= $footerAboutUs ?? '' ?></p>
                <div class="flex items-center gap-3 mt-6">
                    <?php $fb = $footerSocialFacebook ?? ''; if ($fb != '') { ?><a class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/5 text-slate-400 hover:bg-white/10 hover:text-white transition-colors" href="<?= $fb ?>"><i class="fa fa-facebook"></i></a><?php } ?>
                    <?php $tw = $footerSocialTwitter ?? ''; if ($tw != '') { ?><a class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/5 text-slate-400 hover:bg-white/10 hover:text-white transition-colors" href="<?= $tw ?>"><i class="fa fa-twitter"></i></a><?php } ?>
                    <?php $pi = $footerSocialPinterest ?? ''; if ($pi != '') { ?><a class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/5 text-slate-400 hover:bg-white/10 hover:text-white transition-colors" href="<?= $pi ?>"><i class="fa fa-pinterest"></i></a><?php } ?>
                    <?php $ig = $footerSocialInstagram ?? ''; if ($ig != '') { ?><a class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/5 text-slate-400 hover:bg-white/10 hover:text-white transition-colors" href="<?= $ig ?>"><i class="fa fa-instagram"></i></a><?php } ?>
                    <?php $yt = $footerSocialYoutube ?? ''; if ($yt != '') { ?><a class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/5 text-slate-400 hover:bg-white/10 hover:text-white transition-colors" href="<?= $yt ?>"><i class="fa fa-youtube"></i></a><?php } ?>
                </div>
            </div>
            <div class="lg:col-span-2">
                <h3 class="text-xs font-semibold uppercase tracking-widest text-slate-500">CHÍNH SÁCH</h3>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li><a class="text-slate-400 hover:text-white transition-colors" href="<?= LANG_URL . '/contacts' ?>">Chính sách bảo mật thông tin</a></li>
                    <li><a class="text-slate-400 hover:text-white transition-colors" href="<?= LANG_URL . '/contacts' ?>">Chính sách giao nhận hàng và kiểm hàng</a></li>
                    <li><a class="text-slate-400 hover:text-white transition-colors" href="<?= LANG_URL . '/contacts' ?>">Chính sách đổi trả</a></li>
                    <li><a class="text-slate-400 hover:text-white transition-colors" href="<?= LANG_URL . '/contacts' ?>">Chính sách thanh toán</a></li>
                    <li><a class="text-slate-400 hover:text-white transition-colors" href="<?= LANG_URL . '/contacts' ?>">Điều khoản dịch vụ</a></li>
                    <li><a class="text-slate-400 hover:text-white transition-colors" href="<?= LANG_URL . '/contacts' ?>">Giới thiệu</a></li>
                    <li><a class="text-slate-400 hover:text-white transition-colors" href="<?= LANG_URL . '/contacts' ?>">Liên hệ</a></li>
                </ul>
            </div>
            <div class="lg:col-span-3">
                <h3 class="text-xs font-semibold uppercase tracking-widest text-slate-500">THÔNG TIN CÔNG TY</h3>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li class="text-slate-400">MST: 0202291489</li>
                    <li class="text-slate-400">Ngày cấp: 12/06/2025, Sở Tài Chính Thành Phố Hải Phòng</li>
                    <li class="text-slate-400">Số 122 đường Khúc Hạo, Phường An Biên, TP Hải Phòng</li>
                </ul>
            </div>
            <div class="lg:col-span-3">
                <h3 class="text-xs font-semibold uppercase tracking-widest text-slate-500"><?= lang('newsletter') ?></h3>
                <p class="mt-4 text-sm text-slate-400"><?= lang('subscribe_to_newsletter') ?></p>
                <form method="POST" id="subscribeForm" class="mt-3">
                    <div class="flex gap-2">
                        <input type="text" class="flex-1 rounded-xl border-0 bg-white/5 px-3 py-2.5 text-sm text-white placeholder:text-slate-500 outline-none focus:ring-2 focus:ring-white/10" name="subscribeEmail" placeholder="Email của bạn">
                        <button class="inline-flex items-center justify-center rounded-xl bg-white px-4 py-2.5 text-sm font-semibold text-slate-900 hover:bg-slate-100 transition-colors" onclick="checkEmailField()" type="button">
                            Đăng Ký
                        </button>
                    </div>
                </form>
                <div class="mt-6 space-y-2.5 text-sm">
                    <div class="flex gap-2 text-slate-400"><i class="fa fa-envelope mt-0.5 w-4"></i><span>hello@luonvuituoi.co</span></div>
                    <div class="flex gap-2 text-slate-400"><i class="fa fa-phone mt-0.5 w-4"></i><span>0386524760</span></div>
                    <div class="flex gap-2 text-slate-400"><i class="fa fa-clock-o mt-0.5 w-4"></i><span>Thứ 2 - Thứ 7 (08h00 - 17h00)</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col gap-4 text-sm text-slate-500 md:flex-row md:items-center md:justify-between">
            <p><?= $footercopyright ?? 'Copyright © 2026, Xưởng May Nhà Công' ?></p>
            <div class="flex items-center gap-4 text-xl">
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
