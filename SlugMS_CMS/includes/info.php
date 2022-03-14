<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

$curPHP = basename($_SERVER["PHP_SELF"]);
$user_data = "";

if(isset($_GET["page"])){
	$page = $_GET["page"];
} else {
	$page = "";
}

if($curPHP == "information.php" and $page == ""){
	echo '<div align="center"><div class="title">' . $name . ' Information</div><br />
		<b>Here is the information page for ' . $name . ', to find more information and statistics of this server, choose one of the categories above and click it.  It will redirect you to the information of the server in that category. </b></div>';
}
elseif($page == "accounts"){
	if($showAccPage == "yes"){
		echo '<div align="center"><div class="title">' . $name . ' Accounts</div><br /><br />
			<table align="center" cellspacing="0" cellpadding="5" width="100%">
        	<tr><td class="tableTL" width="50%"><b>Username</b></td><td class="tableTR" width="50%"><b>Number of Characters</b></td></tr>';
		$query = mysql_query("SELECT * FROM " . $rUsers);
		while($user_data = mysql_fetch_array($query)){
			include('includes/user_db_char.php');
			echo '<tr><td class="tableL">' . $user_data[$rUsername] . '</td>
				<td class="tableR">' . $char_count . '</td></tr>';
		}
		echo '</table></div>';
	} else {
		echo 'This page is unavailable.';
	}
}
elseif($page == "online"){
	echo '<div align="center"><div class="title">' . $name . ' Online Users</div><br /><br />
		<table align="center" cellspacing="0" cellpadding="5" width="100%">
        <tr><td class="tableTL" width="50%"><b>Name</b></td><td class="tableTR" width="50%"><b>Status</b></td></tr>';
	$user_query = mysql_query($rOnlineQuery);
	while($user_data = mysql_fetch_array($user_query)){
		if($source == "Odin"){
			if($user_data['online'] != 2){
				$status = '<font color="blue">Logging In</font>';
			} else {
				$status = '<font color="green">Online</font>';
			}
		}
		elseif($source == "Vana"){
			if($user_data['online'] != 1){
				$status = '<font color="blue">Logging In</font>';
			} else {
				$status = '<font color="green">Online</font>';
			}
		}
		echo '<tr><td class="tableL">' . $user_data['name'] . '</td>
			<td class="tableR">' . $status. '</td></tr>';
	}
	echo '</table></div>';
}
elseif($page == "banned"){
	echo '<div align="center"><div class="title">' . $name . ' Banned Users</div><br /><br />
		<table align="center" cellspacing="0" cellpadding="5" width="100%">
		<tr><td class="tableTL" width="40%"><b>Username</b></td><td class="tableTR" width="60%"><b>Reason</b></td></tr>';
	if($source == "Odin"){
		$user_query = mysql_query("SELECT * FROM " . $rUsers . " WHERE banned != '0'");
	}
	elseif($source == "Vana"){
		$user_query = mysql_query("SELECT * FROM " . $rUsers . " WHERE ban_reason != '0'");
	}
	while($user_data = mysql_fetch_array($user_query)){
		include('includes/ban_reasons.php');
		echo '<tr><td class="tableL">' . $user_data[$rUsername] . '</td>
			<td class="tableR">' . $user_data[$rBanReason] . '</td></tr>';
	}
	echo '</table></div>';
}
elseif($page == "staff"){
	echo '<div align="center"><div class="title">' . $name .' Staff Members</div><br />
		<b> Here are the staff members of our server, they are listed below.  If you have any questions, please get in contact with one of the staff members. </b><br /><br />
		<table align="center" cellspacing="0" cellpadding="5" width="100%">
		<tr><td class="tableTL" width="50%"><b>Staff Name</b></td><td class="tableTR" width="50%"><b>Position</b></td></tr>';
	for($i=1; $i<count($staffMember)+1; $i++){
		echo '<tr><td class="tableL">' . $staffMember[$i]["name"] . '</td>
			<td class="tableR">' . $staffMember[$i]["position"] . '</td></tr>';
	}
	echo '</table></div>';
}
elseif($page == "faq"){
	echo '<div align="center"><div class="title">' . $name .' FAQ</div><br /></div>';
	for($i=1; $i<count($faq)+1; $i++){
		echo '<b> Q : ' . $faq[$i]["question"] . '</b><br /> A : ' . $faq[$i]["answer"] . '<br /><br />';
	}
}

?>