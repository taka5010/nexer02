<?php
function my_theme_enqueue_assets() {
  // jQuery（WPバンドル）
  wp_enqueue_script('jquery');

  // Google Fonts
  wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Zen+Kaku+Gothic+New:wght@300;400;500;700;900&display=swap',
    [],
    null
  );

  // Swiper
  wp_enqueue_style(
    'swiper',
    'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css',
    [],
    '10'
  );
  wp_enqueue_script(
    'swiper',
    'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js',
    [],
    '10',
    true
  );

  // === AOS（Animate On Scroll）ここから ===
  wp_enqueue_style(
    'aos-css',
    'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css',
    [],
    '2.3.4'
  );
  wp_enqueue_script(
    'aos',
    'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js',
    [],
    '2.3.4',
    true
  );
  // 初期化（ページ下部でaos.js読込後に実行）
  wp_add_inline_script(
    'aos',
    'window.addEventListener("load",function(){AOS.init({duration:800, once:true, offset:100});});'
  );
  // === AOSここまで ===

  // メインCSS（更新日時でキャッシュバスティング）
  $css_rel = '/assets/css/style.css';
  $css_ver = file_exists(get_theme_file_path($css_rel)) ? filemtime(get_theme_file_path($css_rel)) : null;
  wp_enqueue_style(
    'theme-style',
    get_theme_file_uri($css_rel),
    ['swiper','aos-css'], // AOSのスタイルが先にあると安心
    $css_ver
  );

  // メインJS（SwiperとAOSを依存に）
  $js_rel = '/assets/js/script.js';
  $js_ver = file_exists(get_theme_file_path($js_rel)) ? filemtime(get_theme_file_path($js_rel)) : null;
  wp_enqueue_script(
    'theme-script',
    get_theme_file_uri($js_rel),
    ['jquery','swiper','aos'], // ← AOSを依存に追加
    $js_ver,
    true
  );

  // テーマ変数（script.js で THEME_VARS.* が使える）
  wp_localize_script('theme-script', 'THEME_VARS', [
    'iconDefault'  => get_theme_file_uri('/assets/images/common/tel_icon.svg'),
    'iconScrolled' => get_theme_file_uri('/assets/images/common/tel_icon-blue.svg'),
  ]);

  // JS無効環境で要素を非表示にしないためのnoscript（任意）
  // AOSはJSが無いとopacity:0のままになりがちなので保険
  add_action('wp_head', function () {
    echo '<noscript><style>[data-aos]{opacity:1 !important; transform:none !important;}</style></noscript>' . "\n";
  });
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');

function my_theme_favicon_tag() {
  // favicon のパスをテーマから出力
  echo '<link rel="icon" href="' . esc_url( get_theme_file_uri('/assets/images/favicon.ico') ) . '">' . "\n";
}
add_action('wp_head', 'my_theme_favicon_tag');

function my_setup() {
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'card06', 720, 420, true );

  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support(
    'html5',
    [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ]
  );
}
add_action( 'after_setup_theme', 'my_setup' );

// 固定ページ編集不可（ACF以外）
function remove_page_editor() {
  remove_post_type_support( 'page', 'editor' ); // 本文エディターを非表示
}
add_action( 'admin_init', 'remove_page_editor' );