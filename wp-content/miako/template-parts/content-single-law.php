<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $post;
$rdtheme_time_html_2 = apply_filters( 'rdtheme_single_time_no_thumb', get_the_time( 'd M, Y' ) );
$terms = wp_get_post_terms( get_the_ID(), 'miako_law_category');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'case-single-detail' ); ?>>			
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'rdtheme-size1', array( 'class' => 'img-responsive' ) ); ?>
		</div>
	<?php } ?>
	<ul>
	<?php if ( has_term( '', 'miako_law_category' ) ): ?>
		<li class="rt-portfolio-cats"><span class="rt-portfolio-label"><?php esc_html_e( 'Categories', 'miako' );?>:</span> <span class="rt-portfolio-value"><?php echo wp_kses_post( $rdtheme_cats );?></span></li>
	<?php endif; ?>
	</ul>
	<div class="item-content">
		<?php the_content();?>
	</div>
</div>