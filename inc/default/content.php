<?php $id = (isset($id)) ? $id : $post->ID; ?>
<?php $i = 0; ?>
<?php if(get_field('content', $id)): ?>
<?php while (has_sub_field('content', $id)) : ?>
<?php
	$layout = get_row_layout();
	switch($layout){

		case 'row':	
			if(get_sub_field('column')):
?>
			<div class="row" style="<?php the_sub_field('css'); ?>">
				<div class="inner container">

				<?php $total_columns = count( get_sub_field('column', $id)); ?>
				<?php while (has_sub_field('column', $id)) : ?>
					<?php
					switch($total_columns){
						case 2:
							$class = 'five';
							break;
						case 3:
							$class = 'one-third';
							break;
						case 4:
							$class = 'one-fourth';
							break;
						case 5:
							$class = 'one-fifth';
							break;
						case 6:
							$class = 'one-sixth';
							break;
						case 1:
						default:
							$class = 'ten';
							break;
					} ?>
					<div class="break-on-tablet span <?php echo $class; ?>" style="<?php the_sub_field('css'); ?>">
						<?php the_sub_field('content'); ?>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
			<?php endif; ?>
			<?php break;
		case 'scroller':
			if(get_sub_field('item')):
		?>
			<div class="scroller">
				<div class="scroller-mask">
				<?php $i = 0; ?>
				<?php while (has_sub_field('item', $id)) : ?>
					<div class="scroll-item" data-id="<?php echo $i; ?>" style="<?php the_sub_field('css'); ?>);">
						<div class="container inner">
							<?php if($content = get_sub_field('content')): ?>
							<div class="content"><?php echo $content; ?></div>
							<?php endif; ?>
						</div>
					</div>
					<?php $i++; ?>
				<?php endwhile; ?>
				</div>
				<div class="scroller-navigation">
					<a class="btn prev-btn"></a>
					<a class="btn next-btn"></a>
				</div>
			</div>
			<?php endif; ?>
			<?php break;
		case 'testimonials':
			$custom_query = new WP_Query(array('post_type' => 'testimonial', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC'));
			if($custom_query->have_posts()):
		?>
			<div class="testimonials" style="<?php the_sub_field('css'); ?>">
				<div class="inner container">
					<h3 class="title text-center dark-blue"><?php the_sub_field('title'); ?></h3>
					<ul class="testimonials-list clearfix">
						<?php while($custom_query->have_posts()): $custom_query->the_post(); ?>
						<li class="testimonial span one-third">
							<blockquote>
								<div class="quote"><?php the_content(); ?></div>
								<div class="quotee">
									<p class="bold no-margin name"><?php the_field('quotee_name') ?></p>
									<p class="no-margin role small"><?php the_field('quotee_role') ?></p>
								</div>
							</blockquote>
						</li>
						<?php endwhile; ?>
					</ul>
					
					<footer class="footer">
						<a class="arrow-down-btn open-testimonials-btn" data-replace-text="Close"><?php _e("Read more testimonials", THEME_NAME); ?></a>
					</footer>
				</div>
			</div>
			<?php
			endif;
			wp_reset_postdata();
			wp_reset_query();		
			break;
		case 'sub_pages':
			$custom_query = new WP_Query(array('post_type' => 'page', 'post_parent' => $id, 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC'));
			if($custom_query->have_posts()):
		?>
			<ul class="sub-pages">
			<?php while($custom_query->have_posts()): $custom_query->the_post(); ?>
				<li class="page">
					<a href="<?php the_permalink(); ?>" class="clearfix">
						<div class="thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="content span seven push-two">
							<h4 class="title"><?php the_title(); ?></h4>
							<div class="excerpt">
								<p>Based in Orpington, we are perfectly located to serve the areas of South London, North Kent and East Surrey.</p>
							</div>
						</div>
						<i class="arrow icon-arrow-right circle"></i>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php
			endif;
			wp_reset_postdata();
			wp_reset_query();		
			break; ?>
		
	<?php } ?>

<?php $i++; ?>
<?php endwhile; ?>
<?php endif; ?>