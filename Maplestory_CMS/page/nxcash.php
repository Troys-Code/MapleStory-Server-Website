<?php
// process the script only if the form has been submitted
if (array_key_exists('reset', $_POST)) {
// start the session
include('./config2.php');
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$username = mysql_real_escape_string($username);
$char = trim($_POST['char']);
$mesocheck = mysql_query('SELECT * FROM meso FROM characters');
$result = mysql_query("SELECT meso, accountid FROM characters WHERE name = '$char' LIMIT 1");
list($meso, $accountid) = mysql_fetch_row($result);

$result = mysql_query("SELECT id, password, salt FROM accounts WHERE name = '$username' LIMIT 1");
list($id, $realpass, $salt) = mysql_fetch_row($result);

$sql = "SELECT * FROM accounts WHERE name = '$username'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

if($realpass == hash('sha512',$password.$salt) && $accountid == $id && $meso >= 100000000 && $loggedin < 1) {
mysql_query("UPDATE accounts SET nxcash = nxcash + 30000 WHERE name = '$username' LIMIT 1");
mysql_query("UPDATE characters SET meso = meso - 100000000 WHERE name = '$char' LIMIT 1");
echo "You have payed 100 mil from $char to get 30k NX for $username !";
} else
echo "<Center>There was an error getting you NX. Either. <br>1. You do not have enough money. <br>2. You do not have the char you listed on that account. <br>3. You are logged in. </center>"; }
// if no match, destroy the session and prepare error message
else {
$message[] = 'Invalid username or password. Please try again.';
}
?>
<Center>
<!-- start content -->
<br><span class='title2'>Welcome to the NX Cash shop!</span> <br><b>100,000,000 mesos for 30,000 NX</b>
<?php
if (isset($message)) {
echo '<br><br>';
foreach ($message as $item) {
echo "$item";
}
echo '<br>';
}
?>
<Br>
<form id="form1" name="form1" method="post" action="">
Username : <br>
<input id="username" type="text" name="username" maxlength="12"><br><br>Password : <br>
<input id="password" type="password" name="password" maxlength="20" /><br><br>
Character paying 100 mil : <br>
<input id="char" type="text" name="char" maxlength="12"><br><br>
<input id="reset" name="reset" type="submit" value="Buy 30k NX!" />
</form>
</center>
<!-- end content -->