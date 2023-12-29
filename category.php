<?php get_header() ?>

<main class="l-main">
    <div class="l-inner">
        <?php get_template_part('temple-parts/breadcrumbs'); ?>

        <div class="l-column2">
            <div class="p-archive">

            <?php get_template_part('temple-parts/category_list'); ?>

                <?php
                if (have_posts()) : ?>
                    <h1 class="c-ttl__bk">カテゴリー：<?php single_cat_title(); ?></h1>
                    <ul class="p-archive__blk">
                        <?php while (have_posts()) : the_post(); ?>
                            <li class="p-archive__blk__list">
                                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <h2 class="p-archive__blk__list__ttl"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
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
                                    <ul class="p-archive__blk__list__meta">
                                        <li><?php the_category(', ') ?></li>
                                    </ul>
                                    <div class="p-archive__blk__list__readmore"><a href="<?php the_permalink(); ?>" class="c-btn_bk">詳しくはこちら</a></div>
                                </div>
                            </li>
                        <?php
                        endwhile; ?>
                    </ul>
                <?php
                endif;
                ?>
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