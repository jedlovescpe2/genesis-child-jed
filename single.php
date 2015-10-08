<?php 
add_action('genesis_before','t');
function t(){
	remove_action( 'genesis_sidebar', 'ss_do_sidebar' );
	remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
}
add_action('genesis_before_content','custom_genesis_before_content');
function custom_genesis_before_content(){ ?>
	<h1 style="margin-top: 10px; text-transform:none;" class="entry-title" itemprop="headline">Mold blog</h1>
	<a id="back-button" href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true">Go Back</a>
<?php }
remove_action( 'genesis_sidebar', 'ss_do_sidebar' );
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
add_action('genesis_sidebar','blog_sidebar', 1);
function blog_sidebar(){
	if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Sidebar')) : ?>
	<?php endif; 
}

genesis(); 