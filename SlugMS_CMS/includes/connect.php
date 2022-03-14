<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

ob_start();
$connection = mysql_connect($db_host, $db_user, $db_pass) or die("Cannot establish connection to MySql Server.");
$db = mysql_select_db($database, $connection) or die("Cannot select the database.");

?>