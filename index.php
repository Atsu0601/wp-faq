<?php get_header() ?>

<main class="l-main">
    <div class="l-inner">
        <div class="p-top">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.png" alt="">
            <h1 class="p-top__ttl">検索したいキーワードを入力してください</h1>
            <div class="p-top__search">
                <?php get_search_form(); ?>
            </div>
            <div class="p-top__keyword">
                <ul>
                    <li><a href="">ログインできない</a></li>
                </ul>
            </div>
        </div>
    </div>
</main>

<?php get_footer() ?>