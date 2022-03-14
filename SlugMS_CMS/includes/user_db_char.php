<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

$char_count = mysql_num_rows(mysql_query("SELECT * FROM characters WHERE " . $rUserID . " = '" . $db_userid . "'"));
$char_query = mysql_query("SELECT * FROM characters WHERE " . $rUserID . " = '" . $db_userid . "'");
$i = 1;
while($char_info = mysql_fetch_array($char_query)){
	$char_name[$i] = $char_info['name'];
	$char_level[$i] = $char_info['level'];
	$char_mesos[$i] = $char_info[$rMesos];
	$char_job[$i] = $char_info['job'];
	$char_str[$i] = $char_info['str'];
	$char_dex[$i] = $char_info['dex'];
	$char_int[$i] = $char_info['int'];
	$char_luk[$i] = $char_info['luk'];
	$char_fame[$i] = $char_info['fame'];
	$char_hp[$i] = $char_info[$rMaxHP];
	$char_mp[$i] = $char_info[$rMaxMP];
	$i++;
}

?>