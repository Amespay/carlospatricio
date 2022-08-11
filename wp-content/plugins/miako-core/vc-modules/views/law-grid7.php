<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size7';
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}
$args = array(
	'post_type'      => 'miako_law',
	'posts_per_page' => $grid_item_number,
	'paged'          => $paged,
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
$col_class = "col-lg-$col_lg col-md-$col_md col-sm-$col_sm col-xs-$col_xs";

// Pagination fix
global $wp_query;
$wp_query   = NULL;
$wp_query   = $query;
?>
<div class="rt-law-grid">
	<div class="row auto-clear">
	<?php if ( $query->have_posts() ) { ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<?php
				$id = get_the_ID();
				$content = get_the_content();
				$content = apply_filters( 'the_content', $content );
				$content = wp_trim_words( $content, $count );
				$thumbnail = false;
				if ( has_post_thumbnail() ){
					$thumbnail = get_the_post_thumbnail( null, $thumb_size , array( 'class' => 'img-responsive' ) );
				}
				else {
					if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
						$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
					}
					elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
						$thumbnail = '<img class="attachment-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_272X182.jpg" alt="'.get_the_title().'">';
					}
				}
			?>
			<div class="<?php echo esc_attr( $col_class );?>">
				<div class="rtin-single-law">
					<div class="rtin-law-image">
						<?php echo wp_kses_post( $thumbnail ); ?>
						<div class="overlay">
							<div class="detail-button"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Details' , 'miako-core' ); ?></a></div>							
						</div>
					</div>
					<div class="rtin-law-content">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo esc_html($content); ?></p>						
					</div>
				</div>
			</div>
		<?php endwhile;?>
		<?php if ( $show_pagination == 'true' ) { ?>
		<div class="mt20 col-sm-12 col-xs-12 pagination-wrapper"><?php RDTheme_Helper::pagination();?></div>
		<?php } else { ?>
			<div class="mt20 col-sm-12 col-xs-12 view-more-button">
				<a href="<?php echo esc_url( $buttonurl );?>"><?php echo esc_html( $buttontext );?></a>
			</div>
		<?php } ?>
		<?php } else { ?>
			<div class="rtin-single-team"><?php esc_html_e( 'No Law Service Found' , 'miako-core' ); ?></div>
		<?php } ?>
	<?php wp_reset_query();?>
	</div>
</div>