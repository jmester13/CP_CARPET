<?php
/**
 * Template Name: Right Sidebar 2
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 * @author Fox
 */

get_header(); ?>
<div id="page-right-sidebar">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div id="content" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php /// get_template_part( 'content', 'page' ); ?>






<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
			<?php the_content(); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'thenext' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->











                        <?php comments_template( '', true ); ?>
                    <?php endwhile; // end of the loop. ?>

                </div><!-- #content -->
            </div><!-- #primary -->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>