<html>
<head>
<title>Register</title>
</head>
<center>
<table cellspacing=1 cellpadding=5>
<tr><td class=listtitle colspan=2><center><span class='title2'><?=$config['server_name'];?> Registration</span></center></td></tr>
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