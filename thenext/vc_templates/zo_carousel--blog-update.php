<div class="zo-carousel zo-carousel-blog-update <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : 'h2';
        ?>
        <div class="zo-carousel-item">
            <div class="zo-carousel-image-wrap">
                <div class="zo-carousel-date-detail-wrap">
                    <div class="zo-carousel-date-detail">
                        <div class="date"><?php echo get_the_date("d");?></div>
                        <div class="month"><?php echo get_the_date("M"); ?></div>
                    </div>
                </div>
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                    endif;
                    echo '<div class="zo-carousel-image '.esc_attr($class).'"><a title="'.get_the_title().'" href="'.get_the_permalink().'">'.$thumbnail.'</a></div>';
                ?>
                <div class="zo-carousel-overlay">
                    <ul>
                        <li class="detail-comment"><i class="fa fa-comments-o"></i><a href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?> <?php _e('Comments', 'thenext'); ?></a></li>
                        <li class="detail-like"><?php zo_get_post_like('type-2'); ?></li>
                    </ul>
                </div>
            </div>
            <div class="zo-carousel-title">
                <<?php echo esc_attr($zo_title_size); ?>>
                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title();?></a>
                </<?php echo esc_attr($zo_title_size); ?>>
            </div>
            <div class="zo-carousel-detail">
                <div class="post-by"><?php _e('Post by: ', 'thenext'); ?> <?php the_author_posts_link(); ?> in <?php the_terms( get_the_ID(), 'category', '', ' - ' ); ?></div>
                <div class="excerpt"> <?php the_excerpt(); ?></div>
            </div>
            <a class="btn btn-readmore" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php _e('Read More ', 'thenext') ?> <i class="fa fa-angle-double-right"></i></a>
        </div>
        <?php
    }
    wp_reset_postdata();
    ?>
</div>

