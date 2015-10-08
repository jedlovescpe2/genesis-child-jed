<?php


function pw_remove_genesis_comments() {
	remove_action( 'genesis_after_post', 'genesis_get_comments_template' );
}

add_action( 'wp_enqueue_scripts', 'pw_remove_genesis_comments' );
//Remove Comments

add_action('genesis_entry_footer','service_after_contents');
function service_after_contents(){

	if(get_field('requirements_text')):
	echo '<div class="highlights" id="service-requirements">';
	the_field('requirements_text'); 
	echo '</div>';
	endif;

	if(get_field('resources_text')): 
	echo '<div class="highlights" id="service-resources">';
	the_field('resources_text');
	echo '</div>';
	endif;

	if(get_field('info_text')): 
	echo '<div class="more-info" id="service-more-info">';
	the_field('info_text');
	echo '</div>';
	endif;
}

add_action('genesis_after_entry','service_sidebar'); //Add Sidebar
function service_sidebar(){

	$images = get_field('sidebar_images');

	if($images):
		echo '<div id="sidebar">'; 
			echo '<ul>';
			foreach( $images as $image ): ?>
	            <li>
	                <a class="fancybox" rel="gallery1" href="<?php echo $image['url']; ?>" title="<?php echo $image['alt']; ?>">
	                     <img src="<?php echo $image['sizes']['sidebar-images']; ?>" alt="<?php echo $image['alt']; ?>" />
	                </a>
	            </li> <?php
       		endforeach;
       		echo '</ul>';
		echo '</div>';
	endif; 


}

add_action('genesis_after_content','content_images');
function content_images(){
	$images = get_field('content_images');
	if($images):
		echo '<div id="content-images">'; 
			echo '<ul>';
			foreach( $images as $image ): ?>
	            <li>
	                <a class="fancybox" rel="gallery1" href="<?php echo $image['url']; ?>" title="<?php echo $image['alt']; ?>">
	                     <img src="<?php echo $image['sizes']['sidebar-images']; ?>" alt="<?php echo $image['alt']; ?>" />
	                </a>
	            </li> <?php
       		endforeach; ?>
       			<?php if(get_field('body_video')): ?>
       			<li class="content-video" style="min-width: 29%;">
	               	<?php the_field('body_video'); ?>
	            </li> <?php
	            endif;
	            

       		echo '</ul>';
		echo '</div>';
	endif; 

	if(get_field('body_display')=="Yes"):
		echo '<div style="clear:both;"></div>';
		echo '<div id="featured-section">';
		$image = get_field('featured_image');
		$size = 'featured-service-image'; // (thumbnail, medium, large, full or custom size)

		if( $image ) {

			echo "<div class='featured-service-thumb'>".wp_get_attachment_image( $image, $size, 0, array('class'=>'featured-service-image','alt'=>get_the_title()))."</div>";

		}

		if(get_field('details')):
			echo '<div class="service-info">'.get_field('details').'</div>';
		endif;
		echo '</div>';
	endif;
}

genesis();


