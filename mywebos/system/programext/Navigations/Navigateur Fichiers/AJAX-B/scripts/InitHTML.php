<!-------------------------------------------------
 | AJAX-Browser  -  by Alban LOPEZ
 | Copyright (c) 2007 Alban LOPEZ
 | Email bugs/suggestions to alban.lopez@gmail.com
 +--------------------------------------------------
 | This script has been created and released under
 | the GNU GPL and is free to use and redistribute
 | only if this copyright statement is not removed
 +-------------------------------------------------->
<html>
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<title><?php echo $ABS[200];?></title>
	</head>
	<link type="text/css" rel="stylesheet" href="<?php echo INSTAL_DIR; ?>scripts/Init.css"/>
<!-- Do not remove the next 3 lines -->
<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>
<![endif]-->
<script type="text/javascript">
<?php
echo "InstallDir=\"".INSTAL_DIR."\";\n\n";
for ($i=900;$i<1000;$i++)
	if (isset($ABS[$i])) echo "ABS$i=\"".$ABS[$i]."\";\n";
if (isset($ABS[29])) echo "ABS29=\"".$ABS[29]."\";\n";
?>
function promtMAJ()
{
<?php
if (!empty($_SESSION['AJAX-B']['ajaxb_miror']) && $_SESSION['AJAX-B']['droits']['GLOBAL_SETTING'])
{
	list($V1, $V2, $V3, $V4) = sscanf(VERSION,'%d.%d.%d%s');
	$NewVersion = @file_get_contents ('http://'.$_SESSION['AJAX-B']['ajaxb_miror'].REPOSITORY_FOLDER.'LastVersion.php?version');
	list($v1, $v2, $v3, $v4) = sscanf($NewVersion, '%d.%d.%d%s');
	if ($v1*1000+$v2*100+$v3 > $V1*1000+$V2*100+$V3)
	{
		echo "ID('DragZone').childNodes[1].innerHTML='Upgrade';\n";
		echo "ID('Box').style.display = 'block';\n";
		echo "OpenBox ('<a href=\"http://ajaxbrowser.free.fr/Ajax-B_Pub/en/contribute.php\">".$ABS[37]."</a><br/><br/><a href=\"?mode=request&maj\">".$ABS[508].' : '.$NewVersion."</a>".str_replace(array("\n","\""), array("","\\\"") ,@file_get_contents ('http://'.$_SESSION['AJAX-B']['ajaxb_miror'].REPOSITORY_FOLDER.'LastVersion.php?addons'))."<br/>');";
	}
}
?>
}
function FileIco (File)
{
	if (is_dir(File)) return "folder.";
	var ext = File.split(".");
	ext = ext[ext.length-1].toLowerCase();
	if(ext.slice(ext.length-1)=="~") return "recycled";
	switch(ext)
	{
<?php
	$IcoLst = DirSort (INSTAL_DIR.'icones/',array('type-*.png'));
	foreach ($IcoLst as $Ico)
		echo "		case \"".substr($Ico,5,-4)."\":\n";
	?>
			ico=ext;
	break;
	default:
			ico="unknown";
	}
	return ico;
}
</script>
	<script type="text/javascript" src="<?php echo INSTAL_DIR; ?>scripts/Dom-drag.js"></script>
	<script type="text/javascript" src="<?php echo INSTAL_DIR; ?>scripts/Dom-event.js"></script>
	<script type="text/javascript" src="<?php echo INSTAL_DIR; ?>scripts/Common.js"></script>
	<script type="text/javascript" src="<?php echo INSTAL_DIR; ?>scripts/UTF8Base64.js"></script>
<body onload="RequestLoad('<?php echo $racine64?>');promtMAJ();" onkeypress="ManageKeyboardEvent(event);" oncontextmenu="event.stopPropagation();return false;">
	<span class="close">
		<span style='padding:2px;'>
			<a href="<?php echo str_replace($ChangeMode['current'], $ChangeMode['next'], RebuildURL ())?>"><?php echo $ABS[2].' '.$ChangeMode['change']?></a>
		</span>
			<span style='padding:2px;'><a href="?stop"><?php echo $ABS[7];?></a></span><br>
			<span style='padding:2px;'><a href="http://ajaxbrowser.free.fr/Ajax-B_Pub/fr/help.php"><?php echo $ABS[8];?></a></span>
	</span>
		<div class="italic" style="margin:3px;"><span class="bold"><?php echo $_SESSION['AJAX-B']['login']." [".$_SERVER['REMOTE_ADDR']."]"?></span><br />
			<?php echo $ABS[3].' : '.$_SESSION['AJAX-B']['last'].', '.$ABS[9].' : '.array_sum ($_SESSION['AJAX-B']['IP_count'])?></div>
<table id='menu_barre'>
<colgroup> <col width='195'><col><col width='140'></colgroup>
<tbody>
	<tr><td style='padding-top:2px;'>
		<?php if ($_SESSION['AJAX-B']['droits']['NEW']) {?><IMG onclick="_new();" src="<?php echo INSTAL_DIR; ?>icones/New.png" title="<?php echo $ABS[201];?>"/><?php }?>
		<?php if ($_SESSION['AJAX-B']['droits']['REN']) {?><IMG onmouseup="ID('CpMvSlide').style.display = 'none';_rename();" src="<?php echo INSTAL_DIR; ?>icones/Ren.png" title="<?php echo $ABS[202];?>"/><?php }?>
		<?php if ($_SESSION['AJAX-B']['droits']['DEL']) {?><IMG onmouseup="ID('CpMvSlide').style.display = 'none';_remove();" src="<?php echo INSTAL_DIR; ?>icones/Sup.png" title="<?php echo $ABS[203];?>"/><?php }?>
		<?php if ($_SESSION['AJAX-B']['droits']['DOWNLOAD']) {?><span onmouseover="ID('zipper').style.visibility='visible';" onmouseout="ID('zipper').style.visibility='hidden';">
				<IMG onclick="if(ID('zipper').style.visibility!='visible')ID('zipper').style.visibility='visible';else ID('zipper').style.visibility='hidden';" src="<?php echo INSTAL_DIR; ?>icones/Download.png" title="<?php echo $ABS[204];?>"/>
			<div id="zipper">
				<div onmouseup="_download('no');" class='action'><IMG src="<?php echo INSTAL_DIR; ?>icones/type-unknown.png"/><?php echo $ABS[23];?></div>
				<div onmouseup="ID('CpMvSlide').style.display = 'none';_download('zip');" class='action' title="<?php echo $ABS[205];?>*.ZIP"><IMG src="<?php echo INSTAL_DIR; ?>icones/type-zip.png"/>ZIP</div>
				<div onmouseup="ID('CpMvSlide').style.display = 'none';_download('tar');" class='action' title="<?php echo $ABS[205];?>*.TAR"><IMG src="<?php echo INSTAL_DIR; ?>icones/type-tar.png"/>TAR</div>
				<div onmouseup="ID('CpMvSlide').style.display = 'none';_download('tar.gzip');" class='action' title="<?php echo $ABS[205];?>*.GZIP"><IMG src="<?php echo INSTAL_DIR; ?>icones/type-gzip.png"/>TAR.GZIP</div>
				<div onmouseup="ID('CpMvSlide').style.display = 'none';_download('tar.bzip2');" class='action' title="<?php echo $ABS[205];?>*.BZIP2"><IMG src="<?php echo INSTAL_DIR; ?>icones/type-bzip2.png"/>TAR.BZIP2</div>
			</div>
		</span><?php }?>
		<?php if ($_SESSION['AJAX-B']['droits']['UPLOAD']!='NO') {?><IMG onclick="_upload();" src="<?php echo INSTAL_DIR; ?>icones/Upload.png" title="<?php echo $ABS[206];?>"/><?php }?>
		<IMG onclick="ID('DragZone').childNodes[1].innerHTML='Contact Admin';PopBox('mode=request&contact=','OpenBox(request.responseText);');" src="<?php echo INSTAL_DIR; ?>icones/E-mail.png" title="<?php echo $ABS[207];?>"/>
				<IMG onclick="if(ID('FindFilter').style.visibility!='visible'){ID('FindFilter').style.visibility='visible';ID('matchFilter').focus();}else ID('FindFilter').style.visibility='hidden';" src="<?php echo INSTAL_DIR; ?>icones/FindFilter.png" title="<?php echo $ABS[208];?>"/>
		<div id="FindFilter">
				<input name='match' id='matchFilter'>
		</div>
	</td>
	<td style='font-size:11px;font-weight:bold;font-style:italic;text-align:center;'>
	<?php
		$UrlLst = explode ('/', realpath(decode64($racine64)));
		$url = '/';
		foreach ($UrlLst as $dir)
		{
			$url = realpath($url.$dir).'/';
			echo '<a href="'.str_replace($racine64, encode64(UnRealPath($url)), RebuildURL()).'">'.$dir.'/</a> ';
		}
 	?>
	</td>
	<td style='text-align: right;'>
<?php
if ($_SESSION['AJAX-B']['droits']['GLOBAL_SETTING'])
{?>
		<IMG onclick="ID('DragZone').childNodes[1].innerHTML='Setting';PopBox('mode=request&setting=','OpenBox(request.responseText);');" src="<?php echo INSTAL_DIR; ?>icones/Setting.png" title="<?php echo $ABS[210];?>"/>
<?php }
if ($_SESSION['AJAX-B']['droits']['GLOBAL_ACCOUNTS'])
{?>
		<IMG onclick="ID('DragZone').childNodes[1].innerHTML='<?php echo $ABS[211];?>';PopBox('mode=request&accounts=','OpenBox(request.responseText);');" src="<?php echo INSTAL_DIR; ?>icones/Account.png" title="<?php echo $ABS[211];?>"/>
<?php }?>
		<IMG onclick="ID('DragZone').childNodes[1].innerHTML='Mon Compte';PopBox('mode=request&usrconf=','OpenBox(request.responseText);');" src="<?php echo INSTAL_DIR; ?>icones/User_edit.png" title="<?php echo $ABS[212];?>"/>
		<IMG onclick="ID('DragZone').childNodes[1].innerHTML='A propos';PopBox('mode=request&apropos=','OpenBox(request.responseText);');" src="<?php echo INSTAL_DIR; ?>icones/APropos.png" title="<?php echo $ABS[213];?>"/>
	</td></tr>
</tbody>
</table>
	<div id="All" onmousedown="ManageAllEvent(event);return false;" onmouseup="ManageAllEvent(event);return false;">