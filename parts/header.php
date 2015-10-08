<?php

remove_action( 'genesis_header', 'genesis_do_header' ); 
add_action( 'genesis_header', 'genesis_do_new_header' );
/**
 * Remove header widget on home
 *
 * @author Jen Baumann
 * @link http://dreamwhisperdesigns.com/?p=1113
 */
function genesis_do_new_header() {
 
    echo '<div id="title-area">';
    do_action( 'genesis_site_title' );
    do_action( 'genesis_site_description' );
    echo '</div><!-- end #title-area -->';
 
    /*if ( ( is_active_sidebar( 'header-right' ) || has_action( 'genesis_header_right' ) ) && !is_home() ) {
        echo '<div class="widget-area">';
        do_action( 'genesis_header_right' );
        dynamic_sidebar( 'header-right' );
        echo '</div><!-- end .widget-area -->';
    }*/
 
}


add_action('genesis_site_description','custom_search_bar',1);

function custom_search_bar(){
    echo '<div class="widget-area c-search-bar">';
    do_action( 'genesis_header_right' );
    dynamic_sidebar( 'header-right' );
    echo '</div><!-- end .widget-area -->';    
}

add_action('genesis_entry_header','custom_title');

function custom_title(){

}

