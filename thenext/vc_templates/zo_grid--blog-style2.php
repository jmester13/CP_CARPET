<?php 
    /* get categories */
        $taxo = 'category';
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
?>  
<div class="zo-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
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
    <div class="row zo-grid zo-grid-blog-style2  zo-masonry-post <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'medium':'full';
        /* Loadmore masonry*/
        $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1; 
        $zo_loadmore_opt = array(
           'posts' => $atts['posts']->query,
           'atts' => array(
               'layout' =>$atts['layout'],
               'item_class' =>$atts['item_class'],
               'layout' =>$atts['layout'],
               'max_num_pages' =>$posts->max_num_pages,
               'paged' =>$paged,
               'post_count' =>$posts->post_count,
               'max_num_pages' =>$posts->max_num_pages,
               'found_posts' =>$posts->found_posts,
           ),
        );  
        zo_before_loadmore($zo_loadmore_opt);
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <?php get_template_part('single-templates/grid-style2/content',get_post_format()); ?>
            </div>
            <?php
        }
        
        ?>
    </div>
    
    <?php
    zo_after_loadmore();
    wp_reset_postdata();
    ?>
</div>
