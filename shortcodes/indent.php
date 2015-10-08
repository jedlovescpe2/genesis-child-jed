<?php 

function indented($atts, $content = null){
	return '<p class="indented" style="margin-bottom:0;">'.$content.'</p>';
}
 
add_shortcode('indented', 'indented');