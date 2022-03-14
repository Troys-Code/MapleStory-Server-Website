<?php 

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

$curPHP = basename($_SERVER["PHP_SELF"]);
$username = $_SESSION['username'];
$page = "";

if(isset($_SESSION['logged_in'])){
	if($_SESSION['logged_in'] == "gm"){
		if(isset($_GET["page"])){
			$page = $_GET["page"];
		} else {
			$page = "";
		}
	}
}
else {
	header("Location: index.php");
}

if($curPHP == "gmcp.php" and $page == ""){
	echo '<div align="center"><div class="title">Welcome ' . $username . '</div><br />
		<b>Welcome to the GM CP!  Here you may change and manage your account information, like normal users, but you can also ban other users and modify your characters.  Please click one of the options above to start managing your account.  You can press "HOME" to go back to the homepage.  You can also access the script page like normal users. Just click the link below.<br />
		<a href="script.php">Scripts</a></b>
		</div>';
}
elseif($page == "gmaccount"){
	include('includes/user_db.php');
	include('includes/user_db_char.php');
	echo '<div align="center"><div class="title">Account Information</div><br />
		<b>Here, you can edit your character information to whatever you want because you are a GM.  Please remember to not go over the number 32,000 while modifying your stats like str, dex, hp, etc.</b><br /><br /></div>
		<table align="center" cellspacing="1" cellpadding="5">
		<tr><td><b>Username : </b></td><td>' . $db_username . '</td></tr>
		<tr><td><b>Password : </b></td><td>' . $_SESSION['password'] . '</td></tr>
		<tr><td><b>Amount of Characters : </b></td><td>' . $char_count . '</td></tr></table><br /><br />
		<form method="post" action="gmcp.php?page=gmaccount">
		<div align="center"><div class="title">Character Information</div><br /></div>
		<table align="center" cellspacing="1" cellpadding="5">
		<tr><td><b>Character : </b></td><td>
		<select name="char">';
		for($i=1; $i<count($char_name)+1; $i++){
			echo '<option value="' . $i . '">' . $char_name[$i] . '</option>';
		}
		echo '</select></td></tr></table>
		<div align="center"><input type="submit" name="get_char_info" value="Get Information" />';
		include('includes/gm_edit.php');
		echo '</div></form>';
} 
elseif($page == "gmmanage"){
	echo '<div align="center"><div class="title">Manage Your Account</div><br />
		<b>Here, you can change your account information to fit your needs.  Please remember to click the save button at the bottom of each section to save your changed information!</b><br /><br /></div>
		<form method="post" action="gmcp.php?page=gmmanage">
		<div align="center"><div class="title">Change Your Password</div><br /></div>
		<table align="center" cellspacing="1" cellpadding="5">
		<tr><td><b>Current Password : </b></td><td><input type="password" name="cpassword" maxlength="12" /></td></tr>
		<tr><td><b>New Password : </b></td><td><input type="password" name="npassword" maxlength="12" /></td></tr>
		</table>
		<div align="center"><input type="submit" name="change_password" value="Save" /></div>';
	include('includes/user_manage.php');
	echo '</form>';
}
elseif($page == "gmban"){
	echo '<form method="post" action="gmcp.php?page=gmban">
		<div align="center"><div class="title">Ban a User</div><br />
		<b>If a user is breaking any of the rules, you can ban them through this system.  Enter their character name, the ban date, and pick the ban reason. Date format : YYYY-MM-DD. Note : This bans their whole account, not just the character. </b><br /><br />
		<table align="center" cellspacing="0" cellpadding="5">
		<tr><td><b>Name : </b></td><td><input type="text" name="name" maxlength="12" /></td></tr>';
	if($source == "Vana"){
		echo '<tr><td><b>Ban Expire : </b></td><td><input type="text" name="date" maxlength="10" /></td></tr>';
	}
	echo '<tr><td><b>Reason : </b></td><td>
		<select name="reason">
			<option value="01">Hacking / Third-party programs</option>
			<option value="02">Macro/auto-keyboard</option>
			<option value="03">Advertising</option>
			<option value="04">Harassment</option>
			<option value="05">Using Profane Language</option>
			<option value="06">Scamming</option>
			<option value="07">Misconduct</option>
			<option value="08">Illegal Cash Transaction</option>
			<option value="09">Illegal Charging/funding</option>
			<option value="10">Temporary Request</option>
			<option value="11">Impersonating GM</option>
			<option value="12">Violating Policy</option>
			<option value="13">Illegal Megaphone Use</option>
		</select>
		</td></tr></table>
		<div align="center"><input type="submit" name="ban_user" value="Ban User" /></div>';
		include('includes/gm_ban.php');
		echo '<br /><br /></div>
		<div align="center"><div class="title">Unban a User</div><br />
		<b>Here, you can unban users, before the expire date, if noted.  Enter their character name above. Note : This unbans their whole account, not just the character. </b><br /><br />
		<div align="center"><input type="submit" name="unban_user" value="Unban User" /></div>';
		include('includes/gm_unban.php');
		echo '</div></form>';
}
elseif($page == "gmnews"){
	echo '<div class="title">Make a News Post</div><br />
		<form method="post" action="gmcp.php?page=gmnews">
		<table align="center" cellspacing="1" cellpadding="5">
		<tr>
			<td style="white-space: nowrap;">Title : </td>
			<td style="white-space: nowrap;"><input type="text" name="entrytitle"/></td>
		</tr>
		</table>
		<div align="center">
		Content : <br /><textarea name="entrytext" style="width: 300px; height: 150px"></textarea><br />
		<input type="submit" name="post_news" value="Submit" /><br />'; 
	include('includes/gm_news.php');
	echo '</div></form><br />
		<div class="title">Edit a News Post</div><br />
		<form method="post" action="gmcp.php?page=gmnews">
		<table align="center" cellspacing="1" cellpadding="5"><tr><td style="white-space: nowrap;">Entry : </td>
		<td style="white-space: nowrap;"><select name="entries">';
	$entry_query = mysql_query("SELECT * FROM entries");
	while($entry_data = mysql_fetch_array($entry_query)){
		echo '<option value="' . $entry_data['id'] . '">' . $entry_data['title'] . '</option>';
	}
	echo '</td></tr></table>
		<div align="center"><input type="submit" name="edit_news" value="Edit" /><input type="submit" name="delete_news" value="Delete" /><br />';
	include('includes/gm_news_edit.php');
	include('includes/gm_news_delete.php');
	echo '</div></form>';
}
elseif($page == "gmlogout"){
	$_SESSION['logged_in'] = "";
	$_SESSION['username'] = "";
	$_SESSION['password'] = "";
	session_destroy();
	header("Location: index.php");
}
	
?>