<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////
// News System made by SOChaos, changed by Blader

echo $welcomeMessage . $spacer;
$entry_query = mysql_query("SELECT * FROM entries ORDER BY id DESC");
while($entry_data = mysql_fetch_array($entry_query)){ 
	$comment_query = "SELECT * FROM comments WHERE entryid = '" . $entry_data['id'] . "'";
	$comment_total = mysql_num_rows(mysql_query($comment_query));
	echo '<b>' . $entry_data['title'] . '</b><br />' . $entry_data['text'] . '<br />
		<div align="center">
		<a href=index.php?page=comments&id=' . $entry_data['id'] . '>Comments (' . $comment_total . ')</a>
		</div>' . $spacer;
}

?>