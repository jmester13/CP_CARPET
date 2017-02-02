<div class="zo-carousel zo-carousel-client <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : 'h2';
        ?>
        <div class="zo-carousel-item">
            <div class="zo-carousel-left col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.ZO_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="zo-carousel-image'.esc_attr($class).'"><a title="'.get_the_title().'" href="'.get_the_permalink().'">'.$thumbnail.'</a></div>';
                ?>
                
            </div>
            <div class="zo-carousel-right col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="zo-carousel-client-name">
                    <<?php echo esc_attr($zo_title_size); ?>>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title();?></a>
                    </<?php echo esc_attr($zo_title_size); ?>>
                </div>
                <div class="zo-carousel-client-join-date"><?php echo get_the_date("M d , Y");?></div>
                <div class="zo-separator-type-2"></div>
                <div class="zo-carousel-client-about"><?php the_excerpt(); ?></div>
                <!-- social icon -->
                <div class="zo-carousel-client-social-network">
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
            </div>
        </div>
        <?php
    }
    wp_reset_postdata();
    ?>
</div>

