<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_error_img = empty( RDTheme::$options['error_bodybanner']['url'] ) ? RDTHEME_IMG_URL . '404.png' : RDTheme::$options['error_bodybanner']['url'];
?>
<?php get_header();?>
<div id="primary" class="content-area error-page-area">
	<div class="container">
       <div class="error-page-area">
         <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="error-page" style="background: url(<?php echo esc_url($rdtheme_error_img);?>) no-repeat;">
                   <h1><?php esc_html_e( '404' , 'miako' ); ?></h1>
                  <p><?php echo esc_html( RDTheme::$options['error_text1'] );?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="error-page-content">
                   <p><?php echo wp_kses_post( RDTheme::$options['error_text2'] );?></p>
                    <div class="go-home">
                      <a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( RDTheme::$options['error_buttontext'] );?></a>
                    </div>
                </div>
              </div>
            </div>
          </div>
       </div>
	</div>
</div>
<?php get_footer(); ?>