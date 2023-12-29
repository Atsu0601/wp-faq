<?php get_header() ?>

<main class="l-main">
  <div class="l-inner">
    <?php get_template_part('temple-parts/breadcrumbs'); ?>

    <div class="l-column2">
      <div class="p-archive">
        <h1 class="page-title c-ttl__bk">よくある質問一覧</h1>
        <ul class="c-faq_accordion">
          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
            'post_type' => 'faq',
            'posts_per_page' => 10,
            'paged' => $paged
          );
          $article_lists = new WP_Query($args);
          ?>
          <?php if ($article_lists->have_posts()) : ?>
            <?php while ($article_lists->have_posts()) : $article_lists->the_post(); ?>
              <li class="c-faq_accordion__item">
                <section>
                  <h3 class="c-faq_accordion__item__ttl"><?php the_field('question'); ?></h3>
                  <div class="c-faq_accordion__item__box" style="display: block;">
                    <p><?php the_field('answer'); ?></p>
                  </div>
                  <div class="p-archive__blk__list__readmore"><a href="<?php the_permalink(); ?>" class="c-btn_bk">詳しくはこちら</a></div>
                </section>
              </li>
            <?php endwhile; ?>
          <?php else : ?>
            <p>新しい記事はありません</p>
          <?php endif; ?>
        </ul>

        <div class="c-faq_taxonomy">
          <h2 class="c-faq_taxonomy__ttl">カテゴリー一覧</h2>
          <?php
          $terms = get_terms('faq_cate');
          foreach ($terms as $term) {
            echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
          }
          ?>
        </div>

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