<div class="zo-carousel zo-carousel-team-layout1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : '';
        ?>
        <div class="zo-carousel-item">
            <div class="zo-carousel-title">
                <<?php echo esc_attr($zo_title_size); ?>>
                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title();?></a>
                </<?php echo esc_attr($zo_title_size); ?>>
            </div>
            <div class="zo-carousel-categories">
                <?php the_terms( get_the_ID(), 'team-category', '', ' / ' ); ?>
            </div>
            <?php 
                if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                    $class = ' has-thumbnail';
                    $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="'.ZO_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
                endif;
                echo '<div class="zo-carousel-media '.esc_attr($class).'"><a title="'.get_the_title().'" href="'.get_the_permalink().'">'.$thumbnail.'</a></div>';
            ?>
        </div>
        <?php
    }
    wp_reset_postdata();
    ?>
</div>