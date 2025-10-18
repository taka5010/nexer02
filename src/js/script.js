
jQuery(function ($) {
    // ハンバーガー
    const $hamburger = $(".js-hamburger");
    const $drawer = $(".js-drawer");
    $hamburger.click(function () {
        if ($(this).hasClass("is-open")) {
                $(this).find("span:nth-of-type(1), span:nth-of-type(2), span:nth-of-type(3)").addClass("is-close");
            setTimeout(() => {
                $(this).removeClass("is-open");
                $(this).find("span:nth-of-type(1), span:nth-of-type(2), span:nth-of-type(3)").removeClass("is-close");
            }, 500);
        } else {
            $(this).addClass("is-open");
        }
        $drawer.fadeToggle();
    });
    $(".js-drawer a[href]").on("click", function () {
        $hamburger.removeClass("is-open");
        $drawer.fadeOut();
    });

    // ドロワーのメニュー内のアコーディオンメニュー
    $(".header-drawer__toggle").on("click", function() {
        const $this = $(this);
        const $submenu = $this.next(".header-drawer__submenu");
        $this.toggleClass("open");
        if ($submenu.length) {
            $submenu.toggleClass("open");
        }
    });

    // ヘッダーのスクロール追従
    const $header = $(".header");
    const $hamburgerblack = $(".header__hamburger");
    const $telIcon = $(".contact-info__icon-img");
    const originalIconSrc = (typeof THEME_VARS !== 'undefined') ? THEME_VARS.iconDefault : './assets/images/common/tel_icon.svg';
    const scrolledIconSrc  = (typeof THEME_VARS !== 'undefined') ? THEME_VARS.iconScrolled: './assets/images/common/tel_icon-blue.svg';
    $(window).on("scroll", function() {
        const scrollTop = $(this).scrollTop();
        if (scrollTop > 100) {
            $header.addClass("is-scrolled");
            $hamburgerblack.addClass("is-scrolled");
            $telIcon.attr("src", scrolledIconSrc);
        } else {
            $header.removeClass("is-scrolled");
            $hamburgerblack.removeClass("is-scrolled");
            $telIcon.attr("src", originalIconSrc);
        }
    });

    // FAQアコーディオン
    $('.js-faq-question.is-open').each((_, el) => {
        const $wrapper = $(el).next('.faq-list__item-answer-wrapper');
        $wrapper.css('height', 'auto');
    });
    $('.js-faq-question').on('click', function () {
        const $question = $(this);
        const $answerWrapper = $question.next('.faq-list__item-answer-wrapper');
        const isOpen = $question.hasClass('is-open');
        const setHeight = (height) => {
            requestAnimationFrame(() => {
                $answerWrapper.css('height', `${height}px`);
            });
        };
        if (isOpen) {
            $question.removeClass('is-open');
            const currentHeight = $answerWrapper[0].scrollHeight;
            $answerWrapper.css('height', currentHeight);
            setHeight(0);
        } else {
            $question.addClass('is-open');
            $answerWrapper.css('height', 0);
            const targetHeight = $answerWrapper[0].scrollHeight;
            setHeight(targetHeight);
        }
        $answerWrapper.off('transitionend').on('transitionend', (e) => {
            if (e.originalEvent.propertyName !== 'height') return;
            if ($question.hasClass('is-open')) {
                $answerWrapper.css('height', 'auto');
            }
        });
    });

    // カード02の高さを揃える
    function equalizeCard02Heights() {
        var $contents = $('.card02__content');
        var maxHeight = 0;
        $contents.css('height', 'auto');
        $contents.each(function() {
            var h = $(this).outerHeight();
            if (h > maxHeight) maxHeight = h;
        });
        $contents.css('height', maxHeight);
    }
    equalizeCard02Heights();
    $(window).on('resize', function() {
        equalizeCard02Heights();
    });

    // カード03の高さを揃える
    function equalizeCard03Heights() {
        var $contents = $('.card03__content');
        var maxHeight = 0;
        $contents.css('height', 'auto');
        $contents.each(function() {
            var h = $(this).outerHeight();
            if (h > maxHeight) maxHeight = h;
        });
        $contents.css('height', maxHeight);
    }
    equalizeCard03Heights();
    $(window).on('resize', function() {
        equalizeCard03Heights();
    });

    // 会社内観・外観のスライダー
    var office_swiper = new Swiper(".js-office-swiper", {
        loop: true,
        speed: 2000,
        slidesPerView: 1,
        centeredSlides: true,
        // autoplay: {
        //     delay: 2000,
        //     disableOnInteraction: false,
        // },
        breakpoints: {
            768: {
                spaceBetween: 0,
                slidesPerView: 1.8,
            }
        },
        navigation: {
            nextEl: '.nav--next',
            prevEl: '.nav--prev',
            },
            pagination: {
                el: '.office-swiper__controls .swiper-pagination',
                type: 'fraction',
                renderFraction: (currentClass, totalClass) => {
                return `
                    <span class="${currentClass}"></span>
                    <span class="fraction-separator">—</span>
                    <span class="${totalClass}"></span>
                `;
                },
                // 共通のゼロ埋め関数
                formatFractionCurrent: n => n.toString().padStart(2, '0'),
                formatFractionTotal: n => n.toString().padStart(2, '0')
            }
    });

    // 沿革の縦線の高さを設定
    $('.history__year').each(function() {
        const $el = $(this);
        const height = $el.outerHeight();
        const total = height + 30;
        $el.css('--line-height', total + 'px');
    });

    // ページトップボタン
    const $pageTopButton = $('#pageTopButton');
    const $ctaElement = $('.cta');
    const scrollThreshold = 400;
    let isVisible = false;

    if ($pageTopButton.length && $ctaElement.length) {
        // スクロールイベント
        $(window).on('scroll', function() {
        const scrollY = $(window).scrollTop();

        if (scrollY > scrollThreshold && !isVisible) {
            $pageTopButton.addClass('is-visible');
            $ctaElement.addClass('has-page-top');
            isVisible = true;
        } else if (scrollY <= scrollThreshold && isVisible) {
            $pageTopButton.removeClass('is-visible');
            $ctaElement.removeClass('has-page-top');
            isVisible = false;
        }
        });

        // クリックでページトップへ
        $pageTopButton.on('click', function() {
        $('html, body').animate({ scrollTop: 0 }, 500); // 0.5秒で上へ
        });

        // キーボードアクセシビリティ
        $pageTopButton.on('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, 500);
        }
        });
    }
});





