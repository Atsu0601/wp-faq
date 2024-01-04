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

                    <div class="c-single_bottom_nav">
                        <p class="<?php if (get_previous_post()) : ?>c-single_bottom_nav__prev<?php endif; ?>">
                            <?php
                            $prev_post = get_previous_post();
                            if ($prev_post) {
                                $prev_title = mb_strimwidth(get_the_title($prev_post->ID), 0, 20, '...');
                                $prev_thumb = get_the_post_thumbnail($prev_post->ID, array(80, 80));
                                $prev_link = get_permalink($prev_post->ID);
                                echo '<span class="c-single_bottom_nav__prev__small">前の記事</span>';
                                echo '<a href="' . esc_url($prev_link) . '">&laquo; ' . $prev_thumb . $prev_title . '</a>';
                            }
                            ?>
                        </p>
                        <p class="c-single_bottom_nav__back">
                            <a href="<?php echo get_post_type_archive_link(get_post_type()); ?>">一覧に戻る</a>
                        </p>
                        <p class="<?php if (get_next_post()) : ?>c-single_bottom_nav__next<?php endif; ?>">
                            <?php
                            $next_post = get_next_post();
                            if ($next_post) {
                                $next_title = mb_strimwidth(get_the_title($next_post->ID), 0, 20, '...');
                                $next_thumb = get_the_post_thumbnail($next_post->ID, array(80, 80));
                                $next_link = get_permalink($next_post->ID);
                                echo '<span class="c-single_bottom_nav__next__small">次の記事</span>';
                                echo '<a href="' . esc_url($next_link) . '">' . $next_thumb . $next_title . ' &raquo;</a>';
                            }
                            ?>
                        </p>
                    </div>

                    <div class="c-custom_taxonomy">
                        <h2 class="c-custom_taxonomy__ttl">カテゴリー一覧</h2>
                        <div class="c-custom_taxonomy__blk">
                            <?php
                            $terms = get_terms('faq_cate');
                            foreach ($terms as $term) {
                                echo '<li class="c-custom_taxonomy__blk__list"><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
                            }
                            ?>
                        </div>
                    </div>

                    <?php
                    $posts = get_field('faq_relation_post');
                    if ($posts) :
                    ?>
                        <div class="c-relation_post">
                            <h2 class="c-relation_post__ttl">関連のよくある質問</h2>
                            <ul class="c-relation_post__blk">
                                <?php foreach ($posts as $post) : ?>
                                    <li class="c-relation_post__blk__list">
                                        <a href="<?php echo get_permalink($post->ID); ?>">
                                            <h2 class="c-relation_post__blk__list__ttl"><?php echo get_the_title($post->ID); ?></h2>
                                            <time class="c-relation_post__blk__list__time" datetime="<?php the_time('Y/m/d'); ?>"><?php the_time('Y/m/d'); ?></time>
                                            <p class="c-relation_post__blk__list__txt">
                                                <?php
                                                if (mb_strlen($post->post_content, 'UTF-8') > 200) {
                                                    $content = str_replace('\n', '', mb_substr(strip_tags($post->post_content), 0, 200, 'UTF-8'));
                                                    echo $content . '……';
                                                } else {
                                                    echo str_replace('\n', '', strip_tags($post->post_content));
                                                }
                                                ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
            </div>

            <div class="l-sidebar">
                <?php get_template_part('sidebar'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>