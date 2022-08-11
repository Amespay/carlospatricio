<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$heading = $wrapper_css = $icon_css = $title_css = $content_css = $icon_holder_style = '';

$class = vc_shortcode_custom_css_class( $css );
$class .= " {$layout}";

$heading   .= !empty( $url ) ? '<a style="color:' . $title_color . ' ;" href="' . $url . '">' : '';
$heading   .= $title;
$heading   .= !empty( $url ) ? '</a>' : '';

if ( $spacing_bottom != '' ) {
    $title_css .= "margin-bottom: {$spacing_bottom}px;";
}
if ( $title_size != '' ) {
    $title_size   = (int) $title_size;
    $title_css   .= "font-size: {$title_size}px;";
}
if ( $content_size != '' ) {
    $content_size = (int) $content_size;
    $content_css .= "font-size: {$content_size}px;";
}
if ( $width != '' ) {
    $width        = (int) $width;
    $wrapper_css .= 'max-width: '. $width . 'px;';
}
if ( $color != '' ) {
	$icon_css  .= "color: {$color};";
}
?>
<div class="rt-infobox-10 <?php echo esc_attr( $class );?>" style="<?php echo esc_attr( $wrapper_css );?>" data-color="<?php echo esc_attr( $color );?>" data-hover="<?php echo esc_attr( $hovercolor );?>" data-title-color="<?php echo esc_attr( $title_color );?>" data-title-hover="<?php echo esc_attr( $title_hover_color );?>">
	<div class="rtin-info-icon">
		<a style="background:<?php echo esc_attr( $icon_bgcolor_10 ); ?>" href="<?php echo esc_attr( $url ); ?>"><i class="<?php echo esc_attr( $icon );?>" aria-hidden="true" style="<?php echo esc_attr( $icon_css ); ?>"></i></a>
	</div>
	<h3 style="<?php echo esc_attr( $title_css );?>"><?php echo wp_kses_post( $heading ); ?></h3>
	<span style="<?php if ( !empty( $bar_color ) ) { echo 'background: ' . esc_attr( $bar_color ); } ?>"></span>
	<div style="<?php echo esc_attr( $content_css );?>"><?php echo wp_kses_post( $content ); ?></div>
</div>