<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $post;
$id = get_the_ID();
$thumb_size = 'rdtheme-size4';
$thumbnail = false;
if ( has_post_thumbnail() ){
	$thumbnail = get_the_post_thumbnail( null, $thumb_size, array( 'class' => 'img-responsive' ) );
}
else {
	if ( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
		$thumbnail = wp_get_attachment_image( RDTheme::$options['no_preview_image']['id'], $thumb_size );
	}
	elseif ( !empty( RDTheme::$options['no_preview_image']['url'] ) ) {
		$thumbnail = '<img class="img-responsive attachment-rdtheme-size5 size-rdtheme-size5 wp-post-image" src="'.RDTHEME_IMG_URL.'noimage_370x475.jpg" alt="'.get_the_title().'">';
	}
}
$team_designation = get_post_meta( $id, 'miako_team_designation', true );
$team_socials = get_post_meta( $id, 'miako_team_socials', true );
$team_skills = get_post_meta( $post->ID, 'miako_team_skill', true );
$team_email = get_post_meta( $post->ID, 'miako_team_email', true );
$team_phone = get_post_meta( $post->ID, 'miako_team_phone', true );
$team_fax = get_post_meta( $post->ID, 'miako_team_fax', true );
$team_address = get_post_meta( $post->ID, 'miako_team_address', true );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'row rt-team-single' ); ?>>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<div class="team-details-img-wraper">
			<div class="team-details-img-holder">
				<?php echo wp_kses_post( $thumbnail ); ?>
			</div>
			<?php if ( !empty( $team_socials ) ){ ?>
			<ul class="team-details-social">
			<?php foreach ( $team_socials as $team_social_key => $team_social_value ) { ?>
				<?php if ( !empty( $team_social_value ) ) { ?>
				<li><a target="_blank" href="<?php echo esc_attr( $team_social_value );?>"><i class="fa <?php echo esc_attr( RDTheme::$team_social_fields[$team_social_key]['icon'] );?>"></i></a></li>
				<?php } ?>
			<?php } ?>
			</ul>
			<?php } ?>
			<ul class="team-details-info">
				<?php if ( $team_address ) { ?>
				<li><i class="fa fa-map-marker"></i> <?php echo wp_kses_post( $team_address ); ?></li>
				<?php } if ( $team_phone ) { ?>
				<li><i class="fa fa-phone"></i> <?php echo esc_html( $team_phone ); ?></li>
				<?php } if ( $team_email ) { ?>
				<li><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo esc_html( $team_email ); ?>" target="_top"><?php echo esc_html( $team_email ); ?></a></li>
				<?php } if ( $team_fax ) { ?>
				<li><i class="fa fa-fax"></i> <?php echo esc_html( $team_fax ); ?></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div class="team-details-content-holder">
			<h3><?php the_title(); ?></h3>
			<?php if ( $team_designation ) { ?>
			<h4 class="title-bar50"><?php echo esc_html( $team_designation ); ?></h4>
			<?php } ?>
			<div><?php the_content(); ?></div>
			<?php if ( !empty( $team_skills ) ){ ?>
			<div class="skill-area">
				<?php foreach ( $team_skills as $team_skill ) { ?>
					<?php
					if ( empty( $team_skill['skill_name'] ) || empty( $team_skill['skill_value'] ) ) {
						continue;
					}
					?>
				<?php $team_skill_value = (int) $team_skill['skill_value'];?>
				<div class="progress">
					<div class="lead"><?php echo esc_html( $team_skill['skill_name'] );?></div>
					<div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?php echo esc_attr( $team_skill_value );?>%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="<?php echo esc_attr( $team_skill_value );?>%" class="progress-bar wow fadeInLeft animated"> 
					<span><?php echo esc_attr( $team_skill_value );?>%</span>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>    
</div>