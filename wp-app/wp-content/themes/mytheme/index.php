<?php get_header(); ?>

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        the_title( '<h1 class="entry-title underline text-2xl">', '</h1>' );
        ?>
        <div class="entry-content hover:text-red-300">
          <?php the_content(); ?>
        </div>
        <?php
      }
    }
    ?>
    <div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus facere repellendus nobis. Unde nostrum expedita eius officia maxime! Natus quasi nobis commodi repellendus. Quod cum earum ducimus laborum, dicta iusto!</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt laborum aut nemo quidem, odit, officiis, nobis expedita maiores fugit ipsam quis! Nemo facere provident nobis consequatur quae in cupiditate voluptatum.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti architecto, molestiae expedita earum illum fugit ipsam veritatis ipsa asperiores quisquam, aperiam ex beatae velit perferendis quam facilis officiis dolorum eos.</p>
  </div>
  </div>
<?php get_footer(); ?>
