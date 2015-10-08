<?php
//Remove Default loop
add_action('genesis_before_loop','sfws_tax_single');
function sfws_tax_single() {
    if (is_front_page()) { 
        remove_action( 'genesis_loop', 'genesis_do_loop' ); 
        add_action('genesis_before_loop', 'custom_before_loop');
    }   
}

function custom_before_loop(){
	if(!is_front_page()):
		echo '<h1 class="title">'.get_the_title().'</h1>';
	endif;
}