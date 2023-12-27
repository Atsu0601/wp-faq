<?php get_header(); ?>

<main class="l-main">
    <div class="l-inner">
        <?php get_template_part('temple-parts/breadcrumbs'); ?>

        <div class="l-column2">
            <div class="p-single_faq">
                <h1 class="c-ttl__bk"><?php the_title(); ?></h1>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <h3 class=""><?php the_field('question'); ?></h3>
                        <p><?php the_field('answer'); ?></p>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>お探しの記事は見つかりませんでした。<br />
                    <?php endif; ?>

                    <div class="single_bottom_nav">
                        <p class="<?php if (get_previous_post()) : ?>single_bottom_nav_prev<?php endif; ?>"><?php previous_post_link('%link', '前へ'); ?></p>
                        <p class="single_bottom_nav_back"><a href="<?php echo get_post_type_archive_link(get_post_type()); ?>">一覧に戻る</a></p>
                        <p class="<?php if (get_next_post()) : ?>single_bottom_nav_next<?php endif; ?>"><?php next_post_link('%link', '次へ'); ?></p>
                    </div>
            </div>

            <div class="l-sidebar">
                <?php get_template_part('sidebar'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>