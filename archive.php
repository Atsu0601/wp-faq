<?php get_header() ?>

<main class="l-main">
  <div class="l-inner">
    <?php get_template_part('temple-parts/breadcrumbs'); ?>

    <div class="l-column2">
      <div class="p-archive">
        <ul class="p-archive__blk">
          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'paged' => $paged
          );
          $article_lists = new WP_Query($args);
          ?>
          <?php if ($article_lists->have_posts()) : ?>
            <?php while ($article_lists->have_posts()) : $article_lists->the_post(); ?>
              <li class="archive__blk__list">
                <a href="<?php the_permalink(); ?>">
                  <h2 class="archive__blk__list__ttl">
                    <?php
                    if (mb_strlen($post->post_title, 'UTF-8') > 20) {
                      $title = mb_substr($post->post_title, 0, 20, 'UTF-8');
                      echo $title . '……';
                    } else {
                      echo $post->post_title;
                    }
                    ?>
                  </h2>
                  <div class="p-archive__blk__list__date">
                    <time datetime="<?php the_time('Y/m/d'); ?>"><?php the_time('Y/m/d'); ?></time>
                  </div>
                  <p class="archive__blk__list__txt">
                    <?php
                    if (mb_strlen($post->post_content, 'UTF-8') > 200) {
                      $content = str_replace('\n', '', mb_substr(strip_tags($post->post_content), 0, 200, 'UTF-8'));
                      echo $content . '……';
                    } else {
                      echo str_replace('\n', '', strip_tags($post->post_content));
                    }
                    ?>
                  </p>
                </a>
                <ul class="p-archive__blk__list__meta">
                  <li><?php the_category(', ') ?></li>
                </ul>
                <div class="p-archive__blk__list__readmore"><a href="<?php the_permalink(); ?>" class="c-btn_bk">詳しくはこちら</a></div>
              </li>
            <?php endwhile; ?>
          <?php else : ?>
            <p>新しい記事はありません</p>
          <?php endif; ?>
        </ul>

        <div class="pagenation">
          <?php get_template_part('temple-parts/pager'); ?>
        </div>
      </div>

      <div class="l-sidebar">
        <?php get_template_part('sidebar'); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer() ?>