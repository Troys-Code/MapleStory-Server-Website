
<link rel="stylesheet" href="style3.css">


<?php
$con = mysql_connect($sql_host, $sql_user, $sql_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($sql_db, $con);
include('config.inc.php');


// Get all the data from the "example" table
$result = mysql_query("SELECT level, name, mesos, job FROM characters ORDER BY level DESC")
or die(mysql_error());  

echo "<table border='1' bordercolor='#ffffff' style='dashed'>";
echo "<tr> <th>&nbsp;Level&nbsp;</th> <th>&nbsp;Character Name&nbsp;</th> <th>&nbsp;Mesos&nbsp;</th> <th>&nbsp;Job Class&nbsp;</th> </tr>";
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {
	// Print out the contents of each row into a table
	echo "&nbsp;<tr><td bgcolor='#ffffff''  style='font-size:12px; '>&nbsp;&nbsp;"; 
	echo $row['level'];
	echo "&nbsp;</td><td bgcolor='#ffffff' style='font-size:12px;'>&nbsp;&nbsp;"; 
	echo $row['name'];
	echo "&nbsp;</td><td bgcolor='#ffffff' style='font-size:12px;'>&nbsp;&nbsp;"; 
	echo $row['mesos'];
	echo "&nbsp;</td><td bgcolor='#ffffff' style='font-size:12px;'>&nbsp;";
	include ('./inc/rank_class.inc.php');
	echo "</td></tr>"; 
} 

echo "</table>"; ?>