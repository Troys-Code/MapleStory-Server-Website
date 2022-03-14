<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if(isset($_POST['login'])){
	$username = mysql_real_escape_string(stripslashes($_POST['username']));
	$password = mysql_real_escape_string(stripslashes($_POST['password']));
	include('includes/user_db.php');
	include('includes/password_check.php');
	
	$stop = "false";
	if(mysql_num_rows(mysql_query($user_query)) == 0){
		echo '<font color="red">Incorrect username.</font>';
		$stop = "true";
	}

	if($stop == "false"){
		if($db_gm == "0"){
			echo '<font color="red">This account is not a GM.</font>';
			$stop = "true";
		}
	}

	if($stop == "false"){
		if($passwordEntered != $user_data['password']){
			echo '<font color="red">Incorrect password.</font>';
		} else {
			$_SESSION['logged_in'] = "gm";
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			header("Location: gmcp.php");
		}
	}
}

?>