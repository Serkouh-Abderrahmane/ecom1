$(function () {
    $('.search-field-header').on('keydown', function (event) {
        if (event.which === 13) { $('#bigger-search').submit(); }
    });

    $('#search-toggle').on('click', function () {
        $('#search-bar').slideToggle(200);
        setTimeout(function () { $('#search-bar input').focus(); }, 200);
    });

    $('#search-close').on('click', function () {
        $('#search-bar').slideUp(200);
    });

    $('#mobile-menu-btn').on('click', function () {
        $('#mobile-menu').removeClass('hidden');
        $('body').css('overflow', 'hidden');
    });

    $('#mobile-menu-close, #mobile-menu-overlay').on('click', function () {
        $('#mobile-menu').addClass('hidden');
        $('body').css('overflow', '');
    });

    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') {
            $('#mobile-menu').addClass('hidden');
            $('body').css('overflow', '');
        }
    });
});

$('#show-xs-nav').on('click', function () {
    $('#nav-categories').toggle('fast', function () {
        if ($(this).is(':visible') === true) {
            $('#show-xs-nav .hidde-sp').show();
            $('#show-xs-nav .show-sp').hide();
        } else {
            $('#show-xs-nav .hidde-sp').hide();
            $('#show-xs-nav .show-sp').show();
        }
    });
});

$(document).on('click', '[data-wind-toggle="dropdown"]', function (e) {
    e.preventDefault();
    var target = $(this).attr('data-wind-target');
    if (!target) return;
    var $panel = $(target);
    if (!$panel.length) return;
    $('[data-wind-dropdown-panel="true"]').not($panel).addClass('hidden');
    $panel.toggleClass('hidden');
});

$(document).on('click', '[data-wind-toggle="collapse"]', function (e) {
    e.preventDefault();
    var target = $(this).attr('data-wind-target');
    if (!target) return;
    $(target).toggleClass('hidden');
});

$(document).on('click', function (e) {
    var $t = $(e.target);
    if ($t.closest('[data-wind-dropdown="true"]').length) return;
    $('[data-wind-dropdown-panel="true"]').addClass('hidden');
});

$(document).on('keydown', function (e) {
    if (e.key === 'Escape') {
        $('[data-wind-dropdown-panel="true"]').addClass('hidden');
    }
});

if (!window.__wind2026_click_outside_bound) {
    window.__wind2026_click_outside_bound = true;
    document.addEventListener('pointerdown', function (e) {
        var target = e.target;
        if (target && target.closest && target.closest('[data-wind-dropdown="true"]')) return;
        document.querySelectorAll('[data-wind-dropdown-panel="true"]').forEach(function (el) {
            el.classList.add('hidden');
        });
    }, true);
}

$(document).on('click', '[data-wind-carousel-btn]', function (e) {
    e.preventDefault();
    var $btn = $(this);
    var target = $btn.attr('data-wind-carousel-target');
    if (!target) return;
    var el = document.querySelector(target);
    if (!el) return;
    var dir = $btn.attr('data-wind-carousel-btn');
    var amount = Math.max(240, Math.floor(el.clientWidth * 0.9));
    el.scrollBy({ left: dir === 'prev' ? -amount : amount, behavior: 'smooth' });
});
