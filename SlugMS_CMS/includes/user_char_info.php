<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if(isset($_POST['get_char_info'])){
	if(!isset($_POST['char'])){
		echo '<br /><font color="red">Please select a character</font>';
	} else {
		$char = $_POST['char'];
		include('includes/user_char_jobs.php');
		echo '<br /><br /><br /><span class="title">Selected Character Information</span>
			<table align="center" cellspacing="1" cellpadding="5">
			<tr><td><b>Name : </b></td><td>' . $char_name[$char] . '</td></tr>
			<tr><td><b>Level : </b></td><td>' . $char_level[$char] . '</td></tr>
			<tr><td><b>Mesos : </b></td><td>' . $char_mesos[$char] . '</td></tr>
			<tr><td><b>Job : </b></td><td>' . $char_job[$char] . '</td></tr>
			<tr><td><b>STR : </b></td><td>' . $char_str[$char] . '</td></tr>
			<tr><td><b>DEX : </b></td><td>' . $char_dex[$char] . '</td></tr>
			<tr><td><b>INT : </b></td><td>' . $char_int[$char] . '</td></tr>
			<tr><td><b>LUK : </b></td><td>' . $char_luk[$char] . '</td></tr>
			<tr><td><b>Fame : </b></td><td>' . $char_fame[$char] . '</td></tr>
			<tr><td><b>HP : </b></td><td>' . $char_hp[$char] . '</td></tr>
			<tr><td><b>MP : </b></td><td>' . $char_mp[$char] . '</td></tr>
			</table>';
	}
}

?>