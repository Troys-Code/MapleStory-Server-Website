<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

$fp = @fsockopen($serverip, $serverport, $errno, $errstr, 1);
if(!$fp){
	$status = '<font color="red">offline</font>';
} else {
	$status = '<font color="green"><b>online</b></font>';
}
@fclose($fp);

?>