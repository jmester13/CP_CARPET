<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
                    <?php if ( have_posts() ) : ?>

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'single-templates/content/content', get_post_format() ); ?>
                        <?php endwhile; ?>
                        
                        <?php zo_paging_nav(); ?>

                    <?php else : ?>

                        <article id="post-0" class="post no-results not-found col-lg-9">

                            <?php if ( current_user_can( 'edit_posts' ) ) :
                                // Show a different message to a logged-in user who can add posts.
                                ?>
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php _e( 'No posts to display', 'thenext' ); ?></h1>
                                </header>

                                <div class="entry-content">
                                    <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'thenext' ), admin_url( 'post-new.php' ) ); ?></p>
                                </div><!-- .entry-content -->

                            <?php else :
                                // Show the default message to everyone else.
                                ?>
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'thenext' ); ?></h1>
                                </header>

                                <div class="entry-content">
                                    <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'thenext' ); ?></p>
                                    <?php get_search_form(); ?>
                                </div><!-- .entry-content -->
                            <?php endif; // end current_user_can() check ?>

                        </article><!-- #post-0 -->

                    <?php endif; // end have_posts() check ?>

                </div><!-- #content -->
            </div><!-- #primary -->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
	<?php if ( is_active_sidebar( 'sidebar-13' ) ) : ?>
		<div class="sidebar-footer">
			<?php dynamic_sidebar( 'sidebar-13' ); ?>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>