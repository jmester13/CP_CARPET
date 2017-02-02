<?php
/**
 * New button implementation
 * array_merge is needed due to merging other shortcode data into params.
 * @since 4.5
 */
global $pixel_icons;
$icons_params = vc_map_integrate_shortcode( 'vc_icon', 'i_', '',
    array(
        'include_only_regex' => '/^(type|icon_\w*)/',
        // we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
    ), array(
        'element' => 'add_icon',
        'value' => 'true',
    )
);
// populate integrated vc_icons params.
if ( is_array( $icons_params ) && ! empty( $icons_params ) ) {
    foreach ( $icons_params as $key => $param ) {
        if ( is_array( $param ) && ! empty( $param ) ) {
            if ( $param['param_name'] == 'i_type' ) {
                // append pixelicons to dropdown
                $icons_params[ $key ]['value'][ __( 'Pixel', 'thenext' ) ] = 'pixelicons';
            }
            if ( isset( $param['admin_label'] ) ) {
                // remove admin label
                unset( $icons_params[ $key ]['admin_label'] );
            }

        }
    }
}
$params = array_merge(
    array(
        array(
            'type' => 'textfield',
            'heading' => __( 'Text Button', 'thenext' ),
            'save_always' => true,
            'param_name' => 'title',
            // fully compatible to btn1 and btn2
            'value' => __( 'Text on the button', 'thenext' ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => __( 'URL (Link)', 'thenext' ),
            'param_name' => 'link',
            'description' => __( 'Add link to button.', 'thenext' ),
            // compatible with btn2 and converted from href{btn1}
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Button Type", 'thenext'),
            "param_name" => "button_type",
            "value" => array(
                'Button Default' => 'btn btn-default',
                'Button Default White' => 'btn btn-default btn-white',
                'Button Primary' => 'btn btn-primary',
                'Button Green' => 'btn btn-green',
                'Button Purple' => 'btn btn-purple',
                'Button Crimson' => 'btn btn-crimson',
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Alignment', 'thenext' ),
            'param_name' => 'align',
            'description' => __( 'Select button alignment.', 'thenext' ),
            // compatible with btn2, default left to be compatible with btn1
            'value' => array(
                __( 'Inline', 'thenext' ) => 'inline',
                // default as well
                __( 'Left', 'thenext' ) => 'left',
                // default as well
                __( 'Right', 'thenext' ) => 'right',
                __( 'Center', 'thenext' ) => 'center'
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Set full width button?', 'thenext' ),
            'param_name' => 'button_block',
            'dependency' => array(
                'element' => 'align',
                'value_not_equal_to' => 'inline',
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add icon?', 'thenext' ),
            'param_name' => 'add_icon',
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Icon Alignment', 'thenext' ),
            'description' => __( 'Select icon alignment.', 'thenext' ),
            'param_name' => 'i_align',
            'value' => array(
                __( 'Left', 'thenext' ) => 'left',
                // default as well
                __( 'Right', 'thenext' ) => 'right',
            ),
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ),
        ),
    ),
    $icons_params,
    array(
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'thenext' ),
            'param_name' => 'i_icon_pixelicons',
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'pixelicons',
                'source' => $pixel_icons,
            ),
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'pixelicons',
            ),
            'description' => __( 'Select icon from library.', 'thenext' ),
        ),
    ),
    array(
        vc_map_add_css_animation( true ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'thenext' ),
            'param_name' => 'el_class',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'thenext' ),
        ),
    )
);
/**
 * @class WPBakeryShortCode_VC_Btn
 */
vc_map( array(
    'name' => __( 'Button', 'thenext' ),
    'base' => 'vc_btn',
    'icon' => 'icon-wpb-ui-button',
    'category' => array(
        __( 'Content', 'thenext' ),
    ),
    'description' => __( 'Eye catching button', 'thenext' ),
    'params' => $params,
    'js_view' => 'VcButton3View',
    'custom_markup' => '{{title}}<div class="vc_btn3-container"><button class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-shape-{{ params.shape }} vc_btn3-style-{{ params.style }} vc_btn3-color-{{ params.color }}">{{{ params.title }}}</button></div>',
) );
