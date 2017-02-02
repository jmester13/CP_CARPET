<?php
wp_enqueue_script('zo-slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'));
wp_enqueue_script('zo-slick-js', get_template_directory_uri() . '/assets/js/zo_slick_home3.js', array('jquery'));
wp_enqueue_style('zo-slick', get_template_directory_uri() . '/assets/css/slick.css');
?>
<div class="zo-carousel-client-home3 <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>"> 
    <div class="slider-for-home3">
        <?php
                $posts = $atts['posts'];
                while ($posts->have_posts()) {
                    $posts->the_post();
                    $zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : '';
                    ?>
                    <div class="item">
                        <div class="zo-carousel-client-about"><?php the_excerpt(); ?></div>
                        <div class="zo-carousel-title">
                            <?php echo esc_attr($zo_title_size); ?>
                            <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a>
                            </<?php echo esc_attr($zo_title_size); ?>>
                        </div>
                        <div class="zo-carousel-client-social-network">
                            <ul class="social-sq">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>   
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>    
                            </ul>
                        </div>
                    </div>
                    <?php
                }
                ?>
    </div>
        <div class="slider-nav-home3">
            <?php
                $post = $atts['posts'];
                while ($post->have_posts()) {
                    $post->the_post();
                    $zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : '';
                    ?>
                    <div class="zo-carousel-media has-thumbnail">
                         <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail', false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.ZO_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="zo-carousel-image'.esc_attr($class).'"><a>'.$thumbnail.'</a></div>';
                ?>
                    </div>
                    <?php
                }
                ?>
        </div>
</div>