<?php
function my_theme_enqueue_assets() {
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

  $css_rel = '/assets/css/style.css';
  $css_ver = file_exists(get_theme_file_path($css_rel)) ? filemtime(get_theme_file_path($css_rel)) : null;
  wp_enqueue_style(
    'theme-style',
    get_theme_file_uri($css_rel),
    [],
    $css_ver
  );

  $js_rel = '/assets/js/script.js';
  $js_ver = file_exists(get_theme_file_path($js_rel)) ? filemtime(get_theme_file_path($js_rel)) : null;
  wp_enqueue_script(
    'theme-script',
    get_theme_file_uri($js_rel),
    ['jquery','swiper'],
    $js_ver,
    true
  );

  // テーマ変数（script.js で THEME_VARS.* が使える）
  wp_localize_script('theme-script', 'THEME_VARS', [
    'iconDefault'  => get_theme_file_uri('/assets/images/common/tel_icon.svg'),
    'iconScrolled' => get_theme_file_uri('/assets/images/common/tel_icon-blue.svg'),
  ]);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');


function my_theme_favicon_tag() {
  // favicon のパスをテーマから出力
  echo '<link rel="icon" href="' . esc_url( get_theme_file_uri('/assets/images/favicon.ico') ) . '">' . "\n";
}
add_action('wp_head', 'my_theme_favicon_tag');