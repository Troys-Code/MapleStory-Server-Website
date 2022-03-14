<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if($source == "Odin"){
	$rUsers = "accounts";
	$rID = "id";
	$rUsername = "name";
	$rUserID = "accountid";
	$rMesos = "meso";
	$rOnline = "loggedin";
	$rOnlineQuery = "SELECT * FROM accounts WHERE loggedin != '0'";
	$rBanReason = "banreason";
	$rMaxHP = "maxhp";
	$rMaxMP = "maxmp";
}
elseif($source == "Vana"){
	$rUsers = "users";
	$rID = "ID";
	$rUsername = "username";
	$rUserID = "userid";
	$rMesos = "mesos";
	$rOnline = "online";
	$rOnlineQuery = "SELECT * FROM characters WHERE online != '0'";
	$rBanReason = "ban_reason";
	$rMaxHP = "mhp";
	$rMaxMP = "mmp";
}

?>