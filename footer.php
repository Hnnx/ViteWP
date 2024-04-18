<?php
/**
 * Default worpress footer starts wtih closing content <div>
 * Modify everything in <footer> tag and make sure to include closing divs after </footer>
 *
 * </div> for page
 * calling wp_footer()
 * close </body> and <html>
 *
 * @package EmigmaPress
 */

?>

</div><!-- #content -->

	<footer id="footer" class="mt-8 mt-md-15">

		<div class="footer-content-wrapper text-white bg-primary mt-5 px-3 px-md-15 py-7">
			<h2>FOOTER CONTENT</h2>
		</div>

		<!--BOTTOM BAR-->
		<div class="d-flex flex-column flex-md-row justify-content-between px-3 px-md-15 pt-3 bg-primary-subtle fs-5 <?php echo wp_is_mobile() ? 'pb-8' : 'pb-3'  ?>">
			<div class="align-self-center">
				© <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?>
			</div>
			
			<div class="fw-semibold d-flex flex-md-row flex-column text-center mt-3 mt-md-0">
				<a href="<?php echo get_privacy_policy_url() ?>"><?php _e('Politika zasebnosti in varovanje osebnih podatkov', 'emigma'); ?></a>
				<p class="ms-3"><?php _e('Avtorji: ', 'emigma'); ?><a href="https://emigma.com/">Emigma</a></p>
			</div>
		</div>


	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

<div class="" id="overlay"></div>

</body>
</html>