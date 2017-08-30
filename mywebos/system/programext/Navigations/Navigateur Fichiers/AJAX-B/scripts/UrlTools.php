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

if (!empty($_SESSION['AJAX-B']['def_racine']) && !is_dir($_SESSION['AJAX-B']['def_racine']))
	mkdirs ($_SESSION['AJAX-B']['def_racine'], 0777, true);
if (!empty($_SESSION['AJAX-B']['spy_dir']) && !is_dir($_SESSION['AJAX-B']['spy_dir']))
	mkdirs ($_SESSION['AJAX-B']['spy_dir'], 0777, true);
if (!empty($_SESSION['AJAX-B']['mini_dir']) && !is_dir($_SESSION['AJAX-B']['mini_dir']))
	mkdirs ($_SESSION['AJAX-B']['mini_dir'], 0777, true);
	
	if (strpos($mode,'request')===false)
	{
		$reload=false;
		if (!empty($racine) && is_dir($racine))
		{ // si une racine et defini en clair dans l'URL ex : www.site.com/AJAX-Browser.php?racine=./
			$ErrrorMsg .= __FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
			$racine64=encode64($racine);
			$reload=true;
		}
		if (empty($racine64) || !file_exists(decode64($racine64)))
		{ // si l'URL n'est pas une URL valide
			$ErrrorMsg .= "\n".__FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
			$racine64 = empty($_SESSION['AJAX-B']['def_racine'])?encode64('./'):encode64($_SESSION['AJAX-B']['def_racine']);
			$reload=true;
		}
		if (substr(decode64($racine64), -1, 1)!='/')
		{ // si l'URL ne se termine pas par un /
			$ErrrorMsg .= "\n".__FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
			$racine64 = encode64(decode64($racine64).'/');
			$reload=true;
		}
		if (encode64(decode64($racine64))!=$racine64)
		{
			$ErrrorMsg .= "\n".__FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
			$racine64 = empty($_SESSION['AJAX-B']['def_racine'])?encode64('./'):encode64($_SESSION['AJAX-B']['def_racine']);
			$reload=true;
		}
		if (!empty($_SESSION['AJAX-B']['def_racine']) && !$_SESSION['AJAX-B']['droits']['..VIEW'] && strpos(realpath(decode64($racine64)), realpath($_SESSION['AJAX-B']['def_racine']))===false || is_link(decode64($racine64)))
		{ // si l'utilisateur remonte l'arborescence alors qu'il n'en a pas le droit
			$ErrrorMsg .= "\n".__FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
			$racine64 = encode64($_SESSION['AJAX-B']['def_racine']);
			$reload=true;
		}
		if (empty($mode))
		{
			$ErrrorMsg .= "\n".__FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
			$mode = empty($_SESSION['AJAX-B']['def_mode'])?'arborescence':$_SESSION['AJAX-B']['def_mode'];
			$reload=true;
		}
		if (encode64(UnRealPath(decode64($racine64)))!=$racine64)
		{
			$ErrrorMsg .= "\n".__FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
			$racine64 = encode64(UnRealPath(decode64($racine64)));
			$reload=true;
		}
		if (($reload==true || isset($code)))
		{
			if (isset($db))	file_put_contents('./Debug.txt', "<!--\nErrors resume :\n".$ErrrorMsg.RebuildURL ()."\n-->",FILE_APPEND);
			header("Location:".RebuildURL ());
			exit ();
		}
	}
function RebuildURL ()
{
	global $login, $mode, $racine64, $ie, $db;
	return '?mode='.$mode.'&racine64='.$racine64.(isset($ie)?'&ie':'').(isset($db)?'&db':'');
}
?>