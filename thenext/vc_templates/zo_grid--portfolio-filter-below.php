<?php
/* Get Categories */
$taxo = 'portfolio-category';
$_category = array();
if (!isset($atts['cat']) || $atts['cat'] == '') {
    $terms = get_terms($taxo);
    foreach ($terms as $cat) {
        $_category[] = $cat->term_id;
    }
} else {
    $_category = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;
?>
<div class="zo-grid-wrapper zo-portfolio-wrapper <?php echo esc_attr($atts['template']); ?>"
     id="<?php echo esc_attr($atts['html_id']); ?>">
    <div class="no-container">
        <div class="zo-grid zo-grid-portfolio <?php echo esc_attr($atts['grid_class']); ?>">
            <?php
            $posts = $atts['posts'];
            $size = ($atts['layout'] == 'basic') ? 'thumbnail' : 'medium';
            while ($posts->have_posts()) :
                $posts->the_post();
                $groups = array();
                $groups[] = '"all"';
                foreach (zoGetCategoriesByPostID(get_the_ID(),'portfolio-category') as $category) {
                    $groups[] = '"category-' . $category->slug . '"';
                }
                $zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : 'h2';
                ?>
                <div class="<?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                    <?php get_template_part('single-templates/portfolio/content','filter-below'); ?>
                </div>
            <?php
            endwhile;
            ?>
        </div>
        <?php if ($atts['filter'] == 1 and $atts['layout'] == 'masonry'): ?>
            <div class="zo-grid-filter">
                <ul>
                    <li ><a data-group="all" class="active" href="#"><?php esc_html_e('All', 'thenex'); ?></a></li>
                    <?php foreach ($atts['categories'] as $category): ?>
                        <?php $term = get_term($category, 'portfolio-category'); ?>
                        <li ><a data-group="<?php echo esc_attr('category-' . $term->slug); ?>" href="#" >
                                <?php echo esc_attr( $term->name ); ?>
                            </a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        <?php endif; ?>
        <?php
        zo_paging_nav();
        wp_reset_postdata();
        ?>
    </div>
</div>