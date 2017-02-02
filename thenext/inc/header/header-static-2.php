<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : Fox
 */
?>
<?php global $smof_data, $zo_meta; 
?>
<div id="zo-header-wrap-static" 
	<?php 
		if ($zo_meta->_zo_enable_header_fixed) {
			echo 'class="zo-header-wrap-static-fixed"';
		}
	?>
>

    <!-- Header Top -->
	<div id="zo-header-top" class="zo-header-top-black">
		<div class="container">
			<div class="row">
				<div class="container">
					<div class="zo-header-top-left col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php if ( is_active_sidebar( 'sidebar-2' ) ) dynamic_sidebar('sidebar-2'); ?></div>
					<div class="zo-header-top-right col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php if ( is_active_sidebar( 'sidebar-3' ) ) dynamic_sidebar('sidebar-3'); ?></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Header Top -->
	
	<!-- Navigation -->	
    <div id="zo-header" class="zo-main-header 
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
        <div class="container">
            <div class="row">
                <div id="zo-header-logo" class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                    <a href="<?php echo esc_url(home_url()); ?>" class="zo-header-wrap-logo">
						<img alt="<?php _e('Logo','thenext'); ?>" src="<?php echo esc_url(zo_logo()); ?>" class="main-logo">
						<img alt="<?php _e('Sticky Logo','thenext'); ?>" src="<?php echo esc_url(zo_sticky_logo()); ?>" class="sticky-logo">
					</a>
                </div>
                <div id="zo-header-navigation" class="col-xs-12 col-sm-9 col-md-10 col-lg-10 tablets-nav">
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

                <?php if (is_active_sidebar('sidebar-4')) { ?>
                    <div id="zo-header-icon">
                        <?php dynamic_sidebar('sidebar-4'); ?>
                    </div>
                <?php } ?>

                <div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="pe-7s-menu"></i></div>
            </div>
        </div>
    </div>
    <!-- #site-navigation -->
</div>
