<?
/*
Plugin Name: Hit Counter
Plugin URI: Uh.. No URL
Description: A plugin which counts the number of times a post been viewed
Author: Hasin Hayder
Version: 1.0
Author URI: http://hasin.wordpress.com
*/
?>
<?
add_filter("the_content","HitCount");
function HitCount($content)
{

	global $id;
	$categories = get_the_category();
	foreach($categories as $category)
	{
		if ($category->cat_name=="All Books")
		return $content."<img style='display:none ' src='http://localhost/wp/hitcount.php?id={$id}'>";
	}
	return $content;
}

function GetTopBooks($limit=10)
{
	$top_books = array();
	$unserialized_data = file_get_contents("hits.txt");
	$hits = @unserialize($unserialized_data);
	$limit=$limit>count($hits)?count($hits):$limit;
	$i=0;	
	if (is_array($hits))
	{
	arsort($hits, SORT_DESC);

		foreach($hits as $post_id=>$post_hit)
		{
			$i++;
			if ($i>$limit) break;
			//$post_id = $hits[$i];
			$current_post = get_post($post_id);
			$top_books[] = "<li><a href='http://localhost/wp/?p={$post_id}'>".$current_post->post_title."<a/></li>";
		}
	}
	return implode($top_books);
}
?>