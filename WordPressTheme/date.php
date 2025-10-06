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
  <?php get_template_part('parts/breadcrumbs') ?>
  <div class="blog-items--wrapper">
    <section class="blog-items__archive archive">
      <div class="archive__inner inner">
        <div class="archive__cards cards06" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="160"
          data-aos-delay="200">
          <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="archive__card card06">
            <div class="card06__image">
              <?php if ( has_post_thumbnail() ) : ?>
              <?php
      $thumb_id = get_post_thumbnail_id( get_the_ID() );
      $alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
      if ( $alt === '' ) { $alt = get_the_title(); }
      echo get_the_post_thumbnail(
        get_the_ID(),
        'medium_large', // 必要に応じてサイズ変更
        [
          'alt'      => esc_attr( $alt ),
          'loading'  => 'lazy',
          'decoding' => 'async',
          'class'    => 'card06__thumb',
        ]
      );
    ?>
              <?php else : ?>
              <img src="<?php echo esc_url( get_theme_file_uri('/assets/images/common/no_image.jpg') ); ?>"
                alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy" decoding="async" class="card06__thumb">
              <?php endif; ?>
            </div>
            <div class="card06__item-content">
              <div class="card06__item-meta">
                <time class="card06__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
                  <?php echo esc_html( get_the_date('Y.m.d') ); ?>
                </time>
                <span class="card06__category"><?php
$cats = get_the_category();
if ( ! empty( $cats ) ) {
  echo esc_html( $cats[0]->name );
}
?></span>
              </div>
              <h3 class="card06__text"><?php echo get_the_title(); ?></h3>
            </div>
          </a>
          <?php endwhile; ?>
          <?php else : ?>
          <p>投稿が見つかりませんでした。</p>
          <?php endif; ?>
          <!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2 class="entry-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="entry-meta">
              <span class="date"><?php echo get_the_date(); ?></span>
              <span class="author"><?php the_author(); ?></span>
            </div>
            <div class="entry-summary">
              <?php the_excerpt(); ?>
            </div>
          </article> -->
        </div>
        <?php
the_posts_pagination( array(
  'mid_size'           => 1, // 現在ページの前後に出す数字数
  'end_size'           => 1, // 先頭側は1,2を常に表示／末尾側も最後の2ページを表示（=最後のページが必ず見える）
  'prev_text' => '<span class="pgn__wrap"><img class="pgn__icon" src="' . esc_url( get_theme_file_uri('/assets/images/common/pagenation_arrow-left.svg') ) . '" alt="" aria-hidden="true"><span class="pgn__label">Prev</span></span>',
  'next_text' => '<span class="pgn__wrap"><span class="pgn__label">Next</span><img class="pgn__icon" src="' . esc_url( get_theme_file_uri('/assets/images/common/pagenation_arrow-right.svg') ) . '" alt="" aria-hidden="true"></span>',

        'screen_reader_text' => 'ページナビゲーション',
        ) );
        ?>
      </div>

    </section>
    <?php get_sidebar('blog'); ?>
  </div>
</main>

<?php get_footer(); ?>