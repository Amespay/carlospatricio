<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'wp_enqueue_scripts', 'rdtheme_register_scripts', 12 );
if ( !function_exists( 'rdtheme_register_scripts' ) ) {
	function rdtheme_register_scripts(){
		/*CSS*/
		// owl.carousel CSS
		wp_register_style( 'owl-carousel',       RDTHEME_CSS_URL . 'owl.carousel.min.css', array(), MIAKO_VERSION );
		wp_register_style( 'owl-theme-default',  RDTHEME_CSS_URL . 'owl.theme.default.min.css', array(), MIAKO_VERSION );

		/*JS*/
		// owl.carousel.min js		
		wp_register_script( 'owl-carousel',      RDTHEME_JS_URL . 'owl.carousel.min.js', array( 'jquery' ), MIAKO_VERSION, true );
		// counter js
		wp_register_script( 'rt-waypoints',      RDTHEME_JS_URL . 'waypoints.min.js', array( 'jquery' ), MIAKO_VERSION, true );
		wp_register_script( 'counterup',         RDTHEME_JS_URL . 'jquery.counterup.min.js', array( 'jquery' ), MIAKO_VERSION, true );
	}
}

add_action( 'wp_enqueue_scripts', 'rdtheme_enqueue_scripts', 15 );
if ( !function_exists( 'rdtheme_enqueue_scripts' ) ) {
	function rdtheme_enqueue_scripts() {
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'miako-gfonts',     RDTheme_Helper::fonts_url(), array(), MIAKO_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap',        RDTheme_Helper::maybe_rtl( 'bootstrap.min.css' ), array(), MIAKO_VERSION );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',     RDTHEME_CSS_URL . 'font-awesome.min.css', array(), MIAKO_VERSION );
		// Meanmenu CSS
		wp_enqueue_style( 'meanmenu',         RDTHEME_CSS_URL . 'meanmenu.css', array(), MIAKO_VERSION );
		// Meanmenu CSS // @rtl
		wp_enqueue_style( 'meanmenu',		  RDTheme_Helper::maybe_rtl( 'meanmenu.css' ), array(), MIAKO_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'miako-default',    RDTheme_Helper::maybe_rtl( 'default.css' ), array(), MIAKO_VERSION );
		// vc modules css // @rtl
		wp_enqueue_style( 'miako-vc',         RDTheme_Helper::maybe_rtl( 'vc.css' ), array(), MIAKO_VERSION );
		// Style CSS  //@rtl
		wp_enqueue_style( 'miako-style',      RDTheme_Helper::maybe_rtl( 'style.css' ), array(), MIAKO_VERSION );
		// Template Style
		wp_add_inline_style( 'miako-style',   rdtheme_template_style() );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'bootstrap',            RDTHEME_JS_URL . 'bootstrap.min.js', array( 'jquery' ), MIAKO_VERSION, true );		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// Meanmenu js
		wp_enqueue_script( 'jquery-meanmenu', RDTHEME_JS_URL . 'jquery.meanmenu.min.js', array( 'jquery' ), MIAKO_VERSION, true );
		// Nav smooth scroll
		wp_enqueue_script( 'jquery-nav',      RDTHEME_JS_URL . 'jquery.nav.min.js', array( 'jquery' ), MIAKO_VERSION, true );
		// Cookie js
		wp_enqueue_script( 'js-cookie',       RDTHEME_JS_URL . 'js.cookie.min.js', array( 'jquery' ), MIAKO_VERSION, true );
		// main js
		
		wp_enqueue_script( 'miako-main',    RDTHEME_JS_URL . 'main.js', array( 'jquery' ), MIAKO_VERSION, true );
		
		//if ( !empty( RDTheme::$options['logo']['url'] ) ) { $url = RDTheme::$options['logo']['url']; } else { $url = RDTheme::$options['logo']['url']; }
		
		// localize script
		$rdtheme_localize_data = array(
			'stickyMenu' 	=> RDTheme::$options['sticky_menu'],
			'meanWidth'  	=> RDTheme::$options['resmenu_width'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">
			<img class="logo-small" src="'. esc_url( empty( RDTheme::$options['logo']['url'] ) ? RDTHEME_IMG_URL . 'logo.png' : RDTheme::$options['logo']['url'] ).'" /></a>',
			'extraOffset' => RDTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => RDTheme::$options['sticky_menu'] ? 52 : 0,
			'rtl'            => is_rtl() ? 'yes' : 'no', //@rtl
		);
		wp_localize_script( 'miako-main', 'MiakoObj', $rdtheme_localize_data );
	}
}

add_action( 'wp_enqueue_scripts', 'rdtheme_high_priority_scripts', 1500 );
if ( !function_exists( 'rdtheme_high_priority_scripts' ) ) {
	function rdtheme_high_priority_scripts() {
		// Dynamic style
		if ( apply_filters( 'rdtheme_force_internnal_dynamic_style', false ) ) {
			RDTheme_Helper::dynamic_internal_style();
			return;
		}

		$file = RDTHEME_CSS_DIR . 'generated-style.css';
		if ( wp_is_writable( $file ) && !is_customize_preview() ) {
			wp_enqueue_style( 'generated-style', RDTHEME_CSS_URL . 'generated-style.css', array(), MIAKO_VERSION );
		}
		else {
			RDTheme_Helper::dynamic_internal_style();
		}
	}
}

function rdtheme_template_style(){
	ob_start();
	?>
	.entry-banner {
		<?php if ( RDTheme::$bgtype == 'bgcolor' ): ?>
			background-color: <?php echo esc_html( RDTheme::$bgcolor );?>;
		<?php else: ?>
			background: url(<?php echo esc_url( RDTheme::$bgimg );?>) no-repeat scroll center center / cover;
		<?php endif; ?>
	}
	.content-area {
		padding-top: <?php echo esc_html( RDTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( RDTheme::$padding_bottom );?>px;
	}
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_1() {
	wp_enqueue_style( 'miako-gfonts', RDTheme_Helper::fonts_url(), array(), MIAKO_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome', RDTHEME_CSS_URL . 'font-awesome.min.css', array(), MIAKO_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_1', 1 );