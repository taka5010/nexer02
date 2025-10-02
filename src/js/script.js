
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
    const originalIconSrc = "./assets/images/common/tel_icon.svg";
    const scrolledIconSrc = "./assets/images/common/tel_icon-blue.svg";
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
    var service_swiper = new Swiper('.js-service-swiper', {
        loop: true,
        speed: 2000,
        centeredSlides: true,
        slidesPerView: 'auto',   // CSSの .swiper-slide のwidthを採用
        spaceBetween: 20,
        initialSlide: 0,         // 1枚目を中央に
        loopAdditionalSlides: 2, // ループ時のチラつき防止
        breakpoints: {
          768: {
            spaceBetween: 30
          }
        },
    
        // ページネーション（01 — 06 の体裁）
        pagination: {
          el: '.service-swiper__controls .swiper-pagination',
          type: 'fraction',
          renderFraction: function (currentClass, totalClass) {
            return (
              '<span class="' + currentClass + '"></span>' +
              '<span class="fraction-separator">—</span>' +
              '<span class="' + totalClass + '"></span>'
            );
          },
          formatFractionCurrent: function (n) { return String(n).padStart(2, '0'); },
          formatFractionTotal:   function (n) { return String(n).padStart(2, '0'); }
        },
    
        // ナビゲーション
        navigation: {
          nextEl: '.service-swiper__nav .nav--next',
          prevEl: '.service-swiper__nav .nav--prev'
        },
    
        // 画面サイズ変更時に再計算
        on: {
          resize: function() {
            this.update();
          }
        }
      });


      
  
});


