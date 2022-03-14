<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

if($results['job'] == 900 || $results['job'] == 910){
	$results['job'] = "job_gm.gif";
}
elseif($results['job'] == 0){
	$results['job'] = "job_beginner.gif";
}
elseif(ord($results['job']) == 49){
	$results['job'] = "job_warrior.gif";
}
elseif(ord($results['job']) == 50){
	$results['job'] = "job_magician.gif";
}
elseif(ord($results['job']) == 51){
	$results['job'] = "job_bowman.gif";
}
elseif(ord($results['job']) == 52){
	$results['job'] = "job_thief.gif";
}

elseif(ord($results['job']) == 53){
	$results['job'] = "job_pirate.gif";
}

?>