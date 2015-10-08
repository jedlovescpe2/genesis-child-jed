<?php

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
genesis();