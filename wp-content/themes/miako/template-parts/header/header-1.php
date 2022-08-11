<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = RDTheme_Helper::nav_menu_args();

// Logo
$rdtheme_dark_logo = empty( RDTheme::$options['logo']['url'] ) ? RDTHEME_IMG_URL . 'logo.png' : RDTheme::$options['logo']['url'];
$rdtheme_light_logo = empty( RDTheme::$options['logo_light']['url'] ) ? RDTHEME_IMG_URL . 'logo2.png' : RDTheme::$options['logo_light']['url'];

$rdtheme_logo_col_num = (int) RDTheme::$options['logo_width'];

// Menu and Icon wrapper classes
$rdtheme_icon_count = 0;
if ( RDTheme::$options['search_icon'] ) {
	$rdtheme_icon_count++;
}
if ( RDTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ) {
	$rdtheme_icon_count++;
}

switch ( $rdtheme_icon_count ) {
	case 1:
	case 2:
	$rdtheme_icon_col_num = 1;
	break;
	case 3:
	$rdtheme_icon_col_num = 2;
	break;	
	default:
	$rdtheme_icon_col_num = 0;
	break;
}

$rdtheme_logo_class = "col-sm-{$rdtheme_logo_col_num} col-xs-12";
$rdtheme_menu_class = 'col-sm-'. ( 12 - $rdtheme_logo_col_num ) . ' col-xs-12';
$rdtheme_icon_class = "col-sm-{$rdtheme_icon_col_num} col-xs-12";
?>
<div class="container masthead-container">
	<div class="row">
		<div class="<?php echo esc_attr( $rdtheme_logo_class );?>">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
			</div>
		</div>
		<div class="<?php echo esc_attr( $rdtheme_menu_class );?>">
			<div id="site-navigation" class="main-navigation">
				<?php if ( $rdtheme_icon_count ): ?>
					<?php get_template_part( 'template-parts/header/icon', 'area' );?>
				<?php endif; ?>
				<?php wp_nav_menu( $nav_menu_args );?>
			</div>
		</div>
	</div>
</div>