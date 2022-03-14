<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if(isset($_POST['delete_news'])){
	$stop = "false";
	if(isset($_SESSION['logged_in'])){
		if($_SESSION['logged_in'] != "gm"){
			$stop = "true";
		}
	} else {
		$stop = "true";
	}
	
	if($stop == "false"){
		if(!isset($_POST['entries'])){
			echo '<font color="red">Please select an entry</font>';
		} else {
			$sEntry = $_POST['entries'];
			mysql_query("DELETE FROM entries WHERE id = '$sEntry'");
			mysql_query("DELETE FROM comments WHERE entryid = '$sEntry'");
			echo '<font color="green">Entry and comments which belong to it were deleted successfully.</font>';
		}
	}
}

?>