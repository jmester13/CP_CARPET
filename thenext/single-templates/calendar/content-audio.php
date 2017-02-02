
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
	<div class="entry-blog entry-post entry-blog-calendar">
		<div class="row">
			<?php if(has_category()): ?>
				<div class="container detail-terms-wrapper">
	            	<div class="detail-terms"><?php the_terms( get_the_ID(), 'category', 'In ', ' / ' ); ?></div>
	            	<div class="zo-separator-line-calendar-blog"></div>
				</div>
	        <?php endif; ?>
			<div class="entry-blog-left entry-post-left col-md-2 col-lg-2 col-sm-2 col-xs-12">
				<?php zo_blog_calendar_detail();?>
			</div>
			<div class="entry-blog-right entry-post-right col-md-10 col-lg-10 col-sm-10 col-xs-12">
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
	        	<div class="zo-separator-line-calendar-blog"></div>
	        	<h2 class="entry-title"><?php the_title(); ?></h2>

		        <!-- .entry-header -->
				<div class="entry-content">
					<?php if($audio){ echo apply_filters('the_content', preg_replace(array('/\[audio(.*)](.*)\[\/audio\]/', '/\[playlist(.*)]/'), '', get_the_content(), 1));} else { the_content(); }
			    		wp_link_pages( array(
			        		'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . __( 'Pages:','thenext') . '</span>',
			        		'after'       => '</div>',
			        		'link_before' => '<span class="page-numbers">',
			        		'link_after'  => '</span>',
			    		) );
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
