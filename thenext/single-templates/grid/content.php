<?php
/**
 * The default template for displaying content
 *
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?>
<?php
$zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : 'h2';
$size = ( isset($atts['layout']) && $atts['layout']=='basic')?'thumbnail':'medium';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('news-list'); ?>>
	<div class="zo-grid-categories">
	 	<?php the_terms( get_the_ID(), 'category', 'In ', ', ' ); ?>
	</div>
	<div class="zo-grid-time">
    	<?php the_time('F j, Y');?>
    </div>
	<?php 
		if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
			$class = ' has-thumbnail';
			$thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
			else:
			$class = ' no-image';
			$thumbnail = '<a class="zo-news-readmore" href="'. the_permalink() .'" rel=""><img src="'.ZO_IMAGES.'no-image.jpg" alt="'.get_the_title().'" /></a>';
			endif;
		echo '<div class="zo-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
	?>
	<h3 class="zo-grid-title"> <?php the_title();?></h3>	
    <div class="zo-grid-description">  <?php the_excerpt(); ?></div>
    <div class="zo-grid-footer row">
        <div class="zo-author col-md-6"><?php echo _e('Post by ', 'thenext');  the_author(); ?></div>
        <div class="zo-grid-readmore col-md-6"> <a class="zo-news-readmore" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php _e('Read More', 'thenext') ?></a></div>
      </div>
</article>
