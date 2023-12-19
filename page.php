<?php get_header() ?>

<main class="l-main">
  <div class="l-inner">
    <?php get_template_part('temple-parts/breadcrumbs'); ?>

    <div class="l-column2">
      <div class="p-page">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1 class="p-page__ttl"><?php the_title() ?></h1>
            <div class="p-page__content">
              <?php the_content() ?>
            </div>
        <?php endwhile;
        endif; ?>
      </div>

      <div class="l-sidebar">
          <?php get_template_part('sidebar'); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer() ?>