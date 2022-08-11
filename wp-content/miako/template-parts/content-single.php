<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_has_entry_meta  = ( ( !has_post_thumbnail() && RDTheme::$options['post_date'] ) || RDTheme::$options['post_author_name'] || RDTheme::$options['post_comment_num'] || RDTheme::$options['post_cats'] ) ? true : false;
$rdtheme_time_html       = sprintf( '%s<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$rdtheme_time_html       = apply_filters( 'rdtheme_single_time', $rdtheme_time_html );
$rdtheme_time_html_2     = apply_filters( 'rdtheme_single_time_no_thumb', get_the_time( 'd M, Y' ) );

$rdtheme_comments_number = number_format_i18n( get_comments_number() );
$rdtheme_comments_html = $rdtheme_comments_number < 2 ? esc_html__( 'Comment' , 'miako' ) : esc_html__( 'Comments' , 'miako' );
$rdtheme_comments_html = '('. $rdtheme_comments_number . ') ' . $rdtheme_comments_html;

$rdtheme_author_id       = get_the_author_meta( 'ID' );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="entry-thumbnail-area">
				<?php the_post_thumbnail( 'rdtheme-size1' , ['class' => 'img-responsive'] ); ?>
			</div>
		<?php } ?>
		<div class="entry-content">			
			<?php if ( $rdtheme_has_entry_meta ) { ?>
				<div class="entry-meta">
					<ul>
						<?php if ( RDTheme::$options['post_date'] ): ?>
							<li><i class="fa fa-calendar" aria-hidden="true"></i><span><?php esc_html_e( 'Posted on: ', 'miako' ); echo wp_kses_post( $rdtheme_time_html_2 );?></span></li>
						<?php endif; ?>
						<?php if ( RDTheme::$options['post_author_name'] ): ?>
							<li><i class="fa fa-user" aria-hidden="true"></i><span><?php esc_html_e( 'By ', 'miako' ) . the_author_posts_link();?></span></li>
						<?php endif; ?>
						<?php if ( RDTheme::$options['post_cats'] ): ?>
							<li><i class="fa fa-tags" aria-hidden="true"></i><?php the_category( ', ' );?></li>
						<?php endif; ?>
						<?php if ( RDTheme::$options['post_comment_num'] ): ?>
							<li><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo esc_html( $rdtheme_comments_html );?></li>
						<?php endif; ?>
					</ul>
				</div>
			<?php } ?>
			<?php the_content();?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'miako' ),
				'after'  => '</div>',
			) );
			?>
		</div>
	</div>
	<?php if ( RDTheme::$options['post_tags'] && has_tag() ): ?>
	<div class="entry-footer">
		<div class="entry-footer-meta">			
			<div class="item-tags">
				<span><?php esc_html_e( 'Tags: ', 'miako' );?></span> <?php echo get_the_term_list( $post->ID, 'post_tag', '', ', ' ); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>