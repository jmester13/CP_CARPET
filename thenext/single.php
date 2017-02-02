<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */

get_header(); ?>
<div class="<?php zo_main_class(); ?>">
    <div class="row">
        <div id="primary" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'single-templates/single/content', get_post_format() ); ?>
					
					<!-- Author post -->
					<div class="entry-author vcard"><?php _e('Post by ', 'thenext' )?><?php the_author_posts_link(); ?></div>
					
                    <div class="social-share">
                        <?php zo_social_share(); ?>
                    </div>
					<!-- .entry tags -->
					<?php if(get_the_terms(get_the_ID(),'post_tag')){?>
                    <div class="tags-list">
						<div class="entry-tags">
							<i class="fa fa-tags"></i><?php the_tags( '', ', ', ' ' ); ?>
						</div>
                    </div>
					<?php }?>
					<!-- .entry tags -->
                    <div class="author-about">
                        <div class="author-avatar">
                            <?php echo get_avatar( '',110, '' ,get_author_posts_url('') ); ?>
                        </div>
                        <div class="author-info">
                            <h2 class="author-info-name">
                            <?php _e('ABOUT AUTHOR', 'thenext') ;?> - <?php the_author_posts_link();?>
                            </h2>
                            <p class="author-description">
                                <?php echo get_the_author_meta( 'description'); ?> 
                            </p>
                        </div>
                    </div>
                  
                    <?php zo_post_nav(); ?>

                    <?php comments_template( '', true ); ?>

                <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->
        <div class="zo-main-sidebar col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
    
</div>
<?php if ( is_active_sidebar( 'sidebar-13' ) ) : ?>
    <div class="sidebar-fotter">
        <?php dynamic_sidebar( 'sidebar-13' ); ?>
    </div>
<?php endif; ?>
<?php get_footer(); ?>