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
    <div class="zo-news-image zo-news-gallery"><?php zo_archive_gallery(); ?></div>
   	<h3 class="zo-grid-title"> <?php the_title();?></h3>	
    <div class="zo-grid-description">  <?php the_excerpt(); ?></div>
    <div class="zo-grid-footer row">
        <div class="zo-author col-md-6"><?php echo _e('Post by ', 'thenext');  the_author(); ?></div>
        <div class="zo-grid-readmore col-md-6"> <a class="zo-news-readmore" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php _e('Read More', 'thenext') ?></a></div>
      </div>
</article>
