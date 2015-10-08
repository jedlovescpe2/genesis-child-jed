<?php
/*Template Name: Gallery Page Template*/

add_action('genesis_entry_footer','gallery_loop');
function gallery_loop(){
	echo '<div class="wrap gallery-slider">';
	$query = new WP_Query(array('post_type'=>'gallery','orderby'=>'menu_order','order'=>'ASC','posts_per_page'=>-1));
		if($query->have_posts()):
			echo '<div id="slider" class="flexslider"><ul class="slides">';
					while($query->have_posts()): $query->the_post();
						echo '<li>';
							the_post_thumbnail('featured-image-home');
						echo '</li>';
					endwhile;
				echo '</ul>';
			echo '</div>';
		endif;
	 wp_reset_query();
	 
	 $query = new WP_Query(array('post_type'=>'gallery','orderby'=>'menu_order','order'=>'ASC','posts_per_page'=>-1));
		if($query->have_posts()):
			echo '<div id="carousel" class="flexslider"><ul class="slides">';
					while($query->have_posts()): $query->the_post();
						echo '<li>';
							the_post_thumbnail('home-thumbnail');
						echo '</li>';
					endwhile;
				echo '</ul>';
			echo '</div>';
		endif;
	 wp_reset_query(); ?>
<script type="text/javascript">
		$(document).ready(function($) {
			$('#carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: true,
			slideshow: true,
			itemWidth: 97.5,
			move: 1,
			itemMargin: 0,
			minItems: 5,
			maxItems: 8,
			asNavFor: '#slider'
		  });
		   
		  $('#slider').flexslider({
			animation: "fade",
			controlNav: false,
			animationLoop: true,
			slideshow: true,
			sync: "#carousel"
		  });
		});
</script>

<?Php	 
	echo '</div>';

 $query = new WP_Query(array('post_type'=>'gallery','orderby'=>'menu_order','order'=>'ASC','posts_per_page'=>-1));
		if($query->have_posts()):
		$numbering = 1;
			echo '<div class="wrap gallery-list"><ul>';
					while($query->have_posts()): $query->the_post();
						echo '<li class="numberings numbering'.$numbering.'">';
							echo '<a href="'.get_permalink().'" alt="'.get_the_title().'">';
							the_post_thumbnail('service-image');
							echo '</a>';
							
							echo '<div class="gallery-content">
									<h3><a href="'.get_permalink().'" alt="'.get_the_title().'">'.get_the_title().'</a></h3>
								'.get_the_excerpt( 60 ).'
							
							</div>';
						echo '</li>';
			$numbering++;
			if($numbering == 4){
			$numbering = 1;
			}
					endwhile;
				echo '</ul>';
			echo '</div>';
		endif;
	 wp_reset_query(); 

	
	
 }	
genesis();