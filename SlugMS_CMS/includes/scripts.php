<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if(isset($_SESSION["logged_in"])){
	if($_SESSION["logged_in"] == "user" || $_SESSION["logged_in"] == "gm" || $_SESSION["logged_in"] == "admin"){
		if(isset($_GET["page"])){
			for($i=1; $i<count($script)+1; $i++){
				if($script[$i]["page"] == $_GET["page"]){
					echo '<div class="title">' . $script[$i]["title"] . '</div><br />';
					include('scripts/' . $script[$i]["file"]);
				}
			}
			echo '<br /><br /><a href="script.php">Go back</a>';
		} else {
			echo '<div class="title">Custom Scripts</div><br />';
			$i = 1;
			for($i=1; $i<count($script)+1; $i++){
				echo '<a href="script.php?page=' . $script[$i]["page"] . '">' . $script[$i]["title"] . '</a><br />';
			}
		}
	} else {
		echo 'You have to be logged in to view this page.';
	}
} else {
	echo 'You have to be logged in to view this page.';
}

?>