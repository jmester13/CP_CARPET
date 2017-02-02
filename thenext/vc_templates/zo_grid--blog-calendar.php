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
    <div class="row zo-grid zo-grid-blog-calendar <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'medium':'full';
        wp_enqueue_script('mediaelement');
        wp_enqueue_style('mediaelement');
        wp_register_script( 'zo-load-more-js', get_template_directory_uri().'/assets/js/zo_loadmore.js', array('jquery') ,'1.0',true);
        $max = $posts->max_num_pages;
        $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1; 
        // Add some parameters for the JS.
        wp_localize_script(
            'zo-load-more-js',
            'zo_more_obj',
            array(
                'startPage' => $paged,
                'maxPages' => $max,
                'total' => $posts->found_posts,
                'perpage' => $posts->post_count,
                'nextLink' => next_posts($max, false),
                'ajaxType' => 'Button',
                'masonry' => 'grid'
            )
        );
        wp_enqueue_script( 'zo-load-more-js' );
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <?php get_template_part('single-templates/calendar/content',get_post_format()); ?>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="zo_pagination"></div>
    <?php
   // zo_paging_nav($posts);
    wp_reset_postdata();
    ?>
</div>