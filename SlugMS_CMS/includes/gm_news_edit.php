<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if(isset($_POST['edit_news'])){
	if(!isset($_POST['entries'])){
		echo '<font color="red">Please select an entry</font>';
	} else {
		$stop = "false";
		if(isset($_SESSION['logged_in'])){
			if($_SESSION['logged_in'] != "gm"){
				$stop = "true";
			}
		} else {
			$stop = "true";
		}
			
		if($stop == "false"){
			$sEntry = $_POST['entries'];
			$_SESSION['entry'] = $sEntry;
			$entry_query = "SELECT * FROM entries WHERE id = '$sEntry'";
			$entry_data = mysql_fetch_array(mysql_query($entry_query));
			echo '<br /><br /><div class="title">Edit Entry</div>
				<table align="center" cellspacing="1" cellpadding="5"><tr><td>Title : </td>
				<td><input type="text" name="nTitle" value="' . $entry_data['title'] . '" /></td></tr></table>
				<div align="center">Content : <br />
				<textarea name="nText" style="width: 300px; height: 150px">' . $entry_data['text'] . '</textarea><br />
				<input type="submit" name="edit_news_end" value="Edit" /></div>';
		}
	}
}

if(isset($_POST['edit_news_end'])){
	$stop = "false";
	if(isset($_SESSION['logged_in'])){
		if($_SESSION['logged_in'] != "gm"){
			$stop = "true";
		}
	} else {
		$stop = "true";
	}
		
	if($stop == "false"){
		$entryID = $_SESSION['entry'];
		$nEntryTitle = $_POST['nTitle'];
		$nEntryText = $_POST['nText'];
		
		if(empty($nEntryTitle) or empty($nEntryText)){
			echo '<font color="red">Please fill in all fields.</font>';
		} else {
			mysql_query("UPDATE entries SET title = '$nEntryTitle', text = '$nEntryText' WHERE id = '$entryID'");
			echo '<font color="green">Entry has been edited successfully.</font>';
		}
	}
}

?>