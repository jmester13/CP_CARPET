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
	if(has_post_thumbnail()):
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		$thumbnail = $thumbnail[0];
	else:
		$thumbnail = ZO_IMAGES.'no-image.jpg';
	endif;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-teaser'); ?> style="background-image: url('<?php echo esc_url($thumbnail); ?>');">
	<div class="zo-portfolio-overlay">
		<div class="zo-portfolio-overlay-top">
			<div class= "prett-photo">
			<a class="zo-image-link prettyphoto" href="<?php echo esc_url($thumbnail); ?>" data-original-title="<?php the_title();?>">
				<i class="fa fa-search rotate"></i>
				<img alt="<?php the_title();?>" src="<?php echo esc_url($thumbnail); ?>" style="display: none;" />
			</a>
			</div>
		</div>
		<div class="zo-portfolio-overlay-bottom zo-portfolio-overlay-bottom-wrap">
			<div class="zo-portfolio-overlay-bottom-inner">
				<div class= "view-detail"><a href="<?php the_permalink() ?>"><span><?php echo get_the_title( $post->ID );?></span></a></div>
	            <div class= "term-detail"><?php the_terms( $post->ID, 'portfolio-category', '', ' - ' ); ?></div>
			</div>
		</div>
	</div>
</article>