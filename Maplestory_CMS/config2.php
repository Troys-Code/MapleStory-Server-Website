<?php
$host['naam'] = 'localhost';                // my host
$host['gebruikersnaam'] = 'root';       // my database username
$host['wachtwoord'] = '';   // my database password
$host['databasenaam'] = 'odinms';       // my database name

$db = mysql_connect($host['naam'], $host['gebruikersnaam'], $host['wachtwoord']) OR die ('Cant connect to the database');
mysql_select_db($host['databasenaam'], $db);

$serverip = "5.200.169.136";     //Replace with your WAN IP if public
$loginport = "8484";	     //Don't change
$sql_db = "odinms";		     //DB Name
$sql_host = "127.0.0.1";     //DB Host
$sql_user = "root";	     	 //DB User
$sql_pass = "";		     	 //DB Password
$logserv_name = "<b>Server</b>: ";		 //Status Server Name
$offline = "<font color='#cb0000'><s>Offline</s></font>";  //Displays Offline Status
$online = "<font color='#00ff00'><b>Online</b></font>";	//Displays Online Status
?>
<?php
if ($row['job']=="510")
echo "SuperGM";
if ($row['job']=="500")
echo "GM";
if ($row['job']=="000")
echo "Beginner";
if ($row['job']=="100")
echo "Warrior";
if ($row['job']=="110")
echo "Fighter";
if ($row['job']=="120")
echo "Page";
if ($row['job']=="130")
echo "Spearman";
if ($row['job']=="111")
echo "Crusader";
if ($row['job']=="121")
echo "White Knight";
if ($row['job']=="131")
echo "Dragon Knight";
if ($row['job']=="112")
echo "Hero";
if ($row['job']=="122")
echo "Paladin";
if ($row['job']=="132")
echo "Dark Knight";
if ($row['job']=="200")
echo "Magician";
if ($row['job']=="210")
echo "Wizard";
if ($row['job']=="220")
echo "Wizard";
if ($row['job']=="230")
echo "Cleric";
if ($row['job']=="211")
echo "Mage";
if ($row['job']=="221")
echo "Mage";
if ($row['job']=="231")
echo "Priest";
if ($row['job']=="212")
echo "Arch Mage";
if ($row['job']=="222")
echo "Arch Mage";
if ($row['job']=="231")
echo "Bishop";
if ($row['job']=="300")
echo "Bowman";
if ($row['job']=="310")
echo "Hunter";
if ($row['job']=="320")
echo "Crossbowman";
if ($row['job']=="311")
echo "Ranger";
if ($row['job']=="321")
echo "Sniper";
if ($row['job']=="312")
echo "Bow Master";
if ($row['job']=="322")
echo "Crossbow Master";
if ($row['job']=="400")
echo "Thief";
if ($row['job']=="410")
echo "Assassin";
if ($row['job']=="420")
echo "Bandit";
if ($row['job']=="411")
echo "Hermit";
if ($row['job']=="421")
echo "Chief Bandit";
if ($row['job']=="412")
echo "Nights Lord";
if ($row['job']=="422")
echo "Shadower";
?>