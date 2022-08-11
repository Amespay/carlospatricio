<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<div class="col-sm-4 col-md-3 col-xs-12">
	<aside class="sidebar-widget-area">
		<?php		
		if ( is_singular('miako_law') ) {	
			if ( is_active_sidebar( 'sidebar-law' ) ) {
				dynamic_sidebar( 'sidebar-law' );
			}
		} else {
			if ( is_active_sidebar( 'sidebar' ) ) {
			dynamic_sidebar( 'sidebar' );
			}
		}
		?>
	</aside>
</div>