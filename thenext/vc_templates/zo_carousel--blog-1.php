<div class="zo-carousel zo-blog-layout1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : '';
        ?>
        <div class="zo-carousel-item">
            <?php
                get_template_part( 'single-templates/grid/content', get_post_format() );
            ?>
        </div>
        <?php
    }  
    wp_reset_postdata();
    ?>
</div>