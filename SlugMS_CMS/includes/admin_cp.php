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
	if($_SESSION['logged_in'] == "admin"){
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

if($curPHP == "admincp.php" and $page == ""){
	echo '<div align="center"><div class="title">Welcome ' . $username . '</div><br />
		<b>Welcome to the Admin CP!  The Admin CP is not finished yet, sorry!  You can press "HOME" to go back to the homepage.  You can also access the script page like normal users. Just click the link below.<br />
		<a href="script.php">Scripts</a></b>
		</div>';
}
elseif($page == "adminlogout"){
	$_SESSION['logged_in'] = "";
	$_SESSION['username'] = "";
	$_SESSION['password'] = "";
	session_destroy();
	header("Location: index.php");
}
	
?>