<?php
/* get categories */
$taxonomy = 'categories-pricing';
$_category = array();
if(!isset($atts['cat']) || $atts['cat']=='' && taxonomy_exists($taxonomy)){
    $terms = get_terms($taxonomy);
    foreach ($terms as $cat){
        $_category[] = $cat->term_id;
    }
} else {
    $_category  = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;

?>

<div class="zo-grid-wrapper zo-grid-pricing zo-grid-pricing-layout-1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="zo-grid <?php echo esc_attr($atts['grid_class']);?> zo-gird-pricing-item-wrap">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()) :
            $posts->the_post();
            $pricing_meta = zo_post_meta_data();
            $zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : 'h2';
			$zo_is_feature = isset( $pricing_meta->_zo_is_feature ) ? $pricing_meta->_zo_is_feature : '';
			$zo_background = isset( $pricing_meta->_zo_background ) ? $pricing_meta->_zo_background : '';
			$zo_price = isset( $pricing_meta->_zo_price ) ? $pricing_meta->_zo_price : '';
			$zo_hot = isset( $pricing_meta->_zo_hot ) ? $pricing_meta->_zo_hot : '';
			$zo_value = isset( $pricing_meta->_zo_value ) ? $pricing_meta->_zo_value : '';
			$zo_button_url = isset( $pricing_meta->_zo_button_url ) ? $pricing_meta->_zo_button_url : '';
			$zo_button_text = isset( $pricing_meta->_zo_button_text ) ? $pricing_meta->_zo_button_text : '';
        ?>
            <div class="zo-pricing-item <?php echo esc_attr($atts['item_class']);?> <?php if($zo_is_feature == 1) echo "pricing-feature-item"; ?> ">
                <div class="zo-pricing-inner">					
					<div class="zo-pricing-top" <?php if($zo_background != ''){?>style=" background-image: url(<?php echo zo_image_resize($zo_background,270,200);?>);"<?php }?>>
						<<?php echo esc_attr($zo_title_size); ?> class="zo-pricing-title">
							<?php echo do_shortcode($pricing_meta->_zo_subtitle);?>
						</<?php echo esc_attr($zo_title_size); ?>>
						<div class="zo-pricing-price-wrap font-second font-style-italic">
							$ <?php echo esc_attr($zo_price); ?> / <?php echo esc_attr($zo_value) ?>
						</div>
						<?php if($zo_hot != ''):?>
							<div class="zo-hot"><span><?php _e('HOT','thenext');?></span></div>
						<?php endif;?>
					</div>
                    <div class="zo-pricing-meta-wrap">
                        <?php
                        for ($i=1; $i <= 9 ; $i++) {
                            $pricing_option = $pricing_meta->{"_zo_option".$i};
                            $pricing_option_feature =  $pricing_meta->{"_zo_option".$i . "_feature"};
                            $pricing_icon = $pricing_option_feature == 1 ? '<i class="fa fa-check"></i>' : '';
                            if ( !empty( $pricing_option ) ) echo '<div class="option-item">'. esc_attr($pricing_option) . do_shortcode($pricing_icon) .'</div>';
                        }
                        ?>
                    </div>
                    <div class="zo-pricing-button text-center">
                        <?php echo '<a class="btn btn-pricing" href=" '. esc_url($zo_button_url) .' ">'. esc_attr($zo_button_text) .'</a>'; ?>
                    </div>
                </div>
             </div>
        <?php
        endwhile;
    wp_reset_postdata();
    ?>
</div>
</div>