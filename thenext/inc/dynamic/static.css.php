<?php

/**
 * Auto create .css file from Theme Options
 * @author Fox
 * @version 1.0.0
 */
class ZoTheme_StaticCss
{

    public $scss;

    function __construct()
    {
        global $smof_data;

        /* scss */
        $this->scss = new scssc();

        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');

        /* generate css over time */
        if (isset($smof_data['dev_mode']) && $smof_data['dev_mode']) {
            $this->generate_file();
        } else {
            /* save option generate css */
            add_action("redux/options/smof_data/saved", array(
                $this,
                'generate_file'
            ));
        }
    }

    /**
     * generate css file.
     *
     * @since 1.0.0
     */
    public function generate_file()
    {
        global $smof_data;
        if (! empty($smof_data)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
            global $wp_filesystem;

            /* write options to scss file */
            $wp_filesystem->put_contents(get_template_directory() . '/assets/scss/options.scss', $this->css_render(), 0644); // Save it

            /* minimize CSS styles */
            if (!$smof_data['dev_mode']) {
                $this->scss->setFormatter('scss_formatter_compressed');
            }

            /* compile scss to css */
            $css = $this->scss_render();

            $file = "static.css";

            if(!empty($smof_data['presets_color']) && $smof_data['presets_color']){
                $file = "presets-".$smof_data['presets_color'].".css";
            }

            /* write static.css file */
            $wp_filesystem->put_contents(get_template_directory() . '/assets/css/' . $file, $css, 0644); // Save it
        }
    }

    /**
     * scss compile
     *
     * @since 1.0.0
     * @return string
     */
    public function scss_render(){
        /* compile scss to css */
        return $this->scss->compile('@import "master.scss"');
    }

    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $zo_base;
        ob_start();
        /* custom css.  */
        echo esc_attr($smof_data['custom_css']);

        /* google fonts. */
        $zo_base->setGoogleFont($smof_data['google-font-1'], $smof_data['google-font-selector-1']);
        $zo_base->setGoogleFont($smof_data['google-font-2'], $smof_data['google-font-selector-2']);

        /* local fonts */
        $zo_base->setFontFace($smof_data['local-fonts-1'], $smof_data['local-fonts-selector-1']);
        $zo_base->setFontFace($smof_data['local-fonts-2'], $smof_data['local-fonts-selector-2']);
        /* forward options to scss. */

		/* Color */
        if(!empty($smof_data['primary_color'])){
            echo '$primary_color:'.esc_attr($smof_data['primary_color']).';';
        }
        echo '$header_height:'.esc_attr($smof_data['header_height']['height']).';';
        echo '$sticky_header_height:'.esc_attr($smof_data['menu_sticky_height']['height']).';';

        /* ==========================================================================
           Start Header
        ========================================================================== */
        /* Header Top */
        if(!empty($smof_data['bg_header_top_color']['rgba'])){
            echo "body #zo-header-top {background-color:".esc_attr($smof_data['bg_header_top_color']['rgba']).";}";
        }
        if($smof_data['header_top_color']){
        
            echo "body #zo-header-top {color:".esc_attr($smof_data['header_top_color']).";}";
            echo "body #zo-header-top  .zo-header-top-right a , body #zo-header-top  .zo-header-top-left a {color:".esc_attr($smof_data['header_top_color']).";}";
        }
        /* End Header Top */

        /* Header Main */
        if($smof_data['header_height']){
            echo "body {
                    margin-top:".esc_attr($smof_data['header_height']['height']).";
                }";
        }
        if($smof_data['header_height']){
            echo "#zo-header-logo a {
                    line-height:".esc_attr($smof_data['header_height']['height']).";
                }";
        }
        if($smof_data['main_logo_height']){
            echo "#zo-header-logo a img {
                        max-height:".esc_attr($smof_data['main_logo_height']['height']).";
                    }";
        }
        if(!empty($smof_data['enable_border_header'])){
            $scss_header = "#zo-header { ";
            if(!empty($smof_data['header_border']['border-top'])){
                $scss_header .= "border-top: ".esc_attr($smof_data['header_border']['border-top'])." ".esc_attr($smof_data['header_border']['border-style'])."  ".esc_attr($smof_data['header_border_color']['rgba']).";";
            }
            if(!empty($smof_data['header_border']['border-right'])){
               $scss_header .= "border-right: ".esc_attr($smof_data['header_border']['border-right'])." ".esc_attr($smof_data['header_border']['border-style'])."  ".esc_attr($smof_data['header_border_color']['rgba']).";";  
            } 
            if(!empty($smof_data['header_border']['border-bottom'])){
               $scss_header .= "border-bottom: ".esc_attr($smof_data['header_border']['border-bottom'])." ".esc_attr($smof_data['header_border']['border-style'])."  ".esc_attr($smof_data['header_border_color']['rgba']).";";  
            }
             if(!empty($smof_data['header_border']['border-left'])){
               $scss_header .= "border-left: ".esc_attr($smof_data['header_border']['border-left'])." ".esc_attr($smof_data['header_border']['border-style'])."  ".esc_attr($smof_data['header_border_color']['rgba']).";";
            }
            $scss_header .= "}"  ;
			echo $scss_header; 
        }
        if(!empty($smof_data['bg_header']['rgba'])) {
            echo "#zo-header {
				background-color:".esc_attr($smof_data['bg_header']['rgba']).";
			}";
        }
        /* End Header Main */

        /* Sticky Header */
        if($smof_data['menu_sticky_height']['height']){
            echo "#zo-header.header-fixed {
                    height:".esc_attr($smof_data['menu_sticky_height']['height']).";
                }";
        }
        if($smof_data['menu_sticky_height']['height']){
            echo "body.fixed-margin-top {
                    margin-top:".esc_attr($smof_data['menu_sticky_height']['height']).";
                }";
        }
        if(isset($smof_data['bg_sticky_header']['rgba']) && !empty($smof_data['bg_sticky_header']['rgba'])){
            echo "#zo-header.zo-main-header.header-fixed {
                    background-color:".esc_attr($smof_data['bg_sticky_header']['rgba']).";
                }";
        }
        if($smof_data['sticky_logo_height']){
            echo "#zo-header.header-fixed #zo-header-logo a img {
                    max-height:".esc_attr($smof_data['sticky_logo_height']['height']).";
                }";
        }
        if($smof_data['menu_sticky_height']['height']){
            echo "#zo-header.header-fixed #zo-header-logo a,
                #zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > li {
                    line-height:".esc_attr($smof_data['menu_sticky_height']['height']).";
                }";
        }
        /* End Sticky Header */

        /* Main Menu */
        echo '@media(min-width: 992px) {';
        if($smof_data['menu_position'] == '1') {
            echo "#zo-header-navigation .main-navigation .menu-main-menu,
                    #zo-header-navigation .main-navigation div.nav-menu > ul {
                        text-align: left;
                    }";
        }
        if($smof_data['menu_position'] == '2') {
            echo "#zo-header-navigation .main-navigation .menu-main-menu,
                    #zo-header-navigation .main-navigation div.nav-menu > ul {
                        text-align: right;
                    }";
        }
        if($smof_data['menu_position'] == '3') {
            echo "#zo-header-navigation .main-navigation .menu-main-menu,
                    #zo-header-navigation .main-navigation div.nav-menu > ul {
                        text-align: center;
                    }";
        }
        if($smof_data['menu_color_first_level']){
            echo "	#zo-header-navigation .main-navigation .menu-main-menu > li > a,
					#zo-header-navigation .main-navigation .menu-main-menu > ul > li > a,
					#zo-header-navigation .main-navigation .menu-main-menu > li.menu-item-has-children > .zo-menu-toggle{
                        color:".esc_attr($smof_data['menu_color_first_level']).";
                    }";
        }
        if($smof_data['menu_color_sticky']){
            echo "	.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > li > a,
					.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > ul > li > a,
					.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > li.menu-item-has-children > .zo-menu-toggle,
					div#zo-header.header-fixed #zo-header-icon .widget_cart_search_wrap .header a i{
                        color:".esc_attr($smof_data['menu_color_sticky']).";
                    }";
        }
        if($smof_data['header_height']){
            echo "#zo-header-navigation .main-navigation .menu-main-menu > li,
                          #zo-header-navigation .main-navigation .menu-main-menu > ul > li {
                        line-height:".esc_attr($smof_data['header_height']['height']).";
                    }";
        }
        if($smof_data['menu_color_hover_first_level']){
            echo "#zo-header-navigation .main-navigation .menu-main-menu > li > a:hover,
                          #zo-header-navigation .main-navigation .menu-main-menu >ul > li > a:hover {
                        color:".esc_attr($smof_data['menu_color_hover_first_level']).";
                    }";
        }
        if($smof_data['menu_color_active_first_level']){
            echo "#zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
                          #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
                          #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
                          #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a,
                          #zo-header-navigation .main-navigation .menu-main-menu > ul > li.current-menu-item > a,
                          #zo-header-navigation .main-navigation .menu-main-menu > ul > li.current-menu-ancestor > a,
                          #zo-header-navigation .main-navigation .menu-main-menu > ul > li.current_page_item > a,
                          #zo-header-navigation .main-navigation .menu-main-menu > ul > li.current_page_ancestor > a {
                            color:".esc_attr($smof_data['menu_color_active_first_level']).";
                    }";
        }
        if($smof_data['menu_first_level_uppercase']){
            echo "#zo-header-navigation .main-navigation .menu-main-menu > li > a,
                          #zo-header-navigation .main-navigation .menu-main-menu > ul > li > a {
                        text-transform: uppercase;
                    }";
        }
        echo '}';
        /* End Main Menu */

        /* Main Menu Header Fixed Only Page */
        if($smof_data['menu_color_first_level']){
            echo ".zo-main-header .main-navigation .menu-main-menu > li > a, #zo-header-icon .widget_cart_search_wrap .header a {
                    color:".esc_attr($smof_data['menu_color_first_level']).";
                }";
        }
        if($smof_data['menu_color_hover_first_level']){
            echo ".zo-main-header .main-navigation .menu-main-menu > li > a:hover {
                    color:".esc_attr($smof_data['menu_color_hover_first_level']).";
                }";
        }
        if($smof_data['menu_color_active_first_level']){
            echo "	.zo-main-header .main-navigation .menu-main-menu > li.current-menu-item > a,
                    .zo-main-header .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
                    .zo-main-header .main-navigation .menu-main-menu > li.current_page_item > a,
                    .zo-main-header .main-navigation .menu-main-menu > li.current_page_ancestor > a {
                        color:".esc_attr($smof_data['menu_color_active_first_level']).";
                }";
        }
        /* End  Main Menu Header Fixed Only Page */
        /* Sub Menu */
        if(!empty($smof_data['menu_color_sub_level'])){
            echo "#zo-header-navigation .main-navigation .menu-main-menu > li ul li > a,
                      #zo-header-navigation .main-navigation .menu-main-menu > ul > li ul li a {
                    color:".esc_attr($smof_data['menu_color_sub_level']).";
                }";
        }
        if(!empty($smof_data['menu_color_hover_sub_level'])){
            echo "#zo-header-navigation .main-navigation .menu-main-menu > li ul li:hover > a,
                      #zo-header-navigation .main-navigation .menu-main-menu > li ul a:focus,
                      #zo-header-navigation .main-navigation .menu-main-menu > li ul li.current-menu-item a,
                      #zo-header-navigation .main-navigation .menu-main-menu > ul > li ul li:hover a,
                      #zo-header-navigation .main-navigation .menu-main-menu > ul > li ul a:focus,
                      #zo-header-navigation .main-navigation .menu-main-menu > ul > li ul li.current-menu-item a {
                        color:".esc_attr($smof_data['menu_color_hover_sub_level']).";
                }";
        }
        if(!empty($smof_data['menu_border_color_bottom'])){
            echo "#zo-header-navigation .main-navigation li ul li a {
                    border-bottom: 1px solid ".esc_attr($smof_data['menu_item_border_color']).";
                }";
        }
        /* End Sub Menu */

        /* ==========================================================================
           End Header
        ========================================================================== */
        /* ==========================================================================
           Footer Header
        ========================================================================== */
        if(!empty($smof_data['enable_border_footer_bottom'])){
            $scss_header = "#zo-footer-bottom { ";
            if(!empty($smof_data['footer_bottom_border']['border-top'])){
                $scss_header .= "border-top: ".esc_attr($smof_data['footer_bottom_border']['border-top'])." ".esc_attr($smof_data['footer_bottom_border']['border-style'])."  ".esc_attr($smof_data['footer_bottom_border_color']['rgba']).";";
            }
            if(!empty($smof_data['footer_bottom_border']['border-right'])){
               $scss_header .= "border-right: ".esc_attr($smof_data['footer_bottom_border']['border-right'])." ".esc_attr($smof_data['footer_bottom_border']['border-style'])."  ".esc_attr($smof_data['footer_bottom_border_color']['rgba']).";";  
            } 
            if(!empty($smof_data['footer_bottom_border']['border-bottom'])){
               $scss_header .= "border-bottom: ".esc_attr($smof_data['footer_bottom_border']['border-bottom'])." ".esc_attr($smof_data['footer_bottom_border']['border-style'])."  ".esc_attr($smof_data['footer_bottom_border_color']['rgba']).";";  
            }
             if(!empty($smof_data['footer_bottom_border']['border-left'])){
               $scss_header .= "border-left: ".esc_attr($smof_data['footer_bottom_border']['border-left'])." ".esc_attr($smof_data['footer_bottom_border']['border-style'])."  ".esc_attr($smof_data['footer_bottom_border_color']['rgba']).";";
            }
            
            $scss_header .= "}"  ;
           echo $scss_header; 
        }
        /* ==========================================================================
           End Footer Header
        ========================================================================== */
        
		/* Button */
		if($smof_data['button_text_uppercase']) {
			echo ".vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3, .btn, .btn-default, .button, input[type='submit']{
				text-transform: uppercase;
			}";
		}
		if($smof_data['btn_default_color']){
            echo ".vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3, .btn, .btn-default, .button, input[type='submit'] {
                    color:".esc_attr($smof_data['btn_default_color']).";
                    background-color:".esc_attr($smof_data['btn_default_bg_color']).";
					border-color: ".esc_attr($smof_data['btn_default_border_color']).";
                    -webkit-border-radius:".esc_attr($smof_data['btn_default_border_radius']['height']).";
                       -moz-border-radius:".esc_attr($smof_data['btn_default_border_radius']['height']).";
                        -ms-border-radius:".esc_attr($smof_data['btn_default_border_radius']['height']).";
                         -o-border-radius:".esc_attr($smof_data['btn_default_border_radius']['height']).";
                            border-radius:".esc_attr($smof_data['btn_default_border_radius']['height']).";
                }";
        }
		if($smof_data['btn_default_color_hover']){
            echo ".vc_general.vc_btn3.btn:hover , button.vc_general.vc_btn3:hover, a.vc_general.vc_btn3:hover, .btn:hover, .btn-default:hover, .button:hover, input[type='submit']:hover {
                    color:".esc_attr($smof_data['btn_default_color_hover']).";
					background-color:".esc_attr($smof_data['btn_default_bg_color_hover']).";
					border-color: ".esc_attr($smof_data['btn_default_border_color_hover']).";
                }";
        }
		/* Button */
		
		 /*Page title  Opacity*/
		 if(!empty($smof_data['page_title_opacity']) && isset($smof_data['page_title_opacity']['rgba'])) {
				echo "body .page-title:before{ content:'';
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background-color:".esc_attr($smof_data['page_title_opacity']['rgba'])."; 
			}
			.page-title { position: relative;} 
			";
		 }	
		return ob_get_clean();
    }                          
   
   

}

new ZoTheme_StaticCss();