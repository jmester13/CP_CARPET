<?php
$zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : 'h2';
$team_meta = zo_post_meta_data();
?>
<div class="zo-grid-item zo-team-wrap col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<div class="zo-grid-wrap">
		<div class="zo-team-detail team-content-right col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<<?php echo esc_attr($zo_title_size); ?> class="zo-grid-title">
			<?php the_title(); ?>
			</<?php echo esc_attr($zo_title_size); ?>>

			<?php if (!empty($team_meta->_zo_team_position)) : ?>
				<div class="zo-team-position"><?php echo esc_attr($team_meta->_zo_team_position); ?></div>
			<?php endif; ?>
			<div class="zo-grid-team-about"><?php the_excerpt(); ?></div>
			<div class="social-network">
				<ul class="social social-sq">
					<?php if (!empty($team_meta->_zo_team_facebook)) : ?>
						<li><a href="<?php echo esc_attr($team_meta->_zo_team_facebook); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php endif; ?>
					<?php if (!empty($team_meta->_zo_team_twitter)) : ?>
						<li><a href="<?php echo esc_attr($team_meta->_zo_team_twitter); ?>"><i class="fa fa-twitter"></i></a></li>
					<?php endif; ?>
					<?php if (!empty($team_meta->_zo_team_pinterest)) : ?>
						<li><a href="<?php echo esc_attr($team_meta->_zo_team_pinterest); ?>"><i class="fa fa-pinterest-p"></i></a></li>
					<?php endif; ?>
					<?php if (!empty($team_meta->_zo_team_skype)) : ?>
						<li><a href="<?php echo esc_attr($team_meta->_zo_team_skype); ?>"><i class="fa fa-skype"></i></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="zo-team-image team-image-right col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<?php echo the_post_thumbnail('full'); ?>
		</div>
	</div>
</div>
