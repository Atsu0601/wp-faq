<?php

/**
Template Name:リクエストページ
 */
get_header() ?>

<main class="l-main">
    <div class="l-inner">
        <div class="p-request">
            <?php get_template_part('temple-parts/breadcrumbs'); ?>
            <h2 class="p-request__ttl">掲載リクエスト</h2>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <p class="p-request__ttx">本サイトに記載していただきたい内容などがありましたら、下記からご希望の方をご入力ください。</p>
            <p class="p-request__ttx">下記が必須と記載があるものは必須事項になりますので、必ずご入力ください。</p>
                <?php the_content() ?>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</main>

<?php get_footer() ?>