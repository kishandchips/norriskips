<?php 
/*
 * Template Name: With sidebar
 */
?>
<?php get_header(); ?>
<section id="template-sidebar">
	<?php get_template_part('inc/page-header'); ?>
	<div class="inner container">
		<?php get_sidebar(); ?>
		<div id="content" class="span eight">
		<?php get_template_part('inc/content'); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>