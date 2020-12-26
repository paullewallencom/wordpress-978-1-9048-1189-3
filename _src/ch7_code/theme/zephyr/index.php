<?php  get_header(); ?>

	<div id="post_container">
		
		<?php get_sidebar(); ?>
				
		<div id="right_pan">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>">
	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>	

	<div class="meta">
	<?php _e("Posted in"); ?> <?php the_category(',') ?> by <?php the_author() ?> on the <?php the_time('F jS, Y') ?> 

	<?php edit_post_link(__('Edit This')); ?></div>
	<div class="main">
		<?php the_content(__('(more...)')); ?>
	</div>

	</div>
	

<div class="comments">
		<?php wp_link_pages(); ?>
		<?php comments_popup_link(__('<strong>0</strong> Comments'), __('<strong>1</strong> Comment'), __('<strong>%</strong> Comments')); ?>
	</div>

<?php comments_template(); ?>



<?php endwhile; else: ?>
<div class="warning">
	<p><?php _e('Sorry, no posts matched your criteria, please try and search again.'); ?></p>
</div>
<?php endif; ?>		
		</div>
		<div class="separator">
		</div>
		
<?php get_footer(); ?>

