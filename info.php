<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<?php $host = $_SERVER['SERVER_NAME']; ?>
<?php include("$root/schulfest/res/html/htmlHead.html"); ?>
<?php include("$root/schulfest/res/php/_loadLangFiles.php"); ?>
<?php include("$root/schulfest/res/php/_getVersionScript.php"); ?>
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
                <a href="http://<?php echo $host;?>/schulfest/index.php" class="element"><span class="icon-arrow-left-5"></span> Index</a>

                <span class="element-divider"></span>
                <button class="element brand no-phone no-tablet" onclick="window.location.reload();"><span class="icon-spin"></span></button>
                <span class="element-divider"></span>
            </nav>
          </nav>
        </header>

        <nav class="vertical-menu">
        <ul>
            <li class="title"><h1><?php echo $string['info']['title']; ?></h1></li>
            <li><a href="https://github.com/hecki97/schulfest"><h2><?php echo $string['info']['source.code']; ?></h2></a></li><br/>
            <li><h2><?php echo $string['info']['website']; ?></h2><h3><a href="http://www.mlk-vk.de">www.mlk-vk.de</a></h3></li><br/>
            <li><h2><?php echo $string['info']['powered.by']; ?></h2><h3><a href="http://metroui.org.ua">Metro UI CSS 2.0</a></h3><br></li>
            <li><a><?php echo $string['info']['(c)']; ?></a></li>
            <li><a><?php echo $string['info']['version']; ?><?php echo $version; ?></a></li>
        </ul>
    </nav>
    </body>
</html>