<?php
  get_header();
?>


<div id="main-content" class="site-content px-3 px-lg-15 mx-auto mt-6" role="main">

  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content();?>
  <?php endwhile; ?>

</div>

<?php
get_footer();