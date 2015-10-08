<?php

//HEADER LOGO
remove_action( 'genesis_site_title', 'genesis_seo_site_title' ); //remove orig title
remove_action( 'genesis_site_description', 'genesis_seo_site_description' ); //remove tagline

add_action( 'genesis_site_title', 'genesis_logo' );

function genesis_logo(){ ?>
	<h1 class="site-title" itemprop="headline"><?php 
		if ( is_plugin_active('advanced-custom-fields/acf.php') ) {
			$image = get_field('logo_image','option');
			$phone = get_field('phone_number','option');
			$booknow = get_field('book_now_image','option');

		}
		$default_attr = array(
			'src'	=> $src,
			'class'	=> "attachment-$size",
			'alt'   => trim(strip_tags( get_post_meta($attachment_id, '_wp_attachment_image_alt', true) )),
		);
		if( !empty($image) ): ?>
		<a href="<?php echo home_url();?>" title="3D Printing">

			<?php echo wp_get_attachment_image( $image, "full",0, array(
				'class'	=> "logo-image",
				'alt'   => "3D Printing - A COLABRATORY AT AUT")); ?>
		</a>
		<?php endif; ?>


		
		<div id="header-right">
			<?php if( !empty($phone) ): ?>
			<h3>Phone <?php echo $phone; ?></h3>
			<?php endif; ?>

			<?php if( !empty($booknow) ): ?>
			<a class="various" href="#inline">

			<?php echo wp_get_attachment_image( $booknow, "full",0, array(
				'class'	=> "logo-image",
				'alt'   => "3D Images")); ?>
			</a>
			<?php endif; ?>
		</div>
		
		<div id="inline" style="display:none;">
			&nbsp;
			<h1>Book Now</h1>
			<?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true tabindex=49]'); ?>
		</div>

	</h1> 
	<?php
}
 