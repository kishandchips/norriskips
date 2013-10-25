<?php if ( ! function_exists( 'get_top_level_category' )) {
	function get_top_level_category($id, $taxonomy = 'category'){
		$term = get_top_level($taxonomy, $id);
		$term_id = ($term) ? $term : $id;
		return get_term_by( 'id', $term_id, $taxonomy);
	}
}


if ( ! function_exists( 'get_top_level' )) {
	function get_top_level($object, $id){
		$terms = get_ancestors($id, $object);
		return (!empty($terms)) ? $terms[count($terms) - 1] : null;
	}
}

if ( ! function_exists( 'get_sub_category' )) {
	function get_sub_category($id){
		$sub_categories = get_categories( array('child_of' => $id, 'hierarchical' => false, 'orderby' => 'count'));
		foreach($sub_categories as $sub_category){
			if(has_category($sub_category->term_id)){
				$category = $sub_category;
			}
		}

		return (isset($category)) ? $category : null;
	}
}

if ( ! function_exists( 'get_the_adjacent_fukn_post' )) {
	function get_the_adjacent_fukn_post($adjacent, $post_type = 'post', $category = array(), $post_parent = 0){
		global $post;
		$args = array( 
			'post_type' => $post_type,
			'order' => 'ASC', 
			'posts_per_page' => -1,
			'category__in' => $category,
			'post_parent' => $post_parent
		);
		$curr_post = $post;
		$new_post = NULL;
		$custom_query = new WP_Query($args);
		$posts = $custom_query->get_posts();
		$total_posts = count($posts);
		$i = 0;
		foreach($posts as $a_post) {
			if($a_post->ID == $curr_post->ID){
				if($adjacent == 'next'){
					$new_i = ($i + 1 >= $total_posts) ? 0 : $i + 1; 
					$new_post = $posts[$new_i];	
				} else {
					$new_i = ($i - 1 < 0) ? $total_posts - 1 : $i - 1; 
					$new_post = $posts[$new_i];	
				}
				break;	
			}
			$i++;
		}
		
		return $new_post;
	}
}

if ( ! function_exists( 'get_latest_post' )) {
	function get_latest_post() {
		$posts = get_posts(array('posts_per_page' => 1));
		return $posts[0];
	}
}

if ( ! function_exists( 'get_current_url' )) {
	function get_current_url() {
		$url = 'http';
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') $url .= 's';
			$url .= '://';

		if ($_SERVER['SERVER_PORT'] != '80') {
			$url .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
		} else {
			$url .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		}
		return $url;
	}
}

if ( ! function_exists( 'get_queried_page' )) {
	function get_queried_page(){
		$curr_url = get_current_url();
		$curr_uri = str_replace(get_bloginfo('url'), '', $curr_url);
		$page = get_page_by_path($curr_uri);
		if($page) return $page;
		return null;
	}
}