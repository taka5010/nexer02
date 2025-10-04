<section class="blog-list">
  <div class="blog-list__inner">
    <h2 class="blog-list__title section-title02">
      <p class="section-title02__text">テキストが入ります</p>
    </h2>
    <p class="blog-list__text">テキストが入りますテキストが入りますテキストが入りますテキストが入ります</p>
    <ul class="blog-list__items">
      <?php
      $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 2,
        'no_found_rows'  => true,
      );
      $latest = new WP_Query( $args );

      if ( $latest->have_posts() ) :
        while ( $latest->have_posts() ) : $latest->the_post();
          // 代替テキスト（未設定ならタイトル）
          $thumb_id = get_post_thumbnail_id( get_the_ID() );
          $alt = $thumb_id ? get_post_meta( $thumb_id, '_wp_attachment_image_alt', true ) : '';
          if ( $alt === '' ) { $alt = get_the_title(); }

          // 抜粋（なければ本文から自動生成）
          $excerpt = get_the_excerpt();
      ?>
      <li class="blog-list__item">
        <a href="<?php the_permalink(); ?>" class="blog-list__link"
          aria-label="<?php echo esc_attr( get_the_title() ); ?>">
          <div class="blog-list__item-img">
            <?php if ( has_post_thumbnail() ) : ?>
            <?php
                  echo get_the_post_thumbnail(
                    get_the_ID(),
                    'medium_large',
                    array(
                      'alt'      => esc_attr( $alt ),
                      'loading'  => 'lazy',
                      'decoding' => 'async',
                    )
                  );
                ?>
            <?php else : ?>
            <img src="<?php echo esc_url( get_theme_file_uri('/assets/images/common/blog-list__img.jpg') ); ?>"
              alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy" decoding="async">
            <?php endif; ?>
          </div>

          <div class="blog-list__item-content">
            <p class="blog-list__item-title"><?php echo esc_html( get_the_title() ); ?></p>
            <p class="blog-list__item-text">
              <?php echo esc_html( wp_trim_words( $excerpt, 80, '…' ) ); ?>
            </p>

            <div class="blog__button section-button">
              <div class="section-button__wrapper">
                <span class="section-button__text">詳しく見る</span>
                <div class="section-button__icon button-icon--blue">
                  <span class="arrow-white" aria-hidden="true"></span>
                </div>
              </div>
            </div>
          </div>
        </a>
      </li>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<li class="blog-list__item">投稿はまだありません。</li>';
      endif;
      ?>
    </ul>
  </div>
</section>