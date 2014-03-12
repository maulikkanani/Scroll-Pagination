<!DOCTYPE HTML>
<html>
<head>

<title>Mk Scroll Pagination</title>

<link rel="stylesheet" type="text/css" href="style.css" />
<script src="jquery-1.11.0.min.js"></script> 
<script src="mkscroll.js"></script>

<script>

$(document).ready(function() {

	 jQuery(window).mkscroll({
             limit:10,              // first limit of your cyrent query
             total:100,             // total records
             offset:5,              // number of records you want to get
             appendon:"#main",      // selector for data append
             loader:".loader",      //ajax loader selector 
            //url : 'ajax.php'      //for your  query page url default ajax.php
            //jqueryfunction:before // ex. before=jQuery().before(); default append 
            // 
         });
	
});

</script>

</head>
<body>

<div id="main">

<?php
mysql_connect('localhost', 'root', '') or die();
mysql_select_db('vnhsolutions');
$run = mysql_query("SELECT * FROM wp_posts ORDER BY id DESC LIMIT 10");


while($row = mysql_fetch_array($run)) {
	
	$content = substr(strip_tags($row['post_content']), 0, 500);
	
	echo '<h1><a href="'.$row['guid'].'">'.$row['post_title'].'</a></h1><hr />';
	echo '<p>'.$content.'...</p><hr />';

}
?>
	

</div>
<div class="loader">
       <center>
           <img src="ajax-loader.gif" alt="ajax-loader">
       </center>
</div>
</body>
</html>