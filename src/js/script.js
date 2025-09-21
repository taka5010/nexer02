
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
    // $(".faq__question").on("click", function() {
    //     const $item = $(this).parent(".faq__item");
    //     const $answer = $item.find(".faq__answer");
        
    //     if ($item.hasClass("faq__item--active")) {
    //         // 閉じる
    //         $item.removeClass("faq__item--active");
    //         $answer.css("max-height", "0");
    //     } else {
    //         // 他のアイテムを閉じる
    //         $(".faq__item").removeClass("faq__item--active");
    //         $(".faq__answer").css("max-height", "0");
            
    //         // このアイテムを開く
    //         $item.addClass("faq__item--active");
    //         const scrollHeight = $answer[0].scrollHeight;
    //         $answer.css("max-height", scrollHeight + "px");
    //     }
    // });

    $('.js-faq-question').on('click', function () {
        $(this).next().slideToggle();
        $(this).toggleClass('is-open');
    });
    
});


