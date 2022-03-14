<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if(isset($_POST['get_char_info'])){
	if(!isset($_POST['char'])){
		echo '<br /><font color="red">Please select a character</font>';
	} else {
		$stop = "false";
		if(isset($_SESSION['logged_in'])){
			if($_SESSION['logged_in'] != "gm"){
				$stop = "true";
			}
		} else {
			$stop = "true";
		}
		
		if($stop == "false"){
			$char = $_POST['char'];
			$job_id = $char_job[$char];
			$_SESSION['char_name'] = $char_name[$char];
			include('includes/user_char_jobs.php');
			echo '<br /><br /><br /><div class="title">Modify Selected Character</div>
				<table align="center" cellspacing="1" cellpadding="5">
				<tr><td><b>Name : </b></td><td><b>' . $char_name[$char] . '</b></td></tr>
				<tr><td><b>Level : </b></td><td><input type="text" name="level" value="' . $char_level[$char] . '" /></td></tr>
				<tr><td><b>Mesos : </b></td><td><input type="text" name="mesos" value="' . $char_mesos[$char] . '" /></td></tr>
				<tr><td><b>Job : </b></td><td>
				<select name="job">
					<option value="' . $job_id . '">' . $char_job[$char] . '</option>
					<option value="0">Beginner</option>
					<option value="100">Warrior</option>
					<option value="110">Fighter</option>
					<option value="120">Page</option>
					<option value="130">Spearman</option>
					<option value="111">Crusader</option>
					<option value="121">White Knight</option>
					<option value="131">Dragon Knight</option>
					<option value="112">Hero</option>
					<option value="122">Paladin</option>
					<option value="132">Dark Knight</option>
					<option value="200">Magician</option>
					<option value="210">Fire/Poison Wizard</option>
					<option value="220">Ice/Lightning Wizard</option>
					<option value="230">Cleric</option>
					<option value="211">Fire/Poison Mage</option>
					<option value="221">Ice/Lightning Mage</option>
					<option value="231">Priest</option>
					<option value="212">Fire/Poison Arch Mage</option>
					<option value="222">Ice/Lightning Arch Mage</option>
					<option value="232">Bishop</option>
					<option value="300">Bowman</option>
					<option value="310">Hunter</option>
					<option value="320">Crossbowman</option>
					<option value="311">Ranger</option>
					<option value="321">Sniper</option>
					<option value="312">Bow Master</option>
					<option value="322">Crossbow Master</option>
					<option value="400">Thief</option>
					<option value="410">Assassin</option>
					<option value="420">Bandit</option>
					<option value="411">Hermit</option>
					<option value="421">Chief Bandit</option>
					<option value="412">Night Lord</option>
					<option value="422">Shadower</option>
					<option value="500">GM</option>
					<option value="510">SuperGM</option>
				</select></td></tr>
				<tr><td><b>STR : </b></td><td><input type="text" name="str" value="' . $char_str[$char] . '" /></td></tr>
				<tr><td><b>DEX : </b></td><td><input type="text" name="dex" value="' . $char_dex[$char] . '" /></td></tr>
				<tr><td><b>INT : </b></td><td><input type="text" name="int" value="' . $char_int[$char] . '" /></td></tr>
				<tr><td><b>LUK : </b></td><td><input type="text" name="luk" value="' . $char_luk[$char] . '" /></td></tr>
				<tr><td><b>Fame : </b></td><td><input type="text" name="fame" value="' . $char_fame[$char] . '" /></td></tr>
				<tr><td><b>HP : </b></td><td><input type="text" name="hp" value="' . $char_hp[$char] . '" /></td></tr>
				<tr><td><b>MP : </b></td><td><input type="text" name="mp" value="' . $char_mp[$char] . '" /></td></tr>
				</table>
				<div align="center"><br /><input type="submit" name="set_char_info" value="Save Character" /></div>';
		}
	}
}

if(isset($_POST['set_char_info'])){
	$stop = "false";
	if(isset($_SESSION['logged_in'])){
		if($_SESSION['logged_in'] != "gm"){
			$stop = "true";
		}
	} else {
		$stop = "true";
	}
	
	if($stop == "false"){
		if(isset($_SESSION['logged_in'])){
			$name = $_SESSION['char_name'];
			$level = $_POST['level'];
			$mesos = $_POST['mesos'];
			$job = $_POST['job'];
			$str = $_POST['str'];
			$dex = $_POST['dex'];
			$int = $_POST['int'];
			$luk = $_POST['luk'];
			$fame = $_POST['fame'];
			$hp = $_POST['hp'];
			$mp = $_POST['mp'];
			mysql_query("UPDATE characters SET `level` = '$level', " . $rMesos . " = '$mesos', `job` = '$job', str = '$str', dex = '$dex', `int` = '$int', luk = '$luk', fame = '$fame', " . $rMaxHP . " = '$hp', " . $rMaxMP . " = '$mp' WHERE name = '$name'");
			echo '<br /><font color="green">Saved Character Information</font>';
			$_SESSION['char_name'] = "";
		}
	}
}

?>