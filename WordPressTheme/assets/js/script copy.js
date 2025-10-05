"use strict";

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
jQuery(function ($) {
  var _Swiper;
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
  var service_swiper = new Swiper('.js-service-swiper', (_Swiper = {
    loop: true,
    speed: 2000,
    centeredSlides: true,
    slidesPerView: 'auto'
  }, _defineProperty(_Swiper, "slidesPerView", '1'), _defineProperty(_Swiper, "spaceBetween", 20), _defineProperty(_Swiper, "initialSlide", 0), _defineProperty(_Swiper, "loopAdditionalSlides", 2), _defineProperty(_Swiper, "breakpoints", {
    768: {
      spaceBetween: 30,
      slidesPerView: '2'
    }
  }), _defineProperty(_Swiper, "pagination", {
    el: '.service-swiper__controls .swiper-pagination',
    type: 'fraction',
    renderFraction: function renderFraction(currentClass, totalClass) {
      return '<span class="' + currentClass + '"></span>' + '<span class="fraction-separator">—</span>' + '<span class="' + totalClass + '"></span>';
    },
    formatFractionCurrent: function formatFractionCurrent(n) {
      return String(n).padStart(2, '0');
    },
    formatFractionTotal: function formatFractionTotal(n) {
      return String(n).padStart(2, '0');
    }
  }), _defineProperty(_Swiper, "navigation", {
    nextEl: '.service-swiper__nav .nav--next',
    prevEl: '.service-swiper__nav .nav--prev'
  }), _defineProperty(_Swiper, "on", {
    resize: function resize() {
      this.update();
    }
  }), _Swiper));
});