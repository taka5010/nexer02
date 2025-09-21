
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
    const $telIcon = $(".contact-info__icon-img");
    const originalIconSrc = "./assets/images/common/tel_icon.svg";
    const scrolledIconSrc = "./assets/images/common/tel_icon-blue.svg";
    $(window).on("scroll", function() {
        const scrollTop = $(this).scrollTop();
        if (scrollTop > 100) {
            $header.addClass("is-scrolled");
            $telIcon.attr("src", scrolledIconSrc);
        } else {
            $header.removeClass("is-scrolled");
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
});




