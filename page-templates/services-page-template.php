<?php
/*Template Name: Services Page Template*/

add_action('genesis_entry_footer','services_loop');
function services_loop(){
	$query = new WP_Query(array('post_type'=>'service','orderby'=>'menu_order','order'=>'ASC','posts_per_page'=>-1));
		if($query->have_posts()): 
			echo '<div id="services-loop">';
			while($query->have_posts()): $query->the_post();
				echo '<div class="feature">';
				$image = get_field('featured_image');
				$size = 'featured-service-image'; // (thumbnail, medium, large, full or custom size)

				if( $image ) {
					echo "<div class='featured-service-thumb'><a href='".get_permalink()."'>".wp_get_attachment_image( $image, $size, 0, array('class'=>'featured-service-image','alt'=>get_the_title()))."</a></div>";
				}

				if(get_field('details')):
					echo '<div class="service-info">'.get_field('details').'</div>';
				endif;
				echo '</div>';
			endwhile;
		echo '</div>';	
		endif;
}

genesis();