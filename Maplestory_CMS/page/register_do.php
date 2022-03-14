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
echo 'No username filled in.';
exit();
}elseif(mysql_num_rows(mysql_query($sel)) >= 1 ){
echo '<style>*{ 
FONT-SIZE: 10pt; 
FONT-FAMILY: arial; 
COLOR: #ffffff;}</style><center>This username does already exists!</center>';
exit();
}elseif($pass == ""){
echo '<style>*{ 
FONT-SIZE: 10pt; 
FONT-FAMILY: arial; 
COLOR: #ffffff;}</style><center>No password filled in.</center>';
exit();
}elseif($vpass != $pass){
echo '<style>*{ 
FONT-SIZE: 10pt; 
FONT-FAMILY: arial; 
COLOR: #ffffff;}</style><center>The passwords did not match.</center>';
exit();
}else{

$d = 'INSERT INTO accounts (name, password, email, birthday) VALUES ("'.$name.'", "'.$pass.'", "'.$email.'", "'.$dob.'")';
mysql_query($d) OR die (mysql_error());
echo '<style>*{ 
FONT-SIZE: 10pt; 
FONT-FAMILY: arial; 
COLOR: #ffffff;}</style><center>Your account has been created, you can now login!</center>';
}
?>