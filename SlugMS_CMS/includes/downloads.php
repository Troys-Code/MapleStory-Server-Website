<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          DO NOT TOUCH THIS FILE         //
/////////////////////////////////////////////

echo '<div align="center"><div class="title">' . $name . ' Downloads</div><br /><br /></div>
	<table align="center" cellspacing="0" cellpadding="5">
	<tr><td class="tableTL" width="70%"><b>Download</b></td><td class="tableTR" width="30%"><b>Link</b></td></tr>';
for($i=1; $i<count($download)+1; $i++){
	echo '<tr><td class="tableL"><b>' . $download[$i]["title"] . '</b><br />' . $download[$i]["desc"] . '</td>
		<td class="tableR"><a class="download" href="' . $download[$i]["url"] . '"></a></td></tr>';
}
echo '</table>';

?>