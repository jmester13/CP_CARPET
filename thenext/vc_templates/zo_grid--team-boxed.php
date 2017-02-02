<?php 
    /* Get Categories */
        $taxo = 'team-category';
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
<div class="zo-grid-wraper zo-team-4 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout']=='masonry'):?>
        <div class="zo-grid-filter">
            <ul>
                <li><a class="active" href="#" data-group="all"><?php esc_html_e('All', 'thenex'); ?></a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, 'category' );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_attr( $term->name ); ?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row zo-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $count_team = 0;
        $img_right = false;
        $is_wrap = true;
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            $img_right = !$img_right;
            foreach(zoGetCategoriesByPostID(get_the_ID()) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            if(($count_team % 2)== 0){
                $is_wrap = true;
            }
            else  $is_wrap = false;
            $count_team ++;
            if($is_wrap):
            ?>
            <div class="container">
                <div class="row">
            <?php endif;?>
            <?php 
                if($img_right)
                    get_template_part('single-templates/team/content', 'structure-right'); 
                else 
                    get_template_part('single-templates/team/content', 'structure-left');
            ?>
            <?php if (!$is_wrap) :?>
                </div>
            </div>
            <?php endif;?>
            <?php
        }    
        wp_reset_postdata();
        ?>
    </div>
</div>