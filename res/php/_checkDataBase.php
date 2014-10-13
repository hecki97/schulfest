<?php
	include_once(dirname(__FILE__)."/_loadLangFiles.php");

	@$verbindung = mysql_connect("localhost", "schulfestLogin" , "") or die($string['mysql']['m.connect.error']); 
	@mysql_select_db("schulfest", $verbindung) or die ($string['mysql']['m.select.db.error']);

	//Config
	$table = "login";
	$table_bilder = "bilder";
?>