<header class="l-header">
    <div class="l-inner">
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