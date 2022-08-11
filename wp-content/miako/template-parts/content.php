<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_has_entry_meta  = ( ( !has_post_thumbnail() && RDTheme::$options['blog_date'] ) || RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] || RDTheme::$options['blog_cats'] ) ? true : false;

$rdtheme_comments_number = number_format_i18n( get_comments_number() );

$thumbnail = false;

if (  RDTheme::$layout == 'right-sidebar' || RDTheme::$layout == 'right-sidebar' ){
	$post_classes = array( 'col-lg-6 col-md-6 col-sm-6 col-xs-12' );
} else {
	$post_classes = array( 'col-lg-4 col-md-4 col-sm-4 col-xs-12' );
}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>	
	<div class="rt-blog-layout">
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
			} ?>
			</a>
			<ul>
				<?php if ( RDTheme::$options['blog_date'] ) { ?>
				<li class="active"><?php echo get_the_time( 'M d, Y' ); ?></li>
				<?php } ?>				
				<?php if ( RDTheme::$options['blog_author_name'] ) { ?>
				<li><i class="fa fa-user" aria-hidden="true"></i><?php _e( '<span> By </span>', 'miako' ) . the_author_posts_link();?></li>
				<?php } if ( RDTheme::$options['blog_comment_num'] ) { ?>
				<li><i class="fa fa-comment-o" aria-hidden="true"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"> <?php echo esc_html( $rdtheme_comments_number );?></a></li>
				<?php } ?>
			</ul>
		</div>		
		<div class="entry-content">
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<div class="blog-text">
			<?php 				
			$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( $content, 18 );
			echo wp_kses_post( $content ); ?>
			</div>
		</div>		
	</div>
</div>