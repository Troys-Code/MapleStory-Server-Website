<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("odinms", $con);

$result = mysql_query("SELECT * FROM guilds ORDER BY GP DESC LIMIT 100");

echo "<center><span class='title2'>Guild List</span>
<br>
<br>
<table border='1' bordercolor='#8ae100' style='border-style: solid;  border-collapse: collapse' >
<tr>
<th bgcolor='#afff30'  style='border-style: solid; background-image: url(navigation.jpg)'><font color='#000000'>&nbsp;GP&nbsp;</font></th>
<th bgcolor='#cbff79'  style='border-style: solid; background-image: url(navigation.jpg)'><font color='#000000'>&nbsp;Name&nbsp;</font></th>
<th bgcolor='#cbff79'  style='border-style: solid; height: 30px; background-image: url(navigation.jpg)'><font color='#000000'>&nbsp;Capacity&nbsp;</font></th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td bgcolor='#cbff79'  style='border-style: solid; width: 50px; height: 25px;'>&nbsp;" . $row['GP'] . "</td>";
  echo "<td bgcolor='#afff30'  style='border-style: solid; width: 100px;'>&nbsp;" . $row['name'] . "</td>";
  echo "<td bgcolor='#afff30'  style='border-style: solid; width: 100px; '>&nbsp;". $row['capacity'] . "</td>";
  echo "</tr>";
  }
echo "</table></center><br>";

mysql_close($con);
?> 
