<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="robots" content="noindex" />
  <?php wp_head(); ?>
</head>

<body>
  <!-- PC版ヘッダー -->
  <header class="header u-desktop">
    <div class="header__inner">
      <h1 class="header__logo">
        <a href="#">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/header_logo.svg" alt="">
        </a>
      </h1>
      <nav class="header__nav header-nav">
        <ul class="header-nav__list">
          <li class="header-nav__item header-nav__item--has-submenu">
            <a href="#" class="header-nav__link js-dropdown-toggle" aria-expanded="false"
              aria-controls="submenu-counseling">心理カウンセリング</a>
            <ul class="dropdown" id="submenu-counseling1" role="menu" aria-label="心理カウンセリングのメニュー">
              <li class="dropdown__item" role="none">
                <a class="dropdown__link" href="#" role="menuitem">FAP療法®について</a>
              </li>
              <li class="dropdown__item" role="none">
                <a class="dropdown__link" href="#" role="menuitem">催眠スクリプト</a>
              </li>
            </ul>
          </li>
          <li class="header-nav__item header-nav__item--has-submenu">
            <a href="#" class="header-nav__link">トラウマカウンセリング</a>
            <ul class="dropdown" id="submenu-counseling2" role="menu" aria-label="心理カウンセリングのメニュー">
              <li class="dropdown__item" role="none">
                <a class="dropdown__link" href="#" role="menuitem">FAP療法®について</a>
              </li>
              <li class="dropdown__item" role="none">
                <a class="dropdown__link" href="#" role="menuitem">催眠スクリプト</a>
              </li>
            </ul>
          </li>
          <li class="header-nav__item header-nav__item--has-submenu">
            <a href="#" class="header-nav__link">その他のサービス</a>
            <ul class="dropdown" id="submenu-counseling3" role="menu" aria-label="心理カウンセリングのメニュー">
              <li class="dropdown__item" role="none">
                <a class="dropdown__link" href="#" role="menuitem">GeneSwitch</a>
              </li>
              <li class="dropdown__item" role="none">
                <a class="dropdown__link" href="#" role="menuitem">無意識の旅オンライン講座</a>
              </li>
            </ul>
          </li>
          <li class="header-nav__item">
            <a href="#" class="header-nav__link">ブログ</a>
          </li>
          <li class="header-nav__item">
            <a href="#" class="header-nav__link">会社概要</a>
          </li>
          <li class="header-nav__item">
            <a href="#" class="header-nav__link">よくあるご質問</a>
          </li>
        </ul>
      </nav>
      <div class="header__contact">
        <div class="contact-info">
          <div class="contact-info__phone contact-info__phone--pc">
            <span class="contact-info__icon">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/tel_icon.svg" alt="phone"
                class="contact-info__icon-img">
            </span>
            <span class="contact-info__number">03-3433-2721</span>
          </div>
          <div class="contact-info__hours">
            (AM10:00~PM18:00/日祝休)
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- モバイル版ヘッダー -->
  <header class="header header--mobile u-mobile">
    <div class="header__inner inner">
      <h1 class="header__logo">
        <a href="#">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/header_logo-sp.svg" alt="">
        </a>
      </h1>
      <button class="header__hamburger js-hamburger">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="header__drawer header-drawer js-drawer">
        <div class=" header-drawer__inner inner">
          <nav class="header-drawer__nav">
            <ul class="header-drawer__list">
              <li class="header-drawer__item header-drawer__item--has-submenu">
                <button class="header-drawer__toggle js-drawer-toggle">心理カウンセリング</button>
                <ul class="header-drawer__submenu">
                  <li class="header-drawer__submenu-item"><a href="/fap">FAP療法®について</a></li>
                  <li class="header-drawer__submenu-item"><a href="/sleep-script">催眠スクリプト</a></li>
                </ul>
              </li>
              <li class="header-drawer__item header-drawer__item--has-submenu">
                <button class="header-drawer__toggle js-drawer-toggle">トラウマカウンセリング</button>
                <ul class="header-drawer__submenu">
                  <li class="header-drawer__submenu-item"><a href="/fap">FAP療法®について</a></li>
                  <li class="header-drawer__submenu-item"><a href="/sleep-script">催眠スクリプト</a></li>
                </ul>
              </li>
              <li class="header-drawer__item header-drawer__item--has-submenu">
                <button class="header-drawer__toggle js-drawer-toggle">その他のサービス</button>
                <ul class="header-drawer__submenu">
                  <li class="header-drawer__submenu-item"><a href="/fap">GeneSwitch</a></li>
                  <li class="header-drawer__submenu-item"><a href="/sleep-script">無意識の旅オンライン講座</a></li>
                </ul>
              </li>
              <li class="header-drawer__item">
                <a href="#">ブログ</a>
              </li>
              <li class="header-drawer__item">
                <a href="#">会社概要</a>
              </li>
              <li class="header-drawer__item">
                <a href="#">よくあるご質問</a>
              </li>
            </ul>
          </nav>
          <div class="header__contact header-nav__cta header-drawer__cta">
            <div class="contact-info">
              <div class="contact-info__phone">
                <span class="contact-info__icon"><img
                    src="<?php echo get_theme_file_uri(); ?>/assets/images/common/tel_icon-blue.svg" alt="phone"
                    class="contact-info__icon-img"></span>
                <span class="contact-info__number">03-3433-2721</span>
              </div>
              <div class="contact-info__hours">
                (AM10:00~PM18:00/日祝休)
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>