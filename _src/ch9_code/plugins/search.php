<?
/*
Plugin Name: Searched Words
Plugin URI: NA
Description: A sample plug-in for WordPress book
Author: Hasin Hayder
Version: 1.0
Author URI: http://hasin.phpxperts.com
*/
?>
<?
add_filter('init', 'searchedwords_init');
add_action("admin_menu","admin_menu");
function searchedwords_init($content)
{
	if (isset($_GET['activate']) && $_GET['activate'] == 'true') {
		global $wpdb;
		$result = mysql_list_tables(DB_NAME);
		$current_tables = array();
		while ($row = mysql_fetch_row($result)) {
			$current_tables[] = $row[0];
		}
		if (!in_array("wp_searchedwords", $current_tables))
		{
			$result = mysql_query(
			"CREATE TABLE `wp_searchedwords`
(id INT NOT NULL
AUTO_INCREMENT
PRIMARY KEY,
word VARCHAR(255)
)");
		}
	}
	if (!empty($_GET['s']))
	{

		$current_searched_words = explode(" ",urldecode($_GET['s']));
		foreach ($current_searched_words as $word)
		{
			mysql_query("insert into wp_searchedwords values(null,
'{$word}')");
		}
	}
}
function admin()
{
	echo "<div class='wrap'>";
	$result = mysql_query("select count(word) as occurance, word from
wp_searchedwords group by word order by occurance DESC");
	echo "<h2>Top Searched Words</h2>";
	if (mysql_num_rows($result)>0)
	{
		while ($row = mysql_fetch_row($result))
		{
			echo "People searched for <b>{$row[1]}</b> for {$row[0]}
time(s)<br/>";
		}
	}
	else {
		echo "<h3>Sorry - No searchword found</h3>";
	}
	echo "</div>";
}
function admin_menu()
{
	if (function_exists('add_submenu_page')) {
		add_submenu_page('index.php', "Searched Keywords", "Searched
Keywords", 1, 'searchedwords.plugin.php', 'admin');
	}
}
?>