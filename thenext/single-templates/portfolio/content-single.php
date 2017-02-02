
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
$portfolio_meta  = zo_post_meta_data();
$portfolio_meta_image = '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-teaser'); ?>>
    <div class="entry-blog entry-post ">
        <div class="entry-header entry-image">
		    <div class="entry-feature entry-feature-image"><?php the_post_thumbnail( 'full' ); ?></div>
		    <?php 
		    	if (!empty($portfolio_meta->_zo_project_image)) {
		    		$portfolio_meta_image = explode(",", $portfolio_meta->_zo_project_image);
					$image []='';
					foreach ($portfolio_meta_image as $image_id) {
						$image []= wp_get_attachment_image_src( intval($image_id), 'full');
					}
			    	foreach ($image as $img) 
			    		if(!empty($img)): ?>
		    	
		    	<div class="entry-feature entry-feature-image">
		    		<img src=" <?php echo $img[0];?> " class="attachment-full zo-portfolio-image" alt="portfolio-img">
		    	</div>
		    	
		    <?php  endif; }?>
		</div>
    	<h2 class="entry-title"><?php the_title(); ?></h2>
		<div class="entry-content entry-content-wrap">
			<div class="row">
				<div class="zo-portfolio-content-wrap col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<div class="zo-portfolio-content"><?php the_content(); ?></div>
					<div class="zo-portfolio-social"><?php zo_social_share(); ?></div> 
				</div>
				<div class="zo-portfolio-meta-wrap col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<div class="zo-portfolio-meta zo-project-date-create">
						<h3 class="zo-portfolio-meta-title">DATE</h3>
						<span><?php if (!empty($portfolio_meta->_zo_project_date_create)) echo $portfolio_meta->_zo_project_date_create;?></span>
					</div>
					<div class="zo-portfolio-meta zo-project-client">
						<h3 class="zo-portfolio-meta-title">CLIENTS</h3>
						<a href="#"><span><?php if (!empty($portfolio_meta->_zo_project_date_create)) echo $portfolio_meta->_zo_project_client;?></span></a>
					</div>
					<div class="zo-portfolio-meta zo-project-place">
						<h3 class="zo-portfolio-meta-title">PLACE</h3>
						<span><?php if (!empty($portfolio_meta->_zo_project_date_create)) echo $portfolio_meta->_zo_project_place?></span>
					</div>
					<div class="zo-view-project">
						<a class="btn btn-primary" href="#">View Project</a>
					</div>
				</div>
			</div>
		</div>
		<!-- .entry-content -->
	</div>
	<!-- .entry-blog -->
	<div class="zo-lated zo-lated-project">
		<div class="zo-lated-title zo-lated-project-title">
			<h2>Lated Project</h2>
		</div>
		<div class="zo-lated-content-wrap">
			<div class="row">
				<?php 
				// the query
				$args = array(
				    'post_type'    =>    'portfolio',
				    'orderby'    => 'date',
				    'posts_per_page' => 3
				);
				$the_query = new WP_Query( $args ); 
				?>
				<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="zo-grid-item zo-related-item col-xs-12 col-sm-4 col-md-4 col-lg-4">
	                    <?php get_template_part('single-templates/portfolio/content','page-3column'); ?>
	                </div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.', 'thenext' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>
