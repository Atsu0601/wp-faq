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

                    <div class="next_prev_post">
                        <?php if (get_next_post()) : ?>
                            <?php previous_post_link('&laquo; %link', '前の記事へ'); ?>
                        <?php endif; ?>
                        <?php if (get_previous_post()) : ?>
                            <?php next_post_link('%link &raquo;', '次の記事へ'); ?>
                        <?php endif; ?>
                    </div>
            </div>

            <div class="l-sidebar">
                <?php get_template_part('sidebar'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>