<?php $id = (isset($id)) ? $id : $post->ID; ?>
<?php if($content = get_the_content()): ?>
<div class="page-content">
	<div class="inner container">
		<?php the_content(); ?>
	</div>
</div>
<?php endif; ?>
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
				$style = get_sub_field('style');
				$show_pagination = get_sub_field('show_pagination');
			?>
					<div class="scroller style-<?php echo $style; ?>" style="<?php the_sub_field('css'); ?>">
						<?php if($show_pagination): ?>
						<ul class="scroller-pagination">
							<?php $i = 0; ?>
							<?php while (has_sub_field('item', $id)) : ?><?php if($title = get_sub_field('title')): ?><li><a class="btn" data-id="<?php echo $i; ?>"><?php echo $title; ?></a></li><?php endif; ?><?php $i++; ?><?php endwhile; ?>
						</ul>
						<?php endif; ?>
						<div class="scroller-mask">
						<?php $i = 0; ?>
						<?php while (has_sub_field('item', $id)) : ?>
							<?php $image = get_sub_field('image'); ?>
							<div class="scroll-item" data-id="<?php echo $i; ?>" style="<?php if($style != '3'): ?>background-image: url(<?php echo $image['url']; ?>);<?php endif; ?> <?php the_sub_field('css'); ?>">
								<div class="container inner">
									<?php if($style == 3): ?>
									<img src="<?php  echo $image['url']; ?>" />
									<?php endif; ?>
									<div class="content">
										<?php if(get_sub_field('title')): ?><h3 class="text-center"><?php the_sub_field('title'); ?></h3><?php endif; ?>
										<?php echo (get_sub_field('content')) ? the_sub_field('content') : ''; ?>
									</div>
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

		<?php	endif;
			break;
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
								<?php the_excerpt(); ?>
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
			break;
		case 'steps':
			if(get_sub_field('step')):
		?>
			<div class="steps">
				<?php $i = 0; ?>
				<?php while (has_sub_field('step', $id)) : ?>
				<?php 
					$content = get_sub_field('content');
					$content_image = get_sub_field('content_image');
					$main_image = get_sub_field('main_image');
					$class_ary = array('content-container', 'image-container');
				?>
					<div class="step <?php if(!$content) echo 'no-content'; ?>">
						<div class="inner container">

							<?php if($content): ?>
								<div class="span five omega <?php echo $class_ary[$i % 2];//echo ($i % 2 == 0) ? 'content-container' : ''; ?>">
									<?php if($i % 2): ?>
									<img src="<?php echo $main_image['url']; ?>" />
									<?php else: ?>
									<img src="<?php echo $content_image['url']; ?>" />
									<div class="content">
										<div class="circle number"><?php echo $i + 1; ?></div>
										<?php echo $content; ?>
									</div>
									<?php endif; ?>
								</div>
								<div class="span five alpha <?php echo $class_ary[($i + 1) % 2]; ?>">
									<?php if($i % 2): ?>
									<img src="<?php echo $content_image['url']; ?>" />
									<div class="content">
										<div class="circle number"><?php echo $i + 1; ?></div>
										<?php echo $content; ?>
									</div>
									<?php else: ?>
									<img src="<?php echo $main_image['url']; ?>" />
									<?php endif; ?>
								</div>
							<?php else: ?>
							<div class="circle number"><?php echo $i + 1; ?></div>
							<?php endif; ?>
						</div>
					</div>
				<?php $i++; ?>
				<?php endwhile; ?>
			</div>
		<?php
			endif;
			break; 
		case 'downloads':
			if(get_sub_field('file')):
		?>
			<ul class="downloads">
				<?php while (has_sub_field('file', $id)) : ?>
				<?php 
					$file = get_sub_field('file'); 
					$size = size_format(filesize( get_attached_file( $file['id'] ) ));
					$file_type = wp_check_filetype($file['url']);
				?>
				<li class="file">
					<a href="<?php echo $file['url']; ?>" target="_blank" class="clearfix">
						<div class="thumbnail">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/document.png" />
						</div>
						<div class="content span seven push-two">
							<h4 class="title blue"><?php echo $file['title']; ?></h4>
							<div class="meta-data">
								<p><span class="uppercase file-type"><?php echo $file_type['ext']; ?></span>, <span class="size"><?php echo $size; ?></span></p>
							</div>
						</div>
						<i class="arrow icon-download circle"></i>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php
			endif;
			break; ?>
		
	<?php } ?>

<?php $i++; ?>
<?php endwhile; ?>
<?php endif; ?>