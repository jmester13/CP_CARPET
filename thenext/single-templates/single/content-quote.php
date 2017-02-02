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
		<h2 class="entry-title"><?php the_title(); ?></h2>
        <div class="zo-separator-line-standard-blog"></div>
        <div class="entry-meta"><?php zo_archive_detail(); ?></div>
		<div class="entry-header entry-quote-wrapper">
		    <div class="entry-feature entry-feature-image"><?php the_post_thumbnail( 'full' ); ?></div>
		    <div class="entry-feature entry-feature-quote">
		    	<div class="entry-feature-quocte-inner"><?php $quote = zo_archive_quote(); ?></div>
		    </div>
		</div>
        <div class="zo-separator-line-standard-blog"></div>
        
		<div class="entry-content">
		    <?php if($quote){ 
               
                   
               echo apply_filters('the_content', preg_replace('/\<blockquote\>(.*?)\<\/blockquote\>/ms', '', get_the_content(),1));
              
            
            } else { the_content(); }
	    		wp_link_pages( array(
	        		'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . __( 'Pages:','thenext') . '</span>',
	        		'after'       => '</div>',
	        		'link_before' => '<span class="page-numbers">',
	        		'link_after'  => '</span>',
	    		) );
			?>
		</div>
		<!-- .entry-content -->
	</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->
                     
