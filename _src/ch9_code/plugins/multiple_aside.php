<?
/*
Plugin Name: Aside
Plugin URI: not available
Description: a sample widget for WordPress book
Author: Hasin Hayder
Version: 1.0
Author URI: http://hasin.wordpress.com
*/
function widget_aside_init()
{
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
	return;
	add_action('sidebar_admin_page', 'widget_aside_page');
	add_action('sidebar_admin_setup', 'widget_aside_setup');
	widget_aside_setup();
}
function widget_aside_setup()
{
	//echo "accessed";
	if ($_POST['aside_number_submit']=='1')
	{
		$number_of_asides = $_POST['number_of_asides'];
		update_option("widget_aside_number",$number_of_asides);
	}
	$number_of_asides = get_option("widget_aside_number")+1;
	for ($i=1; $i<$number_of_asides; $i++)
	{
		$name = array('Aside %s', null, $i);
		register_sidebar_widget("Aside {$i}", 'widget_aside_render', $i);
		register_widget_control("Aside {$i}", 'widget_aside_admin', 350,200,$i);
	}
	for ($i=$number_of_asides; $i<6; $i++)
	{
		register_sidebar_widget("Aside {$i}", '', $i);
		register_widget_control("Aside {$i}", '', 350, 200,$i);
	}
}
function widget_aside_page() {
	$options = $newoptions = get_option('widget_aside');
?>
<div class="wrap">
<form method="POST">
<h2>Aside Widgets</h2>
<p>How many aside widgets would you like?
<select name='number_of_asides'>
<?
for($i=1; $i<6; $i++)
echo "<option value={$i}>{$i}</option>";
?>
</select>
<span class="submit"><input type='hidden' name = 'aside_number_submit' value='1'><input type="submit" value="save" /></span></p>
</form>
</div>
<?php
}
function widget_aside_admin($args)
{
	$widget_id = $args;
	if ($_POST['aside_submit']=='1'){
		$current_widget_id = $widget_id;//$_POST['aside_id'];
		$options['aside_title'] = $_POST["aside_title{$current_widget_id}"];
		$options['aside_note'] = $_POST["aside_note{$current_widget_id}"];
		update_option("widget_aside{$current_widget_id}",$options);
	}
	$options = get_option("widget_aside{$widget_id}");
	if (empty($options))
	{
		$title = "Aside";
		$note = "Type your note here";
	}
	else {
		$title = $options['aside_title'];
		$note = $options['aside_note'];
	}
	echo "<div stle='height: 200px'>
<p style='text-align: left'>
Title<br/>
<input type='text' name='aside_title{$widget_id}' value='{$title}'><br/>
Note<br/>
<textarea rows='5' cols='40' name='aside_note{$widget_id}'>{$note}</textarea><br/></p>
<input type='hidden' name='aside_submit' value='1'>
<input type='hidden' name='aside_id' value='{$widget_id}'>
</div>";
}
function widget_aside_render($args,$id)
{
	extract($args);
	$widget_id = $id;
	$options = get_option("widget_aside{$widget_id}");
	if (empty($options))
	{
		$title = "Aside";
		$note = "There is no note currently";
	}
	else {
		$title = $options['aside_title'];
		$note = $options['aside_note'];
	}
	echo $before_widget;
	echo $before_title;
	echo "<h2>{$title}</h2>";
	echo "<ul><li>{$note}</li></ul>";
	echo $after_title;
	echo $after_widget;
}
add_action('plugins_loaded', 'widget_aside_init');
?>