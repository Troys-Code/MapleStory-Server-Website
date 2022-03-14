<center>
<link rel="stylesheet" href="style2.css">
<?php

$conn = mysql_connect("127.0.0.1", "root", "") or die ('Error connecting to mysql!');
mysql_select_db("odinms");

$self = $_SERVER['PHP_SELF'];

if(isset($_POST['logout']))
{
	$validlogin = 0;
	$usr = $_POST['user'];
	
	if($usr == "")
		die("<h1> You have to type something in.</h1>");

	$usr = mysql_real_escape_string($usr); // prevents SQL injection

	$result = mysql_query("SELECT name, password, loggedin FROM accounts");
	while($row = mysql_fetch_array($result))
	
		{ 
			$loggedin = $row[2];
			$loggedin = $row[1];
			$validlogin = 1;
			break;
		}
	
	
	if($validlogin == 0)
	{
		echo "<meta http-equiv='refresh' content='4;url=$self'>";
		die("<h1> This Account doesn't exist! </h1>");
	}
	else
	{
		if($loggedin > 0)
		{
			mysql_query("UPDATE accounts SET loggedin = 0 WHERE name = '$usr'");
			echo "<meta http-equiv='refresh' content='10;url=$Self'>";
			die("<h1>$usr has been logged out.</h1>");
			
		}
		else
		{
			echo "<meta http-equiv='refresh' content='4;url=$self'>";
			die("<h1>$usr! is already logged out.</h1>");
		}
	}	
}
else
{
	echo "<form method='post'>";
	echo "The Logout Script<p>
Use this script to unbug you when you have ID is already logged in.
<br> <h1>TYPE IN YOUR <U>ACCOUNT NAME</u>! NOT CHARACTER!</h1>
";
	echo "Account Name: </td><td><input type='text' name='user' id='user'></td></tr><br>";
	echo "<br><input type='submit' name='logout' id='logout' value='LOGOUT!'><p>";
	echo "</form>";
}

mysql_close($conn);

?>