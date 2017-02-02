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
		        <div class="entry-header entry-quote-wrapper">
		        	<div class="entry-feature-quocte-inner">
				        <div class="entry-feature entry-feature-image"><?php the_post_thumbnail( 'full' ); ?></div>
				    	<div class="entry-feature entry-feature-quote"><?php $quote = zo_archive_quote(); ?></div>
		        	</div>
				</div>
	        	<div class="zo-separator-line-calendar-blog"></div>
	        	<h2 class="entry-title"><?php the_title(); ?></h2>

		        <!-- .entry-header -->
				<div class="entry-content">
					<?php if($quote){ 
				    	echo apply_filters('the_content', preg_replace('/\<blockquote\>(.*?)\<\/blockquote\>/ms', '', get_the_content(),1));
		            } else { the_content(); }
		               ?>
					<?php
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
