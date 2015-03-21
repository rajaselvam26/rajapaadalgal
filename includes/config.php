<?php
	ini_set("session.auto_start", 1);
	$host="localhost";
	$username="root";
	$password="";
	$dbname="db_rajapaadalgal";
	$con = mysql_connect($host, $username, $password) or die ("Could not connect");
	mysql_select_db($dbname, $con) or die ("Could not select DB");
	if (!defined('SONG_ENGLISH')) define("SONG_ENGLISH", 1, true);
	if (!defined('SONG_TAMIL')) define("SONG_TAMIL", 2, true);
?>
