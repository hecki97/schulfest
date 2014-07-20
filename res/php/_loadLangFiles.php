<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);

	include_once("$root/schulfest/res/php/_checkBrowserLang.php");

	$allowed_langs = array ('de');
	$lang = lang_getfrombrowser ($allowed_langs, 'de', null, false);

	if ($lang == 'de')
		$string = json_decode(file_get_contents("$root/schulfest/res/lang/de_DE.lang"), true);
?>