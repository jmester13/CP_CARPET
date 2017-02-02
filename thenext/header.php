<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-35223142-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<?php global $smof_data, $zo_meta; ?>
<?php 
	$boxed = "";
	if(isset($smof_data['body_layout']) && $smof_data['body_layout']){
		$boxed = "boxed";
	}
	if(isset($zo_meta->_zo_page_boxed) && $zo_meta->_zo_page_boxed ){
		$boxed = "boxed-for-page";
	}
?>

<?php if(is_front_page() ) { ?>
	<style>
	  #page-right-sidebar, #content {
          padding-top: 0px !important;
	  }
	  </style>
	  
	  <?php } ?>
	

<body <?php body_class($boxed); ?>>
<?php zo_get_page_loading(); ?>
<div id="page" class="<?php zo_page_class(); ?>">
	<header id="masthead" class="site-header" role="banner">
		<?php zo_header(); ?>
	</header><!-- #masthead -->
    <?php zo_page_title(); ?>
	<div id="main">