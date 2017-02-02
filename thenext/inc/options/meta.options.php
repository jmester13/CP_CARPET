<?php

/**
 * Meta options
 * 
 * @author Fox
 * @since 1.0.0
 */
class ZOMetaOptions {

    public function __construct() {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
    }

    /* add script */

    function admin_script_loader() {
        global $pagenow;
        if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');

            wp_enqueue_script('easytabs', get_template_directory_uri() . '/inc/options/js/jquery.easytabs.min.js');
            wp_enqueue_script('metabox', get_template_directory_uri() . '/inc/options/js/metabox.js');
        }
    }

    /* add meta boxs */

    public function add_meta_boxes() {
        $this->add_meta_box('template_page_options', __('Setting', 'thenext'), 'page');
        $this->add_meta_box('rating_option', __('Testimonial Rating', 'thenext'), 'testimonial');
        $this->add_meta_box('pricing_option', __('Pricing Option', 'thenext'), 'pricing');
        $this->add_meta_box('donation_option', __('Donation Option', 'thenext'), 'zodonations');
        $this->add_meta_box('event_option', __('Event Option', 'thenext'), 'event');
        $this->add_meta_box('team_option', __('Member Info', 'thenext'), 'team');
        $this->add_meta_box('client_option', __('Client Info', 'thenext'), 'client');
        $this->add_meta_box('portfolio_option', __('Project Info', 'thenext'), 'portfolio');
    }

    public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default') {
        add_meta_box('_zo_' . $id, $label, array($this, $id), $post_type, $context, $priority);
    }

    /* --------------------- PAGE ---------------------- */

    function template_page_options() {
        ?>
        <div class="tab-container clearfix">
            <ul class='etabs clearfix'>
                <li class="tab"><a href="#tabs-general"><i class="fa fa-server"></i><?php _e('General', 'thenext'); ?></a></li>
                <li class="tab"><a href="#tabs-header"><i class="fa fa-diamond"></i><?php _e('Header', 'thenext'); ?></a></li>
                <li class="tab"><a href="#tabs-page-title"><i class="fa fa-connectdevelop"></i><?php _e('Page Title', 'thenext'); ?></a></li>
                <li class="tab"><a href="#tabs-page-background"><i class="fa fa-connectdevelop"></i><?php _e('Page Background', 'thenext'); ?></a></li>
            </ul>
            <div class='panel-container'>
                <div id="tabs-general">
                    <?php
                    zo_options(array(
                        'id' => 'full_width',
                        'label' => __('Full Width', 'thenext'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                    ));
                    zo_options(array(
                        'id' => 'page_boxed',
                        'label' => __('Page Boxed', 'thenext'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                        'follow' => array('1' => array('#enable_page_boxed_background'))
                    ));
                    ?><div id="enable_page_boxed_background"><?php
                        zo_options(array(
							'id' => 'page_boxed_background',
							'label' => __('Choose Background:', 'thenext'),
							'type' => 'image'
						));
					?>
                    </div>
                </div>
                <div id="tabs-header">
                    <?php
                    /* Header.Border */
                    zo_options(array(
                        'id' => 'header_border',
                        'label' => __('Header Border', 'thenext'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                        'follow' => array('1' => array('#header_border_enable'))
                    ));
                    ?><div id="header_border_enable"><?php
                        zo_options(array(
                            'id' => 'header_border_top',
                            'label' => __('Border Top', 'thenext'),
                            'type' => 'switch',
                            'options' => array('on' => '1', 'off' => ''),
                            'follow' => array('1' => array('#header_border_top_enable'))
                        ));
                    ?> <div id="header_border_top_enable"><?php
                        zo_options(array(
                            'id' => 'header_border_top_width',
                            'label' => __('Border Width (Unit pixcel)', 'thenext'),
                            'type' => 'text',
                            'default' => '1px'
                        ));
                        zo_options(array(
                            'id' => 'header_border_top_color',
                            'label' => __('Border Color', 'thenext'),
                            'type' => 'color',
                            'default' => '',
                            'rgba' => true
                        ));
                    ?></div><?php
                        zo_options(array(
                            'id' => 'header_border_left',
                            'label' => __('Border Left', 'thenext'),
                            'type' => 'switch',
                            'options' => array('on' => '1', 'off' => ''),
                            'follow' => array('1' => array('#header_border_left_enable'))
                        ));
                    ?> <div id="header_border_left_enable"><?php
                        zo_options(array(
                            'id' => 'header_border_left_width',
                            'label' => __('Border Width (Unit pixcel)', 'thenext'),
                            'type' => 'text',
                            'default' => '1px'
                        ));
                        zo_options(array(
                            'id' => 'header_border_left_color',
                            'label' => __('Border Color', 'thenext'),
                            'type' => 'color',
                            'default' => '',
                            'rgba' => true
                        ));
                    ?></div><?php
                        zo_options(array(
                            'id' => 'header_border_bottom',
                            'label' => __('Border Bottom', 'thenext'),
                            'type' => 'switch',
                            'options' => array('on' => '1', 'off' => ''),
                            'follow' => array('1' => array('#header_border_bottom_enable'))
                        ));
                    ?> <div id="header_border_bottom_enable"><?php
                        zo_options(array(
                            'id' => 'header_border_bottom_width',
                            'label' => __('Border Width (Unit pixcel)', 'thenext'),
                            'type' => 'text',
                            'default' => '1px'
                        ));
                        zo_options(array(
                            'id' => 'header_border_bottom_color',
                            'label' => __('Border Color', 'thenext'),
                            'type' => 'color',
                            'default' => '',
                            'rgba' => true
                        ));
                    ?></div><?php
                        zo_options(array(
                            'id' => 'header_border_right',
                            'label' => __('Border Right', 'thenext'),
                            'type' => 'switch',
                            'options' => array('on' => '1', 'off' => ''),
                            'follow' => array('1' => array('#header_border_right_enable'))
                        ));
                    ?> <div id="header_border_right_enable"><?php
                        zo_options(array(
                            'id' => 'header_border_right_width',
                            'label' => __('Border Width (Unit pixcel)', 'thenext'),
                            'type' => 'text',
                            'default' => '1px'
                        ));
                        zo_options(array(
                            'id' => 'header_border_right_color',
                            'label' => __('Border Color', 'thenext'),
                            'type' => 'color',
                            'default' => '',
                            'rgba' => true
                        ));
                    ?></div>
                    </div>
                    <?php
                    /* header. */
                    zo_options(array(
                        'id' => 'header',
                        'label' => __('Header', 'thenext'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                        'follow' => array('1' => array('#page_header_enable'))
                    ));
                    ?>  <div id="page_header_enable"><?php
					
                    zo_options(array(
                        'id' => 'header_layout',
                        'label' => __('Choose Layout:', 'thenext'),
                        'type' => 'imegesselect',
                        'options' => array(
                            '' => get_template_directory_uri() . '/inc/options/images/header/h-default.png',
							'layout-2' => get_template_directory_uri() . '/inc/options/images/header/h-layout-2.png',
							'static' => get_template_directory_uri().'/inc/options/images/header/h-static.png',
							'static-2' => get_template_directory_uri().'/inc/options/images/header/h-static-2.png',
							'static-3' => get_template_directory_uri().'/inc/options/images/header/h-static-3.png',
                        )
                    ));
                    zo_options(array(
                        'id' => 'header_logo',
                        'label' => __('Choose Logo:', 'thenext'),
                        'type' => 'image'
                    ));
					zo_options(array(
						'id' => 'header_menu_bg_color',
						'label' => __('Background Header Menu', 'thenext'),
						'type' => 'color',
						'rgba' => true
					));
					zo_options(array(
                        'id' => 'header_menu_color',
                        'label' => __('Header Menu Color - First Level', 'thenext'),
                        'type' => 'color',
                        'default' => '#000'
                    ));
                    zo_options(array(
                        'id' => 'header_menu_color_hover',
                        'label' => __('Header Menu Hover Color - First Level', 'thenext'),
                        'type' => 'color',
                        'default' => '#efbd07'
                    ));
                    zo_options(array(
                        'id' => 'header_menu_color_active',
                        'label' => __('Header Menu Active - First Level', 'thenext'),
                        'type' => 'color',
                        'default' => '#efbd07'
                    ));
                    zo_options(array(
                        'id' => 'enable_header_transparent',
                        'label' => __('Header Transparent', 'thenext'),
                        'type' => 'switch',
                        'default' => 0,
                        'options' => array('on' => '1', 'off' => ''),
                        'follow' => array('1' => array('#page_header_transparent_enable'))
                    ));
                    ?> <div id="page_header_transparent_enable"><?php
                    zo_options(array(
                        'id' => 'header_transparent_menu_color',
                        'label' => __('Menu Color - First Level', 'thenext'),
                        'type' => 'color',
                        'default' => '#fff'
                    ));
                    zo_options(array(
                        'id' => 'header_transparent_menu_color_hover',
                        'label' => __('Menu Hover Color - First Level', 'thenext'),
                        'type' => 'color',
                        'default' => '#efbd07'
                    ));
                    zo_options(array(
                        'id' => 'header_transparent_menu_color_active',
                        'label' => __('Menu Active - First Level', 'thenext'),
                        'type' => 'color',
                        'default' => '#efbd07'
                    ));
                    ?> </div><?php
                    zo_options(array(
                        'id' => 'enable_header_fixed',
                        'label' => __('Header Fixed', 'thenext'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => '0'),
                        'follow' => array('1' => array('#page_header_fixed_enable'))
                    ));
                    ?> <div id="page_header_fixed_enable"><?php
                        zo_options(array(
                            'id' => 'header_fixed_bg_color',
                            'label' => __('Background Color', 'thenext'),
                            'type' => 'color',
                            'rgba' => true
                        ));
                        zo_options(array(
                            'id' => 'header_fixed_menu_color',
                            'label' => __('Menu Color - First Level', 'thenext'),
                            'type' => 'color',
                        ));
                        zo_options(array(
                            'id' => 'header_fixed_menu_color_hover',
                            'label' => __('Menu Hover Color - First Level', 'thenext'),
                            'type' => 'color',
                        ));
                        zo_options(array(
                            'id' => 'header_fixed_menu_color_active',
                            'label' => __('Menu Active - First Level', 'thenext'),
                            'type' => 'color',
                        ));
                        ?> </div><?php
                        $menus = array();
                        $menus[''] = 'Default';
                        $obj_menus = wp_get_nav_menus();
                        foreach ($obj_menus as $obj_menu) {
                            $menus[$obj_menu->term_id] = $obj_menu->name;
                        }
                        $navs = get_registered_nav_menus();
                        foreach ($navs as $key => $mav) {
                            zo_options(array(
                                'id' => $key,
                                'label' => $mav,
                                'type' => 'select',
                                'options' => $menus
                            ));
                        }
                        ?>
                    </div>
                </div>
				
                <div id="tabs-page-title">
                    <?php
                    /* page title. */
                    zo_options(array(
                        'id' => 'page_title',
                        'label' => __('Page Title', 'thenext'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                        'follow' => array('1' => array('#page_title_enable'))
                    ));
                    ?>  <div id="page_title_enable"><?php
                    zo_options(array(
                        'id' => 'page_title_text',
                        'label' => __('Title', 'thenext'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_sub_text',
                        'label' => __('Sub Title', 'thenext'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_margin',
                        'label' => __('Page Title Margin', 'thenext'),
                        'type' => 'text', 
                    ));
                     zo_options(array(
                        'id' => 'page_title_align',
                        'label' => __('Page Title Text Align', 'thenext'),
                        'type' => 'select',
                        'options' => array(
                        	'left'=>'Left',
                        	'right'=>'Right',
                        	'center'=>'Center',
                        )
                    ));
                    zo_options(array(
                        'id' => 'page_title_type',
                        'label' => __('Layout', 'thenext'),
                        'type' => 'imegesselect',
                        'options' => array(
                            '' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-0.png',
                            '1' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-1.png',
                            '2' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-2.png',
                            '3' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-3.png',
                            '4' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-4.png',
                            '5' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-5.png',
                            '6' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-6.png',
                        )
                    ));
                    zo_options(array(
                        'id' => 'page_title_background',
                        'label' => __('Choose Background:', 'thenext'),
                        'type' => 'image'
                    ));
                    ?>
                    </div>
                </div> 
                <div id="tabs-page-background">
                    <?php zo_options(array(
                        'id' => 'page_background',
                        'label' => __('Page Background', 'thenext'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                        'follow' => array('1' => array('#page_background_enable'))
                    ));
                    ?><div id="page_background_enable">
                        <?php zo_options(array(
                            'id' => 'page_background_image',
                            'label' => __('Choose Background:', 'thenext'),
                            'type' => 'image'
                        ));
                        zo_options(array(
                            'id' => 'page_background_color',
                            'label' => __('Background Color', 'thenext'),
                            'type' => 'color',
                            'default' => '',
                            'rgba' => true
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /* --------------------- RATING TESTIMONIAL ---------------------- */

    function rating_option() {
        ?>
        <div class="testimonial-rating">
            <?php
            zo_options(array(
                'id' => 'testimonial_rating',
                'label' => __('Rating', 'thenext'),
                'type' => 'select',
                'options' => array(
                    '' => 'None',
                    '1star' => '1 Start',
                    '2star' => '2 Start',
                    '3star' => '3 Start',
                    '4star' => '4 Start',
                    '5star' => '5 Start'
                )
            ));
            ?>
        </div>
        <?php
    }

    /* --------------------- PRICING ---------------------- */

    function pricing_option() {
        ?>
        <div class="pricing-option-wrap">
            <table class="wp-list-table widefat fixed">
                <tr>
                    <td>
                        <?php
						zo_options(array(
                            'id' => 'background',
                            'label' => __('Background Title','thenext'),
                            'type' => 'image',
                        ));
						zo_options(array(
                            'id' => 'subtitle',
                            'label' => __('Sub Title','thenext'),
                            'type' => 'text',
                        ));
                        zo_options(array(
                            'id' => 'price',
                            'label' => __('Price','thenext'),
                            'type' => 'text',
                        ));
						
						zo_options(array(
                            'id' => 'hot',
                            'label' => __('Hot','thenext'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                        ));

                        zo_options(array(
                            'id' => 'value',
                            'label' => __('Value','thenext'),
                            'type' => 'select',
                            'options' => array(
                                'Monthly' => 'Monthly',
                                'Year' => 'Year'
                            )
                        ));

                        zo_options(array(
                            'id' => 'icon_font',
                            'label' => __('Icon Font','thenext'),
                            'type' => 'icon'
                        ));

                        zo_options(array(
                            'id' => 'icon_image',
                            'label' => __('Icon Image','thenext'),
                            'type' => 'image'
                        ));

                        zo_options(array(
                            'id' => 'button_url',
                            'label' => __('Button Url','thenext'),
                            'type' => 'text',
                        ));

                        zo_options(array(
                            'id' => 'button_text',
                            'label' => __('Button Text','thenext'),
                            'type' => 'text',
                        ));

                        zo_options(array(
                            'id' => 'is_feature',
                            'label' => __('Is feature','thenext'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                        )); ?>
                    </td>
                    <td>
                        <div class="zo_metabox_group">
                            <?php
                            zo_options(array(
                                'id' => 'option1',
                                'label' => __('Option 1','thenext'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            zo_options(array(
                                'id' => 'option1_feature',
                                'label' => __('Option 1 Feature','thenext'),
                                'type' => 'switch',
                                'options' => array('on'=>'1','off'=>''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="zo_metabox_group">
                            <?php
                            zo_options(array(
                                'id' => 'option2',
                                'label' => __('Option 2', 'thenext'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            zo_options(array(
                                'id' => 'option2_feature',
                                'label' => __('Option 2 Feature', 'thenext'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="zo_metabox_group">
                            <?php
                            zo_options(array(
                                'id' => 'option3',
                                'label' => __('Option 3', 'thenext'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            zo_options(array(
                                'id' => 'option3_feature',
                                'label' => __('Option 3 Feature', 'thenext'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="zo_metabox_group">
                            <?php
                            zo_options(array(
                                'id' => 'option4',
                                'label' => __('Option 4', 'thenext'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            zo_options(array(
                                'id' => 'option4_feature',
                                'label' => __('Option 4 Feature', 'thenext'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="zo_metabox_group">
                            <?php
                            zo_options(array(
                                'id' => 'option5',
                                'label' => __('Option 5', 'thenext'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            zo_options(array(
                                'id' => 'option5_feature',
                                'label' => __('Option 5 Feature', 'thenext'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="zo_metabox_group">
                            <?php
                            zo_options(array(
                                'id' => 'option6',
                                'label' => __('Option 6', 'thenext'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            zo_options(array(
                                'id' => 'option6_feature',
                                'label' => __('Option 6 Feature', 'thenext'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="zo_metabox_group">
                            <?php
                            zo_options(array(
                                'id' => 'option7',
                                'label' => __('Option 7', 'thenext'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            zo_options(array(
                                'id' => 'option7_feature',
                                'label' => __('Option 7 Feature', 'thenext'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="zo_metabox_group">
                            <?php
                            zo_options(array(
                                'id' => 'option8',
                                'label' => __('Option 8', 'thenext'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            zo_options(array(
                                'id' => 'option8_feature',
                                'label' => __('Option 8 Feature', 'thenext'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                        <div class="zo_metabox_group">
                            <?php
                            zo_options(array(
                                'id' => 'option9',
                                'label' => __('Option 9', 'thenext'),
                                'type' => 'text',
                            )); ?>
                            <?php
                            zo_options(array(
                                'id' => 'option9_feature',
                                'label' => __('Option 9 Feature', 'thenext'),
                                'type' => 'switch',
                                'options' => array('on' => '1', 'off' => ''),
                            )); ?>
                            <!--end option-->
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <?php
    }

    /* --------------------- PRICING ---------------------- */

    function donation_option() {
        ?>
        <div class="zo-donation">
            <?php
            zo_options(array(
                'id' => 'donation_startdate',
                'label' => __('Start Date', 'thenext'),
                'type' => 'datetime',
                'placeholder' => '',
                'format' => 'Y/m/d H:s'
            ));
            zo_options(array(
                'id' => 'donation_phone',
                'label' => __('Phone', 'thenext'),
                'type' => 'text',
                'placeholder' => '+84123456789'
            ));
            zo_options(array(
                'id' => 'donation_email',
                'label' => __('Email', 'thenext'),
                'type' => 'text',
                'placeholder' => 'example@domain.com'
            ));
            ?>
        </div>
        <?php
    }

    /* --------------------- PRICING ---------------------- */

    function event_option() {
        ?>
        <div class="event-options">
            <?php
            zo_options(array(
                'id' => 'event_startdate',
                'label' => __('Start Date', 'thenext'),
                'type' => 'datetime',
                'placeholder' => '',
                'format' => 'Y/m/d H:s'
            ));
            zo_options(array(
                'id' => 'event_enddate',
                'label' => __('End Date', 'thenext'),
                'type' => 'datetime',
                'placeholder' => '',
                'format' => 'Y/m/d H:s'
            ));
            zo_options(array(
                'id' => 'event_location',
                'label' => __('Location', 'thenext'),
                'type' => 'text',
                'placeholder' => '123 address'
            ));
            zo_options(array(
                'id' => 'event_phone',
                'label' => __('Phone', 'thenext'),
                'type' => 'text',
                'placeholder' => '+84123456789'
            ));
            zo_options(array(
                'id' => 'event_email',
                'label' => __('Email', 'thenext'),
                'type' => 'text',
                'placeholder' => 'example@domain.com'
            ));
            ?>
        </div>
        <?php
    }

    /* -----------------------TEAM------------------------- */

    function team_option() {
        ?>
        <div class="team-options">
            <?php
            zo_options(array(
                'id' => 'team_position',
                'label' => __('Position', 'thenext'),
                'type' => 'text',
                'placeholder' => '',
            ));
            zo_options(array(
                'id' => 'team_facebook',
                'label' => __('Facebook', 'thenext'),
                'type' => 'text',
                'placeholder' => '',
            ));
            zo_options(array(
                'id' => 'team_skype',
                'label' => __('Skype', 'thenext'),
                'type' => 'text',
                'placeholder' => '',
            ));
            zo_options(array(
                'id' => 'team_twitter',
                'label' => __('Twitter', 'thenext'),
                'type' => 'text',
                'placeholder' => '',
            ));
            zo_options(array(
                'id' => 'team_pinterest',
                'label' => __('Pinterest', 'thenext'),
                'type' => 'text',
                'placeholder' => '',
            ));
            ?>
        </div>
        <?php
    }

    /* -----------------------CLIENT------------------------- */

    function client_option() {
        ?>
        <div class="client-options">
            <?php
            zo_options(array(
                'id' => 'client_facebook',
                'label' => __('Facebook', 'thenext'),
                'type' => 'text',
                'placeholder' => '',
            ));
            zo_options(array(
                'id' => 'client_twitter',
                'label' => __('Twitter', 'thenext'),
                'type' => 'text',
                'placeholder' => '',
            ));
            zo_options(array(
                'id' => 'client_pinterest',
                'label' => __('Pinterest', 'thenext'),
                'type' => 'text',
                'placeholder' => '',
            ));
            zo_options(array(
                'id' => 'client_linkedin',
                'label' => __('Linkedin', 'thenext'),
                'type' => 'text',
                'placeholder' => '',
            ));
            ?>
        </div>

        <?php
    }
    /*------------------- Portfolio -----------------*/
    function portfolio_option() { ?>
        <div class="portfolio-option">
            <?php 
                zo_options(array(
                    'id' => 'project_date_create',
                    'label' => __('Date', 'thenext'),
                    'type' => 'date',
                    'placeholder' => '',
                    'format' => 'M d, Y'
                ));
                zo_options(array(
                    'id' => 'project_client',
                    'label' => __('Client Info', 'thenext'),
                    'type' => 'text',
                    'placeholder' => ''
                ));
                zo_options(array(
                    'id' => 'project_place',
                    'label' => __('Place Info', 'thenext'),
                    'type' => 'text',
                    'placeholder' => ''
                ));
                zo_options(array(
                    'id' => 'project_image',
                    'label' => __('Image for Project', 'thenext'),
                    'type' => 'images',
                    'placeholder' => ''
                ));
            ?>
        </div>    
    <?php 
    }
}

new ZOMetaOptions();
