"use strict";

jQuery(function ($) {
  // ハンバーガー
  var $hamburger = $(".js-hamburger");
  var $drawer = $(".js-drawer");
  $hamburger.click(function () {
    var _this = this;
    if ($(this).hasClass("is-open")) {
      $(this).find("span:nth-of-type(1), span:nth-of-type(2), span:nth-of-type(3)").addClass("is-close");
      setTimeout(function () {
        $(_this).removeClass("is-open");
        $(_this).find("span:nth-of-type(1), span:nth-of-type(2), span:nth-of-type(3)").removeClass("is-close");
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
  $(".header-drawer__toggle").on("click", function () {
    var $this = $(this);
    var $submenu = $this.next(".header-drawer__submenu");
    $this.toggleClass("open");
    if ($submenu.length) {
      $submenu.toggleClass("open");
    }
  });

  // ヘッダーのスクロール追従
  var $header = $(".header");
  var $hamburgerblack = $(".header__hamburger");
  var $telIcon = $(".contact-info__icon-img");
  var originalIconSrc = typeof THEME_VARS !== 'undefined' ? THEME_VARS.iconDefault : './assets/images/common/tel_icon.svg';
  var scrolledIconSrc = typeof THEME_VARS !== 'undefined' ? THEME_VARS.iconScrolled : './assets/images/common/tel_icon-blue.svg';
  $(window).on("scroll", function () {
    var scrollTop = $(this).scrollTop();
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
  $('.js-faq-question.is-open').each(function (_, el) {
    var $wrapper = $(el).next('.faq-list__item-answer-wrapper');
    $wrapper.css('height', 'auto');
  });
  $('.js-faq-question').on('click', function () {
    var $question = $(this);
    var $answerWrapper = $question.next('.faq-list__item-answer-wrapper');
    var isOpen = $question.hasClass('is-open');
    var setHeight = function setHeight(height) {
      requestAnimationFrame(function () {
        $answerWrapper.css('height', "".concat(height, "px"));
      });
    };
    if (isOpen) {
      $question.removeClass('is-open');
      var currentHeight = $answerWrapper[0].scrollHeight;
      $answerWrapper.css('height', currentHeight);
      setHeight(0);
    } else {
      $question.addClass('is-open');
      $answerWrapper.css('height', 0);
      var targetHeight = $answerWrapper[0].scrollHeight;
      setHeight(targetHeight);
    }
    $answerWrapper.off('transitionend').on('transitionend', function (e) {
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
    $contents.each(function () {
      var h = $(this).outerHeight();
      if (h > maxHeight) maxHeight = h;
    });
    $contents.css('height', maxHeight);
  }
  equalizeCard02Heights();
  $(window).on('resize', function () {
    equalizeCard02Heights();
  });

  // カード03の高さを揃える
  function equalizeCard03Heights() {
    var $contents = $('.card03__content');
    var maxHeight = 0;
    $contents.css('height', 'auto');
    $contents.each(function () {
      var h = $(this).outerHeight();
      if (h > maxHeight) maxHeight = h;
    });
    $contents.css('height', maxHeight);
  }
  equalizeCard03Heights();
  $(window).on('resize', function () {
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
        slidesPerView: 1.8
      }
    },
    navigation: {
      nextEl: '.nav--next',
      prevEl: '.nav--prev'
    },
    pagination: {
      el: '.office-swiper__controls .swiper-pagination',
      type: 'fraction',
      renderFraction: function renderFraction(currentClass, totalClass) {
        return "\n                <span class=\"".concat(currentClass, "\"></span>\n                <span class=\"fraction-separator\">\u2014</span>\n                <span class=\"").concat(totalClass, "\"></span>\n              ");
      },
      // 共通のゼロ埋め関数
      formatFractionCurrent: function formatFractionCurrent(n) {
        return n.toString().padStart(2, '0');
      },
      formatFractionTotal: function formatFractionTotal(n) {
        return n.toString().padStart(2, '0');
      }
    }
  });
});