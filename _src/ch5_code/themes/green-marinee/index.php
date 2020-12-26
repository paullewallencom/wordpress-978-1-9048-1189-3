<?if (is_category()) $cat=true;?>
<?php  get_header(); ?>
<?php get_sidebar(); ?>

<hr />
<div id="content">
<?php if (is_home())
{
	query_posts("category_name='frontpage'");
        $homepage= true;
}
?>
<?
$catobj=get_category(get_cat_ID(single_cat_title('',false)));
echo $catobj->category_description;
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php // Post dates off by default the_date('','<h2>','</h2>'); ?>
	<div id="post-<?php the_ID(); ?>">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>	
<? if(!$cat):?>
	<div class="meta">
	<?php _e("Posted in"); ?> <?php the_category(',') ?> by <?php the_author() ?> on the <?php the_time('F jS, Y') ?> 

	<?php edit_post_link(__('Edit This')); ?></div>
	<div class="main">
		<?php the_content(__('(more...)')); ?>
	</div>
<?endif;?>
	</div>
	
<? if (single_cat_title("",false)!="frontpage"):?>
<? if(!$cat):?>
<div class="comments">
		<?php wp_link_pages(); ?>
		<?php comments_popup_link(__('<strong>0</strong> Comments'), __('<strong>1</strong> Comment'), __('<strong>%</strong> Comments')); ?>
	</div>
<? endif;?>	
<? endif; ?>
<?php comments_template(); ?>



<?php endwhile; else: ?>
<div class="warning">
	<p><?php _e('Sorry, no posts matched your criteria, please try and search again.'); ?></p>
</div>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>

	</div>
<!-- End float clearing -->
</div>
<!-- End content -->
<?php get_footer(); ?>