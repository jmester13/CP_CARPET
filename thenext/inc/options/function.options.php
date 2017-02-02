<?php
global $zo_base;
/* get local fonts. */
$local_fonts = is_admin() ? $zo_base->getListLocalFontsName() : array() ;
/**
 * Home Options
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Main Options', 'thenext'),
    'icon' => 'el-icon-dashboard',
    'fields' => array(
        array(
            'id' => 'intro_product',
            'type' => 'intro_product',
        )
    )
);
/* Start Dummy Data*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$msg = $disabled = '';
if (!class_exists('WPBakeryVisualComposerAbstract') or !class_exists('ZoThemeCore') or !function_exists('cptui_create_custom_post_types')){
    $disabled = ' disabled ';
    $msg='You should be install visual composer, ZoTheme and Custom Post Type UI plugins to import data.';
}
$this->sections[] = array(
    'icon' => 'el-icon-briefcase',
    'title' => __('Demo Content', 'thenext'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => '<input type=\'button\' name=\'sample\' id=\'dummy-data\' '.$disabled.' value=\'Import Now\' /><div class=\'zo-dummy-process\'><div  class=\'zo-dummy-process-bar\'></div></div><div id=\'zo-msg\'><span class="zo-status"></span>'.$msg.'</div>',
            'id' => 'theme',
            'icon' => true,
            'default' => 'thenext',
            'options' => array(
                'thenext' => get_template_directory_uri().'/assets/images/dummy/thenext.jpg'
            ),
            'type' => 'image_select',
            'title' => 'Select Theme'
        )
    )
);
/* End Dummy Data*/
/**
 * Header Options
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Header', 'thenext'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => __('Layouts', 'thenext'),
            'subtitle' => __('select a layout for header', 'thenext'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/header/h-default.png', 
				'static' => get_template_directory_uri().'/inc/options/images/header/h-static.png'
            )
        ),
        array(
            'id'       => 'header_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Header Height', 'thenext'),
            'width' => false,
            'default'  => array(
                'height'  => '94px'
            ),
        ),
        array(
            'id' => 'header_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #zo-header'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'header_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #zo-header'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'subtitle' => __('Border Main header.', 'thenext'),
            'id' => 'enable_border_header',
            'type' => 'switch',
            'title' => __('Border Main Header', 'thenext'),
            'default' => true,
        ),
         array(
           'id'       => 'header_border',
           'color' =>false,
            'type'     => 'border',
            'all'     => false,
            'title'    => __('Header Border Option', 'thenext'),
            'subtitle' => __('Only color validation can be done on this field type', 'thenext'),
            'desc'     => __('This is the description field, again good for additional info.', 'thenext'),
            'default'  => array(
                'border-style'  => 'solid', 
                'border-top'    => '1px', 
                'border-right'  => '0px', 
                'border-bottom' => '1px', 
                'border-left'   => '0px'
            ),   
            'required' => array( 0 => 'enable_border_header', 1 => '=', 2 => 1 )
        ),
         array(
           'id'   => 'header_border_color',
           'type' => 'color_rgba',
            'title' => __('Border Color', 'thenext'),
            'default' => array('color'=>'#fff','alpha'=>'0.2', 'rgba'=>'rgba(255,255,255,0.2)'),
            'required' => array( 0 => 'enable_border_header', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu.', 'thenext'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => __('Sticky Header', 'thenext'),
            'default' => false,
        ),
        array(
            'id'       => 'menu_sticky_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Sticky Header Height', 'thenext'),
            'width' => false,
            'default'  => array(
                'height'  => '60px'
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
		array(
            'title' => __('Select Sticky Logo', 'thenext'),
            'subtitle' => __('Select an image file for your sticky logo.', 'thenext'),
            'id' => 'sticky_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-white.png'
            ),
			'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Tablets.', 'thenext'),
            'id' => 'menu_sticky_tablets',
            'type' => 'switch',
            'title' => __('Sticky Tablets', 'thenext'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Mobile.', 'thenext'),
            'id' => 'menu_sticky_mobile',
            'type' => 'switch',
            'title' => __('Sticky Mobile', 'thenext'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )
    )
);

/* Header Top */

$this->sections[] = array(
    'title' => __('Header Top', 'thenext'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable header top.', 'thenext'),
            'id' => 'enable_header_top',
            'type' => 'switch',
            'title' => __('Enable Header Top', 'thenext'),
            'default' => false,
        ),
        array(
            'id' => 'header_top_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #zo-header-top'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'header_top_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #zo-header-top'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        ),
    )
);

/* Logo */
$this->sections[] = array(
    'title' => __('Logo', 'thenext'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => __('Select Logo', 'thenext'),
            'subtitle' => __('Select an image file for your logo.', 'thenext'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),
        array(
            'id'       => 'main_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Logo Height', 'thenext'),
            'width' => false,
            'default'  => array(
                'height'  => '90px'
            ),
        ),
        array(
            'id'       => 'sticky_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Sticky Logo Height', 'thenext'),
            'width' => false,
            'default'  => array(
                'height'  => '60px'
            ),
        ),
    )
);

/* Menu */
$this->sections[] = array(
    'title' => __('Menu', 'thenext'),
    'icon' => 'el-icon-tasks',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Menu position.',
            'id' => 'menu_position',
            'options' => array(
                1 => 'Menu Left',
                2 => 'Menu Right',
            ),
            'type' => 'select',
            'title' => 'Menu Position',
            'default' => '2'
        ),
		array(
			'subtitle' => __('Top right bottom left, ex: 10 10 10 10', 'thenext'),
			'id' => 'menu_padding_first_level',
			'title' => __('Menu Padding - First Level','thenext'),
			'mode' => 'padding',
			'type' => 'spacing',
			'units' => array('px', 'em', '%'),
			'output' => array('#zo-header-navigation'),
			'default'            => array(
				'padding-top'     => '0',
				'padding-right'   => '52px', 
				'padding-bottom'  => '0',
				'padding-left'    => '0',
				'units'   => 'px', 
			)
		),
		
		array(
			'subtitle' => __('Top right bottom left, ex: 10 10 10 10', 'thenext'),
			'id' => 'menu_margin_first_level',
			'title' => __('Menu Margin - First Level','thenext'),
			'mode' => 'margin',
			'type' => 'spacing',
			'units' => array('px', 'em', '%'),
			'output' => array('#zo-header-navigation'),
			'default'            => array(
				'margin-top'     => '0',
				'margin-right'   => '0', 
				'margin-bottom'  => '0',
				'margin-left'    => '0',
				'units'   => 'px', 
			)
		),
		array(
			'id'          => 'menu_fontsize_first_level',
			'type'        => 'typography', 
			'title'       => __('Menu Font Size - First Level', 'thenext'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('#zo-header-navigation .main-navigation ul > li > a'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'thenext'),
			'font-style'  => false,
			'font-weight' => false,
			'font-family' => false,
			'text-align'  => false,
			'color'       => false,
			'line-height' => false,
			'default'     => array(
				'font-size'   => '14px',
			),
		),
		array(
			'id'          => 'menu_fontsize_sub_level',
			'type'        => 'typography', 
			'title'       => __('Menu Font Size - Sub Level', 'thenext'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('#zo-header-navigation .main-navigation ul ul li a'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'thenext'),
			'font-style'  => false,
			'font-weight' => false,
			'font-family' => false,
			'text-align'  => false,
			'color'       => false,
			'line-height' => false,
			'default'     => array(
				'font-size'   => '12px',
			),
		),
        array(
            'subtitle' => __('enable sub menu border bottom.', 'thenext'),
            'id' => 'menu_border_color_bottom',
            'type' => 'switch',
            'title' => __('Border Bottom Menu Item Sub Level', 'thenext'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Enable mega menu.', 'thenext'),
            'id' => 'menu_mega',
            'type' => 'switch',
            'title' => __('Mega Menu', 'thenext'),
            'default' => true,
        ),
        array(
            'subtitle' => __('Enable menu first level uppercase.', 'thenext'),
            'id' => 'menu_first_level_uppercase',
            'type' => 'switch',
            'title' => __('Menu First Level Uppercase', 'thenext'),
            'default' => false,
        ),
		
		array(
			'id'          => 'menu_icon_font_size',
			'type'        => 'typography', 
			'title'       => __('Menu Icon Font Size', 'thenext'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.zo-menu-icon'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'thenext'),
			'font-style'  => false,
			'font-weight' => false,
			'font-family' => false,
			'text-align'  => false,
			'color'       => false,
			'line-height' => true,
			'default'     => array(
				'font-size'   => '34px',
				'line-height' => '40px'
			),
		)
    )
);

/**
 * Page Title
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Page Title & BC', 'thenext'),
    'icon' => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id' => 'page_title_layout',
            'title' => __('Layouts', 'thenext'),
            'subtitle' => __('select a layout for page title', 'thenext'),
            'default' => '5',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
                '1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
                '2' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-2.png',
                '3' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-3.png',
                '4' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-4.png',
                '5' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-5.png',
                '6' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-6.png',
            )
        ),
        array(
            'id'       => 'page_title_opacity',
            'type'      => 'color_rgba',
		    'title'     => 'Background Overlay',
		    'subtitle'  => 'page title background with overlay.',
		    'default'   => array(
		        'color'     => '#000000',
		        'alpha'     => 0.5,
		    )    
        ),
        array(
            'id'       => 'page_title_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'thenext' ),
            'subtitle' => __( 'page title background with image, color, etc.', 'thenext' ),
            'output'   => array('.page-title'),
            'default'   => array(
                'background-color'=>'transparent',
                'background-image'=> get_template_directory_uri().'/assets/images/bg-page-title.jpg',
                'background-repeat'=>'no-repeat',
                'background-size'=>'cover',
                'background-position'=>'center top'
            )
        ),
		array(
            'id' => 'page_title_margin',
            'title' => 'Margin',
			'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'thenext'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body .page-title'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '86px',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'page_title_padding',
            'title' => 'Padding',
			'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'thenext'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body .page-title'),
            'default' => array(
                'padding-top'     => '230px',
                'padding-right'   => '0',
                'padding-bottom'  => '55px',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        )
    )
);
/* Page Title */
$this->sections[] = array(
    'icon' => 'el-icon-podcast',
    'title' => __('Page Title', 'thenext'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'page_title_typography',
            'type' => 'typography',
            'title' => __('Typography', 'thenext'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('.page-title #page-title-text h1'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'thenext'),
            'default' => array(
                'color' => '#fff',
                'font-style' => 'normal',
                'font-weight' => 'bold',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '36px',
                'line-height' => '36px',
                'text-align' => 'center'
            )
        ),
    )
);
/* Breadcrumb */
$this->sections[] = array(
    'icon' => 'el-icon-random',
    'title' => __('Breadcrumb', 'thenext'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('The text before the breadcrumb home.', 'thenext'),
            'id' => 'breacrumb_home_prefix',
            'type' => 'text',
            'title' => __('Breadcrumb Home Prefix', 'thenext'),
            'default' => 'Home'
        ),
        array(
            'id' => 'breacrumb_typography',
            'type' => 'typography',
            'title' => __('Typography', 'thenext'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('.page-title #breadcrumb-text','.page-title #breadcrumb-text ul li a'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'thenext'),
            'default' => array(
                'color' => '#fff',
                'font-style' => 'italic',
                'font-weight' => '400',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '18px',
                'line-height' => '24px',
                'text-align' => 'center'
            )
        ),
    )
);

/**
 * Body
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Body', 'thenext'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'subtitle' => __('Set layout boxed default(Wide).', 'thenext'),
            'id' => 'body_layout',
            'type' => 'switch',
            'title' => __('Boxed Layout', 'thenext'),
            'default' => false,
        ),
        array(
            'id'       => 'body_boxed_background',
            'type'     => 'background',
            'title'    => __( 'Background Boxed', 'thenext' ),
            'subtitle' => __( 'body boxed background with image, color, etc.', 'thenext' ),
            'output'   => array('body.boxed'),
			'default'  => array(
				'background-image' => get_template_directory_uri().'/assets/images/bg-boxed.jpg',
				'background-attachment' => 'fixed',
				'background-position' => 'center center',
				'background-size' => 'cover',
				'background-repeat' => 'no-repeat'
			),
			'required' => array( 0 => 'body_layout', 1 => '=', 2 => 1 )
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => __( 'Background Wide', 'thenext' ),
            'subtitle' => __( 'body background with image, color, etc.', 'thenext' ),
            'output'   => array('body'),
        ),
		array(
            'id' => 'body_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
		array(
            'id' => 'body_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        )
    )
);

/**
 * Content
 * 
 * Archive, Pages, Single, 404, Search, Category, Tags .... 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Content', 'thenext'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'container_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'thenext' ),
            'subtitle' => __( 'Container background with image, color, etc.', 'thenext' ),
            'output'   => array('#main'),
        ),
		array(
            'id' => 'container_margin',
            'title' => 'Margin',
			'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'thenext'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('#main'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
		array(
            'id' => 'container_padding',
            'title' => 'Padding',
			'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'thenext'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('#main'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        )
    )
);

/**
 * Page Loadding
 * 
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Page Loadding', 'thenext'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable page loadding.', 'thenext'),
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'title' => __('Enable Page Loadding', 'thenext'),
            'default' => false,
        ),
        array(
            'subtitle' => 'Select Style Page Loadding.',
            'id' => 'page_loadding_style',
            'type' => 'select',
            'options' => array(
                '1' => 'Style 1',
                '2' => 'Style 2'
            ),
            'title' => 'Page Loadding Style',
            'default' => 'style-1',
            'required' => array( 0 => 'enable_page_loadding', 1 => '=', 2 => 1 )
        )     
    )
);

/**
 * Footer
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Footer', 'thenext'),
    'icon' => 'el-icon-credit-card',
);

/* Footer top */
$this->sections[] = array(
    'title' => __('Footer Top', 'thenext'),
    'icon' => 'el-icon-fork',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable footer top.', 'thenext'),
            'id' => 'enable_footer_top',
            'type' => 'switch',
            'title' => __('Enable Footer Top', 'thenext'),
            'default' => true,
        ),
        array(
            'id'       => 'footer_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'thenext' ),
            'subtitle' => __( 'footer background with image, color, etc.', 'thenext' ),
            'output'   => array('footer #zo-footer-top'),
            'default'   => array(
                'background-color'=>'#0e0e0e'
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
		array(
            'id' => 'footer_margin',
            'title' => 'Margin',
			'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'thenext'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('footer #zo-footer-top'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
		array(
            'id' => 'footer_padding',
            'title' => 'Padding',
			'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'thenext'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('footer #zo-footer-top'),
            'default' => array(
                'padding-top'     => '65px',
                'padding-right'   => '0',
                'padding-bottom'  => '10px',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        )
    )
);

/* footer botton */

$this->sections[] = array(
    'title' => __('Footer Bottom', 'thenext'),
    'icon' => 'el-icon-bookmark',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable footer bottom.', 'thenext'),
            'id' => 'enable_footer_bottom',
            'type' => 'switch',
            'title' => __('Enable Footer Bottom', 'thenext'),
            'default' => true,
        ),
        array(
            'id'       => 'footer_botton_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'thenext' ),
            'subtitle' => __( 'background with image, color, etc.', 'thenext' ),
            'output'   => array('footer #zo-footer-bottom'),
            'default'   => array(
				'background-color' => '#000'
			),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
		array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'thenext'),
            'id' => 'footer_botton_margin',
            'type' => 'spacing',
            'title' => 'Margin',
            'units' => 'px',
			'mode' => 'margin',
            'output' => '#zo-footer-bottom',
            'default'            => array(
                'margin-top'     => '', 
                'margin-right'   => '', 
                'margin-bottom'  => '', 
                'margin-left'    => '',
                'units' => 'px'
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'thenext'),
            'id' => 'footer_botton_padding',
            'type' => 'spacing',
            'title' => 'Padding',
            'units' => 'px',
			'mode' => 'padding',
            'output' => '#zo-footer-bottom',
            'default'            => array(
                'padding-top'     => '24px', 
                'padding-right'   => '0px', 
                'padding-bottom'  => '24px', 
                'padding-left'    => '0px',
                'units' => 'px'
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
/*========== Footer bottom border ======*/
        array(
                'subtitle' => __('Border Footer Bottom.', 'thenext'),
                'id' => 'enable_border_footer_bottom',
                'type' => 'switch',
                'title' => __('Border Footer Bottom', 'thenext'),
                'default' => true,
            ),
        array(
            'id'       => 'footer_bottom_border',
            'color' =>false,
            'type'     => 'border',
            'all'     => false,
            'title'    => __('Footer Bottom Border', 'thenext'),
            'subtitle' => __('Only color validation can be done on this field type', 'thenext'),
            'desc'     => __('This is the description field, again good for additional info.', 'thenext'),
			'output' => '#zo-footer-bottom',
            'default'  => array(
                'border-style'  => 'solid', 
                'border-top'    => '1px', 
                'border-right'  => '0px', 
                'border-bottom' => '0px', 
                'border-left'   => '0px'
            ),   
            'required' => array( 0 => 'enable_border_footer_bottom', 1 => '=', 2 => 1 )
        ),
         array(
            'id'   => 'footer_bottom_border_color',
            'type' => 'color_rgba',
            'title' => __('Border Color', 'thenext'),
            'default' => array('color'=>'#fff','alpha'=>'0.2', 'rgba'=>'rgba(255,255,255,0.2)'),
            'required' => array( 0 => 'enable_border_footer_bottom', 1 => '=', 2 => 1 )
        ),
/* ========= End footer bottom border ======*/
        array(
            'subtitle' => __('enable button back to top.', 'thenext'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => __('Back To Top', 'thenext'),
            'default' => true,
        )
    )
);

/**
 * Button Option
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Button', 'thenext'),
    'icon' => 'el el-bold',
    'fields' => array(
        array(
            'subtitle' => __('Enable button uppercase.', 'thenext'),
            'id' => 'button_text_uppercase',
            'type' => 'switch',
            'title' => __('Button Text Uppercase', 'thenext'),
            'default' => true,
        )
    )
);

/* Button Default */
$this->sections[] = array(
    'icon' => 'el el-minus',
    'title' => __('Button Default', 'thenext'),
    'subsection' => true,
    'fields' => array(
		array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px, use: .btn-default', 'thenext'),
            'id' => 'btn_default_padding',
            'type' => 'spacing',
            'title' => 'Padding',
            'units' => 'px',
			'mode' => 'padding',
            'output' => '.btn-default',
            'default'            => array(
                'padding-top'     => '15px', 
                'padding-right'   => '30px', 
                'padding-bottom'  => '15px', 
                'padding-left'    => '30px',
                'units' => 'px'
            ),
        ),
		array(
            'id'       => 'btn_default_border_width',
            'color' =>false,
            'type'     => 'border',
            'all'     => false,
            'title'    => __('Footer Bottom Border Option', 'thenext'),
            'subtitle' => __('Only color validation can be done on this field type', 'thenext'),
            'desc'     => __('This is the description field, again good for additional info.', 'thenext'),
			'output' => '.btn-default',
            'default'  => array(
                'border-style'  => 'solid', 
                'border-top'    => '1px', 
                'border-right'  => '1px', 
                'border-bottom' => '1px', 
                'border-left'   => '1px'
            )
        ),
        array(
            'id'       => 'btn_default_border_radius',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Button Default - Border Radius','thenext'),
            'width' => false,
            'default'  => array(
                'height'  => '4px'
            ),
        ),
    )
);

/**
 * Styling
 * 
 * css color.
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Styling', 'thenext'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => __('set color main color.', 'thenext'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => __('Primary Color', 'thenext'),
            'default' => '#efbd07'
        ),
        array(
            'subtitle' => __('set color for tags <a></a>.', 'thenext'),
            'id' => 'link_color',
            'type' => 'color',
            'title' => __('Link Color', 'thenext'),
            'output'  => array('a'),
            'default' => '#ffdd00'
        ),
        array(
            'subtitle' => __('set color for tags <a></a>.', 'thenext'),
            'id' => 'link_color_hover',
            'type' => 'color',
            'title' => __('Link Color Hover', 'thenext'),
            'output'  => array('a:hover'),
            'default' => '#efbd07'
        )
    )
);

/** Header Top Color **/
$this->sections[] = array(
    'title' => __('Header Top Color', 'thenext'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set background color header top.', 'thenext'),
            'id' => 'bg_header_top_color',
            'type' => 'color_rgba',
            'transparent' => true,
            'title' => __('Background Color', 'thenext'),
            'default' => array('color'=>'#000','alpha'=>'0.5', 'rgba'=>'rgba(0,0,0,0.5)')
        ),
        array(
            'subtitle' => __('Set color header top.', 'thenext'),
            'id' => 'header_top_color',
            'type' => 'color',
            'title' => __('Font Color', 'thenext'),
            'default' => '#fff'
        )
    )
);

/** Header Main Color **/
$this->sections[] = array(
    'title' => __('Header Main Color', 'thenext'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('set color for header background color.', 'thenext'),
            'id' => 'bg_header',
            'type' => 'color_rgba',
            'title' => __('Header Background Color', 'thenext'),
            'default' => array('color'=>'#000','alpha'=>'0.5', 'rgba'=>'rgba(0,0,0,0.5)')
        )
    )
);

/** Sticky Header Color **/
$this->sections[] = array(
    'title' => __('Sticky Header', 'thenext'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
		array(
            'subtitle' => __('set color for sticky header.', 'thenext'),
            'id' => 'bg_sticky_header',
            'type' => 'color_rgba',
            'title' => __('Sticky Background Color', 'thenext'),
            'default' => array('color'=>'#000000','alpha'=>'0.8', 'rgba'=>'rgba(0,0,0,0.8)'),
			'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 ),
        ),
    )
);

/** Menu Color **/

$this->sections[] = array(
    'title' => __('Menu Color', 'thenext'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Controls the text color of first level menu items.', 'thenext'),
            'id' => 'menu_color_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color - First Level', 'thenext'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', 'thenext'),
            'id' => 'menu_color_hover_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color Hover - First Level', 'thenext'),
            'default' => '#efbd07'
        ),
        array(
            'subtitle' => __('Controls the text active color of first level menu items.', 'thenext'),
            'id' => 'menu_color_active_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color Active - First Level', 'thenext'),
            'default' => '#efbd07'
        ),
        array(
            'subtitle' => __('Controls the text hover color of sticky menu items.', 'thenext'),
            'id' => 'menu_color_sticky',
            'type' => 'color',
            'title' => __('Menu Sticky Font Color', 'thenext'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => __('Controls the text color of sub level menu items.', 'thenext'),
            'id' => 'menu_color_sub_level',
            'type' => 'color',
            'title' => __('Menu Font Color - Sub Level', 'thenext'),
            'default' => '#000000'
        ),
        array(
            'subtitle' => __('Controls the text hover color of sub level menu items.', 'thenext'),
            'id' => 'menu_color_hover_sub_level',
            'type' => 'color',
            'title' => __('Menu Font Color Hover - Sub Level', 'thenext'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => __('Controls the text background color of sub level menu items.', 'thenext'),
            'id' => 'menu_bg_color_sub_level',
            'type' => 'color',
            'title' => __('Menu Background Color - Sub Level', 'thenext'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => __('Controls the text background color hover of sub level menu items.', 'thenext'),
            'id' => 'menu_bg_color_hover_sub_level',
            'type' => 'color',
            'title' => __('Menu Background Color Hover - Sub Level', 'thenext'),
            'default' => '#efbd07'
        ),
        array(
            'subtitle' => __('Controls the border color of sub level menu items.', 'thenext'),
            'id' => 'menu_item_border_color',
            'type' => 'color',
            'title' => __('Border Color - Sub Level', 'thenext'),
            'default' => '',
            'required' => array( 0 => 'menu_border_color_bottom', 1 => '=', 2 => 1 )
        )
    )
);

/** Button Color **/

$this->sections[] = array(
    'title' => __('Button Color', 'thenext'),
    'icon' => 'el el-bold',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Controls the button text color.', 'thenext'),
            'id' => 'btn_default_color',
            'type' => 'color',
            'title' => __('Button Default - Font Color', 'thenext'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Controls the button text hover color.', 'thenext'),
            'id' => 'btn_default_color_hover',
            'type' => 'color',
            'title' => __('Button Default - Font Color Hover', 'thenext'),
            'default' => '#000000'
        ),
        array(
            'subtitle' => __('Controls the button background color.', 'thenext'),
            'id' => 'btn_default_bg_color',
            'type' => 'color',
            'title' => __('Button Default - Background Color', 'thenext'),
            'default' => 'transparent'
        ),
        array(
            'subtitle' => __('Controls the button background color.', 'thenext'),
            'id' => 'btn_default_bg_color_hover',
            'type' => 'color',
            'title' => __('Button Default - Background Color Hover', 'thenext'),
            'default' => 'transparent'
        ),
        array(
            'subtitle' => __('Controls the button border color.', 'thenext'),
            'id' => 'btn_default_border_color',
            'type' => 'color',
            'title' => __('Button Default - Border Color', 'thenext'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Controls the button border hover color.', 'thenext'),
            'id' => 'btn_default_border_color_hover',
            'type' => 'color',
            'title' => __('Button Default - Border Color Hover', 'thenext'),
            'default' => '#000000'
        )
    )
);

/** Footer Top Color **/
$this->sections[] = array(
    'title' => __('Footer Top Color', 'thenext'),
    'icon' => 'el-icon-chevron-up',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set color footer top.', 'thenext'),
            'id' => 'footer_top_color',
            'type' => 'color',
            'title' => __('Footer Top Color', 'thenext'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Set title color footer top.', 'thenext'),
            'id' => 'footer_headding_color',
            'type' => 'color',
            'title' => __('Footer Headding Color', 'thenext'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Set title link color footer top.', 'thenext'),
            'id' => 'footer_top_link_color',
            'type' => 'color',
            'title' => __('Footer Link Color', 'thenext'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Set title link color footer top.', 'thenext'),
            'id' => 'footer_top_link_color_hover',
            'type' => 'color',
            'title' => __('Footer Link Color Hover', 'thenext'),
            'default' => '#ffffff'
        )
    )
);

/** Footer Bottom Color **/
$this->sections[] = array(
    'title' => __('Footer Bottom Color', 'thenext'),
    'icon' => 'el-icon-chevron-down',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set color footer bottom.', 'thenext'),
            'id' => 'footer_bottom_color',
            'type' => 'color',
            'title' => __('Footer Bottom Color', 'thenext'),
            'default' => ''
        )
    )
);

/**
 * Typography
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Typography', 'thenext'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => __('Body Font', 'thenext'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'default' => array(
                'color' => '#9c9c9c',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '24px',
                'text-align' => ''
            ),
            'subtitle' => __('Typography option with each property can be called individually.', 'thenext'),
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => __('H1', 'thenext'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h1'),
            'units' => 'px',
            'default' => array(
                'color' => '#4d4f50',
                'font-style' => 'bold',
                'font-weight' => '900',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '40px',
                'line-height' => '50px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => __('H2', 'thenext'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h2'),
            'units' => 'px',
            'default' => array(
                'color' => '#4d4f50',
                'font-style' => 'Bold',
                'font-weight' => '700',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '35px',
                'line-height' => '40px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => __('H3', 'thenext'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h3'),
            'units' => 'px',
            'default' => array(
                'color' => '#4d4f50',
                'font-style' => 'normal',
                'font-weight' => '',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '20px',
                'line-height' => '25px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => __('H4', 'thenext'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h4'),
            'units' => 'px',
            'default' => array(
                'color' => '#4d4f50',
                'font-style' => 'normal',
                'font-weight' => '',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '18px',
                'line-height' => '25px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => __('H5', 'thenext'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h5'),
            'units' => 'px',
            'default' => array(
                'color' => '#4d4f50',
                'font-style' => 'normal',
                'font-weight' => '',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '16px',
                'line-height' => '25px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => __('H6', 'thenext'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h6'),
            'units' => 'px',
            'default' => array(
                'color' => '#4d4f50',
                'font-style' => 'normal',
                'font-weight' => '',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '25px',
                'text-align' => ''
            )
        )
    )
);

/* extra font. */
$this->sections[] = array(
    'title' => __('Extra Fonts', 'thenext'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => __('Font 1', 'thenext'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '700',
                'font-family' => 'Dosis'
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => __('Selector 1', 'thenext'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'thenext'),
            'validate' => 'no_html',
            'default' => 'body .btn, #secondary .wg-title, #comments .comments-title, #comments .comment-reply-title, .zo-recent-post-wrapper .zo-recent-details .title',
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => __('Font 2', 'thenext'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '700',
                'font-family' => 'Amatic SC'
            )
        ),
        array(
            'id' => 'google-font-selector-2',
            'type' => 'textarea',
            'title' => __('Selector 2', 'thenext'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'thenext'),
            'validate' => 'no_html',
            'default' => '#zo-footer-top .wg-title',
        ),
    )
);

/* local fonts. */
$this->sections[] = array(
    'title' => __('Local Fonts', 'thenext'),
    'icon' => 'el-icon-bookmark',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'local-fonts-1',
            'type'     => 'select',
            'title'    => __( 'Fonts 1', 'thenext' ),
            'options'  => $local_fonts,
            'default'  => 'MyriadPro-Semibold',
        ),
        array(
            'id' => 'local-fonts-selector-1',
            'type' => 'textarea',
            'title' => __('Selector 1', 'thenext'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'thenext'),
            'validate' => 'no_html',
            'default' => '.zo-pricing-wrapper .zo-pricing-content ul li span',
            'required' => array(
                0 => 'local-fonts-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id'       => 'local-fonts-2',
            'type'     => 'select',
            'title'    => __( 'Fonts 2', 'thenext' ),
            'options'  => $local_fonts,
            'default'  => '',
        ),
        array(
            'id' => 'local-fonts-selector-2',
            'type' => 'textarea',
            'title' => __('Selector 2', 'thenext'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'thenext'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-2',
                1 => '!=',
                2 => ''
            )
        )
    )
);

/**
 * Custom CSS
 * 
 * extra css for customer.
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Custom CSS', 'thenext'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => __('CSS Code', 'thenext'),
            'subtitle' => __('create your css code here.', 'thenext'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);
/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Animations', 'thenext'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => __('Enable animation mouse scroll...', 'thenext'),
            'id' => 'smoothscroll',
            'type' => 'switch',
            'title' => __('Smooth Scroll', 'thenext'),
            'default' => false
        ),
        array(
            'subtitle' => __('Enable animation parallax for images...', 'thenext'),
            'id' => 'paralax',
            'type' => 'switch',
            'title' => __('Images Paralax', 'thenext'),
            'default' => true
        ),
    )
);
/**
 * Optimal Core
 * 
 * Optimal options for theme. optimal speed
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Optimal Core', 'thenext'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => __('no minimize , generate css over time...', 'thenext'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => __('Dev Mode (not recommended)', 'thenext'),
            'default' => false
        )
    )
);
