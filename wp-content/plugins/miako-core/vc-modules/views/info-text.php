<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$heading = $wrapper_css = $icon_css = $title_css = $content_css = $icon_holder_style = '';

$class = vc_shortcode_custom_css_class( $css );
$class .= " {$layout}";

if ( $icon_border === 'true' ) {
    $class .= ' icon-bordered';
}
if ( $bgcolor != '' ) {
     $class       .= ' has-bg';
     $wrapper_css .= 'background-color: '. $bgcolor . ';';
}
$heading   .= !empty( $url ) ? '<a style="color:' . $title_color . ' ;" href="' . $url . '">' : '';
$heading   .= $title;
$heading   .= !empty( $url ) ? '</a>' : '';

$btn_url    = !empty( $button_url ) ? $button_url : '';
$btn_text   = !empty( $button_text ) ? $button_text : '';

if ( $color != '' ) {
    if ( $layout == 'layout1' || $layout == 'layout2' || $layout == 'layout4' ) {
        $icon_css  .= "color: {$color};";
    }
    if ( $layout == 'layout3' ) {
        $icon_css  .= "color: {$color};";
    }
}
if ( $icon_bgcolor != '' ) {
    if ( $layout == 'layout1' || $layout == 'layout2' || $layout == 'layout4' ) {
        $icon_css  .= "background-color: {$icon_bgcolor};";
    }
    if ( $layout == 'layout3' ) {
        $icon_css  .= "background-color: {$icon_bgcolor};";
    }
}
if ( $size != '' ) {
    $size       = (int) $size;
    $icon_css  .= "font-size: {$size}px;";
}
if ( $icon_padding != '' ) {
    if ( $layout == 'layout1' || $layout == 'layout3' || $layout == 'layout4' ) {
        $icon_padding = (int) $icon_padding;
        $icon_css    .= "padding: {$icon_padding}px;";
    }
}
if ( $spacing_top != '' ) {
    if ( $layout == 'layout2' || $layout == 'layout3' || $layout == 'layout4' ) {
        $icon_holder_style .= "margin-bottom: {$spacing_top}px;";
    }
}
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
?>
<div class="media rt-info-text <?php echo esc_attr( $class );?>" style="<?php echo esc_attr( $wrapper_css );?>" data-color="<?php echo esc_attr( $color );?>" data-hover="<?php echo esc_attr( $hovercolor );?>" data-title-color="<?php echo esc_attr( $title_color );?>" data-title-hover="<?php echo esc_attr( $title_hover_color );?>">
    <div class="pull-left<?php echo ( $icon_style == 'squire' ) ? '' : ' rounded' ;?>" style="<?php echo esc_attr( $icon_holder_style );?>">
        <?php if ( $icontype == 'image' ): ?>
            <?php echo wp_get_attachment_image( $image, array( $size, $size ), true ); ?>
        <?php else: ?>
            <i class="<?php echo esc_attr( $icon );?>" aria-hidden="true" style="<?php echo esc_attr( $icon_css ); ?>"></i>
        <?php endif; ?>
    </div>
    <div class="media-body">
        <h3 class="media-heading" style="<?php echo esc_attr( $title_css ); ?><?php if ( empty( $url ) ) { echo 'color:' . $title_color ;  }  ?>"><?php echo wp_kses_post( $heading ); ?></h3>
        <div style="<?php echo esc_attr( $content_css );?>"><?php echo wp_kses_post( $content ); ?></div>
		<?php if ( $display_button == 'true' ) { ?>
		<div class="info-ghost-button"><a href="<?php echo esc_attr( $btn_url );?>"><?php echo esc_html( $btn_text ); ?></a></div>
		<?php } ?>
    </div>
    <div class="clear"></div>
</div>