<?php

/**
 * Auto create css from Meta Options.
 * 
 * @author Fox
 * @version 1.0.0
 */
class ZoTheme_DynamicCss
{

    function __construct()
    {
        add_action('wp_head', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css()
    {
        global $smof_data, $zo_base;
        $css = $this->css_render();
        if (! $smof_data['dev_mode']) {
            $css = $zo_base->compressCss($css);
        }
        echo '<style type="text/css" data-type="zo_shortcodes-custom-css">'.$css.'</style>';
    }


    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $zo_meta;
        ob_start();
        
        /* ==========================================================================
           Start Header
        ========================================================================== */
            /* Header Transparent - Custom Menu Color */

            /* Header top border */
            if($zo_meta->_zo_page_boxed || $smof_data['body_layout']){
                echo "footer#zo-footer-boxed, footer#zo-footer-boxed > #zo-footer-top , footer#zo-footer-boxed > #zo-footer-bottom {
                    background-color: transparent;
                }";
                echo "footer#zo-footer-boxed #zo-footer-top {
                    background-color: ".esc_attr($smof_data['footer_background']['background-color']).";
                }";
                echo "footer#zo-footer-boxed #zo-footer-bottom {
                    background-color: ".esc_attr($smof_data['footer_botton_background']['background-color']).";
                }";
            }
            
            if($zo_meta->_zo_page_boxed){
				if(!empty($zo_meta->_zo_page_boxed_background)){
					$image = wp_get_attachment_image_src($zo_meta->_zo_page_boxed_background,'full');
					echo "@media screen and (min-width: 1200px){ body.boxed-for-page{
						background-image: url('".esc_attr($image[0])."');
						background-attachment: fixed;
						background-position: center center;
						background-repeat: no-repeat;
						background-size: cover;
					} }";
				}
                echo "#zo-header {
                    border: none; }
                ";
            }
            if(!empty($zo_meta->_zo_header_border)){
                if(!empty($zo_meta->_zo_header_border_top)) {
                    $border = $zo_meta->_zo_header_border_top_width.' solid '. $zo_meta->_zo_header_border_top_color;
                    if(!empty($zo_meta->_zo_page_boxed)){
                        echo "#zo-header > .container, .zo-header-row-below > .container{
                            border-top: ".$border.";
                        }" ;
                        
                    }
                    else {
                        echo "#zo-header, .zo-header-row-below {
                            border-top: ".$border.";
                        }" ;
                    }
                }
                if(!empty($zo_meta->_zo_header_border_left)) {
                    $border = $zo_meta->_zo_header_border_left_width.' solid '. $zo_meta->_zo_header_border_left_color;
                    if(!empty($zo_meta->_zo_page_boxed)){
                        echo "#zo-header > .container, .zo-header-row-below > .container{
                            border-left: ".$border.";
                        }" ;
                        
                    }
                    else {
                        echo "#zo-header, .zo-header-row-below {
                            border-left: ".$border.";
                        }" ;
                    }
                }
                if(!empty($zo_meta->_zo_header_border_bottom)) {
                    $border = $zo_meta->_zo_header_border_bottom_width.' solid '. $zo_meta->_zo_header_border_bottom_color;
                    if(!empty($zo_meta->_zo_page_boxed)){
                        echo "#zo-header > .container, .zo-header-row-below > .container{
                            border-bottom: ".$border.";
                        }" ;
                        
                    }
                    else {
                        echo "#zo-header, .zo-header-row-below {
                            border-bottom: ".$border.";
                        }" ;
                    }
                }
                if(!empty($zo_meta->_zo_header_border_right)) {
                    $border = $zo_meta->_zo_header_border_right_width.' solid '. $zo_meta->_zo_header_border_right_color;
                    if(!empty($zo_meta->_zo_page_boxed)){
                        echo "#zo-header > .container, .zo-header-row-below > .container{
                            border-right: ".$border.";
                        }" ;
                        
                    }
                    else {
                        echo "#zo-header, .zo-header-row-below {
                            border-right: ".$border.";
                        }" ;
                    }
                }
            }
			
			/* Header Menu Color */
			if($zo_meta->_zo_header_menu_bg_color){
				echo "div#zo-header{
					background: ".esc_attr($zo_meta->_zo_header_menu_bg_color).";
				}";
			}
			if($zo_meta->_zo_header_menu_color){
				echo "#zo-header-navigation .main-navigation .menu-main-menu > li > a, #zo-header-navigation .main-navigation .menu-main-menu > ul > li > a , #zo-header-navigation .main-navigation .menu-main-menu > li.menu-item-has-children > .zo-menu-toggle, #zo-header #zo-header-icon .widget_cart_search_wrap .header a i {
					color: ".esc_attr($zo_meta->_zo_header_menu_color).";
				}";
			}
			if($zo_meta->_zo_header_menu_color_hover){
				echo "#zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a:hover, 
                #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a:hover, 
				#zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a:hover, 
				#zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a:hover,
				#zo-header-navigation .main-navigation .menu-main-menu > li.menu-item  > a:hover,
				#zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a:hover, 
				#zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a:hover, 
				#zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a:hover, 
				#zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a:hover,
				#zo-header-navigation .main-navigation .menu-main-menu > li.menu-item  > a:hover {
						color: ".esc_attr($zo_meta->_zo_header_menu_color_hover).";
						border-bottom: 2px solid;
						border-bottom-color: ".esc_attr($zo_meta->_zo_header_menu_color_hover).";
					}";
				echo "#zo-header-icon .widget_cart_search_wrap .header:hover{
						border-bottom-color:".esc_attr($zo_meta->_zo_header_menu_color_hover).";
				}";
				echo " #zo-header-icon .widget_cart_search_wrap .header:hover a i{
					   color:".esc_attr($zo_meta->_zo_header_menu_color_hover)." !important;
				}";
			}
			if (!empty($zo_meta->_zo_header_menu_color_active)) {
				echo "#zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
					#zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
					#zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
					#zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a ,
					#zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
					#zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
					#zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
					#zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a{
					color: ".esc_attr($zo_meta->_zo_header_menu_color_active).";
				}";
				echo "#zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item a ,
					#zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item a{
					border-bottom-color:".esc_attr($zo_meta->_zo_header_menu_color_active)."; 
				}";
			}
			
            /* Header Transparent for page */     
            if($zo_meta->_zo_enable_header_transparent){  
                /* Header */
                if (!empty($zo_meta->_zo_header_transparent_menu_color)) {
                    echo "#zo-header.header-page-transparent  #zo-header-navigation .main-navigation .menu-main-menu > li > a,
                        #zo-header.header-page-transparent #zo-header-icon .widget_cart_search_wrap .header a i {
                            color: ".esc_attr($zo_meta->_zo_header_transparent_menu_color).";
                        }";
                }
                if (!empty($zo_meta->_zo_header_transparent_menu_color_hover)) {
                    echo "#zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a:hover, 
                    #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a:hover, 
                    #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a:hover, 
                    #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a:hover,
                    #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.menu-item  > a:hover,
                    #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a:hover, 
                    #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a:hover, 
                    #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a:hover, 
                    #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a:hover,
                    #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.menu-item  > a:hover {
                            color: ".esc_attr($zo_meta->_zo_header_transparent_menu_color_hover).";
                            border-bottom: 2px solid;
                            border-bottom-color: ".esc_attr($zo_meta->_zo_header_transparent_menu_color_hover).";
                        }";
                    echo "#zo-header.header-page-transparent #zo-header-icon .widget_cart_search_wrap .header:hover{
                            border-bottom-color:".esc_attr($zo_meta->_zo_header_transparent_menu_color_hover).";
                    }";
                    echo " #zo-header.header-page-transparent #zo-header-icon .widget_cart_search_wrap .header:hover a i{
                           color:".esc_attr($zo_meta->_zo_header_transparent_menu_color_hover)." !important;
                    }";
                }
                if (!empty($zo_meta->_zo_header_transparent_menu_color_active)) {
                    echo "#zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
                            #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
                            #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
                            #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a ,
                            #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
                            #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
                            #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
                            #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a{
                            color: ".esc_attr($zo_meta->_zo_header_transparent_menu_color_active).";
                        }";
                    echo "#zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item a ,
                        #zo-header.header-page-transparent #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item a{
                        border-bottom-color:".esc_attr($zo_meta->_zo_header_transparent_menu_color_active)."; 
                    }";
                }
            }
			/* Header Transparent for page */ 
					          
			/* Header Fixed Style */
            if($zo_meta->_zo_enable_header_fixed) {
				if (!empty($zo_meta->_zo_header_fixed_bg_color)) {
					echo "#zo-header.header-fixed-page {
						background-color:".esc_attr($zo_meta->_zo_header_fixed_bg_color).";
					}";
				}
                if (!empty($zo_meta->_zo_header_fixed_menu_color)) {
                    echo "#zo-header.header-fixed-page .menu-main-menu > li > a , #zo-header.header-fixed-page #zo-header-icon .widget_cart_search_wrap .header a i{
                        color: ".esc_attr($zo_meta->_zo_header_fixed_menu_color).";
                    }";
                }
                if (!empty($zo_meta->_zo_header_fixed_menu_color_hover)) {
                    echo "#zo-header.header-fixed-page #zo-header-navigation .main-navigation .menu-main-menu > li > a:hover , #zo-header.header-fixed-page #zo-header-icon .widget_cart_search_wrap .header a i:hover {
                        color: ".esc_attr($zo_meta->_zo_header_fixed_menu_color_hover)." !important;
                    }";
                }
                if (!empty($zo_meta->_zo_header_fixed_menu_color_active)) {
                    echo "#zo-header.header-fixed-page #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
                        #zo-header.header-fixed-page #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
                        #zo-header.header-fixed-page #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
                        #zo-header.header-fixed-page #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a{
                        color: ".esc_attr($zo_meta->_zo_header_fixed_menu_color_active).";
                    }";
                }
            }
            /* End Menu Fixed Only Page */
			
			
			
            /* Start Page Title */
            if (!empty($zo_meta->_zo_page_title_margin)) {
                echo "body #page .page-title {
                    margin: ".esc_attr($zo_meta->_zo_page_title_margin).";
                }";
            } 
            if (!empty($zo_meta->_zo_page_title_align)) {
                echo "body #page .page-title #page-title-text h1 {
                    text-align: ".esc_attr($zo_meta->_zo_page_title_align).";
                }";
            }  
           
            if (!empty($zo_meta->_zo_page_title_background)) {
	            $image = wp_get_attachment_image_src($zo_meta->_zo_page_title_background,'full');
                echo "body #page .page-title {
                    background-image: url('".esc_attr($image[0])."')
                }";
            }
            /* End Page Title */
        /* ==========================================================================
           End Header
        ========================================================================== */
		/* Page background*/
		if(!empty($zo_meta->_zo_page_background)) {
			$image = wp_get_attachment_image_src($zo_meta->_zo_page_background_image,'full');
			echo '#page {
				background-color: '.esc_attr($zo_meta->_zo_page_background_color).';
				background-image: url("'.esc_attr($image[0]).'");
			}';
		}
		
        return ob_get_clean();
    }
}


new ZoTheme_DynamicCss();