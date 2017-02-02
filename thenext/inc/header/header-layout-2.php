<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : Fox
 */
global $smof_data, $zo_meta; 
?>
<div id="zo-header-wrap-static" 
	<?php 
		if ($zo_meta->_zo_enable_header_fixed) {
			echo 'class="zo-header-wrap-static-fixed"';
		}
	?>
>
	
	<!-- Header Top -->
	<div class="zo-header-row-atop">
		<div class="container">
			<div class="row ">
				<div id="zo-header-logo" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<a href="<?php echo esc_url(home_url()); ?>"><img alt="logo" src="<?php echo esc_url(zo_logo()); ?>"></a>
				</div>
				<div id="zo-header-contact" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<?php if ( is_active_sidebar( 'sidebar-header-top-h4' ) ) dynamic_sidebar('sidebar-header-top-h4'); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Header Top -->
	
	<!-- Navigation -->
	<div id="zo-header" class="zo-main-header zo-header-2 
	<?php if (!$smof_data['menu_sticky']) {
		echo 'no-sticky';
	} ?> <?php if ($smof_data['menu_sticky_tablets']) {
		echo 'sticky-tablets';
	} ?> <?php if ($smof_data['menu_sticky_mobile']) {
		echo 'sticky-mobile';
	} ?>
	<?php if (!empty($zo_meta->_zo_page_boxed)) {
			 echo 'zo-header-boxed';
		 } ?>
	 <?php if (!empty($zo_meta->_zo_enable_header_fixed)) {
		echo 'header-fixed-page';
	} ?> <?php if (!empty($zo_meta->_zo_enable_header_transparent)) {
		echo 'header-page-transparent';
	} ?>">
		<div class="no-container zo-header-row-below ">
			<div class="container">
				<div id="zo-header-navigation" class="col-xs-12 col-sm-9 col-md-9 col-lg-9 tablets-nav left">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php

						$attr = array(
							'menu' => zo_menu_location(),
							'menu_class' => 'nav-menu menu-main-menu',
						);

						$menu_locations = get_nav_menu_locations();

						if (!empty($menu_locations['primary'])) {
							$attr['theme_location'] = 'primary';
						}

						/* enable mega menu. */
						if (class_exists('HeroMenuWalker')) {
							$attr['walker'] = new HeroMenuWalker();
						}

						/* main nav. */
						wp_nav_menu($attr); ?>
					</nav>
				</div>
				<div id="zo-header-search" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<?php if (is_active_sidebar('sidebar-4')) { ?>
						<?php dynamic_sidebar('sidebar-4'); ?>
					<?php } ?>
				</div>
				<div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="pe-7s-menu"></i></div>
			</div>
		</div>
	</div>
	<!-- #site-navigation -->
</div>