
<div class="zo-carousel zo-carousel-client-oval <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : 'h2';
        ?>
        <div class="zo-carousel-item">
            <div class="zo-client-oval-img col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <?php
					if(has_post_thumbnail()){
						$class = ' has-thumbnail';
						$img_url = zo_image_resize(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())),192,228,true,true,true);
					}else{
						$class = ' no-image';
						$img_url = get_template_directory_uri().'/assets/images/sample.png';
					}
				?>
				<div class="zo-carousel-image <?php echo esc_attr($class);?>">
					<img src="<?php echo esc_attr($img_url);?>" alt="<?php echo get_the_title();?>" />
				</div>
            </div>
            <div class="zo-client-oval-detail col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="zo-carousel-client-name">
                    <<?php echo esc_attr($zo_title_size); ?>>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title();?></a>
                    </<?php echo esc_attr($zo_title_size); ?>>
                </div>
                <!-- social icon -->
                <div class="zo-carousel-client-social-network zo-client-icon-social-circle">
                    <?php $metas = str_replace('}','',str_replace('{','',get_post_meta( get_the_ID(),'_zo_meta_data')));
                        $meta_string = $metas['0'];
                        $meta_data = explode(',', $meta_string);
                        echo '<ul class="social-sq">';
                        foreach ($meta_data as $value) {
                            $val = explode(':', $value);
                            if($val['1'] != '""') {
                                switch ($val['0']) {
                                    case '"_zo_client_facebook"':
                                        echo '<li><a href='.$val['1'].'><i class="fa fa-facebook"></i></a></li>';  
                                        break;
                                    case '"_zo_client_twitter"':
                                        echo '<li><a href='.$val['1'].'><i class="fa fa-twitter"></i></a></li>';  
                                        break;
                                    case '"_zo_client_pinterest"':
                                        echo '<li><a href='.$val['1'].'><i class="fa fa-pinterest-p"></i></a></li>';  
                                        break;
                                    case '"_zo_client_linkedin"':
                                        echo '<li><a href='.$val['1'].'><i class="fa fa-linkedin"></i></a></li>';  
                                        break;
                                    
                                    default:
                                        break;
                                }
                            }
                        }/*end for*/
                        echo '</ul>';
                     ?>
                </div>
                <div class="zo-carousel-client-about"><?php the_excerpt(); ?></div>
            </div>
        </div>
        <?php
    }
    wp_reset_postdata();
    ?>
</div>

