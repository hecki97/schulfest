<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php $host = $_SERVER['SERVER_NAME']; ?>
<?php include("$root/schulfest/res/html/htmlHead.html"); ?>
<?php include("$root/schulfest/res/php/_loadLangFiles.php"); ?>
<?php include("$root/schulfest/res/php/_getVersionScript.php"); ?>
<?php @$verbindung = mysql_connect("localhost", "testLogin" , "") or die($string['global']['mysql.verbindung.error']); ?>
<?php @mysql_select_db("test", $verbindung) or die ($string['global']['mysql.datenbank.error']); ?>
<?php $abfrage = "SELECT * FROM `schulfest` WHERE 1"; ?>
<?php $sql = mysql_query($abfrage); ?>
<?php $anzahl = mysql_num_rows($sql); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Index</title>
    <style type="text/css">
      body, table, td, tr, th
      {
        text-align: center;
        background-color: #f1f1f1;
      }
    </style>
  </head>
  <body class="metro">
    <header>
      <nav class="navigation-bar dark fixed-top">
        <nav class="navigation-bar-content">
            <a class="element"><span class="icon-home"></span> Schulfest '14</a>
     
            <span class="element-divider"></span>
            <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
            <span class="element-divider"></span>

            <a href="http://<?php echo $host;?>/schulfest/info.php" class="element brand place-right no-phone no-tablet"><span class="icon-cog"></span></a>
            <span class="element-divider place-right"></span>
            <a class="element place-right no-phone no-tablet">
              <?php echo $version; ?>
            </a>
            <span class="element-divider place-right"></span>
        </nav>
      </nav>
    </header>

    <table align="center">
		<?php
			for($i=0; $i < $anzahl; $i++){
				$go = mysql_fetch_array($sql);
				$zeile  = "<tr>";
				$zeile .= "<td width='1000px'>";
				$zeile .= "<a href='https://dl.dropboxusercontent.com/u/107727443/Schulfest%202014/$go[link]'><img width='50%' src='https://dl.dropboxusercontent.com/u/107727443/Schulfest%202014/$go[link]'/></a>";
				$zeile .= "</td>";
				$zeile .= "</tr>";

				echo $zeile;
			}		
		?>
	</table>
  </body>
</html>