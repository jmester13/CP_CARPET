
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
	<div class="entry-blog entry-post entry-blog-list-sidebar">
		<div class="row">
			<div class="entry-blog-left entry-post-left col-md-5 col-lg-5 col-sm-5 col-xs-12">
		        <div class="entry-header entry-audio">
					    <?php 
							if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
								$class = ' has-thumbnail';
								$thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
								else:
								$class = ' no-image';
								$thumbnail = '<img src="'.ZO_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
								endif;
							echo '<div class="entry-feature entry-feature-image '.esc_attr($class).'">'.$thumbnail.'</div>';
						?>
		    		<div class="entry-feature entry-feature-audio"><?php $audio = zo_archive_audio(); ?></div>
				</div>
			</div>
			<div class="entry-blog-right entry-post-right col-md-7 col-lg-7 col-sm-7 col-xs-12">
	        	<h2 class="entry-title"><?php the_title(); ?></h2>
	        	<div class="zo-metadata-wrapper">
	            	<span class="zo-detail-author"><?php echo _e('By ', 'thenext');  the_author_posts_link(); ?></span>
			        <span class="zo-detail-categories"> <?php the_terms( get_the_ID(), 'category', 'In ', '- ' ); ?></span>
			        <span class="zo-detail-time"> <?php echo _e('On ','thenext'); the_time('F j, Y');?></span>
				</div>
				<div class="entry-content">
					<?php 
						if($audio){ echo zo_limit_word_for_excerpt(apply_filters('the_content', preg_replace(array('/\[audio(.*)](.*)\[\/audio\]/', '/\[playlist(.*)]/'), '', get_the_content(), 1)),55);} else { the_excerpt(); }
			    		zo_archive_readmore_nobutton();
					?>
				</div>
				<!-- .entry-content -->
			</div>
		</div>
	</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->
