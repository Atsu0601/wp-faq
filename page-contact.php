<?php

/**
Template Name:問い合わせ
 */
get_header() ?>

<main class="l-main">
    <div class="l-inner">
        <div class="p-contact">
            <?php get_template_part('temple-parts/breadcrumbs'); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content() ?>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</main>

<?php get_footer() ?>