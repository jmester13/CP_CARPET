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
            $thumbnail = '<img src="' .get_template_directory_uri(). '/assets/images/sample.png"/>';
            endif;
    ?>
    <div class="zo-grid-media <?php echo esc_attr($class); ?>">
       <?php echo $thumbnail; ?>
       <div class="ImageOverlayH"><?php the_terms( get_the_ID(), 'category', '', ' - ' ); ?></div>
    </div>
   
    <h2 class="zo-grid-title"><a href="<?php the_permalink() ?>"><?php the_title();?></a></h2>
    <div class="zo-grid-time">
        <?php the_time('F j, Y');?>
    </div>
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
