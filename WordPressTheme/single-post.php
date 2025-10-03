<?php get_header(); ?>

<main class="main">
  <section class="mv-under mv-under--blog-items">
    <div class="mv-under__inner">
      <div class="mv-under__content">
        <p class="mv-under__maintitle">
          ブログ
        </p>
        <div class="mv-under__subtitle-wrapper">
          <span class="mv-under__divider"></span>
          <p class="mv-under__subtitle">
            blog
          </p>
        </div>
      </div>
    </div>
  </section>
  <div class="blog-items--wrapper">
    <section class="blog-detail">
      <div class="blog-detail__inner inner">
        <?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            ?>
        <div class="blog-detail__meta">
          <time class="card06__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
            <?php echo esc_html( get_the_date('Y.m.d') ); ?>
          </time>
          <!-- <span class="blog-detail__category">カテゴリ</span> -->
          <span class="blog-detail__category"><?php
      $cats = get_the_category();
      if ( ! empty( $cats ) ) {
        echo esc_html( $cats[0]->name );
      }
      ?></span>
        </div>
        <div class="blog-detail__title">
          <h1><?php the_title(); ?></h1>
        </div>
        <article <?php post_class(); ?>>
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
        </article>
        <?php
          endwhile;
      endif;
      ?>
      </div>
      <div class="blog-detail__links page-links">
        <?php
$prev = get_previous_post();
$prev_url = get_permalink($prev->ID);
$next = get_next_post();
$next_url = get_permalink($next->ID);
?>

        <div class="page-link__prev">
          <?php if($prev) : ?>
          <a href="<?php echo $prev_url; ?>">
            <span class="page-link__prev--icon">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/prev-button_icon.svg" alt="前の記事へ">
            </span>
            <span class="page-link__prev--text">前の記事</span>
          </a>
          <?php endif; ?>
        </div>
        <div class="page-link__archive"><a href="<?php echo home_url('/blog/'); ?>">一覧へ戻る</a></div>
        <div class="page-link__next">
          <?php if($next) : ?>
          <a href="<?php echo $next_url; ?>">
            <span class="page-link__next--text">次の記事</span>
            <span class="page-link__next--icon">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/next-button_icon.svg" alt="次の記事へ">
            </span>
          </a>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <aside class="blog-items__sidebar sidebar">
      <div class="sidebar__inner inner">
        <div class="sidebar__category sidebar-category">
          <h2 class="sidebar-category__title sidebar__title">カテゴリー</h2>
          <ul class="sidebar-category__list">
            <li class="sidebar-category__item">
              <a class="sidebar-category__link" href="#">緊張しちゃう人たち</a>
            </li>
            <li class="sidebar-category__item">
              <a class="sidebar-category__link" href="#">セミナーのお知らせ</a>
            </li>
            <li class="sidebar-category__item">
              <a class="sidebar-category__link" href="#">講演のお知らせ</a>
            </li>
            <li class="sidebar-category__item">
              <a class="sidebar-category__link" href="#">心の傷の癒し方</a>
            </li>
            <li class="sidebar-category__item">
              <a class="sidebar-category__link" href="#">書籍・DVD</a>
            </li>
            <li class="sidebar-category__item">
              <a class="sidebar-category__link" href="#">マスコミ紹介記事</a>
            </li>
          </ul>
        </div>
        <div class="sidebar__news sidebar-news">
          <h2 class="sidebar-news__title sidebar__title">新着記事</h2>
          <ul class="sidebar-news__list">
            <li class="sidebar-news__item">
              <a class="sidebar-news__link" href="#">
                <div class="sidebar-news__item-content">
                  <div class="sidebar-news__item-meta">
                    <time class="sidebar-news__date">2025.08.01</time>
                    <span class="sidebar-news__category">カテゴリ</span>
                  </div>
                  <p class="sidebar-news__text">新着記事のタイトルが入ります新着記事のタイトルが...</p>
                </div>
              </a>
            </li>
            <li class="sidebar-news__item">
              <a class="sidebar-news__link" href="#">
                <div class="sidebar-news__item-content">
                  <div class="sidebar-news__item-meta">
                    <time class="sidebar-news__date">2025.08.01</time>
                    <span class="sidebar-news__category">カテゴリ</span>
                  </div>
                  <p class="sidebar-news__text">新着記事のタイトルが入ります新着記事のタイトルが...</p>
                </div>
              </a>
            </li>
            <li class="sidebar-news__item">
              <a class="sidebar-news__link" href="#">
                <div class="sidebar-news__item-content">
                  <div class="sidebar-news__item-meta">
                    <time class="sidebar-news__date">2025.08.01</time>
                    <span class="sidebar-news__category">カテゴリ</span>
                  </div>
                  <p class="sidebar-news__text">新着記事のタイトルが入ります新着記事のタイトルが...</p>
                </div>
              </a>
            </li>
            <li class="sidebar-news__item">
              <a class="sidebar-news__link" href="#">
                <div class="sidebar-news__item-content">
                  <div class="sidebar-news__item-meta">
                    <time class="sidebar-news__date">2025.08.01</time>
                    <span class="sidebar-news__category">カテゴリ</span>
                  </div>
                  <p class="sidebar-news__text">新着記事のタイトルが入ります新着記事のタイトルが...</p>
                </div>
              </a>
            </li>
            <li class="sidebar-news__item">
              <a class="sidebar-news__link" href="#">
                <div class="sidebar-news__item-content">
                  <div class="sidebar-news__item-meta">
                    <time class="sidebar-news__date">2025.08.01</time>
                    <span class="sidebar-news__category">カテゴリ</span>
                  </div>
                  <p class="sidebar-news__text">新着記事のタイトルが入ります新着記事のタイトルが...</p>
                </div>
              </a>
            </li>
          </ul>
        </div>
        <div class="sidebar__archive sidebar-archive">
          <h2 class="sidebar-archive__title sidebar__title">月別アーカイブ</h2>
          <ul class="sidebar-archive__list">
            <li class="sidebar-archive__item">
              <a class="sidebar-archive__link" href="#">2024年4月（10）</a>
            </li>
            <li class="sidebar-archive__item">
              <a class="sidebar-archive__link" href="#">2024年3月（10）</a>
            </li>
            <li class="sidebar-archive__item">
              <a class="sidebar-archive__link" href="#">2024年2月（10）</a>
            </li>
          </ul>
        </div>
      </div>
    </aside>
  </div>
</main>

<?php get_footer(); ?>