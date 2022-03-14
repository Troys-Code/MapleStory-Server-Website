<?php
include("config.inc.php");
// Connect to the database
$db = mysql_connect($sql_host, $sql_user, $sql_pass) or die("Could not connect to server database");
mysql_select_db($sql_db, $db);
// Select all the banned users and display them
$result = mysql_query("SELECT * FROM characters WHERE online = '1'", $db) or die(mysql_error());  

echo "<table border='1' bordercolor='#ffffff' style='dashed thin'>";
echo "<tr> <th>&nbsp;Character Name&nbsp;</th> <th>&nbsp;LeveL&nbsp;</th><th>&nbsp;Job Class&nbsp;</th> </tr>";
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {
	// Print out the contents of each row into a table
	echo "&nbsp;<tr><td bgcolor='#ffffff'>&nbsp;&nbsp;"; 
	echo $row['name'];
	echo "&nbsp;</td><td bgcolor='#ffffff'>&nbsp;&nbsp;"; 
	echo $row['level'];
	echo "&nbsp;</td><td bgcolor='#ffffff'>&nbsp;";
	include ('./inc/rank_class.inc.php');
	echo "</td></tr>"; 
}

echo "</table>";
mysql_close($db);
?>