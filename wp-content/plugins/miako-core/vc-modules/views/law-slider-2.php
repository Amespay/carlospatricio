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
?>
<div class="rt-law-slider-2 owl-wrap rt-owl-nav-1<?php echo esc_attr( $slider_nav_class );?>">		
	<div class="row">		
		<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
			<?php if ( $query->have_posts() ) { ?>
				<?php while ( $query->have_posts() ) : $query->the_post();?>
					<?php
						$id = get_the_ID();
						$content = get_the_content();
						$content = apply_filters( 'the_content', $content );
						$content = wp_trim_words( $content, $limit );
						$law_image = get_post_meta( $id, 'miako_law_img_slider', true );
						$law_icon  = get_post_meta( $id, 'miako_law_icon', true );
					?>
					<div class="rtin-single-law-service">
						<?php if ( $icon_choose == 'faicon' ) { ?>
							<?php if ( !empty ( $law_icon ) ) { ?>
							<i class="fa <?php echo esc_attr( $law_icon ); ?>"></i>
							<?php } ?>
						<?php } else { ?>
						<a href="<?php the_permalink(); ?>">
							<?php echo  $law_image; ?>
						</a>
						<?php } ?>
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