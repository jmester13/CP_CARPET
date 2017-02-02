<?php 
  $uqid = uniqid();
  $class_link = 'zo-fancyboxes-'.$uqid;
?>
<div class="<?php echo esc_attr($class_link); ?> zo-fancyboxes-wraper zo-fancybox-layout-2 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['title']!=''):?>
        <div class="zo-fancyboxes-head">
            <div class="zo-fancyboxes-title">
                <?php echo apply_filters('the_title',$atts['title']);?>
            </div>
            <div class="zo-fancyboxes-description">
                <?php echo apply_filters('the_content',$atts['description']);?>
            </div>
        </div>
    <?php endif;?>
    <div class="zo-fancyboxes-body">
        <?php
            $columns = ((int)$atts['zo_cols'])?(int)$atts['zo_cols']:1;
            $class_bootstrap = "";
            switch($columns){
              case "1 Column":
               $class_bootstrap = "col-xs-12 col-sm-12 col-md-12 col-lg-12";
               break;
              case "2 Columns":
               $class_bootstrap = "col-xs-12 col-sm-6 col-md-4 col-lg-6";
               break;
              case "3 Columns":
               $class_bootstrap = "col-xs-12 col-sm-6 col-md-4 col-lg-4";
               break;
              case "4 Columns":
               $class_bootstrap = "col-xs-12 col-sm-6 col-md-4 col-lg-3";
               break;
              case "6 Columns":
               $class_bootstrap = "col-xs-12 col-sm-6 col-md-4 col-lg-2";
               break;

              default:
               $class_bootstrap = "col-xs-12 col-sm-12 col-md-12 col-lg-12";
               break;
             }
            $item_class = 'zo-fancy-box-item '.($class_bootstrap);
            for($i=1;$i<=$columns;$i++){ ?>
                <?php if($i!=5):?>
                <?php
                $icon = isset($atts['icon'.$i])?$atts['icon'.$i]:'';
                $content = isset($atts['description'.$i])?$atts['description'.$i]:'';
                $image = isset($atts['image'.$i])?$atts['image'.$i]:'';
                $title = isset($atts['title'.$i])?$atts['title'.$i]:'';
                $button_link = isset($atts['button_link'.$i])?$atts['button_link'.$i]:'';
                $image_url = '';
                if (!empty($image)) {
                    $attachment_image = wp_get_attachment_image_src($image, 'full');
                    $image_url = $attachment_image[0];
                }
                $zo_fancybox_boder_color = isset( $atts['zo_fancybox_boder_color'] ) ? $atts['zo_fancybox_boder_color'] : '';
                $zo_fancybox_bg_color = isset( $atts['zo_fancybox_bg_color'] ) ? $atts['zo_fancybox_bg_color'] : '';
                $zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : 'h4';
                $text_more_info = isset( $atts['text_more_info'] ) ? $atts['text_more_info'] : 'Text';
                $text_more_info_color = isset( $atts['text_more_info_color'] ) ? $atts['text_more_info_color'] : '';
                $text_more_info_color_hover = isset( $atts['text_more_info_color_hover'] ) ? $atts['text_more_info_color_hover'] : '';
                $button_more_info = isset( $atts['button_more_info'] ) ? $atts['button_more_info'] : '';
                $button_more_info_border_color = isset( $atts['button_more_info_border_color'] ) ? $atts['button_more_info_border_color'] : '';
                $button_more_info_border_color_hover = isset( $atts['button_more_info_border_color_hover'] ) ? $atts['button_more_info_border_color_hover'] : '';
                $button_more_info_bg_color = isset( $atts['button_more_info_bg_color'] ) ? $atts['button_more_info_bg_color'] : '';
                $button_more_info_bg_color_hover = isset( $atts['button_more_info_bg_color_hover'] ) ? $atts['button_more_info_bg_color_hover'] : '';
                $zo_fancybox_icon_color = isset( $atts['zo_fancybox_icon_color'] ) ? $atts['zo_fancybox_icon_color'] : '';
                $zo_fancybox_title_color = isset( $atts['zo_fancybox_title_color'] ) ? $atts['zo_fancybox_title_color'] : '';
                $zo_fancybox_content_color = isset( $atts['zo_fancybox_content_color'] ) ? $atts['zo_fancybox_content_color'] : '';
                
                ?>
                    <div class="<?php echo esc_attr($item_class);?>">
                        <?php if($image_url):?>
                        <div class="zo-fancy-box-image">
                            <img src="<?php echo esc_attr($image_url);?>" alt="" />
                        </div>
                        <?php else:?>
                        <div class="zo-fancy-box-content-icon col-xs-2 col-sm-2 col-md-2 col-lg-2" data-zo-bordersize="2" data-zo-skewsize="10" data-zo-bordercolor="#efbd07" data-zo-skew="bottom">
                            <i class="<?php echo esc_attr($icon);?>" style="background-color: <?php echo esc_attr($zo_fancybox_bg_color); ?>; border-color: <?php echo esc_attr($zo_fancybox_boder_color); ?>; color: <?php echo esc_attr($zo_fancybox_icon_color); ?>;"></i>
                        </div>
                        <?php endif;?>
                        <div class="zo-fancy-box-boxright col-xs-10 col-sm-10 col-md-10 col-lg-10">
                          <?php if($title):?>
                          <div class="zo-fancy-box-content-title">
                              <<?php echo esc_attr($zo_title_size); ?> class="zo-fancy-box-title" style="color: <?php echo esc_attr($zo_fancybox_title_color); ?>;">
                                  <?php echo apply_filters('the_title',$title);?>
                              </<?php echo esc_attr($zo_title_size); ?>>
                          </div>    
                          <?php endif;?>
                          <div class="zo-fancy-box-content" style="color: <?php echo esc_attr($zo_fancybox_content_color); ?>;">
                              <?php echo apply_filters('the_content',$content);?>
                          </div>
                          <?php if($atts['button_text']!=''):?>
                              <div class="zo-fancyboxes-readmore">
                                  <?php
                                  $class_btn = ($atts['button_type']=='button')?'btn btn-large':'';
                                  $text_button_color = '';
                                  $text_button_color_hover = '';
                                  $btn_border_color = '';
                                  $btn_bg_color = '';
                                  $btn_border_color_hover = '';
                                  $btn_bg_color_hover = '';
                                  if (($atts['button_type']=='text') && $text_more_info == 'yes') {
                                    $text_button_color = $text_more_info_color; 
                                    $text_button_color_hover = $text_more_info_color_hover; 
                                  }
                                  if (($atts['button_type']=='button') && $button_more_info == 'yes') {
                                    $btn_border_color = $button_more_info_border_color;
                                    $btn_bg_color = $button_more_info_bg_color;
                                    $btn_border_color_hover = $button_more_info_border_color_hover;
                                    $btn_bg_color_hover = $button_more_info_bg_color_hover;
                                  }
                                  ?>
                                  <a style="background-color: <?php echo esc_attr($btn_bg_color); ?>; border-color: <?php echo esc_attr($btn_border_color); ?>; color: <?php echo esc_attr($text_button_color); ?>" href="<?php echo esc_url($button_link);?>" class="<?php echo esc_attr($class_btn);?>"><?php echo esc_attr($atts['button_text']);?></a>
                              </div>
                          <?php endif;?>
                        </div>
                    </div>
                <?php endif;?>
            <?php }
        ?>
    </div>
</div>
<?php if(isset($text_button_color_hover) || isset($btn_border_color_hover) || isset($btn_bg_color_hover) ){?>
	<style type="text/css">	
		.<?php echo esc_attr($class_link); ?>.zo-fancybox-layout-default .zo-fancyboxes-readmore a:hover {
			<?php if(isset($text_button_color_hover)){?>color: <?php echo esc_attr($text_button_color_hover); ?> !important;<?php }?>
			<?php if(isset($btn_border_color_hover)){?>border-color: <?php echo esc_attr($btn_border_color_hover); ?> !important;<?php }?>
			<?php if(isset($btn_bg_color_hover)){?>background-color: <?php echo esc_attr($btn_bg_color_hover); ?> !important;<?php }?>
		}
	</style>
<?php }?>