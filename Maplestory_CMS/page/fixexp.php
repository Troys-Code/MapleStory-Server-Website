
<center>
<?php

$conn = mysql_connect("localhost", "root", "") or die ('Error connecting to mysql!');
mysql_select_db("odinms");

$self = $_SERVER['PHP_SELF'];

if(isset($_POST['fame']))
{
	$validlogin = 0;
	$usr = $_POST['user'];
	
	if($usr == "")
		die("Required field was left blank.");

	$usr = mysql_real_escape_string($usr); // prevents SQL injection

	$result = mysql_query("SELECT exp FROM characters WHERE name = '$usr' AND exp < 0");
	while($row = mysql_fetch_array($result))
	
		{ 
			$loggedin = $result;
			$validlogin = 1;
			break;
		}
	
	
	if($validlogin == 0)
	{
		echo "<meta http-equiv='refresh' content='4;url=$self'>";
		die("This character doesn't exist or it has more than 1 exp!");
	}
	else
	{
		if($loggedin)
		{
			mysql_query("UPDATE characters SET exp = 1 WHERE name = '$usr'");
			echo "<meta http-equiv='refresh' content='10;url=$Self'>";
			die("$usr now has 0 exp.");
			
		}
		else
		{
			echo "<meta http-equiv='refresh' content='4;url=$self'>";
			die("$usr has more than 1 exp!");
		}
	}	
}
else
{
	echo "<form method='post'>";
	echo "<span class = title2>Negative Exp Fix</span><br><br>";
	echo "Character: <br><input type='text' name='user' id='user'></td>";
	echo "<br><br><input type='submit' name='fame' id='submit' value='Submit'><p>";
	echo "</form>";
	echo "Log off your account before using this script.<br>Only resets experience to 1 if your character has negative exprience.<br><br><font size = 1px>(Credits to V1ral from <a href=http://ancient-ms.net>AncientMS</a>)</font>";
}

mysql_close($conn);

?>
</p>

