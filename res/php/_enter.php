<?php
  include(dirname(__FILE__)."/_checkDataBase.php");
  include(dirname(__FILE__)."/_auth.php");
  include(dirname(__FILE__)."/_loadLangFiles.php");
  include(dirname(__FILE__)."/_getVersionScript.php");

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $link = $_POST["link"];

    if(empty($link))
    {
      ?><script type="text/javascript">alert("<?=$string['javascript.alerts']['j.fields']; ?>");</script><?php
    }
    else
    {
      $result = mysql_query("SELECT `link` FROM `bilder` WHERE `link` LIKE '$link'");
      $menge = mysql_num_rows($result);

      if($menge == 0)
      {
        $loadImage = @fopen("https://dl.dropboxusercontent.com/u/107727443/Schulfest%202014/".$link, "r");
        if ($loadImage != null)
        {
          $eintrag = "INSERT INTO `bilder`(`link`) VALUES ('$link')";
          $eintragen = mysql_query($eintrag);

          if($eintragen == true)
            $return = "<h3>".$string['labels']['l.enter.succes']."<i><u>".$link."</u></i>".$string['labels']['l.enter.succes.2']."</h3>";
          else 
          {
            ?><script type="text/javascript">alert("<?=$string['javascript.alerts']['j.error']; ?>");</script><?php
          }
        }
        else
        {
          ?><script type="text/javascript">alert("<?=$string['javascript.alerts']['j.not.found']; ?>");</script><?php
        }
      }
      else 
      {
        ?><script type="text/javascript">alert("<?=$string['javascript.alerts']['j.already.exists']; ?>");</script><?php
      }
    }
  }
?>