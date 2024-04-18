<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package EmigmaPress
 */

get_header();

?>

<div id="main-content" class="site-content px-3 px-lg-15 mx-auto" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-loop/content', 'page' ); ?>
	<?php endwhile; ?>
</div><!-- #content -->

<?php
get_footer();