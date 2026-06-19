<!DOCTYPE html>
<html lang="<?= MY_LANGUAGE_ABBR ?>">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <meta name="description" content="<?= htmlspecialchars($description ?? '', ENT_QUOTES, 'UTF-8') ?>" />
        <meta name="keywords" content="<?= htmlspecialchars($keywords ?? '', ENT_QUOTES, 'UTF-8') ?>" />
        <meta property="og:title" content="<?= htmlspecialchars($title ?? '', ENT_QUOTES, 'UTF-8') ?>" />
        <meta property="og:description" content="<?= htmlspecialchars($description ?? '', ENT_QUOTES, 'UTF-8') ?>" />
        <meta property="og:url" content="<?= LANG_URL ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="<?= isset($image) && !is_null($image) ? $image : base_url('assets/img/site-overview.png') ?>" />
        <title><?= htmlspecialchars($title ?? '', ENT_QUOTES, 'UTF-8') ?></title>
        <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>" />
        <link href="<?= base_url('templatecss/custom.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('cssloader/theme.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/custom-theme.css') ?>" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <script>
            window.tailwind = window.tailwind || {};
            window.tailwind.config = {
                corePlugins: { preflight: false },
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif']
                        }
                    }
                }
            };
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4.1.0"></script>
        <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?= base_url('loadlanguage/all.js') ?>"></script>
        <?php if ($cookieLaw != false) { ?>
            <script type="text/javascript">
                window.cookieconsent_options = {"message": "<?= $cookieLaw['message'] ?>", "dismiss": "<?= $cookieLaw['button_text'] ?>", "learnMore": "<?= $cookieLaw['learn_more'] ?>", "link": "<?= $cookieLaw['link'] ?>", "theme": "<?= $cookieLaw['theme'] ?>"};
            </script>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
        <?php } ?>
    </head>
    <body class="bg-white text-slate-900 font-sans antialiased">
        <div id="wrapper" class="min-h-screen flex flex-col">
            <div id="content" class="flex-1">
                <?php if ($multiVendor == 1) { ?>
                    <div class="bg-slate-950 text-white text-xs">
                        <div class="max-w-7xl mx-auto px-4 py-2 flex items-center justify-between">
                            <span><?= lang('vendor_panel') ?></span>
                            <div class="flex items-center gap-3">
                                <a href="<?= LANG_URL . '/vendor/register' ?>" class="hover:text-white/80"><?= lang('register_me') ?></a>
                                <span class="text-white/30">|</span>
                                <form method="POST" action="<?= LANG_URL . '/vendor/login' ?>" class="flex items-center gap-2">
                                    <input type="email" name="u_email" class="bg-white/10 border-0 rounded-lg px-2 py-1 text-xs text-white placeholder-white/50 w-28" placeholder="<?= lang('email') ?>">
                                    <input type="password" name="u_password" class="bg-white/10 border-0 rounded-lg px-2 py-1 text-xs text-white placeholder-white/50 w-28" placeholder="<?= lang('password') ?>">
                                    <label class="flex items-center gap-1 text-white/70 text-xs"><input type="checkbox" name="remember_me"> <?= lang('remember_me') ?></label>
                                    <button type="submit" name="login" class="bg-white text-slate-900 rounded-lg px-3 py-1 text-xs font-semibold hover:bg-white/90"><?= lang('u_login') ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="border-b border-slate-100">
                    <div class="max-w-7xl mx-auto px-4">
                        <div class="flex items-center justify-between h-10 text-xs text-slate-500">
                            <div class="flex items-center gap-4">
                                <?php
                                $num_langs = count($allLanguages);
                                if ($num_langs > 0) {
                                    foreach ($allLanguages as $key_lang => $lang) {
                                        ?>
                                        <a href="<?= base_url($key_lang) ?>" class="flex items-center gap-1.5 hover:text-slate-900 transition-colors">
                                            <img src="<?= base_url('attachments/lang_flags/' . $lang['flag']) ?>" alt="<?= $lang['name'] ?>" class="w-4 h-3 object-cover rounded">
                                            <span><?= $lang['name'] ?></span>
                                        </a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="flex items-center gap-4">
                                <?php $cPhone = $footerContactPhone ?? ''; if ($cPhone != '') { ?>
                                    <span class="flex items-center gap-1.5">
                                        <i class="fa fa-phone text-xs"></i>
                                        <?= $cPhone ?>
                                    </span>
                                <?php } ?>
                                <a href="<?= LANG_URL . '/login' ?>" class="hover:text-slate-900 transition-colors"><?= lang('login') ?></a>
                                <a href="<?= LANG_URL . '/register' ?>" class="hover:text-slate-900 transition-colors"><?= lang('register') ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <header class="border-b border-slate-100 bg-white sticky top-0 z-50">
                    <div class="max-w-7xl mx-auto px-4">
                        <div class="flex items-center justify-between h-16 md:h-20">
                            <button type="button" id="mobile-menu-btn" class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl hover:bg-slate-50 transition-colors" aria-label="Menu">
                                <i class="fa fa-bars text-lg text-slate-700"></i>
                            </button>

                            <div class="flex items-center gap-8">
                                <a href="<?= base_url() ?>" class="text-xl md:text-2xl font-bold tracking-tight text-slate-900 no-underline">
                                    LUÔN VUI TƯƠI
                                </a>
                                <nav class="hidden md:flex items-center gap-1">
                                    <a href="<?= LANG_URL ?>" class="nav-link px-3 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 rounded-xl hover:bg-slate-50 transition-colors">TRANG CHỦ</a>
                                    <a href="<?= LANG_URL ?>/shop?category=1" class="nav-link px-3 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 rounded-xl hover:bg-slate-50 transition-colors">ÁO THUN</a>
                                    <a href="<?= LANG_URL ?>/shop?category=2" class="nav-link px-3 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 rounded-xl hover:bg-slate-50 transition-colors">RINGER</a>
                                    <a href="<?= LANG_URL ?>/shop?category=3" class="nav-link px-3 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 rounded-xl hover:bg-slate-50 transition-colors">TÚI CANVAS</a>
                                    <a href="<?= LANG_URL ?>/shop?category=4" class="nav-link px-3 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 rounded-xl hover:bg-slate-50 transition-colors">ÁO BA LỖ</a>
                                    <a href="<?= LANG_URL ?>/shop?category=5" class="nav-link px-3 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 rounded-xl hover:bg-slate-50 transition-colors">DÀI TAY</a>
                                    <a href="<?= LANG_URL ?>/shop?category=6" class="nav-link px-3 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 rounded-xl hover:bg-slate-50 transition-colors">SWEATER</a>
                                    <a href="<?= LANG_URL ?>/shop?category=7" class="nav-link px-3 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 rounded-xl hover:bg-slate-50 transition-colors">HOODIE</a>
                                    <a href="<?= LANG_URL ?>/shop?category=8" class="nav-link px-3 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 rounded-xl hover:bg-slate-50 transition-colors">QUẦN</a>
                                </nav>
                            </div>

                            <div class="flex items-center gap-2">
                                <button type="button" id="search-toggle" class="inline-flex items-center justify-center w-10 h-10 rounded-xl hover:bg-slate-50 transition-colors" aria-label="Search">
                                    <i class="fa fa-search text-slate-700"></i>
                                </button>
                                <div class="relative">
                                    <a href="<?= LANG_URL . '/shopping-cart' ?>" class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl hover:bg-slate-50 transition-colors">
                                        <i class="fa fa-shopping-bag text-slate-700"></i>
                                        <?php $itemsCount = isset($sumOfItems) ? (int)$sumOfItems : 0; if ($itemsCount > 0) { ?>
                                            <span class="sumOfItems absolute -top-0.5 -right-0.5 bg-slate-900 text-white text-[10px] font-bold rounded-full w-4.5 h-4.5 flex items-center justify-center"><?= $itemsCount ?></span>
                                        <?php } ?>
                                    </a>
                                    <div id="cart-dropdown" class="dropdown-cart absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-xl border border-slate-100 hidden z-50">
                                        <div class="p-4">
                                            <?= $load::getCartItems($cartItems) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="search-bar" class="hidden border-t border-slate-100 bg-white">
                        <div class="max-w-7xl mx-auto px-4 py-3">
                            <div class="flex items-center gap-2">
                                <div class="flex-1 relative">
                                    <form method="GET" action="<?= LANG_URL ?>" id="bigger-search" class="flex gap-2">
                                        <input type="text" value="<?= isset($_GET['search_in_title']) ? htmlspecialchars($_GET['search_in_title']) : '' ?>" name="search_in_title" class="w-full border-0 bg-slate-50 rounded-xl px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-slate-900/10" placeholder="<?= lang('search_by_keyword_title') ?>">
                                        <button type="submit" class="bg-slate-900 text-white rounded-xl px-5 py-2.5 text-sm font-semibold hover:bg-slate-800 transition-colors">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <button type="button" id="search-close" class="text-slate-400 hover:text-slate-600 p-2">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </header>

                <div id="mobile-menu" class="fixed inset-0 z-50 hidden">
                    <div class="absolute inset-0 bg-black/40" id="mobile-menu-overlay"></div>
                    <div class="absolute left-0 top-0 bottom-0 w-72 bg-white shadow-xl">
                        <div class="flex items-center justify-between p-4 border-b border-slate-100">
                            <span class="font-bold text-lg">LUÔN VUI TƯƠI</span>
                            <button type="button" id="mobile-menu-close" class="w-8 h-8 inline-flex items-center justify-center rounded-xl hover:bg-slate-50">
                                <i class="fa fa-times text-slate-500"></i>
                            </button>
                        </div>
                        <nav class="p-4 space-y-1">
                            <a href="<?= LANG_URL ?>" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl">TRANG CHỦ</a>
                            <div class="text-xs font-semibold uppercase tracking-wider text-slate-400 px-3 pt-4 pb-1">DANH MỤC</div>
                            <a href="<?= LANG_URL ?>/shop?category=1" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl">ÁO THUN RELAXED FIT</a>
                            <a href="<?= LANG_URL ?>/shop?category=2" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl">ÁO THUN RINGER</a>
                            <a href="<?= LANG_URL ?>/shop?category=3" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl">TÚI CANVAS</a>
                            <a href="<?= LANG_URL ?>/shop?category=4" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl">ÁO BA LỖ</a>
                            <a href="<?= LANG_URL ?>/shop?category=5" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl">ÁO THUN DÀI TAY</a>
                            <a href="<?= LANG_URL ?>/shop?category=6" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl">ÁO SWEATER</a>
                            <a href="<?= LANG_URL ?>/shop?category=7" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl">ÁO HOODIE</a>
                            <a href="<?= LANG_URL ?>/shop?category=8" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl">QUẦN JOGGER & QUẦN ỐNG SUÔNG</a>
                            <div class="border-t border-slate-100 my-2 pt-2"></div>
                            <a href="<?= LANG_URL . '/shopping-cart' ?>" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl"><?= lang('shopping_cart') ?></a>
                            <a href="<?= LANG_URL . '/checkout' ?>" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl"><?= lang('checkout') ?></a>
                            <a href="<?= LANG_URL . '/contacts' ?>" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl"><?= lang('contacts') ?></a>
                            <div class="border-t border-slate-100 my-2 pt-2"></div>
                            <a href="<?= LANG_URL . '/login' ?>" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl"><?= lang('login') ?></a>
                            <a href="<?= LANG_URL . '/register' ?>" class="block px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-xl"><?= lang('register') ?></a>
                        </nav>
                    </div>
                </div>
