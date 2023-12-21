<?php get_header() ?>

<main class="l-main">
    <div class="l-inner">
        <?php get_template_part('temple-parts/breadcrumbs'); ?>

        <div class="l-column2">
            <div class="p-archive">
                <h1 class="page-title c-ttl__bk">
                    <?php echo get_query_var('year') . '年' . get_query_var('monthnum') . '月'; ?>の記事一覧
                </h1>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        $cat = get_the_category();
                        $catname = $cat[0]->cat_name;
                        ?>
                        <article class="p-archive__blk">
                            <div class="p-archive__blk__list">
                                <h2 class="p-archive__blk__list__ttl">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <a href="<?php the_permalink(); ?>" class="p-archive__blk__list__thumbnail"><?php the_post_thumbnail(); ?></a>
                                <div class="p-archive__blk__list__txt">
                                    <?php
                                    if (mb_strlen(strip_tags(get_the_content()), 'UTF-8') > 80) {
                                        $content = mb_substr(strip_tags(get_the_content()), 0, 80, 'UTF-8');
                                        echo $content . '…';
                                    } else {
                                        echo strip_tags(get_the_content());
                                    }
                                    ?>
                                </div>
                                <ul class="p-archive__blk__list__meta">
                                    <li><?php the_time('Y/m/d'); ?></li>
                                    <li><?php echo $catname; ?></li>
                                </ul>
                                <div class="p-archive__blk__list__readmore"><a href="<?php the_permalink(); ?>" class="c-btn_bk">詳しくはこちら</a></div>
                            </div>
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