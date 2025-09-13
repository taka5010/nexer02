
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
});


