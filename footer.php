		</div><!--#main -->
		<footer id="footer">
			<div class="inner container">
				<div class="top clearfix">
					<h1 class="logo-container">
						<a class="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
					<button class="mobile-navigation-btn orange-btn"></button>
					<nav role="navigation" class="site-navigation main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary_footer', 'menu_class' => 'menu clearfix', 'container' => false ) ); ?>
					</nav><!-- .site-navigation .main-navigation -->
					<div class="social-links">
						<?php if($facebook_url = get_field('facebook_url', 'options')): ?>
						<a class="facebook-btn" href="<?php echo $facebook_url; ?>"></a>
						<?php endif; ?>
						<?php if($twitter_url = get_field('twitter_url', 'options')): ?>
						<a class="twitter-btn" href="<?php echo $twitter_url; ?>"></a>
						<?php endif; ?>
					</div>
				</div>
				<div class="bottom clearfix">
					<div class="widgets">
						<?php dynamic_sidebar( 'footer'); ?>
					</div>
					<div class="copyright">
						<p class="small">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></p>
					</div>
				</div>
			</div>
		</footer>
	</div><!--#wrap -->
	<?php wp_footer(); ?>

<!-- ClickDesk Live Chat Service for websites -->
<script type='text/javascript'>
var _glc =_glc || []; _glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyDwsSBXVzZXJzGJbt6JQBDA');
var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 
'http://my.clickdesk.com/clickdesk-ui/browser/');
var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');
var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 
glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';
var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);
</script>
<!-- End of ClickDesk -->
<script>
$CLICKDESK = (function() { 
	CLICKDESK_Live_Chat.onStatus(function(status){
		$('.clickdesk-status').text(status);
	});
});
</script>

<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38935030-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>