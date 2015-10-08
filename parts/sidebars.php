<?php 
/** Remove default sidebar */

/*unregister_sidebar( 'sidebar' );*/


/** Remove secondary sidebar */
unregister_sidebar( 'header-right' );
/*unregister_sidebar( 'sidebar' );*/
unregister_sidebar( 'sidebar-alt' );

/*add_action('genesis_site_description','mobile_sidebar');

function mobile_sidebar(){ ?>
	<a id="simple-menu" href="#sidr">Menu</a>

	<div id="sidr">
		<?php wp_nav_menu( array('menu'=>'primary-menu') ); ?> 
	</div>

	<script>
	$(document).ready(function() {
	  $('#simple-menu').sidr();
	});
	</script><?php 
}

*/

