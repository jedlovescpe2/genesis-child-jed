<?php 

//Footer
add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
function sp_footer_creds_filter( $creds ) {
	ob_start(); ?>
	
	<div id="social-media">
		<a href="https://www.facebook.com/moldphysio" target="_blank" id="facebook-in">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fb.png" alt="Facebook"/>
		</a>
		<!-- <a href="#" target="_blank" id="twitter">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png" alt="Twitter"/>
		</a> -->
		<a href="#" target="_blank" id="linked-in">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin.png" alt="LinkedIn"/>
		</a>
	</div>

	<p id="copyright">Mold Physiotherapy © <?php echo date('Y'); ?> |</p>

	<p id="designer">Website by <a target="_blank" href="http://www.isatrin.com/" style="color:#ff0097;">Isatrin</a</p>
	<?php

	wp_nav_menu( array('theme_location' => 'footer' )); ?>
	
	<?php

	$markup = ob_get_contents();
	ob_end_clean();
	// echo '<a href="mailto:colab@aut.ac.nz"><img class="aut-logo" src="'.get_stylesheet_directory_uri().'/images/aut-logo.jpg" alt="" /></a>';
	

	return $markup;
}

