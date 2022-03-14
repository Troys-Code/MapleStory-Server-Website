<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php require ("./inc/info.inc.php"); ?>
<title><?=$config['server_name'];?></title>
<link rel=stylesheet href="style.css" type="text/css">



<body class="thrColFixHdr">
<br />
<br />
<br />
<div id="container">
<?php include ("header.php"); ?>
<?php include ("navigation.php"); ?>
<?php include ("status.php"); ?>

<center>
<table cellspacing=1 cellpadding=5>
<tr><td class=listtitle colspan=2><center><b>Registration</b></center></td></tr>
<form action="register_do.php" method="POST">
<tr><td class=list align=right>Username:</td><td class=list><input type=text name=name maxlength="30"></td></tr>
<tr><td class=list align=right>Password:</td><td class=list><input type=password name=pass maxlength="30"></td></tr>
<tr><td class=list align=right>Verify Password:</td><td class=list><input type=password name=vpass maxlength="30"></td></tr>
<tr><td class=list align=right>Email:</td><td class=list><input type=text name=email maxlength="50"></td></tr>
<tr><td class=list align=right>Date of Birth: <br><i>Ex. 1988-09-23</i></td><td class=list><input type=text name=dob maxlength="15"></td></tr>
<tr><td class=listtitle align=right colspan=2><center><input type=submit name=submit value='Register'</td></tr></center>
</form>
</table>
<br>
<?php
include('config2.php');
$result = mysql_query("SELECT * FROM accounts", $db);// Account section
$num_rows = mysql_num_rows($result);
$result2 = mysql_query("SELECT * FROM characters", $db);// Character section
$num_rowsc = mysql_num_rows($result2);
$result3 = mysql_query("SELECT * FROM channelconfig", $db);// Channel section
$num_rowsd = mysql_num_rows($result3);
echo '<b>Stats:</b><br>
<b>'.$num_rowsd.'</b> Channel(s).<br>
<b>'.$num_rows.'</b> Accounts registed.<br>
<b>'.$num_rowsc.'</b> Characters created.';
?>
<br>
<?php
include('config2.php');
        echo $logserv_name;
        $fp = @fsockopen($serverip, $loginport, $errno, $errstr, 1);
	  if (!$fp) {
           echo $offline;
        } else {
           echo $online;
        }

        @fclose($fp);
        $sql = mysql_connect($sql_host, $sql_user, $sql_pass)or die("Error on trying to connect in MySQL: " . mysql_error());
        mysql_select_db($sql_db)or die("Error on trying to connect in Database");
        ?>



<!-- do not remove-->
<br class="clearfloat" />
<?php include ("footer.php"); ?>
</div>
<!-- end #container -->
<Br />
<br />
<Br />
</body>
</html>
