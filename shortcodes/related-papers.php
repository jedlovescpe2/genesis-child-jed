<?php 

function related_papers(){
	ob_start();
	$connected = new WP_Query( array(
	  'connected_type' => 'issue_to_paper',
	  'connected_items' => get_queried_object(),
	  'nopaging' => yes,
	  'post_type'=>'paper',
	 // 'post__in'=>get_the_ID()
	) );

	//get related objects
	$current  = new WP_Query( array( 'post_type'=>'paper','p'=>get_the_ID(),'posts_per_page'=>1));
	//echo '<pre>'; var_dump($current); echo '</pre>';
	$papers = p2p_type( 'issue_to_paper' )->get_related( get_queried_object() );
	$result = new WP_Query();
	// start putting the contents in the new object
	$result->posts = array_merge( $papers->posts, $current->posts );
	$result->post_count = count( $result->posts );
	if ( $result->have_posts() ) : ?>
		<?php while ( $result->have_posts() ) : $result->the_post();  ?>
				<li><a href="<?php the_permalink(); ?>">
					<?php if(get_field('short_title')):the_field('short_title');
					else: the_title(); endif; ?>
				</a></li><?php 
		endwhile; endif;
	wp_reset_postdata();

	$contents = ob_get_contents();

	ob_end_clean();
	return $contents;
}

add_shortcode('related-papers', 'related_papers');