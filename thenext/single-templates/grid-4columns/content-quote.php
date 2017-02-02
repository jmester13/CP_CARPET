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
     <div class="zo-grid-media zo-news-image zo-news-quote-wrapper">
        <div class="zo-news-feature zo-news-feature-image"><?php the_post_thumbnail( 'full' ); ?></div>
    </div>
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
