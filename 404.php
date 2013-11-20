<?php get_header(); ?>
<section id="error-404">
	<div id="content">
		<div class="container inner">
			<p><img src="<?php echo get_template_directory_uri(); ?>/images/misc/trucks.png" /></p>
			<h1 class="title"><?php _e("404 Error - Page Not Found", THEME_NAME); ?></h1>
			<h4 class="sub-title normal"><?php _e("The page you are looking for may have been moved or deleted.", THEME_NAME); ?></h4>
			<p>
				<br />
				<br />
				<br />
				<a href="<?php bloginfo('url'); ?>" class="big orange-btn"><?php _e("Go To Homepage") ?></a>
			</p>
		</div>
	</div>
</section>
<?php get_footer(); ?>