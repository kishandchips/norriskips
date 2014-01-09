<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
    <script type="text/javascript">
		var themeUrl = '<?php bloginfo( 'template_url' ); ?>';
		var baseUrl = '<?php bloginfo( 'url' ); ?>';
	</script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrap" class="site">
		<?php do_action( 'before' ); ?>
		<div id="lightbox">
			<div class="content"></div>
			<div class="loader"></div>
			<div class="overlay"></div>
		</div>
		<header id="header" role="banner">
			<div class="inner container">
				<h1 class="logo-container">
					<a class="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
				<div class="info">
					<?php if($phone_number = get_field('phone_number', 'option')): ?>
						<?php if (wp_is_mobile() ) : ?>
						<a href="tel:<?php echo $phone_number; ?>" class="phone-number"><i class="icon-phone circle"></i> <?php echo $phone_number; ?></a> 
						<?php else: ?>
						<span class="phone-number"><i class="icon-phone circle"></i> <?php echo $phone_number; ?></span> 
						<?php endif; ?>
					<?php endif; ?>
					<?php $book_page = get_field('book_page', 'options'); ?>
					<a href="<?php echo get_permalink($book_page->ID); ?>" class="orange-btn"><?php _e("Book Now", THEME_NAME); ?></a>
					<?php $return_skip_page = get_field('return_skip_page', 'options'); ?>
					<a href="<?php echo get_permalink($return_skip_page->ID); ?>" class="grey-btn"><?php _e("Return Skip", THEME_NAME); ?></a>
				</div>
				<button class="mobile-navigation-btn orange-btn"></button>
					
				<nav role="navigation" class="site-navigation main-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary_header', 'menu_class' => 'menu clearfix', 'container' => false ) ); ?>
				</nav><!-- .site-navigation .main-navigation -->
			</div>
		</header><!-- #masthead .site-header -->

		<div id="main" class="site-main" role="main">