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
        <div class="zo-portfolio-image">
			<?php
				if(has_post_thumbnail()){
					$class = ' has-thumbnail';
					$img_url = zo_image_resize(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())),480,480,true,true,true);
				}else{
					$class = ' no-image';
					$img_url = get_template_directory_uri().'/assets/images/sample.png';
				}
			?>
			<div class="<?php echo esc_attr($class);?>">
				<img src="<?php echo esc_attr($img_url);?>" width="480" height="480" alt="<?php _e("Thumbnail", 'thenext');?>" />
			</div>
		</div>
        <div class="zo-portfolio-overlay">
            <div class="top-left"></div>
            <div class= "top-right"></div>
            <div class= "bottom-left"></div>
            <div class="bottom-right"></div>
            <ul>
                <li><a class="prettyphoto" href="<?php  echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full')['0'];?>"><i class="fa fa-search rotate"></i></a></li>
                <li><a href="<?php the_permalink() ?>"><i class="fa fa-link"></i></a></li>
            </ul>
        </div>
    </div>
</article>
