<?php
/**
 * Template Name: Custom Blog Template
 */
global $temp;

add_action('genesis_before','t');
function t(){
	remove_action( 'genesis_sidebar', 'ss_do_sidebar' );
	remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
}
add_action('genesis_sidebar','blog_sidebar');

function blog_sidebar(){
	if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Sidebar')) : ?>
	<?php endif; 
}
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'genesis_standard_loop', 5 ); // show the editor content

add_action( 'genesis_loop', 'rgc_do_loop' ); // Add custom loop

function rgc_do_loop() {

	if ( 1 >= get_query_var( 'paged' ) ) {
		add_action( 'genesis_loop', 'genesis_standard_loop', 5 );
	}
	global $temp;
	global $post;
	global $wp_query;
	global $paged;
	global $wp_query;
    $wp_query->query('post_type=post&&order=DESC&post_status=publish&posts_per_page=-1&showposts=6&paged='.$paged); 
	$i=0;?>
<div  class="pagination top navigation">
		<?php 
		

		$big = 999999999; // need an unlikely integer
		echo 'Page: '. paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'prev_text' => __('<<'),
			'next_text' => __('>>'),	
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
		?>
	</div>
	<?php
	

	if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); 
			$i++;
			if($i%2==1):
				echo '<div class="rgc-featured-image odd">';
			else:
				echo '<div class="rgc-featured-image even">';
			endif;
				echo '<h3><a href="' . get_permalink() . '"> ' . get_the_title() . ' </a> </h3>'; // show the title
				echo '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">'; // Original Grid
				echo get_the_post_thumbnail( $post->ID, 'blog-thumb',false,array('class'=>'blog-thumb') );
				echo '</a>';
				echo '<p class="post-excerpt">'. get_the_excerpt().'</p>';
			echo '</div>';
 
		endwhile;
		do_action( 'genesis_after_endwhile' );
	endif; ?>

	<?php
	/*$wp_query = null; $wp_query = $temp; */		
	 $temp = $wp_query ;
	wp_reset_query();
	?>
<div class="pagination bottom navigation">
		<?php 
		

		$big = 999999999; // need an unlikely integer
		echo 'Page: '. paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'prev_text' => __('<<'),
			'next_text' => __('>>'),	
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
		?>
	</div>
	<?php
}




genesis();