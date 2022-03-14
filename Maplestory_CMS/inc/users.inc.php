<?php

$link = mysql_connect($sql_host, $sql_user, $sql_pass);
mysql_select_db($sql_db, $link);

$result = mysql_query("SELECT * FROM accounts", $link);
$num_rows_user = mysql_num_rows($result);

$result = mysql_query("SELECT * FROM characters", $link);
$num_rows_char = mysql_num_rows($result);

$result3 = mysql_query("Select loggedin from accounts where loggedin = 1 or loggedin =2", $db);// Character section
$num_rowsd = mysql_num_rows($result3);

$result3 = mysql_query("Select banned from accounts where banned = 1", $db);// banned users
$num_rows_banned = mysql_num_rows($result3);

echo "<br>Registered Users: <b>$num_rows_user</b> ";
echo "<br>Characters Created: <b>$num_rows_char</b> ";
echo "<br>Online Users: <b>$num_rowsd</b>";
echo "<br>Banned Users: <b>$num_rows_banned</b>";
?>
