<?php
/**
 * Default post rendering content according to caller of get_template_part.
 *
 * @package EmigmaPress
 */

?>


<article <?php post_class( 'rounded-2 d-flex flex-column flex-md-row ') ?>>
	

	<div class="bg-img position-relative" style="background:url('<?php the_post_thumbnail_url('medium_large');?>') center/cover no-repeat">
		<a href="<?php the_permalink();?>" class="w-100 h-100 position-absolute tdn"></a>
	</div>


	<div class="content fw-medium d-flex flex-column">
		<a href="<?php the_permalink();?>" class="tdn"><?php the_title();?></a>

		<a class="d-block mt-auto" href="<?php the_permalink();?>"><?php _e( 'Preberi več', 'emigma'); ?></a>
	</div>
</article>