<tr>
<center><p class="title2">Change Password</p>
<tr>
<td class="bodyText" width="30"><p><form action="pass2.php" method="post">  
Login: <br> <input name="login" type="text" /> 
<br><br> 
Password: <br> <input name="pass" type="password" /> 
<br><br> 
New Password: <br> <input name="newpass" type="password" /> 
<br><br> 
<input type="submit" value="Submit"/> 
</form>
<br />
<br />
<br />

<?php 
include('./config2.php'); 

$login = mysql_real_escape_string($_POST['login']);  
$pass = mysql_real_escape_string($_POST['pass']); 
$newpass = mysql_real_escape_string($_POST['newpass']); 


$resultsalt = mysql_query("SELECT salt FROM accounts WHERE name='$login'");  
if ($row = mysql_fetch_array($resultsalt)){ 
   do { 
         $salt = $row["salt"]; 
   } while ($row = mysql_fetch_array($resultsalt));  
} else {  
echo "You need to be logged off before you can do this! "; 
} 
$password = hash('sha512', $pass . $salt); 

$sqlquery = "SELECT * FROM accounts WHERE name = '$login' AND password = '$password'"; 
$result = mysql_query($sqlquery); 
$number = mysql_num_rows($result); //LINE NUMBER 23 

$i = 0; 
if ($number < 1) //10 
{ 
echo "This account doesn't exist, or the password is wrong.<br> "; 
} 
else 
{ 
if ($number > $i) 
{ 
$passencrypted = hash('sha512', $newpass . $salt); 
$sqlquery2 = "UPDATE accounts SET password = '$passencrypted' WHERE name='$login'"; 
mysql_query("$sqlquery2") or DIE (mysql_error()); 
echo "The password for $login was changed successfully.<br>"; 
} 
} 

?> 