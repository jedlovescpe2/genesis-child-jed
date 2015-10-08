<?php 

function button($atts, $content = null){
	$a = shortcode_atts( array(
        'href' => '#',
        'color'=>'#ff7f00'
    ), $atts );
	return '<div><a class="button" style="color:white; background:'.$a['color'].'; border-radius: 0; font-size: 15px; font-weight: bold;" href="'.$a['href'].'">'.$content.'</a></div>';
}

add_shortcode('button', 'button');