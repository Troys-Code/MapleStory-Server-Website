<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////
// News System made by SOChaos, changed by Blader

if(isset($_POST['post_news'])){
	$entryTitle = $_POST['entrytitle'];
	$entryText = $_POST['entrytext'];
	
	$stop = "false";
	if(isset($_SESSION['logged_in'])){
		if($_SESSION['logged_in'] != "gm"){
			$stop = "true";
		}
	} else {
		$stop = "true";
	}
	
	if(empty($entryTitle)){
		echo '<font color="red">Please enter a title for the entry.</font>';
		$stop = "true";
	}
	
	if($stop == "false"){
		if(empty($entryText)){
			echo '<font color="red">Please enter the content for the entry.</font>';
			$stop = "true";
		}
	}
	
	if($stop == "false"){
		mysql_query("INSERT INTO entries (title, text) VALUES ('$entryTitle', '$entryText')");
		echo '<font color="green">Entry was posted successfully.</font>';
	}
}

?>