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
  // 前後の記事を取得
  $prev_post = get_previous_post();
  $next_post = get_next_post();

  // 一覧ページURL
  $archive_url = home_url('/blog/');
  ?>

        <!-- 前の記事 -->
        <div class="page-link__prev">
          <?php if ( $prev_post ) : ?>
          <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" rel="prev" aria-label="前の記事へ">
            <span class="page-link__prev--icon">
              <img src="<?php echo esc_url( get_theme_file_uri('/assets/images/common/prev-button_icon.svg') ); ?>"
                alt="前の記事へ">
            </span>
            <span class="page-link__prev--text">前の記事</span>
          </a>
          <?php endif; ?>
        </div>

        <!-- 一覧に戻る -->
        <div class="page-link__archive">
          <a href="<?php echo esc_url( $archive_url ); ?>">一覧へ戻る</a>
        </div>

        <!-- 次の記事 -->
        <div class="page-link__next">
          <?php if ( $next_post ) : ?>
          <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" rel="next" aria-label="次の記事へ">
            <span class="page-link__next--text">次の記事</span>
            <span class="page-link__next--icon">
              <img src="<?php echo esc_url( get_theme_file_uri('/assets/images/common/next-button_icon.svg') ); ?>"
                alt="次の記事へ">
            </span>
          </a>
          <?php endif; ?>
        </div>
      </div>

    </section>
    <?php get_sidebar('blog'); ?>
  </div>
</main>

<?php get_footer(); ?>