<?php 
    /* get categories */
        $taxo = 'service-category';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']==''){
            $terms = get_terms($taxo);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;

    $zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : 'h2';
?>
<div class="zo-grid-wraper zo-grid-service-wrap <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout']=='masonry'):?>
        <div class="zo-grid-filter">
            <ul class="zo-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php esc_html_e('All', 'thenex'); ?></a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_attr( $term->name ); ?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row zo-grid zo-grid-service-inner <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'medium':'large';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="zo-grid-item-inner">
                    <div class="zo-grid-content ">
                        <div class="zo-grid-content-inner">
                            <div class="zo-grid-categories">
                                <?php echo get_the_term_list( get_the_ID(), $taxo, '', ', ', '' ); ?>
                            </div>
                            <<?php echo esc_attr($zo_title_size); ?> class="zo-grid-title">
                                <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title();?></a>
                            </<?php echo esc_attr($zo_title_size); ?>>

                            <div class="zo-grid-detail">
                                <?php the_excerpt();?>
                            </div>
                            <div class="zo-grid-read-more">
                                <?php zo_archive_readmore_nobutton();?>
                            </div>
                        </div>
                    </div>
                    <div class="zo-grid-feature ">
                        <div class="zo-grid-feature-media">
                            <?php 
                                if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                                    $class = ' has-thumbnail';
                                    $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                                else:
                                    $class = ' no-image';
                                    $thumbnail = '<img src="'.ZO_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
                                endif;
                                echo '<div class="zo-grid-image '.esc_attr($class).'">'.$thumbnail.'</div>';
                            ?>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>
</div>