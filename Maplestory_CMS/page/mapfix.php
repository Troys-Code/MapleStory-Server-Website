<p>Stuck in a map because you were warped wrong by an NPC or something? Enter your username, pass and char name here and it will automatically move your character to Henesys by default.</p>
<?php
// process the script only if the form has been submitted
if (array_key_exists('reset', $_POST)) {
// start the session
include('./config2.php');
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$character = trim($_POST['character']);
$mapID = '100000000';
$username = mysql_real_escape_string($username);

$sql = "SELECT * FROM accounts WHERE name = '$username'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

if (hash('sha512', $password.$row['salt']) == $row['password']) {
$update = "UPDATE characters SET map = 100000000 WHERE name='$character'";
$result = mysql_query($update) or die(mysql_error());
if ($result) {
$message[] = "Your spawning map for $character has been reset to $mapID. You're no longer stuck! Go play!";
}
else {
$message[] = "There was a problem resetting your map for $character";
}
}
// if no match, destroy the session and prepare error message
else {
$message[] = 'Invalid username or password. Please try again.';
}
}
?>
<strong>Map Reset</strong>
<?php
if (isset($message)) {
echo '<b>';
foreach ($message as $item) {
echo "$item";
}
echo '</b><br>';
}
?>
<form id="form1" name="form1" method="post" action=""><br>
Username : <br>
<input id="username" type="text" name="username" maxlength="12"><br><br>
Password :<br>
<input id="password" type="password" name="password" maxlength="20" /><br><br>Character :<br>
<input id="character" type="character" name="character" maxlength="20" /><br><br>
<input id="reset" name="reset" type="submit" value="Reset Map" /><br>
</form>