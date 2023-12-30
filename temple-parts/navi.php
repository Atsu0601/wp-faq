<header class="l-header">
    <div class="l-inner">

    <div class="c-news_important">
        <div class="c-news_important__inner">
            <ul class="c-news_important__blk">
                <?php
                $args = array(
                    'post_type' => 'news',
                    'posts_per_page' => 1,
                    'meta_key' => 'important',
                    'meta_value' => '1'
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                        <li class="c-news_important__blk__list">
                            <a href="<?php the_permalink(); ?>">
                                <time datetime="<?php the_time('Y/m/d'); ?>"><?php the_time('Y/m/d'); ?></time>
                                <span class="c-news_important__blk__list__txt"><?php the_title(); ?></span>
                            </a>
                        </li>
                <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    </div>

        <div class="l-header__inner">
            <div class="l-header__logo">
                <a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.png"></a>
            </div>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'l-header-menu', // メニューのロケーションを指定します
                    'menu_id'        => 'l-header-menu', // メニューに適用するIDを指定します
                    'container'      => 'div', // メニューを囲むコンテナを指定します。ここではdivタグを使用しています
                    'container_class' => 'l-header__menu__inner', // コンテナに適用するクラス名を指定します
                    'container_id' => 'l-header__menu__js' // コンテナに適用するクラス名を指定します
                )
            );
            ?>
            <?php get_search_form(); ?>
            <button class="l-header__hamburger hamburger" id="js-hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>