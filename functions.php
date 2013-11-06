<?php

define('THEME_NAME', 'norriskips');

require( get_template_directory() . '/inc/default/functions.php' );

require( get_template_directory() . '/inc/default/hooks.php' );

require( get_template_directory() . '/inc/default/shortcodes.php' );

// Custom Actions

add_action('after_setup_theme', 'custom_setup_theme' );

add_action('init', 'custom_set_post_types');

add_action('admin_menu', 'custom_remove_menus');

add_action( 'widgets_init', 'custom_widgets_init' );

add_action('wp_enqueue_scripts', 'custom_scripts', 30);

add_action('wp_print_styles', 'custom_styles', 30);

// Custom Filters

//add_filter('gform_submit_button', 'custom_submit_button', 10, 2);

//Custom Shortcodes

add_shortcode('phone_number', 'custom_phone_number');



function custom_setup_theme() {
	global $woocommerce;


	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'post-thumbnails' );

	add_theme_support('woocommerce');

	add_theme_support('editor_style');

	//add_theme_support( 'post-formats', array( 'gallery' ) );


	register_nav_menus( array(
		'primary_header' => __( 'Primary Header', THEME_NAME ),
		'primary_footer' => __( 'Primary Footer', THEME_NAME )
	) );

	//add_image_size( 'custom_medium', 706, 400, true);
	
	add_editor_style('/css/editor-styles.css');

}




function custom_set_post_types(){
	require( get_template_directory() . '/inc/classes/custom-post-type.php' );
	if(function_exists('get_field')) {
		$testimonials_page = get_field('testimonials_page', 'options');
		$testimonial = new Custom_Post_Type( 'Testimonial', 
	 		array(
	 			'rewrite' => array( 'with_front' => false, 'slug' => get_page_uri($testimonials_page->ID) ),
	 			'capability_type' => 'post',
	 		 	'publicly_queryable' => true,
	   			'has_archive' => true, 
	    		'hierarchical' => false,
	    		'exclude_from_search' => true,
	    		'menu_position' => null,
	    		'supports' => array('title', 'editor', 'page-attributes'),
	    		'plural' => 'Testimonials'
	   		)
	   	);
	}
}

function custom_widgets_init() {

	// 	/********************** Sidebars ***********************/

	// 	register_sidebar( array(
	// 		'name' => __( 'Default Sidebar', THEME_NAME ),
	// 		'id' => 'default',
	// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	// 		'after_widget' => '</aside>',
	// 		'before_title' => '<h4 class="widget-title">',
	// 		'after_title' => '</h4>',
	// 	) );

	register_sidebar( array(
		'name' => __( 'Default', THEME_NAME ),
		'id' => 'default',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer', THEME_NAME ),
		'id' => 'footer',
		'before_widget' => '<aside id="%1$s" class="widget span one-third %2$s"><div class="inner">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	) );

	// 	/********************** Content ***********************/

	// 	register_sidebar( array(
	// 		'name' => __( 'Homepage Content', THEME_NAME ),
	// 		'id' => 'homepage_content',
	// 		'before_widget' => '<aside id="%1$s" class="widget span one-third %2$s">',
	// 		'after_widget' => '</div></aside>',
	// 		'before_title' => '<h5 class="widget-title text-center light-brown uppercase">',
	// 		'after_title' => '</h5><div class="inner equal-height">',
	// 	) );


}

function custom_remove_menus () {
	global $menu;
	$restricted = array(__('Links'), __('Comments'), __('Posts'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)) unset($menu[key($menu)]);
	}
}

function custom_scripts() {
	
	// wp_dequeue_script('prettyPhoto');
	// wp_dequeue_script('prettyPhoto-init');
	// wp_dequeue_script('woocommerce-wishlists');
	// wp_dequeue_script('wc-single-product');
	wp_deregister_script('jquery');

	wp_enqueue_script('modernizr', get_template_directory_uri().'/js/libs/modernizr.min.js');
	wp_enqueue_script('jquery',  get_template_directory_uri().'/js/libs/jquery.min.js');
	wp_enqueue_script('easing', get_template_directory_uri().'/js/plugins/jquery.easing.js', array('jquery'), '', true);
	wp_enqueue_script('scroller', get_template_directory_uri().'/js/plugins/jquery.scroller.js', array('jquery'), '', true);
	wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), '', true);
	wp_enqueue_script('prettyphoto',  get_template_directory_uri().'/js/plugins/jquery.prettyphoto.js', array( 'jquery' ), '3.1.5', true );
}

function custom_styles() {
	global $wp_styles;
	//wp_deregister_style( 'woocommerce_prettyPhoto_css' );

	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'ie7', get_template_directory_uri() . '/css/ie7.css' );
	//wp_enqueue_style( 'prettyphoto', get_template_directory_uri() . '/css/prettyphoto.css' );

	$wp_styles->add_data('ie7', 'conditional', 'lt IE 8');
}

function custom_phone_number(){
	$output = '';
	if($phone_number = get_field('phone_number', 'option')){
		if ( wp_is_mobile() ) {
			$output .= '<a href="tel:'.$phone_number.'" class="phone-number"><i class="icon-phone circle"></i> '.$phone_number.'</a>';
		} else {
			$output .= '<span class="phone-number"><i class="icon-phone circle"></i> '.$phone_number.'</span>';
		}
	}
	return $output;
}

