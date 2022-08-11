<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$title_css = $section_css = '';
$custom_class = vc_shortcode_custom_css_class( $css );
if ( $button_style == 'style1' ) { 
	$btn_style = 'light-button';
} else {
	$btn_style = 'dark-button';
}
if ( !empty( $title_color ) ) {
	$title_css  .= "color: {$title_color};";
}
if ( !empty( $title_font_size ) ) {
	$title_css  .= " font-size: {$title_font_size}px;";
}
if ( !empty( $title_font_weight ) ) {
	if ( $title_font_weight == 'light' ) {
		$title_css  .= " font-weight:500";
	} else {
		$title_css  .= " font-weight:{$title_font_weight}";
	}
}
if ( !empty( $section_align ) ) {
	$section_css  .= "text-align: {$section_align};";
}
?>
<div class="<?php echo esc_attr( $custom_class );?>" style="<?php echo esc_attr( $section_css );?>">
	<div class="rt-text-with-btn">
		<?php if ( $overlay_action == 'true'  ) { ?>
		<div class="overlay-effect"></div>
		<?php } ?>
		<div class="content-area">
		<?php if ( !empty( $title ) ) { ?>
			<h3 style="<?php echo esc_attr( $title_css ); ?>"><?php echo wp_kses_post( $title ); ?></h3>
		<?php } ?>
		<?php if ( !empty ( $content ) ) { ?>
			<p style="color:<?php echo esc_attr( $content_color ); ?>"><?php echo wp_kses_post( $content );?></p>
		<?php } ?>
		<?php if ( !empty ( $button_text ) ) { ?>
			<a class="<?php echo esc_attr ( $btn_style ); ?>" href="<?php echo esc_attr( $button_url ); ?>"><?php echo esc_html( $button_text ); ?></a>
		<?php } ?>
		</div>
	</div>
</div>