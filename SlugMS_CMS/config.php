<?php

/////////////////////////////////////////////
//				   FlareCMS                //
//   Credits : Blader of dev.chiasoft.net  //
//                                         //
/////////////////////////////////////////////
//          EDIT THE DETAILS BELOW         //
//			TO MAKE THIS CMS WORK		   //
/////////////////////////////////////////////

// Server Information
$name = "MapleStory";					// Name of your server
$slogan = "Where we roam freely";			// Slogan of your server, leave blank for no slogan
$exprate = "500";							// EXP Rate
$droprate = "50";						// Drop Rate
$mesosrate = "1";						// Mesos Rate
$forum = "index.php";					// Forum URL, if N/A, don't change

$source	= "Odin";						// Server source, 2 choices, "Odin" or "Vana"
include('includes/convert.php');		// IGNORE THIS LINE


// MySQL Information
$db_host = "localhost";					// Host
$db_user = "root";						// Username
$db_pass = "";							// Password
$database = "pandasource";				// Database


// Connect Information
$serverip = "75.128.47.118";				// Server IP
$serverport = "8484";					// Server Port


// Welcome Message
// Fill in your welcome message for your server, HTML rules apply.
$welcomeMessage = "<b>Looking for a fun to play MapleStory server? </b><br />Well you've came to the right place!  We have a friendly community and we would be happy if you would join our server and have fun with us!  Our staff warmly welcomes you to our server and we hope you enjoy your stay!  <br /> -Staff";


// Sidebar Links
// Fill in accordingly for each link to show up on the sidebar.  The number in the brackets is the link number.
// Keep increasing the number to add more links.  Link's url can also be on the site like the registration page, or the FAQ page.
$link[1]["text"] = "Vana Dev Forums";
$link[1]["url"] = "http://dev.chiasoft.net/index.php";

$link[2]["text"] = "FlareCMS Topic";
$link[2]["url"] = "http://dev.chiasoft.net/index.php?topic=1257.0";


// Staff Team Members
// Fill in accordingly for each staff member.  The number in the square brackets ($staffMember[number]) is the staff number.
// Keep increasing the number to add more staff members.
$staffMember[1]["name"] = "&";
$staffMember[1]["position"] = "Owner";

$staffMember[2]["name"] = "DragonKira";
$staffMember[2]["position"] = "GM";

$staffMember[3]["name"] = "Jussi";
$staffMember[3]["position"] = "Awesome Person";



// FAQ / Frequently Asked Questions
// Fill in accordingly for each question & answer.  The number in the square brackets ($faq[number]) is the faq number.
// Put any known questions and answers you'd want your members to know about the server. HTML rules apply.
$faq[1]["question"] = "Why can't I connect to the server?";
$faq[1]["answer"] = "You need to download our client from the download page and run it in your MapleStory server.  Also make sure the server is actually online, if it isn't, you won't be able to connect to it. ";

$faq[2]["question"] = "I'm stuck on a map, what do I do?";
$faq[2]["answer"] = "Ask one of the GMs to move you to another map or ask the administrator of the server to move you to a safe map. ";


// Downloads
// Fill in accordingly for each download.  The number in the square brackets ($download[number]) is the download number.
// You must fill in the client download first, then you may add your others.  Client = $download[1]. HTML rules apply.
$download[1]["title"] = "Client";
$download[1]["desc"] = "Please download this to play our server!";
$download[1]["url"] = "includes/durrms v75.exe";

$download[2]["title"] = "MapleStory v75";
$download[2]["desc"] = "Download this if you don't have v75 already.";
$download[2]["url"] = "http://depositfiles.com/en/files/zjtk1c0l5";


// Website Colour Style
// Determine website colours, green is default. Possible choices: green, red, blue, black, purple.
$styleColour = "green";


// Spacer
// This is the space between entries, don't change if you don't know what to do here.
$spacer = "<br /><br /><hr /><br />";


// Rankings
$rankingAmount = "0";			// Number of characters on rankings per page, 0 to show all.
$ranking_gm = "yes";			// Show GMs on rankings, "yes" or "no".


// Account Page
$showAccPage = "no";			// Show the account page? "yes" or "no".


// Custom Scripts
// If you want to add any custom scripts, such as a negative exp fix, or nx buying page, fill in these accordingly for each script.
// The number in the square brackets tells you what number it is.  
// To install custom scripts, fill in the name / page title, and the name of the file you must paste in the scripts folder.  
// If I placed 'nxcash.php' in the scripts folder, I must put nxcash.php as the file name.
// As for the "page" one, fill in whatever you want to show up on this:  scripts.php?page=SOMETHING.  SOMETHING = your page name.
// Don't make it long, and make it lower-cased.
// Also remember that these are made up, the values I put below are FAKE, they don't work unless you put the files in scripts.
$script[1]["title"] = "Buy NX Cash";
$script[1]["file"] = "nxcash.php";
$script[1]["page"] = "nxcash";

$script[2]["title"] = "Negative EXP Fix";
$script[2]["file"] = "fixexp.php";
$script[2]["page"] = "fixexp";

?>