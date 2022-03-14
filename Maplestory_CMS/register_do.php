
<?php
/* Store user details */
$name = $_POST['name'];
$pass = sha1($_POST['pass']);
$email = $_POST['email'];
$dob = $_POST['dob'];
$vpass = sha1($_POST['vpass']);
include('./config2.php');
$sel = 'SELECT * FROM accounts WHERE name="'.$_POST['name'].'"';
if($name == ""){
echo '<link rel=stylesheet href="style.css" type="text/css"><center><h1>No username filled in.</center></h1>';
exit();
}elseif(mysql_num_rows(mysql_query($sel)) >= 1 ){
echo '
<link rel=stylesheet href="style.css" type="text/css"><center><h1>This username does already exists!</h1></center>';
exit();
}elseif($pass == ""){
echo '<link rel=stylesheet href="style.css" type="text/css"><center><h1>No password filled in.</center></h1>';
exit();
}elseif($vpass != $pass){
echo '<link rel=stylesheet href="style.css" type="text/css"><center><h1>The passwords did not match.</center></h1>';
exit();
}else{

$d = 'INSERT INTO accounts (name, password, email, birthday) VALUES ("'.$name.'", "'.$pass.'", "'.$email.'", "'.$dob.'")';
mysql_query($d) OR die (mysql_error());
echo '<link rel=stylesheet href="style.css" type="text/css"><center><h1>Your account has been created, you can now login!</center></h1>';
}
?>