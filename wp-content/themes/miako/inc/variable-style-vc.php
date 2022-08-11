<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
 
$primary_color   = RDTheme::$options['primary_color']; // #cf9455
$secondery_color = '#797979';
$primary_rgb     = RDTheme_Helper::hex2rgb( $primary_color ); // 0, 33, 71
$secondary_rgb   = RDTheme_Helper::hex2rgb( $secondery_color ); // 0, 33, 71
/*---------------------------------    
INDEX
===================================
#. VC: Button
#. VC: Section Title
#. VC: Owl Nav 1 
#. VC: Owl Nav 2
#. VC: Owl Nav 3
#. VC: Owl Nav 4
#. VC: Law Slider 1
#. VC: Law Slider 2
#. VC: Testimonial Slider 1
#. VC: Testimonial Slider 2
#. VC: Team Slider
#. VC: About
#. VC: Opening Hour
#. VC: Text With Button
#. VC: Post
#. VC: Info Box
#. VC: Tab ( Restyling )
#. VC: Award Box
#. VC: CTA
#. VC: Law Grids
#. VC: Team Sliders
#. VC: Pricing Table 1
#. VC: Pricing Table 2
#. VC: Logo Showcase
----------------------------------*/
/*-----------------------
#. VC: Button
------------------------*/
?>
.light-button ,
.light-button i {
	color: <?php echo esc_html($primary_color); ?>;
}
.light-button:hover {
	background: <?php echo esc_html($primary_color); ?>;
}
.dark-button {
	border: 2px solid <?php echo esc_html($primary_color); ?>;
	background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. VC: Section Title
------------------------*/
?>
.rt-vc-title-1 h2::after,
.rt-vc-title h2:after ,
.section-title h2:after {
	background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Owl Nav 1
---------------------------------------*/
?>
.rt-owl-nav-1 .owl-carousel .owl-nav .owl-prev ,
.rt-owl-nav-1 .owl-carousel .owl-nav .owl-next {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1 .owl-carousel .owl-nav .owl-prev:hover ,
.rt-owl-nav-1 .owl-carousel .owl-nav .owl-next:hover {
  background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1 .owl-carousel .owl-dots .owl-dot span:hover span ,
.rt-owl-nav-1 .owl-carousel .owl-dots .owl-dot.active span {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Owl Nav 2
---------------------------------------*/
?>
/*for both option control*/
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-prev ,
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-next {
  color: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-prev:hover ,
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-next:hover {
  background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot span:hover span ,
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot.active span {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Owl Nav 3
---------------------------------------*/
?>
.rt-owl-nav-3 .owl-custom-nav .owl-prev {
  color: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-3 .owl-custom-nav .owl-prev:hover ,
.rt-owl-nav-3 .owl-custom-nav .owl-next:hover {
  background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-3 .owl-custom-nav .owl-next {
  color: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-3.slider-dot-enabled .owl-carousel .owl-dot span:hover span ,
.rt-owl-nav-3.slider-dot-enabled .owl-carousel .owl-dot.active span {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Law Slider 1
---------------------------------------*/
?>
.rt-law-slider-1 .rtin-single-practice i ,
.rt-law-slider-1 .rtin-single-practice h3 a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-law-slider-1 .rtin-single-practice h3 a::after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-law-slider-1 .rtin-single-practice .read-more a {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-law-slider-1 .rtin-single-practice .read-more a:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-law-slider-1.rt-owl-nav-1 .owl-carousel .owl-nav .owl-prev:hover,
.rt-law-slider-1.rt-owl-nav-1 .owl-carousel .owl-nav .owl-next:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Law Slider 2
---------------------------------------*/
?>
.rt-law-slider-2 .rtin-single-law-service i {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-law-slider-2 .rtin-single-law-service:hover {
  background: <?php echo esc_html($primary_color); ?> none repeat scroll 0 0;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-law-slider-2.rt-owl-nav-1 .owl-carousel .owl-nav .owl-prev:hover,
.rt-law-slider-2.rt-owl-nav-1 .owl-carousel .owl-nav .owl-next:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-service-layout-2 .rtin-single-feature-slide .rtin-feature-slide-content {	
  background: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
<?php
/*-------------------------------------
#. VC: Testimonial Slider 1
---------------------------------------*/
?>
.rt-testimonial-slider-1 .rtin-single-client-area h3 a:hover ,
.rt-testimonial-slider-1 .rtin-single-client-area .picture ul li a i {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Testimonial Slider 2
---------------------------------------*/
?>
.rt-testimonial-slider-2 .rtin-single-testimonial .rtin-testi-content:before ,
.rt-testimonial-slider-2 .rtin-single-testimonial .rtin-testi-content:after {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Team Slider
---------------------------------------*/
?>
.rt-team-slider-one .section-title h2:after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-one .rtin-single-team .rtin-item-content h3 a:hover ,
.rt-team-slider-one .rtin-single-team .rtin-item-content .position ,
.rt-team-slider-one .rtin-single-team .rtin-item-content ul.social-icons li a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-one .rtin-single-team .rtin-item-content ul.social-icons li a:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
/*team slider 2*/
.rt-team-slider-three .rtin-single-team .rtin-item-content .position ,
.rt-team-slider-four .rtin-single-team .rtin-item-content h3 a:hover ,
.rt-team-slider-five .rtin-team-content h3 a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-three .rtin-single-team:hover ,
.rt-team-slider-two .rtin-single-team {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-five .rtin-single-team .rtin-team-picture .overlay h2 a {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-five .rtin-single-team .rtin-team-picture .overlay h2 a:hover {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  background: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
.rt-team-slider-five .rtin-single-team .rtin-team-picture .overlay .social-media ul li a:hover {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-five .rtin-single-team .rtin-team-picture .overlay .social-media ul li a {
  color: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------
#. VC: About
--------------------------------*/
?>
.rt-about-one .rtin-about-content h1 span ,
.rt-about-one .rtin-about-content ul li:before ,
.rt-about-one .rtin-about-content .read-more-button a:after {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-about-one .rtin-about-content .read-more-button a {
  color: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-about-one .rtin-about-content .read-more-button a:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Post
---------------------------------------*/
?>
.rt-post-vc-section-1 .rtin-single-post .rtin-item-image span.date ,
.rt-post-vc-section-2 .rtin-single-post .rtin-item-image span.date ,
.rt-post-vc-section-3 .rt-post-slider-3 .entry-thumbnail-area .post-date ,
.rt-post-vc-section-3 .rt-post-slider-3 .entry-thumbnail-area ul .active {
	background: <?php echo esc_html($primary_color); ?>;
}
.rt-post-vc-section-1 .rtin-single-post:hover .rtin-item-info h3 a ,
.rt-post-vc-section-2 .rtin-single-post:hover .rtin-item-info h3 a ,
.rt-post-vc-section-3 .rt-post-slider-3 .entry-thumbnail-area ul li i ,
.rt-post-vc-section-3 .rt-post-slider-3 .entry-thumbnail-area ul li a:hover ,
.rt-post-vc-section-3 .rt-post-slider-3 .entry-content h3 a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-post-vc-section-4 .rtin-single-post:hover .rtin-item-info h3 a ,
.rt-post-vc-section-4 .rtin-single-post .rtin-item-info .rtin-post-date {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Info Text
---------------------------------------*/
?>
.rt-info-text .info-ghost-button a {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-info-text .info-ghost-button a:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-info-text.layout1 i, 
.rt-info-text.layout2 i,
.rt-info-text.layout3 i {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-info-text.layout4 i ,
.rt-infobox-5 .rtin-single-info .rtin-info-item-icon ,
.rt-infobox-6 .rtin-info-icon ,
.rt-infobox-6:hover .rtin-info-content h3 ,
.rt-infobox-6:hover .rtin-info-content h3 a ,
.rt-infobox-7 .rtin-single-info-item .rtin-single-info:hover .rtin-info-content h3 a ,
.rt-infobox-8 .media .media-left i ,
.rt-infobox-9 .media .media-left i ,
.rt-infobox-10 h3 a:hover ,
.rt-infobox-10:hover h2 a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-infobox-8 .media .media-body h3:after ,
.rt-infobox-10 .rtin-info-icon a ,
.rt-infobox-10 h3 a:after {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. VC: Tab ( Restyling )
------------------------*/
?>
.wpb-js-composer .vc_tta-container .miako-tab .vc_tta-tabs-container .vc_tta-tab.vc_active .vc_tta-title-text {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. VC: CTA
------------------------*/
?>
.rt-text-advertise h2 span,
.rt-cta-1 .rtin-cta-contact-button a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-cta-2 .rtin-cta-right:before ,
.rt-cta-2 .rtin-cta-right {	
  background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. VC: Law Grids
------------------------*/
?>
<?php
/*-------------------------------------
#. VC: Law Grid 01
---------------------------------------*/
?>
.rt-service-layout-1 .rtin-single-item .rtin-item-content h3 a {
  color: <?php echo esc_html($secondery_color); ?>;
}
.rt-service-layout-1 .rtin-single-item:hover .rtin-item-content h3 a ,
.rt-law-grid .rtin-single-law .rtin-law-content h3 a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-service-layout-1 .view-more-button a,
.rt-law-grid .view-more-button a ,
.rt-law-grid .rtin-single-law .rtin-law-image .overlay {
  background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Law Grid 03
---------------------------------------*/
?>
.rt-service-layout-3 .rtin-single-item .rtin-item-content h3:after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-service-layout-3 .rtin-single-item .rtin-item-content a.rdtheme-button-7 {
  color: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-service-layout-3 .rtin-single-item .rtin-item-content a.rdtheme-button-7:hover {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-service-layout-3 .rtin-single-item .rtin-item-content a.rdtheme-button-7 i,
.rt-service-layout-3 .rtin-single-item:hover .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Law Grid 05
---------------------------------------*/
?>.rt-service-layout-5 .rtin-single-item .rtin-item-content {
	background-color: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
<?php
/*-------------------------------------
#. VC: Law Grid 06
---------------------------------------*/
?>
.entry-content .rt-service-layout-6 .rtin-icon-holder {
  color: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Team Sliders
---------------------------------------*/
?>
.rt-team-slider-one .section-title h2:after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-one .rtin-single-team .rtin-item-content h3 a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-one .rtin-single-team .rtin-item-content .position {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-one .rtin-single-team .rtin-item-content ul.social-icons li a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-one .rtin-single-team .rtin-item-content ul.social-icons li a:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
/*team slider 2*/
.rt-team-slider-two .rtin-single-team {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-two .rtin-single-team .rtin-item-content h3 a:hover {
  color: <?php echo esc_html($secondery_color); ?>;
}
/*team-grid*/
.rt-team-grid-1 .rtin-single-team .rtin-item-image a.plus-icon {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-1 .rtin-single-team .rtin-item-content ul.social-icons li a:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 1px solid <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-1 .rtin-single-team:hover .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-3 .rtin-single-team .rtin-item-content ul.social-icons li a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-1 .rtin-single-team .rtin-item-content ul.social-icons li a,
.rt-team-grid-2 .rtin-single-team .rtin-item-content ul.social-icons li a {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-2 .rtin-single-team .rtin-item-content ul.social-icons li a:hover {
  background: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-team-grid-2 .rtin-single-team:hover .rtin-item-content h3 a {
  color: <?php echo esc_html($primary_color); ?>;
}
/*team slider 3*/
.rt-team-slider-three .rtin-single-team {
  background: <?php echo esc_html($secondery_color); ?>;
}
.rt-team-slider-three .rtin-single-team .rtin-item-content .position {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-three .rtin-single-team:hover {
  background: <?php echo esc_html($primary_color); ?>;
}
/*team slider 4*/
.rt-team-slider-four .rtin-single-team .rtin-item-content h3 a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
/*team slider 5*/
.rt-team-slider-five .vc-item-wrap .vc-item .vc-overly {
  background-color: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
.rt-team-slider-five .vc-item-wrap .vc-team-meta .name a {
  color: <?php echo esc_html($primary_color); ?>;
}
/*Team Slider 6*/
.rt-team-slider-six .rtin-team-slider-holder .tab-content .single-team .media-body h3.media-heading a:hover ,
.rt-team-slider-six .rtin-team-slider-holder .tab-content .single-team .media-body p.designation {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-six .rtin-team-slider-holder .tab-content .single-team .media-body .social-media-area ul li a {
  color: <?php echo esc_html($primary_color); ?>;
  border: 2px solid <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-six .rtin-team-social ul li a:hover i,
.rt-team-slider-six .rtin-team-content h3 a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-six .rtin-team-content:after {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-team-slider-six .rtin-team-content:after,
.rt-team-slider-six .rtin-team-slider-holder .tab-content .single-team .media-body .social-media-area ul li:hover a ,
.rt-team-slider-six .rtin-single-team .rtin-team-picture .overlay {
  background-color: <?php echo esc_html($primary_color); ?>;
}
/*Team Slider 7*/
.rt-team-slider-seven .single-team-area h3 .team-name {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Pricing Table 1
---------------------------------------*/
?>
.rt-price-table-box h3 {
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-price-table-box .rtin-price-button a.btn-price-button {
  border: 2px solid <?php echo esc_html($primary_color); ?>;
  color: <?php echo esc_html($primary_color); ?>;
}
.rt-price-table-box .rtin-price-button a.btn-price-button:hover {
  background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. VC: Pricing Table 2
---------------------------------------*/
?>
.entry-content .rt-price-table-box1 .price-holder {
  background: <?php echo esc_html($primary_color); ?>;
}
.rt-text-with-video .rtin-text-content h2::after ,
.entry-content .rt-price-table-box1 .pricetable-btn {
  background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------------
#. VC: Logo Showcase
---------------------------------------*/
?>
.rt-wpls .wpls-carousel .slick-prev, .rt-wpls .wpls-carousel .slick-next {
	background-color:<?php echo esc_html($primary_color); ?>;
}
.rt-vc-counter-2 .rtin-counter-content .rt-counter {
	border: 5px solid <?php echo esc_html($primary_color); ?>;
	color: <?php echo esc_html($primary_color); ?>;
}
@media (max-width: 767px) {
  .wpb-js-composer .vc_tta.vc_tta-spacing-1 .vc_tta-panel.vc_active .vc_tta-panel-heading {
    background-color: <?php echo esc_html($primary_color); ?> !important;
    border-color: <?php echo esc_html($primary_color); ?> !important;
  }
}