<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if(isset($_POST['post_comment'])){
	$curEntryID = mysql_real_escape_string(stripslashes($_GET['id']));
	$displayName = mysql_real_escape_string(stripslashes($_POST['displayname']));
	$displayMessage = mysql_real_escape_string(stripslashes($_POST['message']));

	$stop = "false";
	if(empty($displayName)){
		echo '<font color="red">Please enter a display name.</font>';
		$stop = "true";
	}
	
	if($stop == "false"){
		if(empty($displayMessage)){
			echo '<font color="red">Please enter a message.</font>';
			$stop = "true";
		}
	}
	
	if($stop == "false"){
		mysql_query("INSERT INTO comments (entryid, name, text) VALUES ('$curEntryID', '$displayName', '$displayMessage')") or die("Something went wrong with the SQL Syntax");
		header('Location: index.php?page=comments&id=' . $curEntryID);
	}
}

?>
