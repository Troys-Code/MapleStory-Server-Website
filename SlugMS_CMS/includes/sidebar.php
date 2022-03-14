<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

include('includes/status.php');

$query_account = "SELECT * FROM " . $rUsers . "";
$query_char = "SELECT * FROM characters";
$query_online = $rOnlineQuery;
$query_gm = "SELECT * FROM " . $rUsers . " WHERE gm = '1'";
$query_banned = "SELECT * FROM " . $rUsers . " WHERE " . $rBanReason . " != '0'";

$totalAccounts = mysql_num_rows(mysql_query($query_account));
$totalCharacters = mysql_num_rows(mysql_query($query_char));
$totalOnline = mysql_num_rows(mysql_query($query_online));
$totalGMs = mysql_num_rows(mysql_query($query_gm));
$totalBanned = mysql_num_rows(mysql_query($query_banned));

echo '<div class="sidebar">
		<img src="images/sidebar_rates.gif" alt="Rates" /><div class="sidebarItem">
		<div class="sidebarLeft">EXP Rate</div><div class="sidebarRight">' . $exprate . 'x</div><br />
		<div class="sidebarLeft">Drop Rate</div><div class="sidebarRight">' . $droprate . 'x</div><br />
		<div class="sidebarLeft">Mesos Rate</div><div class="sidebarRight">' . $mesosrate . 'x</div><br />
		</div>
		<img src="images/sidebar_status.gif" alt="Status" /><div class="sidebarItem">
		<div align="center">The server is ' . $status . '<br /></div>
		</div>
		<img src="images/sidebar_info.gif" alt="Information" /><div class="sidebarItem">
		<div class="sidebarLeft">Total Accounts</div><div class="sidebarRight">' . $totalAccounts . '</div><br />
		<div class="sidebarLeft">Total Characters</div><div class="sidebarRight">' . $totalCharacters . '</div><br />
		<div class="sidebarLeft">Total Online</div><div class="sidebarRight">' . $totalOnline . '</div><br />
		<div class="sidebarLeft">Total GMs</div><div class="sidebarRight">' . $totalGMs . '</div><br />
		<div class="sidebarLeft">Total Banned</div><div class="sidebarRight">' . $totalBanned . '</div><br />
		</div>
		<img src="images/sidebar_links.gif" alt="Links" /><div class="sidebarItem">';
for($i=1; $i<count($link)+1; $i++){
	echo '<a href="' . $link[$i]["url"] . '">' . $link[$i]["text"] . '</a><br />';
}
echo '</div>
		<a href="information.php"><img class="btnL" src="images/button_info.png" alt="Statistics" border="0" /></a>
		<a href="information.php?page=staff"><img class="btnL" src="images/button_staff.png" alt="Staff" border="0" /></a>
		<a href="information.php?page=faq"><img class="btnL" src="images/button_faq.png" alt="FAQ" border="0" /></a>
		</div>';
	
?>