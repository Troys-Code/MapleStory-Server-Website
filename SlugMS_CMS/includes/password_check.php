<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if($source == "Odin"){
	if(isset($db_salt)){
		$passwordEntered = hash('sha512', $password . $db_salt);
	} else {
		$passwordEntered = sha1($password);
	}
}
elseif($source == "Vana"){
	if(isset($db_salt)){
		$passwordEntered = strtoupper(sha1($db_salt . $password));
	} else {
		$passwordEntered = $password;
	}
}

?>