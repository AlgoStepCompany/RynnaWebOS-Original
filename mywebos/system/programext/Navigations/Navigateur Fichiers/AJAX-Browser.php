<?php
/**-------------------------------------------------
 | AJAX-Browser  -  by Alban LOPEZ
 | Copyright (c) 2007 Alban LOPEZ
 | Email bugs/suggestions to alban.lopez@gmail.com
 +--------------------------------------------------
 | This script has been created and released under
 | the GNU GPL and is free to use and redistribute
 | only if this copyright statement is not removed
 +--------------------------------------------------*/

foreach($_POST as $key=>$val)
	${$key}=$val;
foreach($_GET as $key=>$val)
	${$key}=$val;

define("INSTAL_DIR", "./AJAX-B/");
define("VERSION", "0.9.36 free");
define("REPOSITORY_FOLDER", "/Archives/");

require (INSTAL_DIR . 'scripts/PHPTools.php');		// always loaded
require (INSTAL_DIR . 'scripts/ExploreTools.php');	// always loaded
	require (INSTAL_DIR . 'Language en.php');			// always loaded
require (INSTAL_DIR . 'scripts/SessionTools.php');	// always loaded
require (INSTAL_DIR . 'scripts/UrlTools.php');	// always loaded

if (isset($_SESSION['AJAX-B']['language_file']) && is_file(INSTAL_DIR . $_SESSION['AJAX-B']['language_file']))
	require (INSTAL_DIR . $_SESSION['AJAX-B']['language_file']);

$StartPhpScripte = microtime_float();

if (strpos($mode,'request')!==false)
{
	require (INSTAL_DIR . 'scripts/Command.php');
	exit();
}
else
{
	if (strpos($mode,'gallerie')!==false)
	{
		$ChangeMode=array('current'=>'gallerie','next'=>'arborescence', 'change'=>$ABS[12]);
		require (INSTAL_DIR . 'scripts/InitHTML.php');
		require (INSTAL_DIR . 'scripts/GallerieAddon.php');
		require (INSTAL_DIR . 'scripts/Gallerie.php');
	}
	elseif (strpos($mode,'arborescence')!==false)
	{
		$ChangeMode=array('current'=>'arborescence','next'=>'gallerie', 'change'=>$ABS[13]);
		require (INSTAL_DIR . 'scripts/InitHTML.php');
		require (INSTAL_DIR . 'scripts/ArborescenceAddon.php');
		require (INSTAL_DIR . 'scripts/Arborescence.php');
	}
	else exit ();
	require (INSTAL_DIR . 'scripts/CloseHTML.php');
}
if (is_file('./MakeInstallClass.php'))
{?>
<a class="bottomleft" href="./MakeInstallClass.php?version=<? echo VERSION;?>">NewSave V<?echo VERSION;?></a>
<a class="bottomleft" href="https://www.google.com/analytics/home/?hl=fr">stat google</a>
<?php } ?>