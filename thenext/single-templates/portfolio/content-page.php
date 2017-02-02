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
	$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-teaser'); ?>>
    <div class="zo-portfolio-box">
        <div class="zo-portfolio-image">
			<?php
				if(has_post_thumbnail()){
					$class = ' has-thumbnail';
					$img_url = zo_image_resize(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())),570,400,true,true,true);
				}else{
					$class = ' no-image';
					$img_url = get_template_directory_uri().'/assets/images/sample.png';
				}
			?>
			<div class="<?php echo esc_attr($class);?>">
				<img src="<?php echo esc_attr($img_url);?>" width="570" height="400" alt="<?php _e("Thumbnail", 'thenext');?>" />
			</div>
		</div>
        <div class="zo-portfolio-overlay-wrap">
	        <div class="zo-portfolio-overlay-inner">
	            <div class= "prett-photo">
					<a class="zo-image-link prettyphoto" href="<?php echo esc_url($image_data['0']);?>" data-original-title="<?php the_title();?>">
						<i class="ion-android-add"></i>
						<img alt="<?php the_title();?>" src="<?php echo esc_url($image_data['0']);?>" style="display: none;" />
					</a>
				</div>
	            <div class= "view-detail"><a href="<?php the_permalink() ?>"><span><?php echo get_the_title( $post->ID );?></span></a></div>
	            <div class= "term-detail"><?php the_terms( $post->ID, 'portfolio-category', '', ' - ' ); ?></div>
	        </div>
        </div>
    </div>
</article>