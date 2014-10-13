<?php
	include(dirname(__FILE__)."/_checkDatabase.php");
	include(dirname(__FILE__)."/_loadLangFiles.php");
	include(dirname(__FILE__)."/_getVersionScript.php");

	function genTable()
	{
		include(dirname(__FILE__)."/_checkDatabase.php");

		$abfrage = "SELECT * FROM $table_bilder WHERE 1";
		$sql = mysql_query($abfrage);
		$anzahl = mysql_num_rows($sql);

		$zeile = "<table align='center'>";
		for($i=0; $i < $anzahl; $i++)
		{	
			$go = mysql_fetch_array($sql);
			$zeile .= "<tr>";
			$zeile .= "<td width='1000px'>";
			$zeile .= "<a href='https://dl.dropboxusercontent.com/u/107727443/Schulfest%202014/".$go['link']."'><img width='50%' src='https://dl.dropboxusercontent.com/u/107727443/Schulfest%202014/".$go['link']."'/></a>";
			$zeile .= "</td>";
			$zeile .= "</tr>";
		}		
		$zeile .= "</table>";
		return $zeile;
	}
?>