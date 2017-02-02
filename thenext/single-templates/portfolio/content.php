<?php
/**
 * The default template for displaying content
 *
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
	global $post;
	$zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : 'h2';
	$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-teaser'); ?>>
    <div class="zo-portfolio-box">
        <div class="zo-portfolio-image"><?php the_post_thumbnail( 'medium' ); ?></div>
        <div class="zo-portfolio-overlay">
            <div class= "left"><a class="prettyphoto" href="<?php echo esc_url($image_data['0']);?>"><i class="fa fa-search rotate"></i></a></div>
            <div class="right"><a href="<?php the_permalink() ?>"><i class="fa fa-link"></i></a></div>
        </div>
    </div>
</article>