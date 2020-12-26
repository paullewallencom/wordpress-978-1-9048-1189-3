</div>

<div id="sidebar">
<h2>About Me</h2>
<ul>
<li>
Hi I am Hasin hayder, You can find my personal blog at <a href='http://hasin.wordpress.com'>The Storyteller</a>
</li>
</ul>


<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<p>
<input type="text" value="<?php echo wp_specialchars($s, 1); ?>"
name="s" id="s" />
<input type="submit" value="<?php _e('Search'); ?>" />
</p>
</form>


<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

	<?php wp_list_pages('title_li=<h2>' . __('Navigation') . '</h2>' ); ?>
	
	<li id="archives">
		<h2><?php _e('Archives'); ?></h2>
		<ul>
		<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</li>
	
	
	<li id="calendar">
		<?php get_calendar(); ?>
	</li>
	
	
	<li id="categories">
		<h2><?php _e('Categories'); ?></h2>
		<ul>
		<?php wp_list_cats(); ?> 
		</ul>
	</li>
	
	<?php if (function_exists('wp_theme_switcher')) { ?>
	<li id="themeswitcher">
		<h2><?php _e('Themes'); ?></h2>
		<?php wp_theme_switcher(); ?>
	</li>
	<?php } ?>

	<?php if ( is_home() ) { get_links_list(); } ?>	
	
	<li id="meta">
		<h2><?php _e('Meta'); ?></h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS 2.0'); ?>"><?php _e('Entries <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
			<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
			<li><a href="http://wordpress.org" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>">WordPress</a></li>
			<?php wp_meta(); ?>
		</ul>
	</li>

	<li id="search">
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</li>
	
<?php endif; ?>
</ul>
</div>
