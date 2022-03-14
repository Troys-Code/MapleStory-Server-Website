<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

$user_query = "SELECT * FROM " . $rUsers . " WHERE " . $rUsername . " = '$username'";
$user_data = mysql_fetch_array(mysql_query($user_query));
$db_userid = $user_data[$rID];
$db_username = $user_data[$rUsername];
$db_salt = $user_data['salt'];
$db_gm = $user_data['gm'];

?>