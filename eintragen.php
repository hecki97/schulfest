<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php $host = $_SERVER['SERVER_NAME']; ?>
<?php @$verbindung = mysql_connect("localhost", "schulfestLogin" , "") or die($string['global']['mysql.connect.error']); ?>
<?php @mysql_select_db("schulfest", $verbindung) or die ($string['global']['mysql.select.db.error']); ?>
<?php include("$root/schulfest/res/html/htmlHead.html"); ?>
<?php include("$root/schulfest/res/php/_auth.php"); ?>
<?php include("$root/schulfest/res/php/_loadLangFiles.php"); ?>
<?php include("$root/schulfest/res/php/_getVersionScript.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Eintragen</title>
    <style type="text/css">
      body {
        text-align: center;
      }
    </style>
  </head>
  <body class="metro">
    <header>
      <nav class="navigation-bar dark fixed-top">
        <nav class="navigation-bar-content">
            <a href="http://<?php echo $host;?>/schulfest/res/php/_logout.php" class="element"><span class="icon-arrow-left-5"></span> Logout</a>
     
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

    <h1><?php echo $string['eintragen']['registrierung']; ?></h1>
    <form action="eintragen.php" method="post">
    <h3><?php echo $string['eintragen']['daten']; ?></h3>
    <table cellpadding="2" align="center">
        <tr>
          <th>
            <span style ='font-size:15px'><?php echo $string['eintragen']['link']; ?></span>
          </th>
          <th>
            <span style ='font-size:15px'><input type="text" name="link" /></span>
          </th>
        </tr>
      </table>
      <br><input type="submit" name="uregister" value="Eintragen">

      <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST["uregister"])) : ?>
      <ul>
        <?php $link = $_POST["link"]; ?>

        <?php if(empty($link)) : ?>
        <ul>
          <script type="text/javascript">alert("<?php echo $string['eintragen']['javascript.alert.felder']; ?>");</script> 
          <?php exit; ?>
        </ul>
        <?php endif; ?> 

        <?php $result = mysql_query("SELECT `link` FROM `bilder` WHERE `link` LIKE '$link'"); ?>
        <?php $menge = mysql_num_rows($result); ?>

        <?php if($menge == 0) : ?> 
        <ul>
          <?php $eintrag = "INSERT INTO `bilder`(`link`) VALUES ('$link')"; ?>
          <?php $eintragen = mysql_query($eintrag); ?>

          <?php if($eintragen == true) : ?>
          <ul>
            <h3><?php echo $string['eintragen']['alert.succes']; ?><i><u><?php echo $link; ?></u></i><?php echo $string['eintragen']['alert.succes.2']; ?></h3>
          </ul>
          <?php else : ?> 
          <ul>
            <script type="text/javascript">alert("<?php echo $string['eintragen']['javascript.alert.speicherfehler']; ?>");</script>
          </ul>
          <?php endif; ?>
        </ul>
        <?php else : ?> 
          <ul>
            <script type="text/javascript">alert("<?php echo $string['eintragen']['javascript.alert.bereits.vorhanden']; ?>");</script>
          </ul>
        <?php endif; ?>
      </ul>
      <?php endif; ?>
      </form>
    </body>
</html>