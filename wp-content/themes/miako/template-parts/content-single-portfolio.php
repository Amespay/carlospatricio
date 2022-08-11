<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $post;
$rdtheme_time_html_2 = apply_filters( 'rdtheme_single_time_no_thumb', get_the_time( 'd M, Y' ) );
$terms = wp_get_post_terms( get_the_ID(), 'fin_portfolio_category' );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'case-single-detail' ); ?>>			
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'rdtheme-size1', array( 'class' => 'img-responsive' ) ); ?>
		</div>
	<?php } ?>
	<div class="entry-meta">
		<ul class="title-bar-high news-comments">
			<li><i class="fa fa-calendar" aria-hidden="true"></i><span><?php esc_html_e( 'Date: ', 'miako' ); echo wp_kses_post( $rdtheme_time_html_2 );?></span></li>
			<li><i class="fa fa-user" aria-hidden="true"></i><span><?php esc_html_e( 'By: ', 'miako' ) . the_author_posts_link();?></span></li>
			<?php 
				foreach ($terms as $term) {
					echo '<li><i class="fa fa-tags" aria-hidden="true"></i><a href="'. esc_html( get_term_link( $term->slug , 'fin_portfolio_category' ) ).'">'. esc_html ( $term->name ) .'</a></li>';
				}
			?>
			<?php if ( !empty( $fin_case_location ) ) { ?>
				<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo esc_html( $fin_case_location );?></li>				
			<?php } ?>
		</ul>
	</div>
	<div class="item-content">
		<?php the_content();?>
	</div>
</div>