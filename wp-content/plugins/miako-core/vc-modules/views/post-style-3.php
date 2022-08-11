<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size7';
$args = array(
	'posts_per_page' => $slider_item_number,	
	'ignore_sticky_posts' => 1,
	'cat'       => $cat,
	'orderby'		 => $orderby,
	'order'			 => $order,
	);
$query = new WP_Query( $args );
$slider_nav_class = ( $slider_nav == 'true' ) ? ' slider-nav-enabled' : '';
$slider_dot_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';

$ul_class = $post_classes = '';
 
$rdtheme_has_entry_meta  = ( ( !has_post_thumbnail() && RDTheme::$options['blog_date'] ) || RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] || RDTheme::$options['blog_cats'] ) ? true : false;

$rdtheme_comments_number = number_format_i18n( get_comments_number() );

$thumbnail = false;
?>
<div class="rt-post-vc-section-3 owl-wrap rt-owl-nav-2 <?php echo esc_attr( $slider_nav_class );?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
	<?php if ( $query->have_posts() ) { ?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
			<?php
				$id = get_the_ID();
				$content = get_the_content();
				$content = apply_filters( 'the_content', $content );
				$content = wp_trim_words( $content, $count );
				$comments_count = wp_count_comments( $id );
				$message =  $comments_count->approved ;
				$rdtheme_date = sprintf( '<span class="date">%s<br>%s<br>%s</span>', get_the_time( 'M' ), get_the_time( 'd' ), get_the_time( 'Y' ) );
			?>
			<div class="rt-post-slider-3">
				<div class="entry-thumbnail-area">
					<a href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( 'rdtheme-size2', ['class' => 'img-resfponsive'] );?>
					<?php } else {
						if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
							$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
						}
						elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
							$thumbnail = '<img class="attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_370X270.jpg" alt="'.get_the_title().'">';
						}
						echo wp_kses_post( $thumbnail );
					} ?><span class="post-date"><?php echo get_the_time( 'M d, Y' ); ?></span></a>
					<ul class="<?php echo esc_attr( $ul_class ); ?>">
						<?php if ( RDTheme::$options['blog_date'] ) { ?>
						<li class="active"><?php echo get_the_time( 'M d, Y' ); ?></li>
						<?php } ?>				
						<?php if ( RDTheme::$options['blog_author_name'] ) { ?>
						<li class="miako-author"><i class="fa fa-user" aria-hidden="true"></i><?php _e( '<span> By </span>', 'miako-core' ) . the_author_posts_link();?></li>
						<?php } if ( RDTheme::$options['blog_comment_num'] ) { ?>
						<li><i class="fa fa-comment-o" aria-hidden="true"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"> <?php echo esc_html( $rdtheme_comments_number );?></a></li>
						<?php } ?>
					</ul>
				</div>		
				<div class="entry-content">
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php
						$id = get_the_ID();
						$content = get_the_content();
						$content = apply_filters( 'the_content', $content );
						$content = wp_trim_words( $content, 18 );
					?>
					<p class="blog-text"><?php echo wp_kses_post( $content ); ?></p>
				</div>		
			</div>	
		<?php endwhile;?>
	<?php } else { ?>
		<div class="rtin-single-news">
			<?php esc_html_e( 'No Post Found' , 'miako-core' ); ?>
		</div>
	<?php } ?>
	<?php wp_reset_query();?>
	</div>
</div>