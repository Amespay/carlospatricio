<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_socials = RDTheme_Helper::socials();
$nav_menu_args   = RDTheme_Helper::nav_menu_args();

// Logo
$rdtheme_dark_logo = empty( RDTheme::$options['logo']['url'] ) ? RDTHEME_IMG_URL . 'logo.png' : RDTheme::$options['logo']['url'];
$rdtheme_light_logo = empty( RDTheme::$options['logo_light']['url'] ) ? RDTHEME_IMG_URL . 'logo2.png' : RDTheme::$options['logo_light']['url'];

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
	$rdtheme_menu_class = 'col-sm-11 col-xs-12';
	$rdtheme_icon_class = 'col-sm-1 col-xs-12';
	break;
	case 3:
	$rdtheme_menu_class = 'col-sm-10 col-xs-12';
	$rdtheme_icon_class = 'col-sm-2 col-xs-12';
	break;	
	default:
	$rdtheme_menu_class = 'col-sm-12 col-xs-12';
	break;
}
?>
<div class="container masthead-container">
	<div class="row header-firstrow">
		<div class="col-sm-2 col-xs-12">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
			</div>
		</div>
		<div class="col-sm-10 col-xs-12">
			<div class="header-firstrow-right">
				<div class="header-firstrow-right-contents">
					<ul class="header-contact">
						<?php if ( RDTheme::$options['phone'] ): ?>
							<li>
								<i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_attr( RDTheme::$options['phone'] );?>"><?php echo esc_html( RDTheme::$options['phone'] );?></a>
							</li>
						<?php endif; ?>
						<?php if ( RDTheme::$options['email'] ): ?>
							<li>
								<i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:<?php echo esc_attr( RDTheme::$options['email'] );?>"><?php echo esc_html( RDTheme::$options['email'] );?></a>
							</li>
						<?php endif; ?>
					</ul>
					<?php if ( $rdtheme_socials ): ?>
						<ul class="header-social">
							<?php foreach ( $rdtheme_socials as $rdtheme_social ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $rdtheme_social['url'] );?>"><i class="fa <?php echo esc_attr( $rdtheme_social['icon'] );?>"></i></a></li>
							<?php endforeach; ?>					
						</ul>						
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<hr class="menu-sep" />
	<div class="row">
		<div class="<?php echo esc_attr( $rdtheme_menu_class );?>">
			<div id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args );?>
			</div>
		</div>
		<?php if ( $rdtheme_icon_count ): ?>
			<div class="<?php echo esc_attr( $rdtheme_icon_class );?>">
				<?php get_template_part( 'template-parts/header/icon', 'area' );?>
			</div>
		<?php endif; ?>
	</div>
</div>