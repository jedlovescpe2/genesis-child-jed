<?php


//* Remove the entry title (requires HTML5 theme support)



//add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' ); 
remove_action( 'genesis_header', 'genesis_do_header' );
add_action('genesis_before_content','custom_genesis_before_content');
function custom_genesis_before_content(){
	if ( is_plugin_active('advanced-custom-fields/acf.php') ) {
		if(get_field('page_headline'))
		echo '<h1 id="page-headline">'.get_field('page_headline').'</h1>';
	}
}

add_action('genesis_after_header','custom_after_header');
function custom_after_header(){
	if(have_posts()): while (have_posts()): the_post();
		echo '<div id="banner-wrap"><div class="wrap">';
		$images = get_field('slider');

		if($images): 
		echo '<div id="home-slider">';
			/*echo '<ul class="bxslider">'; ?>
				<?php 
						foreach( $images as $image ): ?>
							<li> 

								<?php if($image['description']) echo '<a class="fancybox-media" href="'.$image['description'].'">'; ?>
								<img src="<?php echo $image['sizes']['slider-image']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php if($image['description']) echo '</a>'; ?>
							</li>
						<?php endforeach; ?>
				<?php
				
			echo '</ul>';*/
			echo do_shortcode('[rev_slider home_slider]');
		echo'</div>';

		endif;endwhile; 	
		echo '</div></div>';
	endif;
}
add_action( 'genesis_loop', 'custom_front_page_loop' );
function custom_front_page_loop(){


	

	if(have_posts()): while(have_posts()): the_post();
	
	echo '<article>'; the_content(); echo '</article>';?>
	<hr style="border-top:1px solid #635f59; margin-bottom:0; opacity:.4; -moz-opacity:.4; margin-top:25px;"/>
	<div id="footer-widgets">
		<div class="left-div">
			<?php if(get_field('footer_left')) the_field('footer_left'); ?>
		</div>

		<div class="right-div">
			<?php if(get_field('footer_right')) the_field('footer_right'); ?>
		</div>
		<div style="clear:both;"></div>
	</div>



	<?php
	endwhile; endif;

	if(have_posts()): 
		echo '<div id="menu-thumbnails">'; 
					$posts = get_field('featured_posts');
					if( $posts ):
						echo '<div id="featured-posts">';
					global $post;
						$i=0;
						 foreach( $posts as $post ): 
						 	//echo '<pre>'; var_dump($post); echo '</pre>'; 	
						    setup_postdata($post);
								$i++;
								echo '<a href="'.get_permalink().'">';
								echo '<div class="menu-thumb col'.($i%5).'">';

							    $image = get_field('front_thumbnail');
							    $size = 'home-thumbnail'; 
		 							echo '<p class="thumb-title">';
		 								if(get_field('short_title')): the_field('short_title');
		 								else: the_title(); endif;
		 							echo '</p>';
								if( $image ) {
									//echo '<div class="overlay"></div>';
									echo wp_get_attachment_image( $image, $size,'false', array('alt'=>get_the_title(),'class'=>'front_thumbnail') ); 
								}
								echo '</div></a>';						    
						 endforeach;
						
						 echo '</div>';
					endif; 
				//endwhile;
		echo '</div>';
		wp_reset_postdata();
	endif;
	 
	/*echo '<div class="clear"></div>';*/	




}
genesis();