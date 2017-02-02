<div class="zo-masonry-wrapper zo-masonry-page-wrapper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row zo-masonry">
        <?php
        $posts = $atts['posts'];
        $i = 0;
        while($posts->have_posts()){
            $posts->the_post();
            $zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : 'h2';
            /**
             * Get Masonry Size
             * It's require, don't remove it
             * zo_masonry_size()
             */
            $size = zo_masonry_size($atts['post_id'] , $atts['html_id'], $i);
            ?>
            <div class="zo-masonry-item item-w<?php echo esc_attr($size['width']); ?> item-h<?php echo esc_attr($size['height']); ?>">
                <?php 
                    if(has_post_thumbnail()):
                        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        $thumbnail = $thumbnail[0];
                    else:
                        $thumbnail = ZO_IMAGES.'no-image.jpg';
                    endif;

                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-teaser'); ?>  style="background-image: url('<?php echo esc_url($thumbnail); ?>')">
                    <!-- <div class="zo-masonry-img">
                        <img src= '<?php echo esc_url($thumbnail); ?>' class="attachment-full wp-post-image" alt="blog-masonry">
                    </div> -->
                    <div class="zo-masonry-category">
                        <?php the_terms( get_the_ID(), 'category', '', ' - ' ); ?>
                    </div>
                    <div class="zo-masonry-title">
                        <<?php echo esc_attr($zo_title_size); ?>>
                            <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title();?></a>
                        </<?php echo esc_attr($zo_title_size); ?>>
                    </div>
                    <div class="zo-masonry-date">
                        <?php echo get_the_date("M d, Y");?>
                    </div> 
                    <div class="zo-masonry-content">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="zo-masonry-info">
                        <ul>
                            <li class="likes"><?php zo_get_post_like('type-1'); ?></li>
                            <li class="author"><?php echo get_avatar( get_the_author_meta( get_the_ID() ), 32 ); ?><?php the_author_posts_link(); ?></li>
                            <li class="detail-comment"><i class="fa fa-comments-o"></i><a href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?></a></li>
                        </ul>
                    </div>
                </article>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>
</div>