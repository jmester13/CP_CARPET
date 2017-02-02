<?php 
    /* get categories */
    $taxonomy = 'portfolio-category';
    $_category = array();
    if(!isset($atts['cat']) || $atts['cat']==''){
        $terms = get_terms($taxonomy);
        foreach ($terms as $cat){
            $_category[] = $cat->term_id;
        }
    } else {
        $_category  = explode(',', $atts['cat']);
    }
    $atts['categories'] = $_category;
?>
<div class="zo-masonry-wrapper zo-portfolio-wrapper zo-masonry-page-portfolio-wrapper zo-portfolio-overlay-has-prettyphoto type2 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter'] == 1 ) :?>
        <div class="zo-grid-filter zo-masonry-filter">
            <ul class="zo-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php esc_html_e('All', 'thenex'); ?></a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxonomy );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_attr( $term->name ); ?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="zo-masonry zo-masonry-wrap">
        <?php
        $posts = $atts['posts'];
        $i = 0;

        $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'medium':'full';
        $layout = isset($atts['layout']) ? $atts['layout'] : 'masonry';
        /* Loadmore masonry*/
        $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1; 
        global $zo_masonry;
        $zo_loadmore_opt = array(
           'posts' => $atts['posts']->query,
           'atts' => array(
               'item_class' =>$atts['item_class'],
               'layout' => $layout,
               'paged' =>$paged,
               'post_count' =>$posts->post_count,
               'max_num_pages' =>$posts->max_num_pages,
               'found_posts' =>$posts->found_posts,$atts['html_id'],
               'html_id' =>$atts['html_id'],
               'post_id' =>$atts['post_id'],
               'masonry_option' => $zo_masonry,
               'id_cat_filter' => $_category,
           ),
        ); 
        zo_before_loadmore_refresh($zo_loadmore_opt);
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            /**
             * Get Masonry Size
             * It's require, don't remove it
             * zo_masonry_size()
             */
            $size = zo_masonry_size($atts['post_id'] , $atts['html_id'], $i);
            ?>
            <div class="zo-masonry-item zo-masonry-item-style1 item-w<?php echo esc_attr($size['width']); ?> item-h<?php echo esc_attr($size['height']); ?>"
                     data-groups='[<?php echo implode(',', $groups);?>]' data-index="<?php echo esc_attr($i); ?>" data-id="<?php echo esc_attr($atts['post_id']); ?>">
                <?php get_template_part('single-templates/portfolio/content','masonry-noprettyphoto'); ?>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
    <?php
    //zo_after_loadmore();
    wp_reset_postdata();
    ?>
</div>