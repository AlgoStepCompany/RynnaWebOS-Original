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

$modelArbs = '
<div class="DivGroup" id="%item64%">
	<div class="This">
		<span class="left" title="%content%">
			<span class="IndentImg">%IndOffset%%ArbImg%</span>
			<span class="IcoName">
				<IMG src="'.INSTAL_DIR.'icones/type-%icone%.png" ondblclick="_view(\'%item64%\', event)"/>
				<span class="Name" onclick="_rename();">%item%</span>
			</span>
		</span>
		<span class="right">
			<div class="RowTaille" title="%real_size%">%size%</div>
			<div class="RowMIME">%type%</div>
			<div class="RowDate" title="%real_date%">%date%</div>
			<div class="RowDroits" title="UID:%uidname% (%uid%), GID:%gidname% (%gid%)">%droits%</div>
		</span>
	</div>
	<div class="Content">
	</div>
</div>';

$modelGal='
<div class="Gal" id="%item64%" title="%item% => %size% (%real_size%)" ondblclick="_view(\'%item64%\', event)">
	<table><tbody><tr><td><img src="%icone%">%name%</td></tr></tbody></table>
</div>';
	$totalContent = array();
function InfosByURL ($url, $allinfos=true, $base64=false)
{
	$infos = array();
// 	$imgtype = array('GIF','JPEG','PNG','SWF','PSD','BMP','TIFF','JPC','JP2','JPX','JB2','SWC','IFF','WBMP','XBM');
	if (is_file($url))
	{
		$infos['basename'] = $base64 ? encode64(UTF8basename($url)) : UTF8basename($url);
		$infos['size'] = sprintf("%u", filesize ($url));
		$infos['type'] = function_exists('mime_content_type') ? str_replace(array("\t",'application'), array("",'appli.'), @mime_content_type($url)) : 'ext/'.strtolower(@pathinfo($url, PATHINFO_EXTENSION));
	}
	else
	{
		$infos['basename'] = $base64 ? encode64(UTF8basename($url).'/') : UTF8basename($url).'/';
		$infos['size'] = SizeDir ($url);
		$infos['type'] = 'Dossier';
	}
	if ($allinfos)
	{
		$infos['filemtime'] = date ('d/m/y H:i:s',@filemtime($url));		// date
		$infos['perm'] = Permission ($url);
		$usr = function_exists('posix_getpwuid') ? @posix_getpwuid(@fileowner($url)) : array('name' => '?', 'uid' => '?');
			$infos['uidname'] = $usr['name'];
			$infos['uid'] = $usr['uid'];
		$grp = function_exists('posix_getgrgid') ? @posix_getgrgid (@filegroup($url)) : array('name' => '?', 'gid' => '?');
			$infos['gidname'] = $grp['name'];
			$infos['gid'] = $grp['gid'];
		if (is_dir($url))
		{
			$infos['content0'] = ($tmp=DirSort ($url,'dir'))?count ($tmp):0;	// count(subdir)
			$infos['content1'] = ($tmp=DirSort ($url,'file'))?count ($tmp):0;	// count(subfile)
		}
		elseif (strpos($infos['type'], 'image') && @exif_imagetype($url))
			list ($infos['content0'], $infos['content1']) = @getimagesize($url);
	}
	return $infos;
}
function SizeDir ($Folder)
{
	global $speed, $StartPhpScripte, $OverTime;
	$OverTime=3;
	if (microtime_float()-$StartPhpScripte < $OverTime && count(explode($Folder,'/')) < 30)
	{
		$SizeAll=0;
		$dirLst=DirSort ($Folder,'dir');
		if ($dirLst)
		{
			foreach ($dirLst as $dir)
				$SizeAll += SizeDir ($Folder.$dir.'/');
		}
		$fileLst=DirSort ($Folder, isset($_SESSION['AJAX-B']['match']) ? explode(',',$_SESSION['AJAX-B']['match']) : 'file');
		if ($fileLst)
		{
			foreach ($fileLst as $key => $file)
				$SizeAll += sprintf("%u", @filesize ($Folder.$file));
		}
// 		if (microtime_float()-$StartPhpScripte < $OverTime)
		return sprintf("%u", $SizeAll);
// 		else return -1;
	}
	else
		return -1;
}
function SizeAll($path)
{
	if (!is_dir($path))
		return @filesize($path);
	$dir = opendir($path);
	while ($file = readdir($dir))
	{
		if (is_file($path."/".$file))
			$size+=@filesize($path."/".$file);
		if (is_dir($path."/".$file) && $file!="." && $file !="..")
			$size +=SizeAll($path."/".$file);
	}
	return $size;
}
function CountDir($path)
{
	if (!is_dir($path))
		return 0;
	$dir = opendir($path);
	while ($file = readdir($dir))
	{
		if (is_dir($path."/".$file) && $file!="." && $file !="..")
			$nbr += CountDir($path."/".$file);
	}
	return $nbr+1;
}
function CountFile($path)
{
	if (!is_dir($path))
		return 1;
	$dir = opendir($path);
	while ($file = readdir($dir))
	{
		if (is_file($path."/".$file))
			$nbr += CountFile($path."/".$file);
	}
	return $nbr;
}
function ArrayMatch ($ArrayMask, $str)
{
	foreach ($ArrayMask as $mask)
		if (fnmatch($mask, $str)) return true;
	return false;
}
function DirSort ($rep, $mask='all', $Prefixe='')
{
	$type = array( 'dir' =>  true , 'file' => false);
	$Lst = false;
	if ($mask=='all')
	{
		$Lst1 = DirSort ($rep, 'dir', $Prefixe);		// cree une liste ordonnee des repertoires
		$Lst2 = DirSort ($rep,  isset($_SESSION['AJAX-B']['match']) ? explode(',',$_SESSION['AJAX-B']['match']) : 'file', $Prefixe);		// cree une liste ordonnee des fichiers ( isset($_GET['match']) ? explode(',',$_GET['match']) : 'file' )
		if ($Lst2 || $Lst1)				// si l'un des 2 n'est pas vide...
			return array_merge( $Lst1 ? $Lst1 : array(), $Lst2 ? $Lst2 : array() );       // alors on renvois la concatenation des 2 string
		else return false;				// resultat d'un dossier vide
	}
	elseif (is_readable($rep) && $dh = opendir($rep))
	{
		while (($f = readdir($dh)) !== false)	// parcoure le contenu de Rep
		{
			if ($f != '.' && $f != '..')		// ignore les dossiers '.' et '..'
			{
				if (!is_array($mask))	// si on a demander tous le contenu (fichiers ou dossiers)
				{
					if ($type[$mask]==is_dir($rep.$f))
						$Lst[] = $Prefixe.$f.(is_dir($rep.$f)?'/':'');	// Liste un type de contenu (repertoires ou fichiers)
				}
				elseif ( ArrayMatch($mask, $f) && is_file($rep.$f) )
					$Lst[] = $Prefixe.$f;       // Liste un type de contenu (fichier de d'extension demander)
			}
		}
		closedir($dh);
	}
	if (is_array($Lst))        // si la liste n'est pas vide
	{
		sort($Lst, SORT_STRING);       //classe le contenu
		return array_values($Lst);   // pour que les clef soit dans l'ordre...
	}
	else return false;
}
function Permission ($url)
{// revoie une chaine decrivant les droits d'accees du fichier ou dossier (a la maniere linux...)
	$perms = @fileperms($url);

	if (($perms & 0xC000) == 0xC000)
	$info = 's';
	elseif (($perms & 0xA000) == 0xA000)
	$info = 'l';
	elseif (($perms & 0x8000) == 0x8000)
	$info = '-';
	elseif (($perms & 0x6000) == 0x6000)
	$info = 'b';
	elseif (($perms & 0x4000) == 0x4000)
	$info = 'd';
	elseif (($perms & 0x2000) == 0x2000)
	$info = 'c';
	elseif (($perms & 0x1000) == 0x1000)
	$info = 'p';
	else  // Inconnu
	$info = 'u';

	$info .= (($perms & 0x0100) ? 'r' : '-');// Proprietaire
	$info .= (($perms & 0x0080) ? 'w' : '-');
	$info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));
	$info .= (($perms & 0x0020) ? 'r' : '-');// Groupe
	$info .= (($perms & 0x0010) ? 'w' : '-');
	$info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));
	$info .= (($perms & 0x0004) ? 'r' : '-');// Tous
	$info .= (($perms & 0x0002) ? 'w' : '-');
	$info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));

	return $info;
}
?>