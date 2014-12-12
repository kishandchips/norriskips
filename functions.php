<?php

define('THEME_NAME', 'norriskips');

require( get_template_directory() . '/inc/default/functions.php' );

require( get_template_directory() . '/inc/default/hooks.php' );

require( get_template_directory() . '/inc/default/shortcodes.php' );

// Custom Actions

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
 
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

//gforms_datepicker

add_action( 'after_setup_theme', 'custom_setup_theme' );

add_action( 'init', 'custom_init');

add_action( 'wp', 'custom_wp');

add_action( 'admin_menu', 'custom_remove_menus');

add_action( 'widgets_init', 'custom_widgets_init' );

add_action( 'wp_enqueue_scripts', 'custom_scripts', 30);

add_action( 'wp_print_styles', 'custom_styles', 30);

add_action( 'woocommerce_show_page_title', 'custom_woocommerce_show_page_title');

add_action( 'woocommerce_before_single_product', 'custom_woocommerce_single_product_header', 5);

add_action( 'woocommerce_single_product_summary', 'custom_woocommerce_show_postcode_form', 28 );

add_action( 'woocommerce_before_single_product_summary', 'custom_woocommerce_show_product_capacity', 20);

add_action( 'woocommerce_before_single_product_summary', 'custom_woocommerce_show_product_dimensions', 30);

add_action( 'woocommerce_checkout_delivery_date', 'custom_woocommerce_checkout_delivery_date');

add_action( 'woocommerce_checkout_return_date', 'custom_woocommerce_checkout_return_date');

add_action( 'woocommerce_checkout_update_order_review', 'custom_woocommerce_checkout_update_order_review');

add_action( 'woocommerce_checkout_update_order_meta', 'custom_woocommerce_checkout_update_order_meta', 10, 2);

add_action('admin_head', 'custom_admin_head');

add_filter('woocommerce_email_order_meta_keys', 'custom_woocommerce_email_order_meta_keys');

add_action( 'woocommerce_email_after_order_table', 'custom_woocommerce_email_after_order_table');

// Custom Filters

//add_filter( 'gform_submit_button', 'custom_submit_button', 10, 2);

add_filter( 'gform_validation_2', 'custom_validation_hook_2');

add_filter( 'gform_validation_message_2', 'custom_validation_message_book', 10, 2);

add_filter( 'loop_shop_columns', 'custom_woocommerce_shop_columns');

add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_woocommerce_add_to_cart_text');

add_filter( 'woocommerce_get_price_html', 'custom_woocommerce_get_price_html', 10, 2);

add_filter( 'add_to_cart_redirect', 'custom_woocommerce_add_to_cart_redirect');

add_filter( 'woocommerce_checkout_fields' , 'custom_woocommerce_checkout_fields' );

add_filter( 'woocommerce_form_field_group_radio', 'custom_woocommerce_form_field_group_radio', 10, 4);

add_filter( 'woocommerce_form_field_date', 'custom_woocommerce_form_field_date', 10, 4);

//add_filter( 'woocommerce_add_error', 'custom_woocommerce_add_message');

//add_filter( 'woocommerce_add_message', 'custom_woocommerce_add_message');

add_filter( 'woocommerce_product_thumbnails_columns', 'custom_woocommerce_product_thumbnails_columns');

add_filter( 'template_include', 'custom_template_include', 99 );

add_filter( 'query_vars', 'custom_query_vars');

add_filter( 'woocommerce_add_to_cart_validation', 'custom_woocommerce_add_to_cart_validation', 10);

add_filter( 'widget_title', 'do_shortcode');

add_filter( 'wc_add_to_cart_message', '__return_false', 10, 2);

add_filter( 'woocommerce_get_order_item_totals', 'custom_woocommerce_get_order_item_totals', 10, 2);

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//Custom shortcodes

add_shortcode( 'phone_number', 'custom_phone_number');

add_shortcode( 'phone_number_local', 'custom_phone_number_local');

add_shortcode( 'clickdesk_status', 'custom_clickdesk_status');

add_shortcode( 'upgrade_price_difference', 'custom_upgrade_price_difference');



function custom_setup_theme() {
	
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'post-thumbnails' );

	add_theme_support('woocommerce');

	add_theme_support('editor_style');

	add_post_type_support( 'page', 'excerpt' );

	//add_theme_support( 'post-formats', array( 'gallery' ) );


	register_nav_menus( array(
		'primary_header' => __( 'Primary Header', THEME_NAME ),
		'primary_footer' => __( 'Primary Footer', THEME_NAME )
	) );

	//add_image_size( 'custom_medium', 706, 400, true);

	add_rewrite_rule('skip/([^/]+)/upgrade', 'index.php?product=$matches[1]&upgrade=1', 'top');
	
	add_editor_style('/css/editor-styles.css');

	

}

function custom_init(){
	
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

function custom_wp(){
	global $woocommerce, $post;


	if(is_product() && get_available_shipping($post->ID) !== false){
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

		add_action( 'woocommerce_single_product_summary', 'custom_woocommerce_template_single_note', 20 );

		add_action( 'woocommerce_after_single_product_summary', 'custom_woocommerce_show_product_upgrade');
	}
}

function custom_widgets_init() {

	// 	/********************** Sidebars ***********************/

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
	$get_template_directory_uri = get_template_directory_uri();
	// wp_dequeue_script('prettyPhoto');
	// wp_dequeue_script('prettyPhoto-init');
	// wp_dequeue_script('woocommerce-wishlists');
	// wp_dequeue_script('wc-single-product');
	wp_deregister_script('jquery');
	//wp_deregister_script('gforms_datepicker');
	
	wp_register_script('jquery-ui', $get_template_directory_uri.'/js/plugins/jquery-ui.custom.min.js', array( 'jquery' ));

	wp_enqueue_script('modernizr', $get_template_directory_uri.'/js/libs/modernizr.min.js');
	wp_enqueue_script('jquery',  $get_template_directory_uri.'/js/libs/jquery.min.js');
	wp_enqueue_script('easing', $get_template_directory_uri.'/js/plugins/jquery.easing.js', array('jquery'), '', true);
	wp_enqueue_script('scroller', $get_template_directory_uri.'/js/plugins/jquery.scroller.js', array('jquery'), '', true);
	wp_enqueue_script('main', $get_template_directory_uri.'/js/main.js', array('jquery'), '', true);
	wp_enqueue_script('prettyphoto',  $get_template_directory_uri.'/js/plugins/jquery.prettyphoto.js', array( 'jquery' ), '3.1.5', true );

	wp_enqueue_script('jquery-ui');

}


function custom_styles() {
	global $wp_styles;
	//wp_deregister_style( 'woocommerce_prettyPhoto_css' );
	$get_template_directory_uri = get_template_directory_uri();
	wp_register_style( 'jquery-ui', $get_template_directory_uri . '/css/jquery-ui.css' );
	wp_enqueue_style('jquery-ui');
	wp_enqueue_style( 'style', $get_template_directory_uri . '/css/style.css' );
	wp_enqueue_style( 'ie7', $get_template_directory_uri . '/css/ie7.css' );
	//wp_enqueue_style( 'prettyphoto', $get_template_directory_uri . '/css/prettyphoto.css' );

	$wp_styles->add_data('ie7', 'conditional', 'lt IE 8');
}

function custom_phone_number($atts){
	extract( shortcode_atts( array(
		'class' => ''
	), $atts));

	$output = '';
	if($phone_number = get_field('phone_number', 'option')){
		if ( wp_is_mobile() ) {
			$output .= '<a href="tel:'.$phone_number.'" class="phone-number '.$class.'">';
			$output .= '<i class="icon-phone circle"></i>';
			$output .= $phone_number.'</a>';
		} else {
			$output .= '<span class="phone-number '.$class.'">';
			$output .= '<i class="icon-phone circle"></i> ';
			$output .= $phone_number.'</span>';
		}
	}
	return $output;
}

function custom_phone_number_local($atts){
	extract( shortcode_atts( array(
		'class' => ''
	), $atts));
	$output = '';
	if($phone_number_local = get_field('phone_number_local', 'option')){
		if ( wp_is_mobile() ) {
			$output .= '<a href="tel:'.$phone_number_local.'" class="phone-number '.$class.'">';
			$output .= '<i class="icon-phone circle"></i>';
			$output .= $phone_number_local.'</a>';
		} else {
			$output .= '<span class="phone-number '.$class.'">';
			$output .= '<i class="icon-phone circle"></i> ';
			$output .= $phone_number_local.'</span>';
		}
	}
	return $output;
}

function custom_clickdesk_status(){
	$output = '<span class="clickdesk-status"></span>';
	return $output;
}

function custom_validation_hook_2($validation_result){
	$validation = new WC_Validation();
	$form = $validation_result['form'];
	$validation_result['is_valid'] = ($validation_result['is_valid'] == 1) ? 1 : 0;
	$country = 'GB';
	$postcode = '';
	foreach($form['fields'] as &$field){
		
		if($field['id'] == '1' && $validation_result['is_valid']){
			$postcode   = apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ? woocommerce_clean( $_POST['input_'.$field['id']] ) : '';

			if ( $postcode && ! $validation->is_postcode( $postcode, $country ) ) {
				$postcode = '';
				$field['failed_validation'] = true;
				$validation_result['is_valid'] = 0;
	            break;
			} elseif ( $postcode ) {

				$postcode = wc_format_postcode( $postcode, $country );

				$package = array(
					'destination' => array(
						'country' => $country,
						'postcode' => $postcode,
						'state' => ''
					)
				);
				
				$zone = woocommerce_get_shipping_zone($package);

				if($zone->zone_id != 0) {
					$_POST['input_'.$field['id']] = $postcode;
				} else {
					$field['failed_validation'] = true;
					$validation_result['is_valid'] = 0;
				}
			}

		}

		if($field['id'] == '2') {
			if($_POST['input_'.$field['id']] == 'On Road'){
				$field['failed_validation'] = true;
				$validation_result['is_valid'] = 0;
			}
		}
	}

	if ( $country && $postcode && $validation_result['is_valid']) {
		WC()->customer->set_location( $country, '', $postcode, '' );
		WC()->customer->set_shipping_location( $country, '', $postcode, '' );
		WC()->session->set_customer_session_cookie(true);
		WC()->session->save_data();
	} else {
		WC()->customer->set_to_base();
		WC()->customer->set_shipping_to_base();
	}

	
	$validation_result['form'] = $form;
	return $validation_result;
}

function custom_validation_message_book($message, $form){
	foreach($form['fields'] as &$field){
		if($field['id'] == '1' && $field['failed_validation']){
			$message = '<div class="validation_error">Unfortunately we do not supply skips to the post code you have entered.</div>';
			break;
		}

		if($field['id'] == '2' && $field['failed_validation']){
			$message = '<div class="validation_error">We cannot take online orders for on-road skips because this requires a local authority permit.<br />We’d be happy to help you with this, please call us on 01689 821417.</div>';
			break;
		}		
	}
	return $message;
}


function custom_woocommerce_shop_columns(){
	return 3;
}

function custom_woocommerce_show_page_title(){
	return false;
}

function custom_woocommerce_single_product_header() {
	woocommerce_get_template( 'single-product/header.php' );
}

function custom_woocommerce_show_postcode_form(){
	global $woocommerce, $post;
	$postcode = $woocommerce->customer->get_shipping_postcode();

	if(get_available_shipping($post->ID) !== false){
		echo '<div class="box blue change-postcode hide">';
		echo '<header class="header"><h5 class="title">'.__("Change your postcode", THEME_NAME).'</h5></header>';
	} else {
		
		echo '<div class="box blue change-postcode">';
		echo '<header class="header"><h5 class="title">'.__("Please insert your postcode", THEME_NAME).'</h5></header>';
		if($postcode) {
			echo '<div class="validation_error">'.__("Unfortunately we do not supply this skip to the post code you have entered.", THEME_NAME).'</div>';
		}
	}

	echo '<div class="content">';
	gravity_form(2, false, false);
	echo '</div>';
	echo '</div>';
}

function custom_woocommerce_add_to_cart_text($text){
	return __("Book Now", THEME_NAME);
}

function custom_get_shipping_product_package($id) {
	global $woocommerce;

	$package = array();

	$product = get_product($id);

	$package['contents'][0]  = array(
		'product_id' => $id,
        'quantity' => 1,
        'data' => $product
	);

	$package['destination'] = custom_get_shipping_destination();

	return apply_filters( 'woocommerce_cart_shipping_packages', $package );
}

function custom_get_shipping_destination(){
	global $woocommerce;
	$destination = array(
		'country'   => $woocommerce->customer->get_shipping_country(),
		'state'     => $woocommerce->customer->get_shipping_state(),
		'postcode'  => $woocommerce->customer->get_shipping_postcode(),
		'city'      => $woocommerce->customer->get_shipping_city(),
		'address'   => $woocommerce->customer->get_shipping_address(),
		'address_2' => $woocommerce->customer->get_shipping_address_2()
	);
	return $destination;
}

function custom_woocommerce_get_price_html($price, $product){
	if(!is_admin() || ( defined('DOING_AJAX') && DOING_AJAX ) ){
		$price = woocommerce_price(get_product_price($product));
	}
	return $price;
}

function get_product_price($product){
	global $woocommerce;
	return $product->get_price() + get_product_shipping_price($product->id);
}

function get_product_shipping_price($id) {
	global $woocommerce;
	$package = custom_get_shipping_product_package($id);
	$price = 0;
	if($package){
			
		$package = $woocommerce->shipping->calculate_shipping_for_package($package);

		$shipping_price = 0;
		if(!empty($package['rates'])){
			foreach($package['rates'] as $rate){
				$shipping_price = $rate->cost;
			}
		}
		$price = $shipping_price;
	}

	return $price;
}

function get_available_shipping($id) {
	global $woocommerce;
	$package = custom_get_shipping_product_package($id);
	$price = 0;

	if($package){
		$package = $woocommerce->shipping->calculate_shipping_for_package($package);
		return !empty($package['rates']);
	}

	return false;
}

function custom_woocommerce_show_product_capacity(){
	woocommerce_get_template( 'single-product/capacity.php' );
}

function custom_woocommerce_show_product_dimensions(){
	woocommerce_get_template( 'single-product/dimensions.php' );
}


function custom_woocommerce_show_product_upgrade(){
	woocommerce_get_template( 'single-product/upgrade.php' );
}

function custom_woocommerce_add_to_cart_redirect() {
    global $woocommerce;
    $checkout_url = $woocommerce->cart->get_checkout_url();
    return $checkout_url;
}

function custom_woocommerce_checkout_delivery_date(){
	woocommerce_get_template( 'checkout/delivery-date.php' );
}


function custom_woocommerce_checkout_return_date(){
	woocommerce_get_template( 'checkout/return-date.php' );
}

function custom_woocommerce_template_single_note(){
	woocommerce_get_template( 'single-product/note.php' );	
}

function custom_woocommerce_checkout_fields($fields){
	$fields['delivery_date'] = array();
	$fields['delivery_date']['delivery_date'] = array(
		'label'     => __('Date', THEME_NAME),
		'class'		=> array('datepicker span five'),
		'type'		=> 'date',
		'required'  => true
	);

	$fields['delivery_date']['delivery_time'] = array(
		'label'     => __('Select your delivery time', THEME_NAME),
		'class'		=> array('radio-grid span five'),
		'type'		=> 'group_radio',
		'options'	=> array(
			'am'		=> __("<b>AM</b> (8:00-12:00)"),
			'pm'		=> __("<b>PM</b> (12:00-16:00)")
		),
		'required'  => true
	);

	$fields['return_date']['return_date'] = array(
		'label'     => __('Date', THEME_NAME),
		'class'		=> array('datepicker span five'),
		'type'		=> 'date',
		'required'  => false
	);

	//$fields['shipping']['shipping_postcode']['custom_attributes'] = array('disabled' => true);
	//$fields['shipping']['shipping_postcode']['class'] = array('disabled');
	// print_r($fields);
	// die();

	// $fields['return_date']['return_time'] = array(
	// 	'label'     => __('Select your delivery time', THEME_NAME),
	// 	'class'		=> array('radio-grid span five'),
	// 	'type'		=> 'radio',
	// 	'options'	=> array(
	// 		'am'		=> __("<b>AM</b> (8:00-12:00)"),
	// 		'pm'		=> __("<b>PM</b> (12:00-16:00)")
	// 	),
	// 	'required'  => true
	// );


	return $fields;
}

function custom_woocommerce_checkout_update_order_meta( $post_id, $posted ) {
	global $woocommerce;
	$checkout = $woocommerce->checkout();
	$field_group_keys = array('delivery_date', 'return_date');

	foreach($field_group_keys as $field_group_key) {
		if(!empty($checkout->checkout_fields[$field_group_key])) {
			
			foreach ($checkout->checkout_fields[$field_group_key] as $key => $field) {
				
				if(isset($_POST[$key])) {
					$value = $_POST[$key];
					update_post_meta( $post_id, $key, $value);
				} else {
					update_post_meta( $post_id, $key, '');
				}
			}
		}
	}


	// if ( $this->checkout_fields['billing'] && $this->posted['billtoshipping']) {
	// 	foreach ( $this->checkout_fields['billing'] as $key => $field ) {
	// 		$postvalue = false;
	// 		if ( isset( $this->posted[ str_replace( 'billing_', 'shipping_', $key ) ] ) ) {
	// 			$postvalue = $this->posted[ str_replace( 'billing_', 'shipping_', $key ) ];
	// 			update_post_meta( $order_id, '_' . $key, $postvalue );
	// 		}
	// 	}
	// }

}

function custom_woocommerce_email_order_meta_keys( $keys ) {
	global $woocommerce;
	$checkout = $woocommerce->checkout();

	$field_group_keys = array('delivery_date', 'return_date');

	foreach($field_group_keys as $field_group_key) {
		if(!empty($checkout->checkout_fields[$field_group_key])) {
			
			foreach ($checkout->checkout_fields[$field_group_key] as $key => $field) {
				$keys[] = $key;
			}
		}
	}

	return $keys;
}

function custom_woocommerce_form_field_date($field, $key, $args, $value ){
	
	$field  = '<div class="form-row ' . esc_attr( implode( ' ', $args['class'] ) ) .'" id="field-' . esc_attr( $key ) . '" >';
	$field .= '<input type="hidden" class="datepicker-input" name="'. esc_attr($key).'" value="'. esc_attr($value).'" id="input-' . esc_attr( $key ) . '"/>';
	$field .= '</div>';

	return $field;
}

function custom_woocommerce_form_field_group_radio($field, $key, $args, $value ){

	if ( $args['required'] ) {
		$required = ' <abbr class="required" title="' . esc_attr__( 'required', 'woocommerce'  ) . '">*</abbr>';
	} else {
		$required = '';
	}
	
	$field  = '<div class="form-row ' . esc_attr( implode( ' ', $args['class'] ) ) .'" id="' . esc_attr( $key ) . '_field">';
	$field .= '<label class="field-label large-label" >' . $args['label'] . '</label>';
	$field .= '<div class="options clearfix" >';
	foreach($args['options'] as $option_key => $label){
		$field .= '<div class="radio-field">';
		$field .= '<input type="radio" class="input-radio" name="' . esc_attr( $key ) . '" data-value="'.$value.'" id="' . esc_attr( $key.'-'.$option_key ) . '" value="'.$option_key.'" '.checked( $value, $option_key, false ) .' />';
		$field .= '<label for="' . esc_attr( $key.'-'.$option_key ) . '" class="radio">' . $label . '</label>';
		$field .= '</div>';

	}
	$field .= '</div>';
	$field .= '</div>';

	return $field;
}

// function custom_woocommerce_add_message($text){
// 	$start_pos = strpos($text, '<a ');
// 	$end_pos = strpos($text, '/a>');
// 	if (($start_pos != 0) && (!$start_pos || !$end_pos)) {
// 		return $text;
// 	}
// 	$remove = substr($text, $start_pos, ($end_pos + strlen('/a>')) - $start_pos);

// 	return str_replace($remove, '', $text);
// }

function custom_woocommerce_product_thumbnails_columns(){
	return 5;
}

function custom_woocommerce_checkout_update_order_review($post_data){
	global $woocommerce;

	$post_data_ary = explode('&', $post_data);
	$data = array();
	foreach($post_data_ary as $value){
		$value_ary = explode('=', $value);
		$data[$value_ary[0]] = isset($value_ary[1]) ? $value_ary[1] :'';
	}

	$checkout = $woocommerce->checkout();
	if(!empty($checkout->checkout_fields)) {
		if(!empty($checkout->checkout_fields['delivery_date'])){
			foreach($checkout->checkout_fields['delivery_date'] as $key => $value){
				if(isset($data[$key])){
					$woocommerce->session->set($key, $data[$key]);
				}
			}
		}

		if(!empty($checkout->checkout_fields['return_date'])){
			foreach($checkout->checkout_fields['return_date'] as $key => $value){
				if(isset($data[$key])){
					$woocommerce->session->set($key, $data[$key]);
				}
			}
		}
	}
}

function custom_template_include( $template ){
	if ( is_single() && get_post_type() == 'product' && get_query_var('upgrade')) {
		$template = locate_template(array('woocommerce/upgrade-single-product.php'));
	}

	return $template;

}

function custom_query_vars( $query_vars ){
	$query_vars[] = 'upgrade';
	return $query_vars;
}

function custom_woocommerce_add_to_cart_validation($valid){
	global $woocommerce;
	$woocommerce->cart->empty_cart();
	return $valid;
}

function the_price_difference($curr_id, $upgrade_id){
	$price = get_price_difference($curr_id, $upgrade_id);
	echo woocommerce_price($price);
}

function get_price_difference($curr_id, $upgrade_id){
	$curr_product = get_product($curr_id);
	$curr_price = get_product_price($curr_product);
	$upgrade_product = get_product($upgrade_id);
	$upgrade_price = get_product_price($upgrade_product);

	return $upgrade_price - $curr_price;
}

function custom_admin_head() {
  echo '<style>
    table.acf_input tbody tr td.label {
    	width: 10%;
    }
  </style>';
}

function custom_woocommerce_add_to_cart_message($text){
	return false;
}

function custom_upgrade_price_difference(){
	global $product;
	if($product){
		$upgrade_product = get_the_adjacent_fukn_post('next', array('post_type' => 'product'));
		$price = get_price_difference($product->id, $upgrade_product->ID);
		return woocommerce_price($price);
	}

	return woocommerce_price(0);
}

function custom_woocommerce_get_order_item_totals($totals, $order){
	unset($totals['cart_subtotal']);
	unset($totals['shipping']);
	return $totals;
}

function custom_woocommerce_email_after_order_table(){
	echo '<p style="text-align: right;"><small>The price above includes VAT</small><p>';
}