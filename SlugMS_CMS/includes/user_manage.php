	<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if(isset($_POST['change_password'])){
	$password = mysql_real_escape_string(stripslashes($_POST['cpassword']));
	$npassword = mysql_real_escape_string(stripslashes($_POST['npassword']));
	include('includes/user_db.php');
	include('includes/password_check.php');
	
	$stop = "false";
	echo '<br /><div align="center">';
	if($password == "" or $npassword == ""){
		echo '<font color="red">Please fill in all the fields';
		$stop = "true";
	}
	
	if($stop == "false"){
		if($passwordEntered != $user_data['password']){
			echo '<font color="red">The current password filled in does not match the password in the database';
			$stop = "true";
		}
	}
	
	if($stop == "false"){
		if(strlen($npassword) < "6"){
			echo '<font color="red">The new password must be over 6 characters';
			$stop = "true";
		}
	}
	
	if($stop == "false"){
		if($npassword == $password){
			echo '<font color="red">The new password cannot be the same as the current password';
			$stop = "true";
		}
	}
	
	if($stop == "false"){
		$_SESSION["password"] = $npassword;
		if($source == "Odin"){
			$npassword = sha1($npassword);
		}
		mysql_query("UPDATE " . $rUsers . " SET password = '$npassword', salt = NULL WHERE " . $rUsername . " = '$username'");
		echo '<font color="green">Saved successfully!';
	}
	echo '</font></div>';
}

?>