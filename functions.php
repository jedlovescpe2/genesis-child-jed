<?php

require_once( get_template_directory() . '/lib/init.php' ); 


add_theme_support( 'html5' );

$shortcode_path = get_stylesheet_directory() . '/shortcodes/';
$parts_path = get_stylesheet_directory() . '/parts/';

//HTML Parts
require ( $parts_path . 'logo.php');
require ( $parts_path . 'footer.php');
require ( $parts_path . 'loop.php');
require ( $parts_path . 'sidebars.php');
require ( $parts_path . 'nav.php');
require ( $parts_path . 'header.php');

//Shortcodes & Widgets
//require ( get_stylesheet_directory() . '/shortcodes/most-viewed.php');
require ( $shortcode_path . 'most-viewed.php');


//Add Image Sizes
add_image_size( 'featured-image', 700, 279, true ); // hard crop mode
add_image_size( 'sidebar-images', 335 ); // hard crop mode
add_image_size( 'home-thumbnail', 160, 160, true ); // hard crop mode
add_image_size( 'featured-image-home', 940, 300, true ); // hard crop mode
add_image_size( 'service-image', 470, 220, true ); // hard crop mode
add_image_size( 'featured-service-image', 630, 174, true ); // hard crop mode
add_image_size('slider-image',1001,440,true);
add_image_size('blog-thumb',301,201,true);

remove_action('genesis_header_right','genesis_attributes_header_widget_area');

remove_theme_support( 'genesis-inpost-layouts' );


//Read More
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more'); 
	function custom_excerpt_length( $length ) {
		return 25; // Change this to the number of characters you wish to have in your excerpt
	} 
add_filter( 'excerpt_length', 'custom_excerpt_length' );

add_post_type_support( 'paper', array( 'comments' ) );

add_filter( 'body_class', 'sp_body_class' );
function sp_body_class( $classes ) {
if ( is_plugin_active('advanced-custom-fields/acf.php') ) {
	$images = get_field('sidebar_images');
	if($images):	
		$classes[] = 'has-sidebar';
	endif;
}
		return $classes;
}

add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'footer', 'Footer Menu' );
}



function test($var){
	echo '<pre>'.var_dump($var).'</pre>';
}
/**
 * Retrieve blog sidebar
 */




//* Do NOT include the opening php tag
 
//* Modify the speak your mind title in comments
add_filter( 'comment_form_defaults', 'sp_comment_form_defaults' );
function sp_comment_form_defaults( $defaults ) {
 
	$defaults['title_reply'] = __( 'Leave a Comment' );
	return $defaults;
}

if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page( 'Theme Options' );
}

/*
*  Create an advanced sub page called 'Footer' that sits under the General options menu
*/

if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Theme Options',
        'parent' => 'themes.php',
        'capability' => 'manage_options'
    ));
}

add_filter( 'widget_text', 'do_shortcode');

add_action('genesis_before_content_sidebar_wrap','add_wrap_markup_open'); 
function add_wrap_markup_open(){ echo '<div class="wrap">'; }

add_action('genesis_after_content_sidebar_wrap','add_wrap_markup_close'); 
function add_wrap_markup_close(){ echo '</div>'; }

/**
 * Fix Gravity Form Tabindex Conflicts
 * http://gravitywiz.com/fix-gravity-form-tabindex-conflicts/
 */
add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Blog Sidebar',
		'id' => 'post-search',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title widgettitle">',
		'after_title' => '</h4>',
	));
}
function my_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div>
	<input type="text" placeholder="enter searchword" value="' . get_search_query() . '" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__( 'GO' ) .'" />
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'my_search_form' );

add_action( 'genesis_meta', 'child_viewport_meta_tag' );
function child_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=1200">';
}
?>