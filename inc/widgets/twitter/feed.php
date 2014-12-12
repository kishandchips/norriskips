<?php 

class Twitter_Feed extends WP_Widget {
	
	function Twitter_Feed() {
		$widget_opts = array( 'description' => __('Use this widget is to show the tweets of a specific user.') );
		parent::WP_Widget(false, 'Twitter Feed', $widget_opts);
	}
	function form($instance) {
		 
		$username = (isset($instance['username'])) ? esc_attr($instance['username']) : ''; 
		$title = (isset($instance['title'])) ? esc_attr($instance['title']) : '';  
		?>
		<p>
			<label>Title: <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
		</p>
		<p>
			<label>Username: <input class="widefat" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" /></label>
		</p>

		<?php
	}
	function update($new_instance, $old_instance){
		return $new_instance;
	}

	function sanitize_links($tweet) {
		if(isset($tweet['retweeted_status'])) {
			$rt_section = current(explode(":", $tweet['text']));
			$text = $rt_section.": ";
			$text .= $tweet['retweeted_status']['text'];
		} else {
			$text = $tweet['text'];
		}
		$text = preg_replace('/((http)+(s)?:\/\/[^<>\s]+)/i', '<a href="$0" target="_blank" rel="nofollow">$0</a>', $text );
		$text = preg_replace('/[@]+([A-Za-z0-9-_]+)/', '<a href="http://twitter.com/$1" target="_blank" rel="nofollow">@$1</a>', $text );
		$text = preg_replace('/[#]+([A-Za-z0-9-_]+)/', '<a href="http://twitter.com/search?q=%23$1" target="_blank" rel="nofollow">$0</a>', $text );
		return $text;

	}
	
	function widget($args, $instance) {
		require_once('oauth/twitteroauth.php');
		$tweets = get_transient('tweets');
		$args['title'] = (isset($instance['title'])) ? $instance['title'] : '';
		$args['username'] = (isset($instance['username'])) ? $instance['username'] : '';
		// if(!empty($tweets)) {
			$key = '2vI0Kk0HPqqnkBbnof6OAY32P';
			$secret = 'Z4T9bm5Ocf3hgkFTmyvRBrdXms0MzRt6DHFfDWs3IeDxe6KoQY';
			$token = '2851201996-GQ9i7UJUWOLtSWKVoZhmUe8OLh0wQgrhmYfedsm';
			$token_secret = 'r3si09kSDllHNSaU7lRFKSy0tzPOTt72CYPMrH1NCMyRC';
			$connection = new TwitterOAuth($key, $secret, $token, $token_secret);
			$tweets = $connection->get('statuses/user_timeline', array('screen_name' => $args['username'], 'count' => 3, 'trim_user' => false));
			// set_transient('tweets', $tweets);
		// }
		
		if($tweets):
		echo $args['before_widget'];	
		?>	
		<ul class="tweets">
			<?php foreach($tweets as $tweet): ?>
			<li class="tweet">
				<div class="text">
					<?php echo $this->sanitize_links($tweet); ?>
				</div>
				<div class="time"><?php echo $this->relativeTime($tweet['created_at']); ?></div>
				<div class="user">
					<a href="http://twitter.com/<?php echo $tweet['user']['screen_name'] ?>" target="_blank"><i class="icon-twitter"></i>@<?php echo $tweet['user']['screen_name'] ?></a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>

		<?php echo $args['after_widget']; ?>
		<?php endif;?>	
		<?php 
	}

	function relativeTime($date) {
		$diff = time() - strtotime($date);
		if ($diff<60)
			return $diff . " second" . $this->plural($diff) . " ago";
		$diff = round($diff/60);
		if ($diff<60)
			return $diff . " minute" . $this->plural($diff) . " ago";
		$diff = round($diff/60);
		if ($diff<24)
			return $diff . " hour" . $this->plural($diff) . " ago";
		$diff = round($diff/24);
		if ($diff<7)
			return $diff . " day" . $this->plural($diff) . " ago";
		$diff = round($diff/7);
		if ($diff<4)
			return $diff . " week" . $this->plural($diff) . " ago";
		return "on " . date("F j, Y", strtotime($date));
	}

	function plural($num) {
		if ($num != 1) return "s";
	}
}

register_widget('Twitter_Feed');



?>
