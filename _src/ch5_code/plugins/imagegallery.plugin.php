<?
/*
Plugin Name: Image Gallery
Plugin URI: Uh.. No URL
Description: A plugin which displays all images under any dir as image gallery
Author: Hasin Hayder
Version: 1.0
Author URI: http://hasin.wordpress.com
*/
?>
<?
add_filter("the_content", "ImageGallery");

function ImageGallery($content)
{
	if (strpos($content, "{gallery}")!==false)
	{
		$content = str_replace("{gallery}","",$content );
		$fp = opendir("coverpage");
		$table = "<table cellpadding='5' cellspacing='5'>";
		$i=false;
		while ($dir = readdir($fp)) {
			if (is_file("coverpage/{$dir}"))
			{
				if(false==$i)
				{
					$table .="<tr>";
				}
				$i = !$i;
				$file = split("-",$dir);
				$post_id = $file[0];
				
				$table .="<td><a href='http://localhost/wp/?p={$post_id}'><img src='http://localhost/wp/coverpage/{$dir}'></a></td>";
				if(false==$i)
				{
					$table .="</tr>";
				}
			}
			
		}
		$table .= "</table>";
	}
	return $content.$table;
}
?>