<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

switch($user_data[$rBanReason])
{
case "01";
$user_data[$rBanReason] = "Hacking / using third-party programs";
break;

case "02";
$user_data[$rBanReason] = "Using macro/auto-keyboard";
break;

case "03";
$user_data[$rBanReason] = "Illicit promotion or advertising";
break;

case "04";
$user_data[$rBanReason] = "Harassment";
break;

case "05";
$user_data[$rBanReason] = "Using profane language";
break;

case "06";
$user_data[$rBanReason] = "Scamming";
break;

case "07";
$user_data[$rBanReason] = "Misconduct";
break;

case "08";
$user_data[$rBanReason] = "Illegal cash transaction";
break;

case "09";
$user_data[$rBanReason] = "Illegal charging/funding";
break;

case "10";
$user_data[$rBanReason] = "Temporary request";
break;

case "11";
$user_data[$rBanReason] = "Impersonating GM";
break;

case "12";
$user_data[$rBanReason] = "Using illegal programs / violating policy";
break;

case "13";
$user_data[$rBanReason] = "Cursing, scamming, or illegal trading via Megaphones";
break;
}

?>