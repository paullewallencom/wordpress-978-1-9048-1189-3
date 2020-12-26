<div id="left_pan">
	<div class="sidebar_container">	<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	

			<li><h2>About</h2></li>
			<li>Packt publishing is a great publisher. Packt publishing is a great publisher. Packt publishing is a great publisher.</li>
		</ul>
	</div>

	<div class="sidebar_container">
		<ul>
			<li><h2>Search</h2></li>
			<li id="search">
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li> 
		</ul>
	</div>
	<div class="sidebar_container">
		<ul>
			<li><h2>Pages</h2></li>
			<?php wp_list_pages('title_li='); ?>
		</ul>
	</div>
	
	<div class="sidebar_container">
		<ul>
			<li><h2>Categories</h2></li>
			<?php wp_list_cats("exclude=2,5,1,6&sort_column=name"); ?>
		</ul>
	</div>	
	
	<div class="sidebar_container">
		<ul>
			<li><h2>Archives</h2></li>
			<?php wp_get_archives();?>
		</ul>
	</div>	

	<div class="sidebar_container">
		<ul>
			<li><h2>Links</h2></li>
			<?php wp_get_links();?>
		</ul>
	</div>	
	
	<div class="sidebar_container">
		<ul>
			<li><h2>Meta</h2></li>
			<li><?php wp_loginout(); ?></li>
			
			<li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
			<li><a href="http://wordpress.org/">WP</a></li>

	<? endif;?>		
	</ul>		
	</div>	
	<div style="azimuth:behind">
	</div>
</div>