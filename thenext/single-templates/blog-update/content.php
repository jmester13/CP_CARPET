<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-blog entry-post">
		<div class="entry-header entry-feature-wrap">
			<div class="zo-grid-date-detail-wrap">
	            <div class="zo-grid-date-detail">
	                <div class="date"><?php echo get_the_date("d");?></div>
	                <div class="month"><?php echo get_the_date("M"); ?></div>
	            </div>
	        </div>
			<?php
				if(has_post_thumbnail()){
					$class = ' has-thumbnail';
					$img_url = zo_image_resize(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())),370,250,true,true,true);
				}else{
					$class = ' no-image';
					$img_url = get_template_directory_uri().'/assets/images/sample.png';
				}
			?>
			<div class="entry-feature entry-feature-image <?php echo esc_attr($class);?>">
			<a class="zo-nedws-readmore" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">	<img src="<?php echo esc_attr($img_url);?>" alt="<?php _e("Thumbnail", 'thenext');?>" /></a>
			</div>
			<div class="zo-grid-overlay">
                <ul class="zo-grid-meta-overlay">
                    <li class="detail-comment"><a href="<?php the_permalink(); ?>"><i class="fa fa-comments-o"></i> <?php echo comments_number('0','1','%'); ?> <?php _e('Comments', 'thenext'); ?></a></li>
                    <li class="detail-like"><?php zo_get_post_like('type-2'); ?></li>
                </ul>
            </div>
		</div>
    	<h2 class="zo-grid-title entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
    	<div class="zo-grid-detail">
            <div class="post-by"><?php _e('Post by: ', 'thenext'); ?> <?php the_author_posts_link(); ?> in <?php the_terms( get_the_ID(), 'category', '', ' - ' ); ?></div>
        </div>

        <!-- .entry-header -->
		<div class="entry-content">
			<?php  echo zo_limit_word_for_excerpt(apply_filters('the_content', preg_replace(array('/\[audio(.*)](.*)\[\/audio\]/', '/\[playlist(.*)]/','/\[gallery(.*)]/','/\<blockquote\>(.*?)\<\/blockquote\>/ms','/\[embed(.*)](.*)\[\/embed\]/', '/\[video(.*)](.*)\[\/video\]/'), '', get_the_content())),19);
	    		zo_archive_readmore();
			?>
		</div>
		<!-- .entry-content -->
	</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->
