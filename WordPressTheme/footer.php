<div class="cta__wrapper">
  <div class="cta">
    <a href="tel:0334332721" class="cta-button tel-link">
      <span class=" cta-button__text">お問合せ・ご予約はこちら</span>
      <span class="cta-button__icon-wrapper">
        <span class="cta-button__icon">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/tel_icon.svg" alt="phone"
            class="cta-button__icon-img">
        </span>
        <span class="cta-button__phone">03-3433-2721</span>
      </span>
    </a>
  </div>
  <button class="page-top-button" id="pageTopButton" aria-label="ページトップへ戻る">
    <span class="page-top-button__icon">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7 14L12 9L17 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" />
      </svg>
    </span>
    <span class="page-top-button__text">TOP</span>
  </button>
</div>

<footer class="footer">
  <div class="footer__inner inner">

    <div class="footer__left-content">
      <div class="footer__logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/footer_logo-sp.svg" alt="インサイトカウンセリングのロゴ"
            loading="lazy">
        </a>
      </div>

      <div class="footer__social-icons">
        <a href="https://x.com/FAP2721" target="_blank" rel="noopener noreferrer" class="footer__icon-link">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/icon_x.svg" alt="Xのアイコン" loading="lazy">
        </a>
        <a href="https://www.youtube.com/@InsightCounselingCorp" target="_blank" rel="noopener noreferrer"
          class="footer__icon-link">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/icon_youtube.svg" alt="YouTubeのアイコン"
            loading="lazy">
        </a>
      </div>

      <div class="footer__address">
        <p class="footer__text">〒105-0021<br>東京都港区東新橋2-16-3 カーザベルソーレ4F</p>
        <p class="footer__text">03-3433-2721</p>
        <p class="footer__text">営業時間／AM10:00〜PM18:00 定休日／日・祝</p>
      </div>
    </div>

    <nav class="footer__nav">
      <div class="footer__nav-columns">
        <!-- 左カラム -->
        <ul class="footer__nav-list footer__nav-list--left">
          <li class="footer__nav-item">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer__nav-link">TOP</a>
          </li>
        </ul>

        <!-- 中央カラム -->
        <ul class="footer__nav-list footer__nav-list--center">
          <li class="footer__nav-item"><a href="<?php echo esc_url( home_url( '/psychological-counseling/' ) ); ?>"
              class="footer__nav-link">心理カウンセリング</a></li>
          <li class="footer__nav-item"><a href="<?php echo esc_url( home_url( '/trauma-counseling/' ) ); ?>"
              class="footer__nav-link">トラウマカウンセリング</a></li>
          <li class="footer__nav-item"><a href="<?php echo esc_url( home_url( '/fap-therapy/' ) ); ?>"
              class="footer__nav-link">FAP療法®について</a></li>
          <li class="footer__nav-item"><a href="<?php echo esc_url( home_url( '/hypnosis-script/' ) ); ?>"
              class="footer__nav-link">催眠スクリプト</a></li>
          <li class="footer__nav-item"><a href="<?php echo esc_url( home_url( '/geneswitch/' ) ); ?>"
              class="footer__nav-link">GeneSwitch®</a></li>
          <li class="footer__nav-item"><a href="<?php echo esc_url( home_url( '/online-course/' ) ); ?>"
              class="footer__nav-link">無意識の旅</a></li>
        </ul>

        <!-- 右カラム -->
        <ul class="footer__nav-list footer__nav-list--right">
          <li class="footer__nav-item"><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>"
              class="footer__nav-link">よくあるご質問</a></li>
          <li class="footer__nav-item"><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"
              class="footer__nav-link">お知らせ・最新情報</a></li>
          <li class="footer__nav-item"><a href="<?php echo esc_url( home_url( '/company/' ) ); ?>"
              class="footer__nav-link">会社概要</a></li>
          <li class="footer__nav-item"><a href="<?php echo esc_url( home_url( '/sitemap/' ) ); ?>"
              class="footer__nav-link">サイトマップ</a></li>
          <li class="footer__nav-item"><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"
              class="footer__nav-link">プライバシーポリシー</a></li>
        </ul>
      </div>
    </nav>

    <div class="footer__copyright">
      <p class="footer__text">
        Copyright (C) <?php echo date('Y'); ?> 東京都港区の心理カウンセリング室 インサイト・カウンセリング. All Rights Reserved.
      </p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>