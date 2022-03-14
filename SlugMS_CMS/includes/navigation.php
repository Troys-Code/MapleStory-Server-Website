<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

$curPHP = basename($_SERVER["PHP_SELF"]);
$usercplink = "";
$usercptext = "USER CP";

if(isset($_GET["page"])){
	$page = $_GET["page"];
} else {
	$page = "";
}

if(isset($_SESSION["logged_in"])){
	if($_SESSION["logged_in"] == "admin"){
		$usercplink = "admincp.php";
		$usercptext = "ADMIN CP";
	} 
	elseif($_SESSION["logged_in"] == "gm"){
		$usercplink = "gmcp.php";
		$usercptext = "GM CP";
	} 
	elseif($_SESSION["logged_in"] == "user"){
		$usercplink = "usercp.php";
	} else {
		$usercplink = "index.php?page=cp";
	}
} else {
	$usercplink = "index.php?page=cp";
}

if($showAccPage == "yes"){
	$accPage = '<a href="' . $curPHP . '?page=accounts">ACCOUNTS</a>';
} else {
	$accPage = "";
}

if($curPHP == "index.php" and $page == ""){
	echo '<a href="' . $curPHP . '" class="selected">HOME</a> 
		<a href="' . $forum . '">FORUM</a> 
		<a href="' . $curPHP . '?page=register">REGISTER</a> 
		<a href="' . $curPHP . '?page=rankings">RANKING</a>
		<a href="' . $curPHP . '?page=download">DOWNLOAD</a>
		<a href="' . $usercplink . '">' . $usercptext . '</a>';
}
elseif($page == "register"){
	echo '<a href="' . $curPHP . '">HOME</a> 
		<a href="' . $forum . '">FORUM</a> 
		<a href="' . $curPHP . '?page=register" class="selected">REGISTER</a> 
		<a href="' . $curPHP . '?page=rankings">RANKING</a>
		<a href="' . $curPHP . '?page=download">DOWNLOAD</a>
		<a href="' . $usercplink . '">' . $usercptext . '</a>';
}
elseif($page == "rankings"){
	echo '<a href="' . $curPHP . '">HOME</a>
		<a href="' . $forum . '">FORUM</a> 
		<a href="' . $curPHP . '?page=register">REGISTER</a> 
		<a href="' . $curPHP . '?page=rankings" class="selected">RANKING</a>
		<a href="' . $curPHP . '?page=download">DOWNLOAD</a>
		<a href="' . $usercplink . '">' . $usercptext . '</a>';
}
elseif($page == "download"){
	echo '<a href="' . $curPHP . '">HOME</a> 
		<a href="' . $forum . '">FORUM</a> 
		<a href="' . $curPHP . '?page=register">REGISTER</a> 
		<a href="' . $curPHP . '?page=rankings">RANKING</a>
		<a href="' . $curPHP . '?page=download" class="selected">DOWNLOAD</a>
		<a href="' . $usercplink . '">' . $usercptext . '</a>';
}
elseif($page == "cp"){
	echo '<a href="' . $curPHP . '">HOME</a> 
		<a href="' . $forum . '">FORUM</a> 
		<a href="' . $curPHP . '?page=register">REGISTER</a> 
		<a href="' . $curPHP . '?page=rankings">RANKING</a>
		<a href="' . $curPHP . '?page=download">DOWNLOAD</a>
		<a href="' . $curPHP . '?page=cp" class="selected">' . $usercptext . '</a>';
}
elseif($curPHP == "usercp.php" and $page == ""){
	echo '<a href="index.php">HOME</a>
		<a href="' . $curPHP . '?page=account">ACCOUNT</a>
		<a href="' . $curPHP . '?page=manage">MANAGE</a>
		<a href="script.php">SCRIPTS</a>
		<a href="' . $curPHP . '?page=logout">LOGOUT</a>';
}
elseif($page == "account"){
	echo '<a href="index.php">HOME</a>
		<a href="' . $curPHP . '?page=account" class="selected">ACCOUNT</a>
		<a href="' . $curPHP . '?page=manage">MANAGE</a>
		<a href="script.php">SCRIPTS</a>
		<a href="' . $curPHP . '?page=logout">LOGOUT</a>';
}
elseif($page == "manage"){
	echo '<a href="index.php">HOME</a>
		<a href="' . $curPHP . '?page=account">ACCOUNT</a>
		<a href="' . $curPHP . '?page=manage" class="selected">MANAGE</a>
		<a href="script.php">SCRIPTS</a>
		<a href="' . $curPHP . '?page=logout">LOGOUT</a>';
}
elseif($curPHP == "information.php" and $page == ""){
	echo '<a href="index.php">HOME</a>
		' . $accPage . '
		<a href="' . $curPHP . '?page=online">ONLINE</a>
		<a href="' . $curPHP . '?page=banned">BANNED</a>
		<a href="' . $curPHP . '?page=staff">STAFF</a>
		<a href="' . $curPHP . '?page=faq">FAQ</a>';
}
elseif($page == "accounts"){
	echo '<a href="index.php">HOME</a>
		<a href="' . $curPHP . '?page=accounts" class="selected">ACCOUNTS</a>
		<a href="' . $curPHP . '?page=online">ONLINE</a>
		<a href="' . $curPHP . '?page=banned">BANNED</a>
		<a href="' . $curPHP . '?page=staff">STAFF</a>
		<a href="' . $curPHP . '?page=faq">FAQ</a>';
}
elseif($page == "online"){
	echo '<a href="index.php">HOME</a>
		' . $accPage . '
		<a href="' . $curPHP . '?page=online" class="selected">ONLINE</a>
		<a href="' . $curPHP . '?page=banned">BANNED</a>
		<a href="' . $curPHP . '?page=staff">STAFF</a>
		<a href="' . $curPHP . '?page=faq">FAQ</a>';
}
elseif($page == "banned"){
	echo '<a href="index.php">HOME</a>
		' . $accPage . '
		<a href="' . $curPHP . '?page=online">ONLINE</a>
		<a href="' . $curPHP . '?page=banned" class="selected">BANNED</a>
		<a href="' . $curPHP . '?page=staff">STAFF</a>
		<a href="' . $curPHP . '?page=faq">FAQ</a>';
}
elseif($page == "staff"){
	echo '<a href="index.php">HOME</a>
		' . $accPage . '
		<a href="' . $curPHP . '?page=online">ONLINE</a>
		<a href="' . $curPHP . '?page=banned">BANNED</a>
		<a href="' . $curPHP . '?page=staff" class="selected">STAFF</a>
		<a href="' . $curPHP . '?page=faq">FAQ</a>';
}
elseif($page == "faq"){
	echo '<a href="index.php">HOME</a>
		' . $accPage . '
		<a href="' . $curPHP . '?page=online">ONLINE</a>
		<a href="' . $curPHP . '?page=banned">BANNED</a>
		<a href="' . $curPHP . '?page=staff">STAFF</a>
		<a href="' . $curPHP . '?page=faq" class="selected">FAQ</a>';
}
elseif($page == "gmcp"){
	echo '<a href="index.php">HOME</a>
		<a href="' . $forum . '">FORUM</a> 
		<a href="' . $curPHP . '?page=register">REGISTER</a> 
		<a href="' . $curPHP . '?page=rankings">RANKING</a>
		<a href="' . $curPHP . '?page=download">DOWNLOAD</a>
		<a href="' . $usercplink . '">USER CP</a>';
}
elseif($page == "admincp"){
	echo '<a href="index.php">HOME</a>
		<a href="' . $forum . '">FORUM</a> 
		<a href="' . $curPHP . '?page=register">REGISTER</a> 
		<a href="' . $curPHP . '?page=rankings">RANKING</a>
		<a href="' . $curPHP . '?page=download">DOWNLOAD</a>
		<a href="' . $usercplink . '">USER CP</a>';
}
elseif($curPHP == "gmcp.php" and $page == ""){
	echo '<a href="index.php">HOME</a>
		<a href="' . $curPHP . '?page=gmaccount">ACCOUNT</a> 
		<a href="' . $curPHP . '?page=gmmanage">MANAGE</a>
		<a href="' . $curPHP . '?page=gmban">BAN</a>
		<a href="' . $curPHP . '?page=gmnews">NEWS</a>
		<a href="' . $curPHP . '?page=gmlogout">LOGOUT</a>';
}
elseif($page == "gmaccount"){
	echo '<a href="index.php">HOME</a>
		<a href="' . $curPHP . '?page=gmaccount" class="selected">ACCOUNT</a> 
		<a href="' . $curPHP . '?page=gmmanage">MANAGE</a>
		<a href="' . $curPHP . '?page=gmban">BAN</a>
		<a href="' . $curPHP . '?page=gmnews">NEWS</a>
		<a href="' . $curPHP . '?page=gmlogout">LOGOUT</a>';
}
elseif($page == "gmmanage"){
	echo '<a href="index.php">HOME</a>
		<a href="' . $curPHP . '?page=gmaccount">ACCOUNT</a> 
		<a href="' . $curPHP . '?page=gmmanage" class="selected">MANAGE</a>
		<a href="' . $curPHP . '?page=gmban">BAN</a>
		<a href="' . $curPHP . '?page=gmnews">NEWS</a>
		<a href="' . $curPHP . '?page=gmlogout">LOGOUT</a>';
}
elseif($page == "gmban"){
	echo '<a href="index.php">HOME</a>
		<a href="' . $curPHP . '?page=gmaccount">ACCOUNT</a> 
		<a href="' . $curPHP . '?page=gmmanage">MANAGE</a>
		<a href="' . $curPHP . '?page=gmban" class="selected">BAN</a>
		<a href="' . $curPHP . '?page=gmnews">NEWS</a>
		<a href="' . $curPHP . '?page=gmlogout">LOGOUT</a>';
}
elseif($page == "gmnews"){
	echo '<a href="index.php">HOME</a>
		<a href="' . $curPHP . '?page=gmaccount">ACCOUNT</a> 
		<a href="' . $curPHP . '?page=gmmanage">MANAGE</a>
		<a href="' . $curPHP . '?page=gmban">BAN</a>
		<a href="' . $curPHP . '?page=gmnews" class="selected">NEWS</a>
		<a href="' . $curPHP . '?page=gmlogout">LOGOUT</a>';
}
elseif($curPHP == "script.php"){
	echo '<a href="index.php">HOME</a>
		<a href="script.php" class="selected">SCRIPTS</a>';
}
elseif($page == "comments"){
	echo '<a href="index.php">HOME</a>';
}
elseif($curPHP == "admincp.php" and $page == ""){
	echo '<a href="index.php">HOME</a>
		<a href="' . $curPHP . '">ADMIN CP</a>
		<a href="' . $curPHP . '?page=acp_settings">SETTINGS</a>
		<a href="' . $curPHP . '?page=acp_conf">CONFIG</a>
		<a href="' . $curPHP . '?page=adminlogout">LOGOUT</a>';
}

?>
