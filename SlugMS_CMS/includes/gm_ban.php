<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if(isset($_POST['ban_user'])){
	if($source == "Vana"){
		$date = $_POST['date'] . " 00:00:00";
	}
	$name = $_POST['name'];
	$reason = $_POST['reason'];
	$char_query = "SELECT * FROM characters WHERE name = '$name'";
	$char_data = mysql_fetch_array(mysql_query($char_query));
	$char_user_id = $char_data[$rUserID];
	
	$stop = "false";
	if(isset($_SESSION['logged_in'])){
		if($_SESSION['logged_in'] != "gm"){
			$stop = "true";
		}
	} else {
		$stop = "true";
	}
	
	if($name == ""){
		echo '<font color="red">Please fill in a name.</font>';
		$stop = "true";
	}
	
	if($source == "Vana"){
		if($stop == "false"){
			if($date == ""){
				echo '<font color="red">Please fill in a date.</font>';
				$stop = "true";
			}
		}
	}
	
	if($stop == "false"){
		if(mysql_num_rows(mysql_query($char_query)) == 0){
			echo '<font color="red">Character was not found.</font>';
		} else {
			if($source == "Odin"){
				mysql_query("UPDATE accounts SET banreason = '$reason', banned = '1' WHERE id = '$char_user_id'");
			}
			elseif($source == "Vana"){
				mysql_query("UPDATE users SET ban_reason = '$reason', ban_expire = '$date' WHERE ID = '$char_user_id'");
			}
			echo '<font color="green">Successfully banned the user.</font>';
		}
	}
}

?>