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

$GLOBALS['AJAX-Var']['global'] = eval('return '.file_get_contents($file_globalconf).';');
$GLOBALS['AJAX-Var']['accounts'] = eval('return '.file_get_contents($file_accounts).';');
$GLOBALS['AJAX-Var']['blacklist'] = eval('return '.file_get_contents($file_blacklist).';');
if(isset($sublstof))
{
	$LstDir=array();
	$dirLst = DirSort ($folder=decode64($sublstof), 'dir');
	if ($dirLst)
	{
		foreach ($dirLst as $dir)
			if ($_SESSION['AJAX-B']['droits']['.VIEW'] || !ereg ('^\.',UTF8basename($dir)))
			{	array_push ($LstDir, implode("\t",InfosByURL ($folder.$dir, !isset($light), true)));	}
	}

	$LstFile=array();
// ?mode=request&sublstof=Li9BSkFYLUIvc2NyaXB0cy8_&match=*.php
	$fileLst = DirSort ($folder, isset($match) ? explode(',',$match) : 'file');
	if ($fileLst)
	{
		foreach ($fileLst as $file)
			if ($_SESSION['AJAX-B']['droits']['.VIEW'] || !ereg ('^\.',UTF8basename($file)))
				array_push ($LstFile, implode("\t",InfosByURL ($folder.$file, !isset($light), true)));
	}
	if ($_SESSION['AJAX-B']['spy']['browse'])
		file_put_contents ($_SESSION['AJAX-B']['spy_dir'].'/browse.spy', $_SESSION['AJAX-B']['login'].'['.date ("d/m/y H:i:s",time()).'] >  '.$folder.' ('.$mode.")\n", FILE_APPEND);

	echo encode64(UnRealPath($folder)).implode("\n", array_merge(array(''),$LstDir, $LstFile));
}
elseif(isset($miniof))
{
	if (is_file($file = decode64($miniof)))
		echo CreatMini($file,$_SESSION['AJAX-B']['mini_dir'], $_SESSION['AJAX-B']['mini_size']);
	exit();
}
elseif(isset($erasemini))
{
	$miniLst = DirSort ($folder=$_SESSION['AJAX-B']['mini_dir'], array('*@*.png'), $folder);
	$count = 0;
	foreach ($miniLst as $mini)
	{
		if (fileatime($mini) < (time() - (7 * 24 * 60 * 60)))
		{// si les miniatures n'ont pas étais vu depuis 1 semaine
			unlink($mini);
			$count++;
		}
	}
		echo 'OK => '.$count.' are erase.';
	exit();
}
elseif(isset($view))
{
	if (is_file($file = decode64($view)))
	{
		if (@getimagesize($file))
		{
			header('Content-Type: image/png');
			header('Content-Disposition: inline;filename="'.UTF8basename($file)."\"\n");
			readfile($file);
		}
		elseif (ArrayMatch ($_SESSION['AJAX-B']['codepress_mask'], strtolower(UTF8basename($file))) && ($_SESSION['AJAX-B']['droits']['CP_VIEW'] || $_SESSION['AJAX-B']['droits']['CP_EDIT']))
		{
			echo "CodePress is not avaible in <a href=\"http://ajaxbrowser.free.fr\">AJAX-Browser</a> free version, get version Pro<br/><hr/>\n";
			highlight_file ($file);
		}
		else
		{
			header('Location:'.$file);
		}
		if ($_SESSION['AJAX-B']['spy']['action'])
			file_put_contents ($_SESSION['AJAX-B']['spy_dir'].'/view.spy', $_SESSION['AJAX-B']['login'].' ['.date ("d/m/y H:i:s",time()).'] > '.$file."\n", FILE_APPEND);
	}
	exit();
}
elseif (isset($cpsave) && $_SESSION['AJAX-B']['droits']['CP_EDIT'])
{
	echo "Not avaible in <a href=\"http://ajaxbrowser.free.fr\">AJAX-Browser</a> free version, get version Pro";
	exit();
}
elseif (isset($upload))
{
	include (INSTAL_DIR.'scripts/ManageUpload.php');
}
elseif (isset($uncompress) && $_SESSION['AJAX-B']['droits']['UNCOMPRESS'])
{
	echo "Not avaible in <a href=\"http://ajaxbrowser.free.fr\">AJAX-Browser</a> free version, get version Pro";
}
elseif (isset($download) && $_SESSION['AJAX-B']['droits']['DOWNLOAD'])
{
	if ($type=="no" && is_file($file=decode64($download)))
	{
		header('Content-Type: application/force-download');
		header("Content-Transfer-Encoding: binary");
		header("Cache-Control: no-cache, must-revalidate, max-age=60");
		header("Expires: Sat, 01 Jan 2000 12:00:00 GMT");
		header('Content-Disposition: attachment;filename="'.UTF8basename($file)."\"\n"); // force le telechargement
		readfile($file);
	}
	else
	{
		echo "Not avaible in <a href=\"http://ajaxbrowser.free.fr\">AJAX-Browser</a> free version, get version Pro";
	}
	if ($_SESSION['AJAX-B']['spy']['action'])
		file_put_contents ($_SESSION['AJAX-B']['spy_dir'].'/donwload.spy', $_SESSION['AJAX-B']['login'].' ['.date ("d/m/y H:i:s",time())."] > ".$file."\n", FILE_APPEND);
	exit();
}
elseif (isset($usrconf))
{
	include (INSTAL_DIR.'scripts/Accounts.php');
	if ($usrconf=='save')
		saveAccount($_SESSION['AJAX-B']['login']);
	else
		editAccount($_SESSION['AJAX-B']['login'],'&usrconf=save', 'ID(\\\'Box\\\').style.display=\\\'none\\\';');
}
elseif (isset($accounts) && $_SESSION['AJAX-B']['droits']['GLOBAL_ACCOUNTS'])
{
	include (INSTAL_DIR.'scripts/Accounts.php');
	if ($accounts=='adduser' && !empty($user))
	{
		$GLOBALS['AJAX-Var']['accounts']=addUser($account_exemple, $GLOBALS['AJAX-Var']['accounts'], $user);
		file_put_contents($file_accounts, var_export($GLOBALS['AJAX-Var']['accounts'], true));
	}
	elseif ($accounts=='removeuser' && isset($GLOBALS['AJAX-Var']['accounts'][$user]))
	{
		unset ($GLOBALS['AJAX-Var']['accounts'][$user]);
		file_put_contents($file_accounts, var_export($GLOBALS['AJAX-Var']['accounts'], true));
	}
	elseif ($accounts=='edituser' && isset($GLOBALS['AJAX-Var']['accounts'][$user]))
		editAccount($user, '&accounts=saveuser&user='.$user, 'PopBox(\\\'mode=request&accounts=\\\',\\\'OpenBox(request.responseText);\\\');');
	elseif ($accounts=='saveuser' && isset($GLOBALS['AJAX-Var']['accounts'][$user]))
		saveAccount($user);
	else
	{
		if (!empty($UnBlackListed))
		{
			unset($GLOBALS['AJAX-Var']['blacklist'][$UnBlackListed]);
			file_put_contents($file_accounts, var_export($GLOBALS['AJAX-Var']['accounts'], true));
		}
		LstAccount();
	}
}
elseif (isset($setting) && $_SESSION['AJAX-B']['droits']['GLOBAL_SETTING'])
{
	include (INSTAL_DIR.'scripts/Setting.php');
	if ($setting=='save')
		saveSetting ();
	else
		editSetting ();
}
elseif (isset($apropos))
	include (INSTAL_DIR.'scripts/APropos.php');
elseif (isset($contact))
	include (INSTAL_DIR.'scripts/Contact.php');
elseif (isset($newitem) && $_SESSION['AJAX-B']['droits']['NEW'])
{
	if (substr($new=decode64($newitem), -1, 1)=='/') mkdirs($new, 0777, true);
	elseif (!is_file($new))
	{
		 mkdirs(UTF8dirname($new), 0777, true);
		 file_put_contents ($new, "");
	}
	if ($_SESSION['AJAX-B']['spy']['action'])
		file_put_contents ($_SESSION['AJAX-B']['spy_dir'].'/new.spy', $_SESSION['AJAX-B']['login'].' ['.date ("d/m/y H:i:s",time()).'] > '.$new."\n", FILE_APPEND);
}
elseif (isset($noitems))
{
	$_SESSION['AJAX-B']['paste_mode'] = '';
	$_SESSION['AJAX-B']['SelectLst'] = array();
}
elseif (isset($copyitems))
{
	$_SESSION['AJAX-B']['paste_mode'] = 'copy';
	$_SESSION['AJAX-B']['SelectLst'] = explode(",", $copyitems);
	if (isset($dest))
		echo pasteItems($dest);
}
elseif (isset($moveitems))
{
	$_SESSION['AJAX-B']['paste_mode'] = 'move';
	$_SESSION['AJAX-B']['SelectLst'] = explode(",", $moveitems);
	if (isset($dest))
		echo pasteItems($dest);
}
elseif (isset($pastedest))
	echo pasteItems($pastedest);
elseif (isset($supitems) && $_SESSION['AJAX-B']['droits']['DEL'])
{
	$returnLst = array();
	$lst = explode(',', $supitems);
	foreach ($lst as $item)
		{if (SupItem(decode64($item))) $returnLst[] = $item;}
	echo implode(',', $returnLst);
	if ($_SESSION['AJAX-B']['spy']['action'])
		file_put_contents ($_SESSION['AJAX-B']['spy_dir'].'/suppr.spy', $_SESSION['AJAX-B']['login'].' ['.date ("d/m/y H:i:s",time()).'] > '.implode(', ', array_map("decode64", $returnLst))."\n", FILE_APPEND);
}
elseif (isset($renitem) && $_SESSION['AJAX-B']['droits']['REN'])
{
	rename(decode64($renitem), UTF8dirname(decode64($renitem)).'/'.decode64($mask));
	echo encode64(UTF8dirname(decode64($renitem)).'/');
	if ($_SESSION['AJAX-B']['spy']['action'])
		file_put_contents ($_SESSION['AJAX-B']['spy_dir'].'/rename.spy', $_SESSION['AJAX-B']['login'].' ['.date ("d/m/y H:i:s",time())."]\n\t".decode64($renitem).' > '.decode64($mask)."\n", FILE_APPEND);
}
elseif (isset($renitems) && $_SESSION['AJAX-B']['droits']['REN'])
{
	$renitems=array_map("decode64", explode(',',$renitems));
	if (count($renitems)==1 && is_dir($renitems[0]))
		echo MultiRen(DirSort ($renitems[0], 'all', $renitems[0]), decode64($mask));
	else
		echo MultiRen($renitems,decode64 ($mask));
}
elseif (isset($infos))
{
	include (INSTAL_DIR.'scripts/Proprietes.php');
}
elseif(isset($maj) && $_SESSION['AJAX-B']['droits']['GLOBAL_SETTING'])
{
	list($V1, $V2, $V3) = sscanf(VERSION, '%d.%d.%d%s');
	$NewVersion = file_get_contents ('http://'.$_SESSION['AJAX-B']['ajaxb_miror'].REPOSITORY_FOLDER.'LastVersion.php?version');
	list($v1, $v2, $v3) = sscanf($NewVersion, '%d.%d.%d%s');
	if (!$NewVersion) echo $ABS[403];
	elseif ($v1*1000+$v2*100+$v3 > $V1*1000+$V2*100+$V3)
	{
		file_put_contents ($_SESSION['AJAX-B']['spy_dir'].'/UPGRADE.spy', $_SESSION['AJAX-B']['login'].' ['.date ("d/m/y H:i:s",time()).'] > '.VERSION.' > '.$NewVersion."\n", FILE_APPEND);
		$name = sha1 ($data = file_get_contents ('http://'.$_SESSION['AJAX-B']['ajaxb_miror'].REPOSITORY_FOLDER.'LastVersion.php?download&identity='.$_SERVER['SERVER_NAME'].'-'.VERSION)).'.php';
		file_put_contents('./'.$name, $data);
		include ('./'.$name);
		unlink('./'.$name);
	}
	else echo $ABS[402];
}
?>