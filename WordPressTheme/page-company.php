<?php get_header(); ?>
<main class="main">
  <section class="mv-under mv-under--company">
    <div class="mv-under__inner">
      <div class="mv-under__content">
        <p class="mv-under__maintitle">
          会社概要
        </p>
        <div class="mv-under__subtitle-wrapper">
          <span class="mv-under__divider"></span>
          <p class="mv-under__subtitle">
            company
          </p>
        </div>
      </div>
    </div>
  </section>
  <?php get_template_part('parts/breadcrumbs') ?>
  <section class="company-message">
    <div class="company-message__inner inner">
      <h2 class="company-message__header section-title" data-aos="fade-up" data-aos-duration="1000"
        data-aos-offset="160" data-aos-delay="200">
        <p class="section-title__en">message</p>
        <p class="section-title__ja"> <?php echo nl2br(esc_html(get_field('message_title'))); ?></p>
      </h2>
      <div class="company-message__content">
        <div class="company-message__img" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
          data-aos-delay="200">
          <?php if( get_field('message_img') ): ?>
          <img src="<?php the_field('message_img'); ?>" alt="男性" />
          <?php endif; ?>
        </div>
        <div class="company-message__text-block" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
          data-aos-delay="200">
          <h2 class="company-message__title">
            <?php echo nl2br(esc_html(get_field('message_title'))); ?>
          </h2>
          <div class="company-message__description">
            <p class="company-message__text">
              <?php echo nl2br(esc_html(get_field('message_text'))); ?>
            </p>
          </div>
        </div>
      </div>
      <div class="company-message__profile profile" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
        data-aos-delay="200">
        <h3 class="profile__header profile__title">
          <?php echo nl2br(esc_html(get_field('profile_title'))); ?>
        </h3>
        <div class="profile__text-wrapper">
          <p class="profile__text">
            <?php echo nl2br(esc_html(get_field('profile_text'))); ?>
          </p>
        </div>
      </div>
    </div>
  </section>
  <section class="company-profile">
    <div class="company-profile__inner inner">
      <h2 class="company-profile__title section-title" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
        data-aos-delay="200">
        <p class="section-title__en">company</p>
        <p class="section-title__ja">会社概要</p>
      </h2>
      <div class="company__profile company-info" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
        data-aos-delay="200">
        <dl class="company-info__list">
          <dt class="company-info__term">会社名</dt>
          <dd class="company-info__description">株式会社インサイト・カウンセリング</dd>
        </dl>
        <dl class="company-info__list">
          <dt class="company-info__term">代表</dt>
          <dd class="company-info__description">大嶋信頼（おおしま のぶより）</dd>
        </dl>
        <dl class="company-info__list">
          <dt class="company-info__term">設立</dt>
          <dd class="company-info__description">
            <time datetime="2003-04">2003年4月</time>
          </dd>
        </dl>
        <dl class="company-info__list">
          <dt class="company-info__term">住所</dt>
          <dd class="company-info__description">〒105-0021 東京都港区東新橋2-16-3 カーザベルソーレ4F</dd>
        </dl>
        <dl class="company-info__list">
          <dt class="company-info__term">電話番号</dt>
          <dd class="company-info__description">03-3433-2721</dd>
        </dl>
        <dl class="company-info__list">
          <dt class="company-info__term">資本金</dt>
          <dd class="company-info__description">1000万円</dd>
        </dl>
      </div>
      <div class="company-info__map" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
        data-aos-delay="200">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.648740125287!2d139.75460627592767!3d35.66102497259376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bc164632c57%3A0xb4fe478f8c59181c!2z44CSMTA1LTAwMjEg5p2x5Lqs6YO95riv5Yy65p2x5paw5qmL77yS5LiB55uu77yR77yW4oiS77yTIOOCq-ODvOOCtuODmeODq-OCveODvOODrCA0Zg!5e0!3m2!1sja!2sjp!4v1758529098968!5m2!1sja!2sjp"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section>
  <section class="office">
    <div class="office__inner">
      <h2 class="our-office__title section-title" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
        data-aos-delay="200">
        <p class="section-title__en">our office</p>
        <p class="section-title__ja">会社内観・外観</p>
      </h2>
      <div class="office__swiper office-swiper" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
        data-aos-delay="200">
        <div class="swiper js-office-swiper">
          <ul class="swiper-wrapper">
            <li class="swiper-slide">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_img01.jpg" alt="省略">
            </li>
            <li class="swiper-slide">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_img02.jpg" alt="省略">
            </li>
            <li class="swiper-slide">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_img03.jpg" alt="省略">
            </li>
            <li class="swiper-slide">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_img01.jpg" alt="省略">
            </li>
            <li class="swiper-slide">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_img02.jpg" alt="省略">
            </li>
            <li class="swiper-slide">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_img03.jpg" alt="省略">
            </li>
          </ul>
        </div>
        <div class="swiper-pagination"></div>
        <div class="office-swiper__controls" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
          data-aos-delay="200">
          <div class="swiper-pagination"></div>
          <div class="office-swiper__nav">
            <button class="nav nav--prev" aria-label="前へ">
              <svg width="51" height="50" viewBox="0 0 51 50" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <circle cx="25.5" cy="25" r="25" fill="white" />
                <path d="M20.5 25L28 30.1962V19.8038L20.5 25Z" fill="#33B5E1" />
              </svg>
            </button>
            <button class="nav nav--next" aria-label="次へ">
              <svg width="51" height="50" viewBox="0 0 51 50" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <circle cx="25.5" cy="25" r="25" fill="white" />
                <path d="M30.5 25L23 30.1962V19.8038L30.5 25Z" fill="#33B5E1" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="history">
    <div class="history__inner">
      <h2 class="company-profile__title section-title" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
        data-aos-delay="200">
        <p class="section-title__en">history</p>
        <p class="section-title__ja">沿革</p>
      </h2>
      <div class="history__content">
        <div class="history__item" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
          data-aos-delay="200">
          <div class="history__year">
            <div class=""><span>2003年</span></div>
          </div>
          <ul class="history__lists">
            <li class="history__list">
              <dl class="history__row">
                <dt class="history__month">4<span>月</span></dt>
                <dd class="history__text">東京都目黒区に株式会社インサイト・カウンセリング（資本金1000万円）を設立。<br>
                  心理カウンセリング業を始める。</dd>
              </dl>
            </li>
            <li class="history__list">
              <dl class="history__row">
                <dt class="history__month">10<span>月</span></dt>
                <dd class="history__text">EAP（Employee Assistance Program）社員のためのメンタルサポートプログラム開始。</dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="history__item" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
          data-aos-delay="200">
          <div class="history__year">
            <div class=""><span>2004年</span></div>
          </div>
          <ul class="history__lists">
            <li class="history__list">
              <dl class="history__row">
                <dt class="history__month">6<span>月</span></dt>
                <dd class="history__text">東京都港区東新橋2丁目16番1号に移転。</dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="history__item" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
          data-aos-delay="200">
          <div class="history__year">
            <div class=""><span>2006年</span></div>
          </div>
          <ul class="history__lists">
            <li class="history__list">
              <dl class="history__row">
                <dt class="history__month">2<span>月</span></dt>
                <dd class="history__text">独自の電子ペンカウンセリングシステム開発・導入。</dd>
              </dl>
            </li>
            <li class="history__list">
              <dl class="history__row">
                <dt class="history__month">4<span>月</span></dt>
                <dd class="history__text">高齢者と家族のためのシニアカウンセリング開始。</dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="history__item" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
          data-aos-delay="200">
          <div class="history__year">
            <div class=""><span>2011年</span></div>
          </div>
          <ul class="history__lists">
            <li class="history__list">
              <dl class="history__row">
                <dt class="history__month">3<span>月</span></dt>
                <dd class="history__text">訪問カウンセリング及びEAP事業を廃止。</dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="history__item" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
          data-aos-delay="200">
          <div class="history__year">
            <div class=""><span>2013年</span></div>
          </div>
          <ul class="history__lists">
            <li class="history__list">
              <dl class="history__row">
                <dt class="history__month">11<span>月</span></dt>
                <dd class="history__text">東京都港区東新橋2丁目16番3号カーザベルソーレに移転。</dd>
              </dl>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>