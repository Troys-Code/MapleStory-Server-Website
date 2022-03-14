<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

$a = "";
$a_hover = "";
$title = "";

if($styleColour == "green"){
	$a = "#009933";
	$a_hover = "#003300";
	$title = "#00CC00";
}
elseif($styleColour == "red"){
	$a = "#CC0000";
	$a_hover = "#990000";
	$title = "#FF0000";
}
elseif($styleColour == "blue"){
	$a = "#0000CC";
	$a_hover = "#000099";
	$title = "#0033CC";
}
elseif($styleColour == "black"){
	$a = "#666666";
	$a_hover = "#999999";
	$title = "#333333";
}
elseif($styleColour == "purple"){
	$a = "#660099";
	$a_hover = "#6600CC";
	$title = "#6600FF";
}

echo '<style type="text/css"> 
	a, a:visited { color: ' . $a . ' }
	a:hover { color: ' . $a_hover . ' } 
	.title { color: ' . $title . ' }
	.banner { background: url(images/banner_' . $styleColour . '.png) no-repeat; }
	</style>';

?>