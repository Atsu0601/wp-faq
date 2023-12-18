<?php get_header() ?>

<main class="l-main">
  <div class="l-inner">
    <?php get_template_part('temple-parts/breadcrumbs'); ?>

    <div class="l-column2">
      <div class="p-page">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1 class="p-page__ttl"><?php the_title() ?></h1>
            <?php the_content() ?>
        <?php endwhile;
        endif; ?>
      </div>
      <div class="l-sidebar">
        <ul>
          <li>
            <p>aaaa</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</main>

<?php get_footer() ?>