<?php
//add_action( 'get_header', 'paper_logic' );
/*function paper_logic() {
    if ( 'paper'==get_post_type()) {
        remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
        add_action( 'genesis_after_content', 'page_sidebar' );
    }
    elseif ( 'issue'==get_post_type()) {
        remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
        add_action( 'genesis_after_content', 'issue_sidebar' );
    }
    elseif (is_page_template( 'page-templates/paper-submit-page.php' )){
    	remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
        add_action( 'genesis_after_content', 'submit_sidebar' );
    }
}*/
 
 function page_sidebar() {	get_sidebar( 'paper' );		}
 function issue_sidebar() {	get_sidebar( 'issue' );		}
 function submit_sidebar() {get_sidebar( 'submission' );	}

function clean_shortcodes( $content ) { 
 	        $pattern = '\[(\[.*?\])\]'; 
 
        return preg_replace( '/'.$pattern.'/s', '$1', $content ); 
} 

//Move Genesis Nav
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_site_description', 'genesis_do_nav' );

//Remove Meta Tags
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

