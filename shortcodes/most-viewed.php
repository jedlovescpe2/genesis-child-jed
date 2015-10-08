<?php 

function most_viewed(){
	ob_start();
	$posts = wmp_get_popular( array( 'limit' => 4, 'post_type' => 'paper', 'range' =>'all_time' ) );

	global $post;
	if ( count( $posts ) > 0 ): foreach ( $posts as $post ):
		setup_postdata( $post );
		?>
		<li><a href="<?php the_permalink(); ?>">
			<?php if(get_field('short_title')):the_field('short_title');
					else: the_title(); endif; ?>
		</a></li>
		<?php 
	endforeach; endif;
	wp_reset_query();

	$contents = ob_get_contents();

	ob_end_clean();
	return $contents;
}

add_shortcode('most-viewed', 'most_viewed');