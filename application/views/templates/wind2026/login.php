<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="max-w-md mx-auto">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-slate-50 ring-1 ring-slate-200 mb-4">
                <i class="fa fa-user text-2xl text-slate-400"></i>
            </div>
            <h1 class="text-2xl font-bold text-slate-900"><?= lang('login_to_acc') ?></h1>
            <p class="mt-2 text-sm text-slate-500"><?= lang('login_description') ?></p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm ring-1 ring-slate-200">
            <form method="POST" action="" class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-slate-700"><?= lang('email_address') ?></label>
                    <input type="email" name="email" class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 transition-all" required>
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700"><?= lang('password') ?></label>
                    <input type="password" name="pass" class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 transition-all" required>
                </div>
                <button type="submit" name="login" class="w-full rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800 transition-colors">
                    <?= lang('login') ?>
                </button>
            </form>
            <div class="mt-4 text-center text-sm text-slate-500">
                <?= lang('no_account') ?> <a href="<?= LANG_URL . '/register' ?>" class="font-semibold text-slate-900 hover:text-slate-700 underline underline-offset-2"><?= lang('register') ?></a>
            </div>
        </div>
    </div>
</div>
