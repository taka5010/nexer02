<aside class="blog-items__sidebar sidebar">
  <div class="sidebar__inner inner">

    <!-- カテゴリー -->
    <div class="sidebar__category sidebar-category">
      <h2 class="sidebar-category__title sidebar__title">カテゴリー</h2>
      <ul class="sidebar-category__list">
        <?php
    $categories = get_categories(array(
      'orderby'    => 'name',
      'order'      => 'ASC',
      'hide_empty' => true, // 投稿がないカテゴリーは非表示
    ));
    if ( $categories ) :
      foreach ( $categories as $category ) :
    ?>
        <li class="sidebar-category__item">
          <a class="sidebar-category__link" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
            <?php echo esc_html( $category->name ); ?>
          </a>
        </li>
        <?php
      endforeach;
    else :
      echo '<li class="sidebar-category__item">カテゴリーはありません。</li>';
    endif;
    ?>
      </ul>
    </div>


    <!-- 新着記事 -->
    <div class="sidebar__news sidebar-news">
      <h2 class="sidebar-news__title sidebar__title">新着記事</h2>
      <ul class="sidebar-news__list">
        <?php
        $recent_posts = wp_get_recent_posts(array(
          'numberposts' => 5,
          'post_status' => 'publish'
        ));
        foreach ($recent_posts as $post) :
          $post_id = $post['ID'];
          $post_title = get_the_title($post_id);
          $post_link = get_permalink($post_id);
          $post_date = get_the_date('Y.m.d', $post_id);
          $categories = get_the_category($post_id);
          $category_name = $categories ? $categories[0]->name : '';
        ?>
        <li class="sidebar-news__item">
          <a class="sidebar-news__link" href="<?php echo esc_url($post_link); ?>">
            <div class="sidebar-news__item-content">
              <div class="sidebar-news__item-meta">
                <time class="sidebar-news__date"><?php echo esc_html($post_date); ?></time>
                <?php if ($category_name) : ?>
                <span class="sidebar-news__category"><?php echo esc_html($category_name); ?></span>
                <?php endif; ?>
              </div>
              <p class="sidebar-news__text">
                <?php echo esc_html(wp_trim_words($post_title, 20, '...')); ?>
              </p>
            </div>
          </a>
        </li>
        <?php endforeach; wp_reset_postdata(); ?>
      </ul>
    </div>

    <!-- 月別アーカイブ -->
    <div class="sidebar__archive sidebar-archive">
      <h2 class="sidebar-archive__title sidebar__title">月別アーカイブ</h2>
      <ul class="sidebar-archive__list">
        <?php
        wp_get_archives(array(
          'type'            => 'monthly',
          'show_post_count' => true,
          'format'          => 'custom',
          'before'          => '<li class="sidebar-archive__item">',
          'after'           => '</li>',
          'echo'            => 1
        ));
        ?>
      </ul>
    </div>

  </div>
</aside>