<?php get_header() ?>

<main class="l-main">
    <div class="l-inner">
        <div class="p-top">
            <h2 class="p-top__ttl">検索したいキーワードを入力してください</h2>
            <div class="p-top__search">
                <?php get_search_form(); ?>
            </div>
            <div class="p-top__keyword">
                <p class="p-top__keyword__ttl">よく検索されるキーワード：</p>
                <?php get_template_part('temple-parts/search_keyword'); ?>
            </div>

            <div class="p-top__btnlist">
                <div class="p-top__btnlist__item">
                    <a href="">
                        <h3>ログインに関するトラブル</h3>
                        <p>ログインに関するトラブルはこちらのページから解決することができますので、ご覧ください。</p>
                    </a>
                </div>
                <div class="p-top__btnlist__item">
                    <a href="">
                        <h3>共通設定に方法について</h3>
                        <p>ログインに関するトラブルはこちらのページから解決することができますので、ご覧ください。</p>
                    </a>
                </div>
                <div class="p-top__btnlist__item">
                    <a href="">
                        <h3>データに関するトラブル</h3>
                        <p>インサイトなどのデータの閲覧不具合などはこちらから解決することができますので、ご覧ください。</p>
                    </a>
                </div>
            </div>

            <div class="p-top__faq">
                <h2 class="c-ttl">よくある質問はこちら</h2>
                <ul class="c-faq_accordion">
                    <li class="c-faq_accordion__item">
                        <section>
                            <h3 class="c-faq_accordion__item__ttl">お見積もりの目安を教えてください。</h3>
                            <div class="c-faq_accordion__item__box">
                                <p>内容によって変化いたしますのでまずはお問い合わせフォームよりご相談ください。</p>
                            </div>
                        </section>
                    </li>
                    <li class="c-faq_accordion__item">
                        <section>
                            <h3 class="c-faq_accordion__item__ttl">お見積もりの目安を教えてください。お見積もりの目安を教えてください。<br>お見積もりの目安を教えてください。お見積もりの目安を教えてください。</h3>
                            <div class="c-faq_accordion__item__box">
                                <p>内容によって変化いたしますのでまずはお問い合わせフォームよりご相談ください。</p>
                            </div>
                        </section>
                    </li>
                </ul>
            </div>

            <div class="p-top__postview">
                <h2 class="c-ttl">よく見られている記事はこちら</h2>
                <div class="c-postview">
                    <ul class="c-postview__list">
                        <?php $cat = get_the_category(); ?>
                        <?php $cat_id = isset($cat[0]) ? $cat[0]->term_id : ''; ?>
                        <?php if (function_exists('wpp_get_mostpopular')) : ?>
                            <?php $args = array(
                                'post_type' => 'post, page, faq',
                                'limit' => 12,
                                'range' => 'last30days',
                                'order_by' => 'views',
                                'thumbnail_width' => 170,
                                'thumbnail_height' => 130,
                                'cat' => $cat_id,
                                'excerpt_length' => 150,
                                'wpp_start' => '<ul class="c-postview__list">',
                                'wpp_end' => '</ul>',
                                'stats_views' => 1,
                                'post_html' => '<li class="c-postview__list__item">
                                <a href="{url}">
                                <div class="c-postview__list__item__blk">
                                <div class="c-postview__list__item__blk__content">
                                <div class="c-postview__list__item__ttl">{text_title}</div>
                                <div class="c-postview__list__item__txt">{excerpt}</div>
                                </div>
                                <div class="c-postview__list__item__thumb">{thumb}</div>
                                </div>
                                </a>
                                </li>'
                            ); ?>
                            <?php wpp_get_mostpopular($args); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="p-top__news">
                <h2 class="c-ttl">お知らせ</h2>
                <ul class="p-top__news__list">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => 10,
                        'paged' => $paged
                    );
                    $article_lists = new WP_Query($args);
                    ?>
                    <?php if ($article_lists->have_posts()) : ?>
                        <?php while ($article_lists->have_posts()) : $article_lists->the_post(); ?>
                            <li class="p-top__news__list__item">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="p-top__news__list__item__date"><?php the_time("Y/m/d"); ?></div>
                                    <div class="p-top__news__list__item__ttl">
                                        <?php
                                        if (mb_strlen($post->post_title, 'UTF-8') > 20) {
                                            $title = mb_substr($post->post_title, 0, 20, 'UTF-8');
                                            echo $title . '……';
                                        } else {
                                            echo $post->post_title;
                                        }
                                        ?>
                                    </div>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p>新しい記事はありません</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</main>

<?php get_footer() ?>