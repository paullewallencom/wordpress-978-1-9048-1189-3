<?
/*
Plugin Name: Aside
Plugin URI: type a url
Description: a sample widget for wordpress book
Author: Hasin Hayder
Version: 1.0
Author URI: http://hasin.wordpress.com
*/
function widget_aside_init()
{
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
	return;
	register_sidebar_widget('Aside', 'widget_aside_render');
	register_widget_control('Aside', 'widget_aside_admin', 350, 200);
}
function widget_aside_admin()
{
	if ($_POST['aside_submit']=='1'){
		$options['aside_title'] = $_POST['aside_title'];
		$options['aside_note'] = $_POST['aside_note'];
		update_option("widget_aside",$options);
	}
	$options = get_option("widget_aside");
	if (empty($options))
	{
		$title = "Aside";
		$note = "Type your note here";
	}
	else{
		$title = $options['aside_title'];
		$note = $options['aside_note'];
	}
	echo "<div style='height: 200px'>";
echo "<p style='text-align: left'>";
echo "Title<br/>";
echo "<input type='text' name='aside_title' value='{$title}'><br/>";
echo "Note<br/>";
echo "<textarea rows='5' cols='40' name='aside_note'>{$note}</textarea><br/></p>";
echo "<input type='hidden' name='aside_submit' value='1'></div>";
}
function widget_aside_render($args)
{
	extract($args);
	$options = get_option("widget_aside");
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
	echo "<li><h2>{$title}</h2></li>";
	echo "<ul><li>{$note}</li></ul>";
	echo $after_widget;
}
add_action('plugins_loaded', 'widget_aside_init');
?>