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
	
	
	<?php 
		if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
			$class = ' has-thumbnail';
			$thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
			else:
			$class = ' no-image';
			$thumbnail = '<img src="'.ZO_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
			endif;
		echo '<div class="zo-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
	?>
    <div class="zo-info">
        <span class="zo-author"><?php echo _e('By ', 'thenext');  the_author_posts_link(); ?></span>
        <span class="zo-grid-categories"> <?php the_terms( get_the_ID(), 'category', 'In ', '- ' ); ?></span>
        <span class="zo-grid-time"> <?php echo _e('On ','thenext'); the_time('F j, Y');?></span>
    </div>
    <h3 class="zo-grid-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>	
    <div class="zo-grid-description">  <?php the_excerpt(); ?></div>
    <div class="zo-grid-footer">
        <div class="zo-grid-readmore"> <a class="zo-news-readmore" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php _e('Read More', 'thenext') ?></a></div>
    </div>
</article>
