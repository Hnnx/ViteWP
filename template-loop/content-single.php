<?php
/**
 * Template for displaying single posts
 *
 * @package EmigmaPress
 */



global $post;

?>

<div class="container">
	<div class="row">
		<div class="col-12 col-lg-10 mx-auto main-post-content">
			
			<?php if (has_excerpt( )):?>
				<p class="single-excerpt mb-5">
					<?php echo get_the_excerpt() ?>
				</p>
			<?php endif; ?>

			<?php the_content() ?>
		</div>
	</div>
</div>