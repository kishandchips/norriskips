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

<?php if($clickdesk_key = get_field('clickdesk_key', 'options')): ?>
<!-- ClickDesk Live Chat Service for websites -->
<script type='text/javascript'>
var _glc =_glc || []; _glc.push('<?php echo $clickdesk_key; ?>');
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
<?php endif; ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49209578-1', 'auto');

  //ga('create', 'UA-XXXXXXX-Y', 'auto', {'allowLinker': true});
  //ga('require', 'linker');
  //ga('linker:autoLink', ['example-2.com'] );

  ga('send', 'pageview');

</script>

</body>
</html>