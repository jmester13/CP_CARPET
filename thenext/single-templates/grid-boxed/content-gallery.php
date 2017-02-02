
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
    <h2 class="zo-grid-title"><a href="<?php the_permalink() ?>"><?php the_title();?></a></h2>
    <div class="zo-grid-time">
        <?php the_time('F j, Y');?>
    </div>
    <div class="zo-news-image zo-news-gallery"><?php zo_archive_gallery(); ?></div>
    <div class="zo-grid-terms">In <?php the_terms( get_the_ID(), 'category', '', ' - ' ); ?></div>
    <div class="zo-grid-description">  <?php the_excerpt(); ?></div>
    <div class="zo-grid-metadata ">
        <div class="zo-grid-metadata-item zo-item-like-wrapper">
            <div class="zo-item-like">
                <?php zo_get_post_like('type-1'); ?>
            </div>
        </div>
        <div class="zo-grid-metadata-item zo-item-author-wrapper ">
            <div class="zo-item-author">
                <?php echo get_avatar(  get_the_author_meta( get_the_ID() ), '46' ); ?>
                <p><?php  the_author(); ?></p>
            </div>
        </div>
        <div class="zo-grid-metadata-item zo-item-countcomment-wrapper ">
            <div class="zo-item-countcomment">
                <a class="" href="<?php the_permalink(); echo __('#comments','thenext'); ?>">
                   <i class="fa fa-comment-o"></i>
                    <span><?php comments_number(__('0','thenext'),__('1','thenext'),__('%','thenext')); ?></span> 
               </a>
            </div>
        </div>
    </div>
    
</article>
