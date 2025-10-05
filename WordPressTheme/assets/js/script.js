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

  // AOS
  /* === AOS一括付与：ユーティリティ関数（オプション形式）=== */
  // function addAOS($targets, {
  //     effect = 'fade-up',
  //     duration = 1200,
  //     offset = 220,
  //     baseDelay = 0,
  //     step = 0
  //   } = {}) {
  //     $targets.each(function (i) {
  //       const $t = $(this);
  //       // 既に手書きの data-aos があれば尊重（上書きしない）
  //       if (!$t.attr('data-aos'))           $t.attr('data-aos', effect);
  //       if (!$t.attr('data-aos-duration'))  $t.attr('data-aos-duration', String(duration));
  //       if (!$t.attr('data-aos-offset'))    $t.attr('data-aos-offset', String(offset));
  //       // 段差
  //       $t.attr('data-aos-delay', String(baseDelay + i * step));
  //     });
  //   }

  //   /* === トップページ等のセクション（message / counseling / blog / counseling-examples / faq / about）=== */
  //   // message
  //   addAOS($('.message .message__header .message__image'));
  //   addAOS($('.message .message__header .section-title'));
  //   addAOS($('.message .message__heading'));
  //   addAOS($('.message .message__text > p'),                 { baseDelay: 0,   step: 80 });
  //   addAOS($('.message .message__item-list li'),             { baseDelay: 200, step: 60 });

  //   // counseling
  //   addAOS($('.counseling .counseling__title'));
  //   addAOS($('.counseling .card04'),                         { baseDelay: 0,   step: 120 });

  //   // blog
  //   addAOS($('.blog .blog__title'));
  //   addAOS($('.blog .blog__list .blog__item'),               { baseDelay: 0,   step: 100 });

  //   // counseling-examples
  //   addAOS($('.counseling-examples .counseling-examples__title'));
  //   addAOS($('.counseling-examples .counseling-examples__intro'));
  //   addAOS($('.counseling-examples .counseling-examples__item'), { baseDelay: 0, step: 120 });
  //   $('.counseling-examples .counseling-examples__item-list').each(function () {
  //     addAOS($(this).children('li'),                         { baseDelay: 200, step: 60 });
  //   });

  //   // faq
  //   addAOS($('.faq .faq__title'));
  //   addAOS($('.faq .faq-list__item'),                        { baseDelay: 0,   step: 120 });

  //   // about
  //   addAOS($('.about .about__title'));
  //   addAOS($('.about .about__main-image img'));
  //   addAOS($('.about .about__sub-image img'),                { baseDelay: 150, step: 120 });
  //   addAOS($('.about .about__company-info, .about .about__map, .about .about__access-list-wrapper'),
  //                                                          { baseDelay: 200, step: 120 });
  //   addAOS($('.about .about__button'));

  //   /* === ブログ一覧ページ（mv-under / パンくず / カード / ページネーション / サイドバー）=== */
  //   // ヒーロー（mv-under）
  //   addAOS($('.mv-under .mv-under__maintitle'));
  //   addAOS($('.mv-under .mv-under__subtitle-wrapper, .mv-under .mv-under__divider, .mv-under .mv-under__subtitle'),
  //                                                        { baseDelay: 120, step: 60 });

  //   // パンくず
  //   addAOS($('.breadcrumbs, .breadcrumbs *'),           { baseDelay: 0, step: 30, duration: 900, offset: 160 });

  //   // アーカイブカード群
  //   addAOS($('.archive__inner > .section-title, .archive__inner > .archive__heading'));
  //   addAOS($('.cards06 .card06'),                        { baseDelay: 0, step: 100, duration: 1000 });
  //   $('.cards06 .card06').each(function () {
  //     addAOS($(this).find('.card06__image'),            { baseDelay: 0,   duration: 1000 });
  //     addAOS($(this).find('.card06__item-meta'),        { baseDelay: 120, duration: 900  });
  //     addAOS($(this).find('.card06__text'),             { baseDelay: 200, duration: 900  });
  //   });

  //   // ページネーション
  //   addAOS($('.navigation.pagination, .nav-links, .nav-links *'),
  //                                                        { baseDelay: 0, step: 40, duration: 800, offset: 160 });

  // // サイドバー
  // addAOS($('.sidebar, .sidebar *'),                    { baseDelay: 0, step: 40, duration: 900, offset: 160 });

  // // ヒーロー（mv-under--company）
  // addAOS($('.mv-under--company .mv-under__maintitle'));
  // addAOS($('.mv-under--company .mv-under__subtitle-wrapper, .mv-under--company .mv-under__divider, .mv-under--company .mv-under__subtitle'),
  //                                                      { baseDelay: 120, step: 60 });

  // // パンくず（共通パーツ想定）
  // addAOS($('.breadcrumbs, .breadcrumbs *'),           { baseDelay: 0, step: 30, duration: 900, offset: 160 });

  // /* ----- company-message ----- */
  // addAOS($('.company-message .section-title'));       // セクション見出し
  // // コンテンツ左右：画像→テキストの順で段差
  // addAOS($('.company-message .company-message__img'),        { baseDelay: 0 });
  // addAOS($('.company-message .company-message__text-block'), { baseDelay: 150 });

  // // テキスト詳細（見出し→本文）
  // addAOS($('.company-message .company-message__title'));     // 小見出し
  // // 本文段落を波状に（p が複数想定なら）
  // addAOS($('.company-message .company-message__description .company-message__text'),
  //                                                      { baseDelay: 150, step: 60 });

  // // プロフィールブロック
  // addAOS($('.company-message__profile .profile__title'));
  // addAOS($('.company-message__profile .profile__text-wrapper, .company-message__profile .profile__text'),
  //                                                      { baseDelay: 120, step: 60 });

  // /* ----- company-profile（会社情報） ----- */
  // addAOS($('.company-profile .company-profile__title'));     // セクション見出し
  // // 各行を波状に
  // addAOS($('.company-profile .company-info__list'),          { baseDelay: 0, step: 80 });
  // // ラベル→値の順で軽く段差
  // $('.company-profile .company-info__list').each(function(){
  //   addAOS($(this).find('.company-info__term'),              { baseDelay: 0 });
  //   addAOS($(this).find('.company-info__description'),       { baseDelay: 100 });
  // });
  // // Google Map
  // addAOS($('.company-profile .company-info__map, .company-profile .company-info__map iframe'),
  //                                                      { baseDelay: 200 });

  // /* ----- office（スライダー） ----- */
  // addAOS($('.office .section-title'));                       // セクション見出し
  // addAOS($('.office .office__swiper'));                      // コンテナ
  // // スライドを波状に（見せ場）
  // addAOS($('.office .swiper .swiper-slide'),                 { baseDelay: 0, step: 120, duration: 1000 });
  // // 操作UI
  // addAOS($('.office .office-swiper__controls, .office .office-swiper__nav .nav'),
  //                                                      { baseDelay: 150, step: 80, duration: 900 });

  // /* ----- history（沿革） ----- */
  // addAOS($('.history .section-title'));                      // セクション見出し
  // // 年ブロックごとに波状
  // addAOS($('.history .history__item'),                       { baseDelay: 0, step: 150 });
  // // 各年ブロック内：年→リスト（行）をさらに段差
  // $('.history .history__item').each(function(){
  //   addAOS($(this).find('.history__year'),                   { baseDelay: 0,   duration: 1000 });
  //   addAOS($(this).find('.history__lists .history__list'),   { baseDelay: 120, step: 80, duration: 900 });
  //   // 行の中の「月→本文」も軽く段差
  //   $(this).find('.history__row').each(function(){
  //     addAOS($(this).find('.history__month'),                { baseDelay: 0 });
  //     addAOS($(this).find('.history__text'),                 { baseDelay: 80 });
  //   });

  // });
});