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
	if($_SESSION['logged_in'] == "user"){
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

if($curPHP == "usercp.php" and $page == ""){
	echo '<div align="center"><div class="title">Welcome ' . $username . '</div><br />
		<b>Welcome to the User CP!  Here you may change and manage your account information.  Please click one of the options above to start managing your account.  You can press "HOME" to go back to the homepage. </b>
		</div>';
}
elseif($page == "account"){
	include('includes/user_db.php');
	include('includes/user_db_char.php');
	echo '<div align="center"><div class="title">Account Information</div><br /></div>
		<table align="center" cellspacing="1" cellpadding="5">
		<tr><td><b>Username : </b></td><td>' . $username . '</td></tr>
		<tr><td><b>Password : </b></td><td>' . $_SESSION['password'] . '</td></tr>
		<tr><td><b>Amount of Characters : </b></td><td>' . $char_count . '</td></tr></table><br /><br />
		<form method="post" action="usercp.php?page=account">
		<div align="center"><div class="title">Character Information</div><br /></div>
		<table align="center" cellspacing="1" cellpadding="5">
		<tr><td><b>Character : </b></td><td>
		<select name="char">';
		for($i=1; $i<count($char_name)+1; $i++){
			echo '<option value="' . $i . '">' . $char_name[$i] . '</option>';
		}
		echo '</select></td></tr>
		</td></tr></table>
		<div align="center"><input type="submit" name="get_char_info" value="Get Information" />';
		include('includes/user_char_info.php');
		echo '</div></form>';	
} 
elseif($page == "manage"){
	echo '<div align="center"><div class="title">Manage Your Account</div><br />
		<b>Here, you can change your account information to fit your needs.  Please remember to click the save button at the bottom of each section to save your changed information!</b><br /><br /></div>
		<form method="post" action="usercp.php?page=manage">
		<div align="center"><div class="title">Change Your Password</div><br /></div>
		<table align="center" cellspacing="1" cellpadding="5">
		<tr><td><b>Current Password : </b></td><td><input type="password" name="cpassword" maxlength="12" /></td></tr>
		<tr><td><b>New Password : </b></td><td><input type="password" name="npassword" maxlength="12" /></td></tr>
		</table>
		<div align="center"><input type="submit" name="change_password" value="Save" /></div>';
	include('includes/user_manage.php');
	echo '</form>';
}
elseif($page == "logout"){
	$_SESSION['logged_in'] = "";
	$_SESSION['username'] = "";
	$_SESSION['password'] = "";
	session_destroy();
	header("Location: index.php");
}
	
?>