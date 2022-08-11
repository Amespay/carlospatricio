<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size6';
$args = array(
	'post_type'      => 'miako_team',
	'posts_per_page' => $slider_item_number,
	'orderby'		 => $orderby,
	'order'			 => $order,
);
if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'miako_team_category',
			'field' => 'term_id',
			'terms' => $cat,
		)
	);
}
$query = new WP_Query( $args );
$slider_nav_class = ( $slider_nav == 'true' ) ? ' slider-nav-enabled' : '';
$slider_dot_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';
?>
<div class="rt-team-slider-seven owl-wrap rt-owl-nav-2 owl-wrap<?php echo esc_attr( $slider_dot_class );?><?php echo esc_attr( $slider_nav_class );?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
	<?php if ( $query->have_posts() ) { ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<?php
				$id = get_the_ID();
				$content = get_the_content();
				$content = apply_filters( 'the_content', $content );				
				$content = wp_trim_words( $content, $content_limit );
				$team_designation = get_post_meta( $id, 'miako_team_designation', true );
				$team_socials = get_post_meta( $id, 'miako_team_socials', true );
				$thumbnail = false;
				if ( has_post_thumbnail() ){
					$thumbnail = get_the_post_thumbnail( null, $thumb_size , array( 'class' => 'img-responsive' ) );
				}
				else {
					if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
						$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
					}
					elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
						$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_370x522.jpg" alt="'.get_the_title().'">';
					}
				}
			?>			
			<div class="single-team-area">
				<figure>
					<a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $thumbnail ); ?></a>
				</figure>
				<div class="tlp-overlay">
					<h3><span class="team-name"><a class=" ttp-single-md-popup" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h3>
					<div class="tlp-position">
						<span>
							<a class=" ttp-single-md-popup" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo esc_html( $team_designation ); ?></a>
						</span>
					</div>
					<div class="short-bio">
						<p><a class=" ttp-single-md-popup" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"></a></p>
						<p>
							<a class=" ttp-single-md-popup" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo wp_kses_post($content); ?></a>
						</p>
						<a class=" ttp-single-md-popup" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"></a>
					</div>
					<div class="social-icons">					
						<?php foreach ( $team_socials as $team_social_key => $team_social_value ) { ?>
							<?php if ( !empty( $team_social_value ) ) { ?>
							<a href="<?php echo esc_attr( $team_social_value );?>" target="_blank"><i class="fa <?php echo esc_attr( RDTheme::$team_social_fields[$team_social_key]['icon'] );?>"></i></a>
							<?php } ?>
						<?php } ?>					
					</div>
				</div>
			</div>			
			<?php endwhile;?>
		<?php wp_reset_query();?>
		<?php } else { ?>
			<div class="rtin-single-team">
				<?php esc_html_e( 'No Team Found' , 'miako-core' ); ?>
			</div>
		<?php } ?>
	</div>
</div>