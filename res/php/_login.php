<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);

	include("$root/schulfest/res/php/_loadLangFiles.php");
	include("$root/schulfest/res/php/_getVersionScript.php");

	@$verbindung = mysql_connect("localhost", "schulfestLogin" , "") or die($string['global']['mysql.connect.error']);
	@mysql_select_db("schulfest", $verbindung) or die ($string['global']['mysql.select.db.error']);

	$host = $_SERVER['SERVER_NAME'];

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    if (!empty($_POST["username"]) && !empty($_POST["password"]))
	    {
	      session_start();

	      $username = $_POST["username"]; 
	      $passwort = md5($_POST["password"]); 

	      $abfrage = "SELECT username, password FROM login WHERE username LIKE '$username' LIMIT 1"; 
	      $ergebnis = mysql_query($abfrage); 
	      $row = mysql_fetch_object($ergebnis); 

	      if($row->password == $passwort) 
	      { 
	        $_SESSION["username"] = $username; 
	        header("Location: http://$host/schulfest/eintragen.php");
	      } 
	      else 
	      { 
	        ?><script type="text/javascript">alert("<?php echo $string['global']['javascript.alert.login.failed']; ?>");</script><?php
	      }
	    }
	    else
	    {
	      ?><script type="text/javascript">alert("<?php echo $string['global']['javascript.alert.felder']; ?>");</script><?php
	    }
	}
?>