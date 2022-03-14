<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

$curPHP = basename($_SERVER["PHP_SELF"]);

if(isset($_GET["page"])){
	$page = $_GET["page"];
} else {
	$page = "";
}

if($curPHP == "index.php" and $page == ""){
	echo '<div class="title">Welcome to ' . $name . '</div><br />';
	include('includes/entries.php');
}
elseif($page == "register"){
	echo '<div align="center"><div class="title">' . $name . ' Registration</div></div>
		<form method="post" action="index.php?page=register">
		<table align="center" cellspacing="1" cellpadding="5">
			<tr>
				<td style="white-space: nowrap;">Username : </td>
				<td style="white-space: nowrap;"><input type="text" name="username" maxlength="20" /></td>
			</tr>
			<tr>
				<td style="white-space: nowrap;">Password : </td>
				<td style="white-space: nowrap;"><input type="password" name="password" maxlength="12" value="" /></td>
			</tr>
			<tr>
				<td style="white-space: nowrap;">Verify Password : </td>
				<td style="white-space: nowrap;"><input type="password" name="confirm_password" maxlength="12" value="" /></td>
			</tr>';
	if($source == "Odin"){
		echo '<tr>
				<td style="white-space: nowrap;">Email : </td>
				<td style="white-space: nowrap;"><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td style="white-space: nowarp;">Birth Date (YYYY-MM-DD) : </td>
				<td style="white-space: nowrap;"><input type="text" name="birthdate" maxlength="10" /></td>
			</tr>';
	}
	echo '</table>
		<div align="center"><input type="submit" name="register" value="Register" /><br />';
		include('includes/register.php');
		echo '</div></form>';
}
elseif($page == "rankings"){
	$last_column = "Level";
	$order_request = "";
	$job_request = "";
	if(isset($_GET['order'])){
		if($_GET['order'] == 'fame'){
			$last_column = "Fame";
			$order_request = "&order=fame";
		}
	}
	if(isset($_GET['type'])){
		if($_GET['type'] == 'job'){
			$job_request = "&type=job&job=" . $_GET['job'];
		}
	}
	echo '<div align="center"><div class="title">' . $name . ' Rankings</div><br />
		<a href="index.php?page=rankings">Overall</a> | 
		<a href="index.php?page=rankings&order=fame">Fame</a><br />
		Jobs : <a href="index.php?page=rankings&type=job&job=beginner' . $order_request . '">Beginner</a> | 
		<a href="index.php?page=rankings&type=job&job=warrior' . $order_request . '">Warrior</a> |
		<a href="index.php?page=rankings&type=job&job=magician' . $order_request . '">Magician</a> | 
		<a href="index.php?page=rankings&type=job&job=archer' . $order_request . '">Archer</a> |
		<a href="index.php?page=rankings&type=job&job=thief' . $order_request . '">Thief</a> |
		<a href="index.php?page=rankings&type=job&job=GM' . $order_request . '">GM</a> |
<a href="index.php?page=rankings&type=job&job=pirate' . $order_request . '">Pirate</a><br /><br />
		<table align="center" cellspacing="0" cellpadding="5">
			<tr>
				<td class="tableTL"><b>Rank</b></td>
				<td class="tableTL"><b>Character Name</b></td>
				<td class="tableTL"><b>Job</b></td>';
		if($source == "Odin"){
			echo '<td class="tableTL"><b>Guild</b></td>';
		}
			echo '<td class="tableTR"><b>' . $last_column . '</b></td>
			</tr>';
	include('includes/rankings.php');
	echo '</table><br /><br />';
	if($rankingAmount != "0"){
		if ($pageNum > 1){
			$prevPage = $pageNum - 1;
			echo '<a href="index.php?page=rankings&pagestart=' . $prevPage . $job_request . $order_request . '"><< Previous </a>';
		}
			echo ' | ';
		// page numbering links now
		for ($i = 1; $i <= $num_rank_pages; $i++){
			echo '<a href="index.php?page=rankings&pagestart=' . $i . $job_request . $order_request . '">' . $i . '</a> | ';
		}
		if ($pageNum < $num_rank_pages){
			$pageNum++;
			echo '<a href="index.php?page=rankings&pagestart=' . $pageNum . $job_request . $order_request . '">Next >></a>';
		}
	}
	echo '</div>';
}
elseif($page == "download"){
	include('includes/downloads.php');
}
elseif($page == "cp"){
	echo '<div align="center"><div class="title">Welcome to the Control Panel!</div><br />
		<b>Please log in with your account information.</b></div>
		<form method="post" action="index.php?page=cp">
		<table align="center" cellspacing="1" cellpadding="5">
			<tr>
				<td>Username : </td>
				<td><input type="text" name="username" maxlength="12" /></td>
			</tr>
			<tr>
				<td>Password : </td>
				<td><input type="password" name="password" maxlength="12" /></td>
			</tr>
			</table>
			<div align="center"><input type="submit" name="login" value="Log In" /><br />';
	include('includes/user_login.php');
	echo '</div></form><br /><br />
	<div align="center"><a href="' . $curPHP . '?page=gmcp">GM Control Panel</a><br />
	<a href="' . $curPHP . '?page=admincp">Admin Control Panel</a></div>';
}
elseif($page == "gmcp"){
	echo '<div align="center"><div class="title">GM Control Panel</div><br />
		<b>Please log in with your GM account information.</b></div>
		<form method="post" action="index.php?page=gmcp">
		<table align="center" cellspacing="1" cellpadding="5">
			<tr>
				<td>Username : </td>
				<td><input type="text" name="username" maxlength="12" /></td>
			</tr>
			<tr>
				<td>Password : </td>
				<td><input type="password" name="password" maxlength="12" /></td>
			</tr>
			</table>
			<div align="center"><input type="submit" name="login" value="Log In" /><br />';
	include('includes/gm_login.php');
	echo '</div></form><br /><br />
	<div align="center"><a href="' . $curPHP . '?page=cp">User Control Panel</a><br />
	<a href="' . $curPHP . '?page=admincp">Admin Control Panel</a></div>';
}
elseif($page == "admincp"){
	echo '<div align="center"><div class="title">Admin Control Panel</div><br />
		<b>Please log in with your admin account information.</b></div>
		<form method="post" action="index.php?page=admincp">
		<table align="center" cellspacing="1" cellpadding="5">
			<tr>
				<td>Username : </td>
				<td><input type="text" name="username" maxlength="12" /></td>
			</tr>
			<tr>
				<td>Password : </td>
				<td><input type="password" name="password" maxlength="12" /></td>
			</tr>
			</table>
			<div align="center"><input type="submit" name="login" value="Log In" /><br />';
	include('includes/admin_login.php');
	echo '</div></form><br /><br />
	<div align="center"><a href="' . $curPHP . '?page=cp">User Control Panel</a><br />
	<a href="' . $curPHP . '?page=gmcp">GM Control Panel</a></div>';
}
elseif($page == "comments"){
	$entryID = $_GET['id'];
	$entry_query = "SELECT * FROM entries WHERE id = '$entryID'";
	$entry_data = mysql_fetch_array(mysql_query($entry_query));
	$cEntryID = $entry_data['id'];	 
    $cEntryTitle = $entry_data['title'];
    $cEntryText = $entry_data['text'];

	echo '<div class="title">' . $cEntryTitle . '</div><br />' . $cEntryText . $spacer . '<br />
		<div class="title">Comments</div><br />
		<table align="center" cellspacing="0" cellpadding="5" width="100%">
		<tr><td class="tableTL" width="30%"><b>Name</b></td><td class="tableTR" width="70%"><b>Comment</b></td></tr>';

	$comment_query = mysql_query("SELECT * FROM comments WHERE entryid = '$cEntryID' ORDER BY id DESC");
	while($comment_data = mysql_fetch_array($comment_query)){
		$commentName = $comment_data['name'];
		$comment = $comment_data['text'];
		echo '<tr><td class="tableL">' . $commentName . '</td><td class="tableR">' . $comment . '</td></tr>';
	}
	
	echo '</table><br />
		<div class="title">Make a Comment</div><br />
		<form method="post" action="index.php?page=comments&id=' . $entryID . '">
		<table align="center" cellspacing="1" cellpadding="5">
		<tr>
			<td style="white-space: nowrap;">Display Name : </td>
			<td style="white-space: nowrap;"><input type="text" name="displayname"/></td>
		</tr>
		</table>
		<div align="center">
		Message : <br /><textarea name="message" style="width: 300px; height: 150px"></textarea><br />
		<input type="hidden" name="entry" value="' . $entryID . '" /> 
		<input type="submit" name="post_comment" value="Submit" /><br />';
	include('includes/comment_post.php');
	echo '</div>';  
}

?>