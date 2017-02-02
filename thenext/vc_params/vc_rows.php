<?php
/**
 * Add row params
 * 
 * @author Fox
 * @since 1.0.0
 */
if (shortcode_exists('vc_row')) {
    vc_add_param('vc_row', array(
        'type' => 'checkbox',
        'heading' => __("Content Full Width", 'thenext'),
        'param_name' => 'full_width',
        'value' => array(
            'Yes' => true
        ),
        'description' => __("Yes = full width, default content boxed.", 'thenext')
    ));
    vc_remove_param("vc_row", "el_id");
    vc_remove_param("vc_row", "parallax");
    vc_remove_param("vc_row", "parallax_image");
    vc_add_param("vc_row", array(
        "type" => "textfield",
        "heading" => __("Extra id name", 'thenext'),
        "param_name" => "row_id"
    ));
    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Row color", 'thenext'),
        "param_name" => "row_color",
        "value" => "",
        "description" => __("Select color for row.", 'thenext')
    ));
    vc_add_param("vc_row_inner", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Row color", 'thenext'),
        "param_name" => "row_color",
        "value" => "",
        "description" => __("Select color for row.", 'thenext')
    ));
    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Heading color", 'thenext'),
        "param_name" => "row_head_color",
        "value" => "",
        "description" => __("Select color for head.", 'thenext')
    ));
    vc_add_param("vc_row_inner", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Heading color", 'thenext'),
        "param_name" => "row_head_color",
        "value" => "",
        "description" => __("Select color for head.", 'thenext')
    ));
    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Link color", 'thenext'),
        "param_name" => "row_link_color",
        "value" => "",
        "description" => __("Select color for link.", 'thenext')
    ));
    vc_add_param("vc_row_inner", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Link color", 'thenext'),
        "param_name" => "row_link_color",
        "value" => "",
        "description" => __("Select color for link.", 'thenext')
    ));
    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Link color hover", 'thenext'),
        "param_name" => "row_link_color_hover",
        "value" => "",
        "description" => __("Select color for link hover.", 'thenext')
    ));
    vc_add_param("vc_row_inner", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Link color hover", 'thenext'),
        "param_name" => "row_link_color_hover",
        "value" => "",
        "description" => __("Select color for link hover.", 'thenext')
    ));
    vc_add_param("vc_row", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Animation", 'thenext'),
        "admin_label" => true,
        "param_name" => "animation",
        "value" => array(
            "None" => "",
            "Right To Left" => "right-to-left",
            "Left To Right" => "left-to-right",
            "Bottom To Top" => "bottom-to-top",
            "Top To Bottom" => "top-to-bottom",
            "Scale Up" => "scale-up",
            "Fade In" => "fade-in"
        )
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => __("Background Style", 'thenext'),
        'param_name' => 'bg_style',
        'value' => array(
            'Default' => '',
            'Image / Parallax' => 'img_parallax',
            'Image / Fixed' => 'img_fixed',
            'Hosted Video' => 'hvideo',
            'Background Effect' => 'bg-effect-lg'
        ),
        'group' => 'Design Options',
        'description' => __("Select the kind of background would you like to set for this row.", 'thenext')
    ));
    vc_add_param('vc_row', array(
        'type' => 'textfield',
        'heading' => __("Parallax Speed", 'thenext'),
        'param_name' => 'bd_p_speed',
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "bg_style",
            "value" => array(
                "img_parallax"
            )
        ),
        'description' => __("Set speed moving for parallax default 0.1 .", 'thenext')
    ));
    vc_add_param('vc_row', array(
        'type' => 'textfield',
        'heading' => __("MP4 (URL)", 'thenext'),
        'param_name' => 'bg_video_mp4',
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "bg_style",
            "value" => array(
                "hvideo"
            )
        ),
        'description' => __(".mp4 video.", 'thenext')
    ));
    vc_add_param('vc_row', array(
        'type' => 'textfield',
        'heading' => __("WEBM (URL)", 'thenext'),
        'param_name' => 'bg_video_webm',
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "bg_style",
            "value" => array(
                "hvideo"
            )
        ),
        'description' => __(".webm video.", 'thenext')
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => __("Overlay Color", 'thenext'),
        'param_name' => 'overlay_row',
        'value' => array(
            'No' => '',
            'Yes' => 'yes'
        ),
        'group' => 'Design Options'
    ));
    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __('Color', 'thenext'),
        "param_name" => "overlay_color",
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "overlay_row",
            "value" => array(
                "yes"
            )
        ),
        "description" => ''
    ));
    vc_add_param('vc_row', array(
        'type' => 'textfield',
        'heading' => __("Opacity", 'thenext'),
        'param_name' => 'overlay_opacity',
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "overlay_row",
            "value" => array(
                "yes"
            )
        ),
        'description' => __("Set opacity overlay color - ex: 0.6 .", 'thenext')
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => __("Custom Background Color", 'thenext'),
        'param_name' => 'background_color_row',
        'value' => array(
            'No' => '',
            'Yes' => 'yes'
        ),
        'group' => 'Design Options'
    ));
    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __('BG Color Left', 'thenext'),
        "param_name" => "background_color_row_left",
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "background_color_row",
            "value" => array(
                "yes"
            )
        ),
        "description" => ''
    ));
    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __('BG Color Right', 'thenext'),
        "param_name" => "background_color_row_right",
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "background_color_row",
            "value" => array(
                "yes"
            )
        ),
        "description" => ''
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => __("Row Arrow", 'thenext'),
        'param_name' => 'row_arrow',
        'value' => array(
            'No' => '',
            'Yes' => 'yes'
        ),
        'group' => 'Design Options'
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => __("Arrow Position", 'thenext'),
        'param_name' => 'arrow_position',
        'value' => array(
            'Top' => 'top',
            'Bottom' => 'bottom'
        ),
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "row_arrow",
            "value" => array(
                "yes"
            )
        ),
    ));
    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __('Arrow Color', 'thenext'),
        "param_name" => "arrow_color",
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "row_arrow",
            "value" => array(
                "yes"
            )
        ),
        "description" => ''
    ));
}