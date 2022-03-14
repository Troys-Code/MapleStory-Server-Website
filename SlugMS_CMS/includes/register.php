<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if(isset($_POST['register'])){
	$username = mysql_real_escape_string(stripslashes($_POST['username']));
	$password = mysql_real_escape_string(stripslashes($_POST['password']));
	$confirm_password = $_POST['confirm_password'];

	$stop = "false";
	if(strlen($username) < "4"){
		echo '<font color="red">Your username must be over 4 characters.';
		$stop = "true";
	}

	if($stop == "false"){
		if(mysql_num_rows(mysql_query("SELECT * FROM " . $rUsers . " WHERE " . $rUsername . " = '$username'")) != "0"){
			echo '<font color="red">This username has already been taken.';
			$stop = "true";
		}
	}

	if($stop == "false"){
		if(strlen($password) < "6"){
			echo '<font color="red">Your password must be over 6 characters.';
			$stop = "true";
		}
	}

	if($stop == "false"){
		if($password != $confirm_password){
			echo '<font color="red">The passwords do not match.';
			$stop = "true";
		}
	}
	
	if($source == "Odin"){
		$email = mysql_real_escape_string(stripslashes($_POST['email']));
		$birthdate = mysql_real_escape_string(stripslashes($_POST['birthdate']));
		if($stop == "false"){
			if(empty($email)){
				echo '<font color="red">Please fill in an email address.';
				$stop = "true";
			}
		}
	
		if($stop == "false"){
			if(empty($birthdate)){
				echo '<font color="red">Please fill in your birth date.';
				$stop = "true";
			}
		}
	}

	if($stop == "false"){
		if($source == "Odin"){
			$password = sha1($password);
			mysql_query('INSERT INTO accounts (name, password, email, birthday, banreason, macs) 
			VALUES ("' . $username . '", "' . $password . '", "' . $email . '", "' . $birthdate . '", "0", "")') OR die (mysql_error());
		}
		elseif($source == "Vana"){
			mysql_query('INSERT INTO users (ID, username, password, gm) 
			VALUES (NULL , "' . $username . '", "' . $password . '", 0)') OR die (mysql_error());
		}
		echo '<font color="green">You have successfully been registered.';
	}	
	echo '</font>';	
}

?>