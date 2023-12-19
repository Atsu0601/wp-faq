<?php get_header() ?>

<main class="l-main">
    <div class="l-inner">
        <?php get_template_part('temple-parts/breadcrumbs'); ?>

        <div class="l-column2">
            <div class="p-date">
                <h1 class="page-title">
                    <?php echo get_query_var('year') . '年' . get_query_var('monthnum') . '月'; ?>
                </h1>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        $cat = get_the_category();
                        $catname = $cat[0]->cat_name;
                        ?>
                        <article>
                            <h2 class="article-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <ul class="meta">
                                <li><?php the_time('Y/m/d'); ?></li>
                                <li><?php echo $catname; ?></li>
                            </ul>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            <div class="text">
                                <?php
                                if (mb_strlen(strip_tags(get_the_content()), 'UTF-8') > 80) {
                                    $content = mb_substr(strip_tags(get_the_content()), 0, 80, 'UTF-8');
                                    echo $content . '…';
                                } else {
                                    echo strip_tags(get_the_content());
                                }
                                ?>
                            </div>
                            <div class="readmore"><a href="<?php the_permalink(); ?>">詳しくはこちら</a></div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>記事がありません</p>
                <?php endif; ?>

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