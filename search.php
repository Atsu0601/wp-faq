<?php get_header() ?>

<main class="l-main">
    <div class="l-inner">
        <?php get_template_part('temple-parts/breadcrumbs'); ?>

        <div class="l-column2">

            <?php
            // 検索ページテンプレートファイルの開始

            get_header(); // WordPressのヘッダーを取得

            // 検索キーワードを安全に取得
            $search_keyword = isset($_GET['s']) ? esc_attr($_GET['s']) : '';

            // カスタムクエリの引数を設定
            $args = array(
                'post_type'      => 'post', 'faq', // または 'page'、カスタム投稿タイプ名
                'posts_per_page' => 10,     // 1ページに表示する投稿数
                's'              => $search_keyword, // 検索キーワード
                'paged'          => get_query_var('paged') ? get_query_var('paged') : 1, // ページネーション
                // カスタムフィールドを含めるための meta_query
                'meta_query'     => array(
                    'relation' => 'OR', // 複数のカスタムフィールドを検索する場合の関係性
                    array(
                        'key'     => 'question_number',
                        'value'   => $search_keyword,
                        'compare' => 'LIKE'
                    ),
                    array(
                        'key'     => 'admin_number',
                        'value'   => $search_keyword,
                        'compare' => 'LIKE'
                    ),
                    // 必要に応じて他のカスタムフィールド条件を追加
                ),
            );

            // カスタムクエリを作成
            $custom_query = new WP_Query($args);
            ?>
            <div class="p-archive">
                <?php if ($custom_query->have_posts()) : ?>
                    <p class="p-search__result_ttl">“<?php echo $search_keyword; ?>”の検索結果：<?php echo $custom_query->found_posts; ?>件</p>
                    <ul class="p-archive__blk">
                        <?php while (have_posts()) : the_post(); ?>
                            <li class="p-archive__blk__list">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="p-archive__blk__list__thumbnail">
                                        <?php
                                        // サムネイルが設定されているかを確認
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('large');
                                        } else {
                                            // サムネイルが設定されていない場合、カスタマイザーで設定された画像を表示
                                            $noimage_url = get_theme_mod('noimage_img_input');
                                            if ($noimage_url) {
                                                echo '<img src="' . esc_url($noimage_url) . '" alt="No Image">';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <h3 class="p-archive__blk__list__ttl">
                                        <?php
                                        if (mb_strlen($post->post_title, 'UTF-8') > 20) {
                                            $title = mb_substr($post->post_title, 0, 20, 'UTF-8');
                                            echo $title . '……';
                                        } else {
                                            echo $post->post_title;
                                        }
                                        ?>
                                    </h3>
                                    <time class="p-archive__blk__list__date"><?php the_time("Y/m/d"); ?></time>
                                    <!-- <div class="">
                                    <?php
                                    $terms = get_the_terms($post->ID, 'blog-cat');
                                    foreach ($terms as $term) {
                                        echo '<span>' . $term->name . '</span>';
                                    }
                                    ?>
                                </div> -->
                                    <p class="p-archive__blk__list__txt">
                                        <?php
                                        if (mb_strlen($post->post_content, 'UTF-8') > 55) {
                                            $content = str_replace('\n', '', mb_substr(strip_tags($post->post_content), 0, 55, 'UTF-8'));
                                            echo $content . '…';
                                        } else {
                                            echo str_replace('\n', '', strip_tags($post->post_content));
                                        }
                                        ?>
                                    </p>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else : ?>
                    <p class="p-search__result_ttl">検索されたキーワードに該当する記事はありませんでした</p>
                <?php endif; ?>

                <div class="l-pagenation">
                    <!-- <?php get_template_part('temple-parts/pager'); ?> -->
                    <?php
                    // カスタムページネーションの表示
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links(array(
                        'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format'  => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total'   => $custom_query->max_num_pages
                    ));
                    ?>
                </div>

                <?php wp_reset_postdata(); ?>
            </div>

            <div class="l-sidebar">
                <?php get_template_part('sidebar'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer() ?>