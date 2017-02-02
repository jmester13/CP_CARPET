<?php
/**
 * Add custom headding params
 * 
 * @author Fox
 * @since 1.0.0
 */
if (shortcode_exists('vc_custom_heading')) {
    vc_add_param("vc_custom_heading", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Custom Heading Style", 'thenext'),
        "admin_label" => true,
        "param_name" => "zo_custom_headding",
        "value" => array(
            "Default" => "",
            "Style 1 - Title Line Bottom" => "zo-title-line-bottom"
        )
    ));
}