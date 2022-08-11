<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size2';
$args = array(
	'post_type'      => 'miako_law',
	'posts_per_page' => $slider_item_number,
	'orderby'		 => $orderby,
	'order'			 => $order,
);
if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'miako_law_category',
			'field' => 'term_id',
			'terms' => $cat,
		)
	);
}
$query = new WP_Query( $args );
$slider_nav_class = ( $slider_nav == 'true' ) ? ' slider-nav-enabled' : '';
$slider_dot_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';
?>
<div class="rt-law-slider-3 owl-wrap rt-owl-nav-2<?php echo esc_attr( $slider_nav_class );?><?php echo esc_attr( $slider_dot_class );?>">
	<div class="row">		
		<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
			<?php if ( $query->have_posts() ) { ?>
				<?php while ( $query->have_posts() ) : $query->the_post();?>
					<?php
						$id = get_the_ID();
						$team_designation = get_post_meta( $id, 'miako_team_designation', true );
						$thumbnail = false;
						if ( has_post_thumbnail() ){
							$thumbnail = get_the_post_thumbnail( null, $thumb_size , array( 'class' => 'img-responsive' ) );
						}
						else {
							if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
								$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
							}
							elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
								$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_272x182.jpg" alt="'.get_the_title().'">';
							}
						}
					?>
					<div class="rtin-single-law-service">						
						<?php echo wp_kses_post( $thumbnail ); ?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>
				<?php endwhile;?>
			<?php wp_reset_query();?>
			<?php } else { ?>
				<div class="rtin-single-feature-slide">
					<?php esc_html_e( 'No Law Service Found' , 'miako-core' ); ?>
				</div>	
			<?php } ?>
		</div>
	</div>
</div>