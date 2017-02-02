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
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('news-list'); ?>>
	<div class="zo-grid-categories">
	 	<?php the_terms( get_the_ID(), 'category', 'In ', ', ' ); ?>
	</div>
	<div class="zo-grid-time">
    	<?php the_time('F j, Y');?>
    </div>
    <?php 
    	if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
			$class = ' has-thumbnail';
		    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
			$thumbnail = $image[0];
			else:
			$class = ' no-image';
			$thumbnail = ZO_IMAGES;
			endif;
    ?>

    <div class="zo-news-image zo-news-quote-wrapper">
	    <div class="zo-news-feature zo-news-feature-image"><?php the_post_thumbnail( 'full' ); ?></div>
    	<div class="entry-feature-quocte-inner">
		    <div class="zo-news-feature zo-news-feature-quote"><?php $quote = zo_archive_quote(); ?></div>
    	</div>
	</div>
    <h3 class="zo-grid-title"> <?php the_title();?></h3>	
	<div class="zo-grid-description">  <?php the_excerpt(); ?></div>
	<div class="zo-grid-footer row">
		<div class="zo-author col-md-6"><?php echo _e('Post by ', 'thenext');  the_author(); ?></div>
		<div class="zo-grid-readmore col-md-6"> <a class="zo-news-readmore" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php _e('Read More', 'thenext') ?></a></div>
	</div>
</article>
