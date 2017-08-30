<table>
	<colgroup><col width='1'><col width='1'></colgroup>
	<tbody>
		<tr>
<?php
/*
chown(,);
chgrp(,);
chmod(,);
*/
	$lst = explode(',',$infos);
	if (count($lst)==1)
	{
		$item = decode64($lst[0]) ;
		$arrayinfo = InfosByURL ($item);
		if (strpos($arrayinfo['type'], 'image') && @exif_imagetype($item))
		{?>
			<td>
				<a href="<?php echo $lst[0];?>"><img class="cadre" src="<?php echo CreatMini($item,$_SESSION['AJAX-B']['mini_dir'],$_SESSION['AJAX-B']['mini_size']);?>"></a>
			</td>
		<?php
		}
		else
		{?>
			<td>
				<img class="cadre" src="<?php echo INSTAL_DIR; ?>icones/type-<?php echo FileIco($item);?>.png">
			</td>
		<?php
		}
		?>
			<td>
				<table width='300px' onclick="_properties();">
					<tbody>
						<tr><td>URL : </td><td><?php echo '<a href="'.ereg_replace('^'.realpath('./'),'.',realpath($item)).'">'.$item.'</a>';?></td></tr>
						<tr><td>Chemin : </td><td><?php echo realpath($item);?></a></td></tr>
						<tr><td>EncodingName : </td><td><?php echo $lst[0];?></td></tr>
						<tr><td colspan=2><hr/></td></tr>
						<tr><td>Taille:</td><td><?php echo SizeConvert($arrayinfo['size']).' ('.$arrayinfo['size'].')';?></td></tr>
						<tr><td>Type:</td><td><?php echo $arrayinfo['type'];?></td></tr>
						<?php if (is_dir($item)) {?><tr><td></td><td><?php echo $arrayinfo['content0'].' dossier(s), '.$arrayinfo['content1'].' fichier(s)';?></td></tr><?php }?>
						<tr><td>Dernière modification:</td><td><?php echo $arrayinfo['filemtime'];?></td></tr>
						<tr><td colspan=2><hr/></td></tr>
						<tr><td>Droit d'accés :</td><td><?php echo $arrayinfo['perm'];?></td></tr>
						<tr><td>UID :</td><td><?php echo $arrayinfo['uidname'].' ('.$arrayinfo['uid'].')';?></td></tr>
						<tr><td>GID :</td><td><?php echo $arrayinfo['gidname'].' ('.$arrayinfo['gid'].')';?></td></tr>
					</tbody>
				</table>
			</td>
		<?php
	}
	elseif (count($lst)>1)
	{
		foreach ($lst as $item)
		{
			if (is_dir(decode64($item))) $lst_dir[]=decode64($item);
			else $lst_file[]=decode64($item);
		}?>
			<td>
				<table width='300px'>
					<tbody>
						<tr><td>Selection :</td><td><?php echo count($lst).' element(s),<br/>'.count($lst_file).' fichier(s) et '.count($lst_dir).' dossier(s)';?></td></tr>
						<tr><td colspan=2><hr/></td></tr>
		<?php
		$nDir = 0;
		$nFile = 0;
		$sAll = 0;
		foreach ($lst as $item)
		{
			$nDir+=CountDir(decode64($item));
			$nFile+=CountFile(decode64($item));
			$sAll+=SizeAll(decode64($item));
		}?>
						<tr><td>Taille totale : </td><td><?php echo SizeConvert($sAll).' ('.$sAll.')<br/>'.$nDir.' sous dossier(s), '.$nFile.' fichier(s)';?></td></tr>
						<tr><td colspan=2><hr/></td></tr>

<?php
		foreach ($lst as $item)
		{?>
<tr><td colspan=2>relativ URL (<IMG onclick="PopBox('mode=request&infos=<?php echo $item;?>','OpenBox(request.responseText);');" src="<?php echo INSTAL_DIR; ?>icones/Infos.png" title="Propriete de cet element."/>) :<?php echo '<a href="'.ereg_replace('^'.realpath('./'),'.',realpath(decode64($item))).'">'.decode64($item);?></td></tr>
<?php	}?>
					</tbody>
				</table>
			</td>
<?php	}?>
		</tr>
	</tbody>
</table>