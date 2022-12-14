<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/*-------------------------------------
INDEX
=======================================
#. Top Bar
#. Header
#. Typography
#. Banner
#. Footer
#. Widgets
#. Inner Contents
#. Error 404
#. comment
#. Buttons
#. Single Content
#. Archive Contents
#. Pagination
#. Contact Form 7
#. Single Team
#. WooCommerce
#. Miscellaneous
-------------------------------------*/

$primary_color         = RDTheme::$options['primary_color']; // #cf9455
$secondery_color       = '#797979';
$primary_rgb           = RDTheme_Helper::hex2rgb( $primary_color ); // 0, 33, 71

$menu_typo             = RDTheme::$options['menu_typo'];
$menu_color            = RDTheme::$options['menu_color'];
$menu_color_tr         = RDTheme::$options['menu_color_tr'];
$menu_hover_color      = RDTheme::$options['menu_hover_color'];
$submenu_typo          = RDTheme::$options['submenu_typo'];
$submenu_color         = RDTheme::$options['submenu_color'];
$submenu_bgcolor       = RDTheme::$options['submenu_bgcolor'];
$submenu_hover_color   = RDTheme::$options['submenu_hover_color'];
$submenu_hover_bgcolor = RDTheme::$options['submenu_hover_bgcolor'];
$resmenu_typo          = RDTheme::$options['resmenu_typo'];

$rdtheme_typo_body     = RDTheme::$options['typo_body'];
$rdtheme_typo_h1       = RDTheme::$options['typo_h1'];
$rdtheme_typo_h2       = RDTheme::$options['typo_h2'];
$rdtheme_typo_h3       = RDTheme::$options['typo_h3'];
$rdtheme_typo_h4       = RDTheme::$options['typo_h4'];
$rdtheme_typo_h5       = RDTheme::$options['typo_h5'];
$rdtheme_typo_h6       = RDTheme::$options['typo_h6'];
?>

<?php
/*-------------------------------------
#. Top Bar
---------------------------------------*/
?>
#tophead .tophead-contact .fa,
#tophead .tophead-address .fa,
#tophead .tophead-social li a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
#tophead {
    background-color: <?php echo esc_html( RDTheme::$options['top_bar_bgcolor'] ); ?>;
}
#tophead,
#tophead a,
#tophead .tophead-social li a {
    color: <?php echo esc_html( RDTheme::$options['top_bar_color'] ); ?>;
}
.trheader #tophead,
.trheader #tophead a,
.trheader #tophead .tophead-social li a {
	color: <?php echo esc_html( RDTheme::$options['top_bar_color_tr'] ); ?>;
}
.miako-primary-color{
	color:<?php echo esc_html( $primary_color ); ?>;
}
.miako-primary-bgcolor {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Header
---------------------------------------*/
?>
<?php // Main Menu ?>
.site-header .main-navigation ul li a {
	font-family: <?php echo esc_html( $menu_typo['font-family'] ); ?>, sans-serif;
	font-size : <?php echo esc_html( $menu_typo['font-size'] ); ?>;
	font-weight : <?php echo esc_html( $menu_typo['font-weight'] ); ?>;
	line-height : <?php echo esc_html( $menu_typo['line-height'] ); ?>;
	color: <?php echo esc_html( $menu_color ); ?>;
	text-transform : <?php echo esc_html( $menu_typo['text-transform'] ); ?>;
	font-style: <?php echo empty( $menu_typo['font-style'] ) ? 'normal' : $menu_typo['font-style']; ?>;
}
.site-header .main-navigation ul.menu > li > a:hover,
.site-header .main-navigation ul.menu > li.current-menu-item > a,
.site-header .main-navigation ul.menu > li.current > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.site-header .main-navigation ul li a.active {
	color: <?php echo esc_html( $menu_hover_color );?> !important;
}
.trheader.non-stick .site-header .main-navigation ul.menu > li > a,
.trheader.non-stick .site-header .search-box .search-button i,
.trheader.non-stick .header-icon-seperator,
.trheader.non-stick .header-icon-area .cart-icon-area > a, 
.trheader.non-stick .additional-menu-area a.side-menu-trigger {
	color: <?php echo esc_html( $menu_color_tr ); ?>;
}

<?php // Submenu ?>
.site-header .main-navigation ul li ul li {
	background-color: <?php echo esc_html( $submenu_bgcolor ); ?>;
}
.site-header .main-navigation ul li ul li:hover {
	background-color: <?php echo esc_html( $submenu_hover_bgcolor ); ?>;
}
.site-header .main-navigation ul li ul li a {
	font-family: <?php echo esc_html( $submenu_typo['font-family'] ); ?>, sans-serif;
	font-size : <?php echo esc_html( $submenu_typo['font-size'] ); ?>;
	font-weight : <?php echo esc_html( $submenu_typo['font-weight'] ); ?>;
	line-height : <?php echo esc_html( $submenu_typo['line-height'] ); ?>;
	color: <?php echo esc_html( $submenu_color ); ?>;
	text-transform : <?php echo esc_html( $submenu_typo['text-transform'] ); ?>;
	font-style: <?php echo empty( $submenu_typo['font-style'] ) ? 'normal' : $submenu_typo['font-style']; ?>;
}
.site-header .main-navigation ul li ul li:hover > a {
	color: <?php echo esc_html( $submenu_hover_color ); ?>;
}

<?php // Sticky Menu ?>
.stick .site-header {
	border-color: <?php echo esc_html( $primary_color ); ?>
}

<?php // Multi Column Menu ?>
.site-header .main-navigation ul li.mega-menu > ul.sub-menu {
	background-color: <?php echo esc_html( $submenu_bgcolor ); ?>
}
.site-header .main-navigation ul li.mega-menu ul.sub-menu li a {
	color: <?php echo esc_html( $submenu_color ); ?>
}
.site-header .main-navigation ul li.mega-menu ul.sub-menu li a:hover {
	background-color: <?php echo esc_html( $submenu_hover_bgcolor ); ?>;
	color: <?php echo esc_html( $submenu_hover_color ); ?>;
}

<?php // Mean Menu ?>
.mean-container a.meanmenu-reveal,
.mean-container .mean-nav ul li a.mean-expand {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.mean-container a.meanmenu-reveal span {
	background-color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.mean-container .mean-bar {
	border-color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.mean-container .mean-nav ul li a {
	font-family: <?php echo esc_html( $resmenu_typo['font-family'] ); ?>, sans-serif;
	font-size : <?php echo esc_html( $resmenu_typo['font-size'] ); ?>;
	font-weight : <?php echo esc_html( $resmenu_typo['font-weight'] ); ?>;
	line-height : <?php echo esc_html( $resmenu_typo['line-height'] ); ?>;
	color: <?php echo esc_html( $menu_color ); ?>;
	text-transform : <?php echo esc_html( $resmenu_typo['text-transform'] ); ?>;
	font-style: <?php echo empty( $resmenu_typo['font-style'] ) ? 'normal' : $resmenu_typo['font-style']; ?>;
}
.mean-container .mean-nav ul li a:hover,
.mean-container .mean-nav > ul > li.current-menu-item > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}

<?php // Header icons ?>
.header-icon-area .cart-icon-area .cart-icon-num {
	background-color: <?php echo esc_html( $menu_hover_color );?>;
}
.additional-menu-area a.side-menu-trigger:hover,
.trheader.non-stick .additional-menu-area a.side-menu-trigger:hover {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.site-header .search-box .search-text {
	border-color: <?php echo esc_html( $menu_hover_color );?>;
}

<?php // Header Layout 3 ?>
.header-style-3 .header-contact .fa,
.header-style-3 .header-social li a:hover,
.header-style-3.trheader .header-social li a:hover {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.header-style-3.trheader .header-contact li a,
.header-style-3.trheader .header-social li a {
	color: <?php echo esc_html( $menu_color_tr ); ?>;
}

<?php // Header Layout 4 ?>
.header-style-4 .header-contact .fa,
.header-style-4 .header-social li a:hover,
.header-style-4.trheader .header-social li a:hover {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.header-style-4.trheader .header-contact li a,
.header-style-4.trheader .header-social li a {
	color: <?php echo esc_html( $menu_color_tr ); ?>;
}

<?php // Header Layout 5 ?>
.header-style-5 .header-menu-btn {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.trheader.non-stick.header-style-5 .header-menu-btn {
	color: <?php echo esc_html( $menu_color_tr ); ?>;
}

<?php // Header Layout 6 ?>
.header-style-6 .header-address li i,
.header-style-6 .site-header .main-navigation .nav-area .header-cta a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.header-style-6 .site-header .main-navigation .nav-area {
	background-color: <?php echo esc_html( $submenu_bgcolor ); ?>;
}
.header-style-6.stick .site-header::before {
    background-color: <?php echo esc_html( $submenu_bgcolor ); ?>;
}
<?php
/*-------------------------------------
#. Typography
---------------------------------------*/
?>
body {
	font-family: <?php echo esc_html( $rdtheme_typo_body['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $rdtheme_typo_body['font-size'] ); ?>;
	line-height: <?php echo esc_html( $rdtheme_typo_body['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $rdtheme_typo_body['font-weight'] ); ?>;
}
h1 {
	font-family: <?php echo esc_html( $rdtheme_typo_h1['font-family'] ); ?>;
	font-size: <?php echo esc_html( $rdtheme_typo_h1['font-size'] ); ?>;
	line-height: <?php echo esc_html( $rdtheme_typo_h1['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $rdtheme_typo_h1['font-weight'] ); ?>;
}
h2 {
	font-family: <?php echo esc_html( $rdtheme_typo_h2['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $rdtheme_typo_h2['font-size'] ); ?>;
	line-height: <?php echo esc_html( $rdtheme_typo_h2['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $rdtheme_typo_h2['font-weight'] ); ?>;
}
h3 {
	font-family: <?php echo esc_html( $rdtheme_typo_h3['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $rdtheme_typo_h3['font-size'] ); ?>;
	line-height: <?php echo esc_html( $rdtheme_typo_h3['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $rdtheme_typo_h3['font-weight'] ); ?>;
}
h4 {
	font-family: <?php echo esc_html( $rdtheme_typo_h4['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $rdtheme_typo_h4['font-size'] ); ?>;
	line-height: <?php echo esc_html( $rdtheme_typo_h4['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $rdtheme_typo_h4['font-weight'] ); ?>;
}
h5 {
	font-family: <?php echo esc_html( $rdtheme_typo_h5['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $rdtheme_typo_h5['font-size'] ); ?>;
	line-height: <?php echo esc_html( $rdtheme_typo_h5['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $rdtheme_typo_h5['font-weight'] ); ?>;
}
h6 {
	font-family: <?php echo esc_html( $rdtheme_typo_h6['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $rdtheme_typo_h6['font-size'] ); ?>;
	line-height: <?php echo esc_html( $rdtheme_typo_h6['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $rdtheme_typo_h6['font-weight'] ); ?>;
}
<?php
/*-------------------------------------
#. Banner
---------------------------------------*/
?>
.entry-banner .entry-banner-content h1 {
	color: <?php echo esc_html( RDTheme::$options['banner_heading_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb span a {
	color: <?php echo esc_html( RDTheme::$options['breadcrumb_link_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb span a:hover {
	color: <?php echo esc_html( RDTheme::$options['breadcrumb_link_hover_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb .breadcrumb-seperator {
	color: <?php echo esc_html( RDTheme::$options['breadcrumb_seperator_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb > span:last-child {
	color: <?php echo esc_html( RDTheme::$options['breadcrumb_active_color'] );?>;
}
<?php
/*-------------------------------------
#. Footer
---------------------------------------*/
?>
.scrollToTop {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area {
	background-color: <?php echo esc_html( RDTheme::$options['footer_bgcolor'] ); ?>;
}
.footer-top-area .widget h3 {
	color: <?php echo esc_html( RDTheme::$options['footer_title_color'] ); ?>;
}
.footer-top-area .widget {
	color: <?php echo esc_html( RDTheme::$options['footer_color'] ); ?>;
}
.footer-top-area a:link,
.footer-top-area a:visited {
	color: <?php echo esc_html( RDTheme::$options['footer_link_color'] ); ?>;
}
.footer-top-area a:hover,
.footer-top-area a:active {
	color: <?php echo esc_html( RDTheme::$options['footer_link_hover_color'] ); ?>;
}
.footer-bottom-area {
	background-color: <?php echo esc_html( RDTheme::$options['copyright_bgcolor'] ); ?>;
}
.footer-bottom-area .footer-bottom-left {
	color: <?php echo esc_html( RDTheme::$options['copyright_color'] ); ?>;
}
.footer-top-area ul.menu li:before {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Widgets
---------------------------------------*/
?>
.search-form .input.search-submit {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.search-form .input.search-submit a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.search-no-results .custom-search-input .btn{
	 background-color: <?php echo esc_html( $primary_color ); ?>;
}
.widget ul li a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget h3.widgettitle:after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget_tag_cloud a {
	color: <?php echo esc_html( $secondery_color ); ?>;
}
.sidebar-widget-area .widget_tag_cloud a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget h3.widgettitle:after {
  background: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget .rt-slider-sidebar .rt-single-slide .testimo-info .testimo-title h3 {
  color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget ul li a:before {
  color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget ul li a:hover {
  color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget ul li.active a {
  color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget ul li.active a:before {
  color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget ul li {
    border-bottom: 1px dotted <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .search-form input.search-submit {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area ul li:before {
	color: <?php echo esc_html( $secondery_color ); ?>;
}
.footer-top-area ul li a:before {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .rt_footer_social_widget .footer-social li {
  border: 1px solid <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .corporate-address li i ,
.footer-top-area .rt_footer_social_widget .footer-social li:hover i {
  color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .search-form input.search-submit {
  color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area ul li a:before {
  color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .stylish-input-group .input-group-addon button {
  background: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .search-form button {
  background-color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .widgettitle:after {
  background: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .rt_widget_recent_entries_with_image .media-body h4 a:hover {
  color: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Inner Contents
---------------------------------------*/
?>
a:link,
a:visited,
.entry-footer .about-author .media-body .author-title,
.entry-title h1 a{
	color: <?php echo esc_html( $primary_color );?>;
}
.entry-content a {
    color:<?php echo esc_html( $primary_color );?>;
}
.entry-footer .tags a:hover,
.entry-title h1 a:hover {
	color: <?php echo esc_html( $secondery_color );?>;
}
.comments-area .main-comments .replay-area a,
#respond form .btn-send,
.blog-style-2 .readmore-btn {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.comments-area .main-comments .replay-area a:hover,
#respond form .btn-send:hover,
.blog-style-2 .readmore-btn:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
	opacity: 0.8;	
	color: #ffffff;
}
blockquote p:before{	
	color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Error 404
---------------------------------------*/
?>
.error-page-area {
    background-color: <?php echo esc_html( RDTheme::$options['error_bodybg'] );?>;
}
.error-page-area .error-page,
.error-page-area .error-page h3 {
	color: <?php echo esc_html( RDTheme::$options['error_text12_color'] );?>;
}

<?php
/*-------------------------------------
#. Comment
---------------------------------------*/
?>
.comments-area h3:before{
	background: <?php echo esc_html( $secondery_color );?>;
}
#respond form .btn-send:hover {
  color: #ffffff;
}
.item-comments .item-comments-list ul.comments-list li .comment-reply {
  background-color: <?php echo esc_html( $primary_color );?>;
}
.item-comments .item-comments-form .comments-form .form-group .form-control {
  background-color: <?php echo esc_html( $secondery_color );?>;
}
<?php
/*------------------------------------
#. Buttons
------------------------------------*/
?>
.rdtheme-button-1 {
	color: <?php echo esc_html( $primary_color );?>;	
}
.rdtheme-button-1:hover {
	background: <?php echo esc_html( $primary_color );?>;
}
.rdtheme-button-2 {
	background: <?php echo esc_html( $primary_color );?>;
}
.rdtheme-button-2:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.miako-primary-color {
	color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Single Content
---------------------------------------*/
?>
.entry-header .entry-meta ul li i ,
.entry-header .entry-meta ul li a:hover ,
.entry-footer ul.item-tags li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Archive Contents
---------------------------------------*/
?>
.blog-layout-1 .entry-header .entry-thumbnail-area .post-date1 {
	background: <?php echo esc_html( $primary_color );?>;
}
.blog-layout-1 .entry-header .entry-content h3 a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.blog-layout-1 .entry-header .entry-content .rdtheme-button-7:hover {
  background: <?php echo esc_html( $primary_color );?>;
}
.custom-search-input .btn {
  background-color: <?php echo esc_html( $primary_color );?>;
}
.search-no-results .custom-search-input .btn {
  background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-blog-layout .entry-thumbnail-area ul li i {
  color: <?php echo esc_html( $primary_color );?>;
}
.rt-blog-layout .entry-thumbnail-area ul li a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.rt-blog-layout .entry-thumbnail-area ul .active {
  background: <?php echo esc_html( $primary_color );?>;
}
.rt-blog-layout .entry-content h3 a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Pagination
---------------------------------------*/
?>
.pagination-area ul li a,
.pagination-area ul li span  {
	border: 1px solid <?php echo esc_html( $primary_color );?>;
}
.pagination-area li.active a:hover,
.pagination-area ul li.active a,
.pagination-area ul li a:hover,
.pagination-area ul li span.current{
	background-color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Contact Form 7
---------------------------------------*/
?>
.rt-contact-info ul li a:hover {
  color: <?php echo esc_html( $primary_color );?>;	
}
.cf7-quote-submit input {
  border: 2px solid <?php echo esc_html( $secondery_color );?>;
}
.cf7-quote-submit input:hover {
  background-color: <?php echo esc_html( $secondery_color );?> !important;
}
.contact-form h2:after {
  background: <?php echo esc_html( $primary_color );?>;
}
.contact-form legend,
.rt-request-call-three .request-form .form-group.margin-bottom-none .default-big-btn:hover {
  color: <?php echo esc_html( $secondery_color );?>;
}
.rt-request-call-four .request-form-wrapper .request-form .request-form-input .form-group.margin-bottom-none .default-big-btn ,
.rt-request-call-four .request-form-wrapper .request-form .form-heading ,
.contact-form .wpcf7-submit.contact-submit,
.contact-form-area .submit-button,
.rt-contact-info ul li i {
  background: <?php echo esc_html( $primary_color );?>;
}
.contact-form .wpcf7-submit.contact-submit:hover {
  background: <?php echo esc_html( $secondery_color );?>;
}
<?php
/*-------------------------------------
#. Single Team
---------------------------------------*/
?>
.team-details-social li a {
  background: <?php echo esc_html( $primary_color );?>;
  border: 1px solid <?php echo esc_html( $primary_color );?>;
}
.team-details-social li:hover a {
  border: 1px solid <?php echo esc_html( $primary_color );?>;
}
.team-details-social li:hover a i {
  color: <?php echo esc_html( $primary_color );?>;
}
.skill-area .progress .lead {
  border: 2px solid <?php echo esc_html( $primary_color );?>;
}
.skill-area .progress .progress-bar {
  background: <?php echo esc_html( $primary_color );?>;
}
.team-details-info li i {
  color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. WooCommerce
---------------------------------------*/
?>
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.rt-woo-nav .owl-custom-nav-title::after,
.rt-woo-nav .owl-custom-nav .owl-prev:hover,
.rt-woo-nav .owl-custom-nav .owl-next:hover,
.woocommerce ul.products li.product .onsale,
.woocommerce span.onsale,
.woocommerce a.added_to_cart,
.woocommerce div.product form.cart .button,
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
p.demo_store,
.woocommerce-message::before,
.woocommerce-info::before,
.woocommerce #respond input#submit.disabled:hover,
.woocommerce #respond input#submit:disabled:hover,
.woocommerce #respond input#submit[disabled]:disabled:hover,
.woocommerce a.button.disabled:hover,
.woocommerce a.button:disabled:hover,
.woocommerce a.button[disabled]:disabled:hover,
.woocommerce button.button.disabled:hover,
.woocommerce button.button:disabled:hover,
.woocommerce button.button[disabled]:disabled:hover,
.woocommerce input.button.disabled:hover,
.woocommerce input.button:disabled:hover,
.woocommerce input.button[disabled]:disabled:hover,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt,
.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a {
	background-color: <?php echo esc_html( $primary_color );?>;
}

.woo-shop-top .view-mode ul li:first-child .fa,
.woo-shop-top .view-mode ul li:last-child .fa,
.woocommerce ul.products li.product h3 a:hover,
.woocommerce ul.products li.product .price,
.woocommerce .product-thumb-area .product-info ul li a:hover .fa,
.woocommerce div.product p.price,
.woocommerce div.product span.price,
.woocommerce div.product .product-meta a:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce a.woocommerce-review-link:hover {
	color: <?php echo esc_html( $primary_color );?>;
}

.woocommerce-message,
.woocommerce-info {
	border-color: <?php echo esc_html( $primary_color );?>;
}

.woocommerce .product-thumb-area .overlay {
	background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 0.8);
}
/*----------------------
#. Miscellaneous
----------------------*/
.experince h2 span {
  color: <?php echo esc_html( $primary_color );?>;
}
.entry-content .wpb_layerslider_element a.layerslider-button {
	background: <?php echo esc_html( $primary_color );?>;
}