<?php get_header(); ?>

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
<?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        echo '<h1 class="mt-10 entry-title underline text-2xl hover:text-sky-900"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h1>';
        ?>
        <div class="mt-10">
          <?php the_content(); ?>
        </div>
        <?php
      }
    }
?>
  </div>
<?php get_footer(); ?>