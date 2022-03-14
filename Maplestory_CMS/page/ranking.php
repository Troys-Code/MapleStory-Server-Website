<?php

# Change these values
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'odinms');

# Don't change anything below this line unless you know what you are doing!
# ---
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die('Cannot connect: '.mysql_error());
mysql_select_db(DB_DATABASE) or die('Cannot select: '.mysql_error());

$jobs = array(
  500 =>'GM',
  510 =>'Super GM',
  0   =>'<img src="./rank/rank_job0.gif"><br>(Beginner)',
  100 =>'<img src="./rank/rank_job1.gif"><br>(Warrior)',
  110 =>'<img src="./rank/rank_job1.gif"><br>(Fighter)',
  120 =>'<img src="./rank/rank_job1.gif"><br>(Page)',
  130 =>'<img src="./rank/rank_job1.gif"><br>(Spearman)',
  111 =>'<img src="./rank/rank_job1.gif"><br>(Crusader)',
  121 =>'<img src="./rank/rank_job1.gif"><br>(White Knight)',
  131 =>'<img src="./rank/rank_job1.gif"><br>(Dragon Knight)',
  112 =>'<img src="./rank/rank_job1.gif"><br>(Hero)',
  122 =>'<img src="./rank/rank_job1.gif"><br>(Paladin)',
  132 =>'<img src="./rank/rank_job1.gif"><br>(Dark Knight)',
  200 =>'<img src="./rank/rank_job2.gif"><br>(Magician)',
  210 =>'<img src="./rank/rank_job2.gif"><br>(Fire/Poison Wizard)',
  220 =>'<img src="./rank/rank_job2.gif"><br>(Ice/Lightning Wizard)',
  230 =>'<img src="./rank/rank_job2.gif"><br>(Cleric)',
  211 =>'<img src="./rank/rank_job2.gif"><br>(Fire/Poison Mage)',
  221 =>'<img src="./rank/rank_job2.gif"><br>(Ice/Lightning Mage)',
  231 =>'<img src="./rank/rank_job2.gif"><br>(Priest)',
  212 =>'<img src="./rank/rank_job2.gif"><br>(Fire/Poison Arch Mage)',
  222 =>'<img src="./rank/rank_job2.gif"><br>(Ice/Lightning Arch Mage)',
  232 =>'<img src="./rank/rank_job2.gif"><br>(Bishop)',
  300 =>'<img src="./rank/rank_job3.gif"><br>(Bowman)',
  310 =>'<img src="./rank/rank_job3.gif"><br>(Hunter)',
  320 =>'<img src="./rank/rank_job3.gif"><br>(Crossbowman)',
  311 =>'<img src="./rank/rank_job3.gif"><br>(Ranger)',
  321 =>'<img src="./rank/rank_job3.gif"><br>(Sniper)',
  312 =>'<img src="./rank/rank_job3.gif"><br>(Bow Master)',
  322 =>'<img src="./rank/rank_job3.gif"><br>(Crossbow Master)',
  400 =>'<img src="./rank/rank_job4.gif"><br>(Thief)',
  410 =>'<img src="./rank/rank_job4.gif"><br>(Assassin)',
  420 =>'<img src="./rank/rank_job4.gif"><br>(Bandit)',
  411 =>'<img src="./rank/rank_job4.gif"><br>(Hermit)',
  421 =>'<img src="./rank/rank_job4.gif"><br>(Chief Bandit)',
  412 =>'<img src="./rank/rank_job4.gif"><br>(Nights Lord)',
  422 =>'<img src="./rank/rank_job4.gif"><br>(Shadower)'
);
?>

<html>
<head>

<?php require ("./inc/info.inc.php"); ?>
<body><center><span class='title2'><?=$config['server_name'];?> Ranking</span>
<br>
<br>
Excluded are <b><?php echo mysql_result(mysql_query('SELECT COUNT(*) FROM characters WHERE gm=1'), 0);?></b> GM Chars.
<br>There are/is <b><?php echo mysql_result(mysql_query('SELECT COUNT(*) FROM characters WHERE level=200 and gm=0'), 0);?></b> level 200's.
<br><b><?php echo mysql_result(mysql_query('SELECT COUNT(*) FROM characters WHERE level=1 and gm=0'), 0);?></b> inactive characters.
<br><b><?php echo mysql_result(mysql_query('SELECT COUNT(*) FROM characters WHERE Level>=50 and gm=0'), 0);?></b> active characters.
<br>
<bR>
<table border='2' bordercolor='#8ae100' style='border-style: solid;  border-collapse: collapse' >
<thead>
<tr>
<th bgcolor='#afff30'   style='height: 30px;  background-image: url(navigation.jpg)'><font color="#000000">&nbsp;Level&nbsp;</font></th>
<th bgcolor='#cbff79'   style='height: 30px;  background-image: url(navigation.jpg)'><font color="#000000">&nbsp;Name&nbsp;</font></th>
<th bgcolor='#cbff79' style='height: 30px;  background-image: url(navigation.jpg)'><font color="#000000">&nbsp;Job&nbsp;</font></th>

</tr>
</thead>
<tbody>
<?php
$q = mysql_query('
SELECT  characters.name , characters.job , characters.level, accounts.loggedin FROM characters, accounts WHERE characters.accountid=accounts.id and characters.gm = 0 ORDER BY characters.level DESC LIMIT 100');
while ($r = mysql_fetch_array($q)) {
?><tr>
<td bgcolor='#afff30'  style='width: 70px; height: 25px;'><b>&nbsp;<?php echo $r['level'];?>&nbsp;</b><br>
<td bgcolor='#cbff79'  style='width: 100px; '>&nbsp;<?php echo $r['name'];?>&nbsp;</td>
<td bgcolor='#cbff79'  style='width: 120px; '>&nbsp;<center><?php echo $jobs[$r['job']];?>&nbsp;</center></td>


  </td>
</tr>
<?php } ?>
</table>
</center>
<br>
</body></html> 
