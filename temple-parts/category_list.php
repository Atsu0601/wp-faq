<div class="c-single_category">
    <h2 class="c-single_category__ttl">カテゴリー一覧</h2>
    <ul class="c-single_category__blk">
        <?php
        // 記事のあるカテゴリーのみを取得するための引数
        $args = array(
            'orderby'    => 'name',
            'show_count' => true,
            'hide_empty' => true, // 空のカテゴリー（記事がないカテゴリー）を隠す
            'title_li'   => ''
        );

        // カテゴリー一覧をリスト形式で表示
        wp_list_categories($args);
        ?>
    </ul>
</div>