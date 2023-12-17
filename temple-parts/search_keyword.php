<div class="c-search_keyword">
    <?php
    if (shortcode_exists('wp-frequently-searched-words')) {
        echo do_shortcode('[wp-frequently-searched-words id="id-name" class="class-name" limit="5"]');
    };
    ?>
</div>