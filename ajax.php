<?php

mysql_connect('localhost', 'root', '') or die();
mysql_select_db('vnhsolutions');

$offset = is_numeric($_POST['offset']) ? $_POST['limit'] + $_POST['offset'] : die();
$limit = is_numeric($_POST['limit']) ? $_POST['limit'] : die();


$run = mysql_query("SELECT * FROM wp_posts LIMIT $limit , $offset");
while($row = mysql_fetch_array($run)) {
	
	$content = substr(strip_tags($row['post_content']), 0, 500);
	
	echo '<h1><a href="'.$row['guid'].'">'.$row['post_title'].'</a></h1><hr />';
	echo '<p>'.$content.'...</p><hr />';

}

?>