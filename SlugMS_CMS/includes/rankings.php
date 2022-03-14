<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

$limit = "";
$last_column = "Level";
$order = "level";

// by default we show first page
$pageNum = 1;

// if $_GET['page'] defined, use it as page number
if(isset($_GET['pagestart']))
{
    $pageNum = $_GET['pagestart'];
}

// counting the offset
$offset = ($pageNum - 1) * $rankingAmount;

if($rankingAmount != "0"){
	$limit = 'LIMIT ' . $offset . ', ' . $rankingAmount;
}

if(isset($_GET['order'])){
	if($_GET['order'] == 'fame'){
		$last_column = "Fame";
		$order = "fame";
	}
}
if(isset($_GET['type'])){
	if($_GET['type'] == 'job'){	
		if($_GET['job'] == 'beginner'){
			$ranks_query = "SELECT * FROM characters WHERE job = '0' ORDER BY " . $order . " DESC ";
			$ranks_result = mysql_query($ranks_query . $limit);
		}
		elseif($_GET['job'] == 'warrior'){
			$ranks_query = "SELECT * FROM characters WHERE job = '100' OR job = '110' OR job = '111' OR job = '112' OR job = '120' OR job = '121' OR job = '122' OR job = '130' OR job = '131' OR job = '132' ORDER BY " . $order . " DESC ";
			$ranks_result = mysql_query($ranks_query . $limit);
		}
		elseif($_GET['job'] == 'magician'){
			$ranks_query = "SELECT * FROM characters WHERE job = '200' OR job = '210' OR job = '211' OR job = '212' OR job = '220' OR job = '221' OR job = '222' OR job = '230' OR job = '231' OR job = '232' ORDER BY " . $order . " DESC ";
			$ranks_result = mysql_query($ranks_query . $limit);
		}
		elseif($_GET['job'] == 'archer'){
			$ranks_query = "SELECT * FROM characters WHERE job = '300' OR job = '310' OR job = '311' OR job = '312' OR job = '320' OR job = '321' OR job = '322' OR job = '330' OR job = '331' OR job = '332' ORDER BY " . $order . " DESC ";
			$ranks_result = mysql_query($ranks_query . $limit);
		}
		elseif($_GET['job'] == 'thief'){
			$ranks_query = "SELECT * FROM characters WHERE job = '400' OR job = '410' OR job = '411' OR job = '412' OR job = '420' OR job = '421' OR job = '422' OR job = '430' OR job = '431' OR job = '432' ORDER BY " . $order . " DESC ";
			$ranks_result = mysql_query($ranks_query . $limit);
		}

		elseif($_GET['job'] == 'pirate'){
			$ranks_query = "SELECT * FROM characters WHERE job = '500' OR job = '510' OR job = '511'OR job='512' OR job = '520' OR job = '521' OR job = '522' ORDER BY " . $order . " DESC ";
			$ranks_result = mysql_query($ranks_query . $limit);


		}

	elseif($_GET['job'] ='GM'){
			$ranks_query = "SELECT * FROM characters WHERE job = '900' OR job = '910' ORDER BY " . $order . " DESC ";
			$ranks_result = mysql_query($ranks_query . $limit);


		}
	}
	elseif($_GET['type'] == 'world'){
		$ranks_query = "SELECT * FROM characters WHERE world_id = '$worldid' ORDER BY " . $order . " DESC ";
		$ranks_result = mysql_query($ranks_query . $limit);
	} 
	else{
		$ranks_query = "SELECT * FROM characters ORDER BY " . $order . " DESC ";
		$ranks_result = mysql_query($ranks_query . $limit);
	}
} else {
	$ranks_query = "SELECT * FROM characters ORDER BY level DESC ";
	$ranks_result = mysql_query($ranks_query . $limit);
}

if($rankingAmount != "0"){
	$num_ranks = mysql_num_rows(mysql_query($ranks_query));
	$num_rank_pages = ceil($num_ranks / $rankingAmount);
}
$i = $offset + 1;
while($results = mysql_fetch_array($ranks_result)){
	$query = mysql_query("SELECT * FROM " . $rUsers . " WHERE " . $rID . " = '" . $results[$rUserID] . "'");
	$user_data = mysql_fetch_array($query);
	if($source == "Odin"){
		$guild_query = mysql_query("SELECT * FROM guilds WHERE guildid = '" . $results['guildid'] . "'");
		$guild_data = mysql_fetch_array($guild_query);
		if($guild_data == ""){
			$guild_data = "-";
		}
	}
	include('includes/rankings_job.php');
	if($ranking_gm == "yes"){
		if($last_column == "Level"){
  			echo '<tr><td class="tableL"><b>' . $i . '</b></td>
				<td class="tableL"><b>' . $results['name'] . '</b></td>
				<td class="tableL"><img src="images/' . $results['job'] . '" alt="Job" /></td>';
			if($source == "Odin"){
				echo '<td class="tableL">' . $guild_data['name'] . '</td>';
			}
			echo '<td class="tableR"><b>' . $results['level'] . '</b><br />(' . $results['exp'] . ')</td></tr>';
		} else {
			echo '<tr><td class="tableL"><b>' . $i . '</b></td>
				<td class="tableL"><b>' . $results['name'] . '</b></td>
				<td class="tableL"><img src="images/' . $results['job'] . '" alt="Job" /></td>';
			if($source == "Odin"){
				echo '<td class="tableL">' . $guild_data['name'] . '</td>';
			}
			echo '<td class="tableR"><b>' . $results['fame'] . '</b></td></tr>';
		}
		$i++;
	} else {
		if($user_data['gm'] == 0){
			echo '<tr><td class="tableL"><b>' . $i . '</b></td>
				<td class="tableL"><b>' . $results['name'] . '</b></td>
				<td class="tableL"><img src="images/' . $results['job'] . '" alt="Job" /></td>';
			if($source == "Odin"){
				echo '<td class="tableL">' . $guild_data['name'] . '</td>';
			}
			echo '<td class="tableR"><b>' . $results['level'] . '</b><br />(' . $results['exp'] . ')</td></tr>';
			$i++;
		}
	}
}

?>