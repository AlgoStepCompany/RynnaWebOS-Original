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
 $parent64=encode64(UnRealPath(decode64($racine64).'../'));?>
<div class="_DivGroup" id="<?php echo $parent64;?>">
	<div class="This" title="<?php echo decode64($parent64);?>" onclick="location.href='<?php echo str_replace($racine64, $parent64, RebuildURL())?>'">
		<span class="left">
			<span class="IndentImg"><IMG class="curshand" src="<?php echo INSTAL_DIR; ?>icones/type-folder...png"/></span>
			<span class="IcoName">
				<span class="Name"><?php echo str_replace('//', '/', realpath(decode64($parent64)).'/')?></span>
			</span>
		</span>
		<span class="right">
			<div class="RowTaille"><?php echo $ABS[31];?></div>
			<div class="RowMIME"><?php echo $ABS[32];?></div>
			<div class="RowDate"><?php echo $ABS[33];?></div>
			<div class="RowDroits"><?php echo $ABS[34];?></div>
		</span>
	</div>
	<div class="Content" style="display:block;">
	<?php echo DegradeMode (decode64($racine64), '', 'End', true);?>
	</div>
</div>
<?php
function DegradeMode ($Item, $IndOffset, $end='', $force=false)
{
	global $racine64, $modelArbs;
	$item=InfosByURL($Item);
	$ReplaceLst = array (
		'%item%' => $item['basename'],
		'%item64%' => encode64($Item),
		'%icone%' =>FileIco($Item),
		'%IndOffset%' => $IndOffset,
		'%ArbImg%' => '<IMG '.(is_dir($Item)?'class="curshand" ':'').'src="'.INSTAL_DIR.'icones/'.$end.(is_dir($Item)?'DirPlus':'File').'.png" onclick="RequestLoad(\''.encode64($Item).'\')"/>',
		'%content%' => is_dir($Item)?$item['content0'].' Dossier(s), '.$item['content1'].' Fichier(s).':(isset($item['content0'])?'[X='.$item['content0'].'px, Y='.$item['content1'].'px]':''),
		'%real_size%' => $item['size'],
		'%size%' => SizeConvert ($item['size']),
		'%type%' => $item['type'],
		'%real_date%' => $item['filemtime'],
		'%date%' => substr ($item['filemtime'],0,8),
		'%uidname%' => $item['uidname'],
		'%uid%' => $item['uid'],
		'%gidname%' => $item['gidname'],
		'%gid%' => $item['gid'],
		'%droits%' => $item['perm'],
		'%link%'=>is_dir($Item)?str_replace($racine64, encode64($Item), RebuildURL()):'?mode=request&view='.encode64($Item) );
	
	if ($_SESSION['AJAX-B']['droits']['.VIEW'] || !ereg ('^\.',$item['basename']) || $force)
		return str_replace (array_keys($ReplaceLst), $ReplaceLst, $modelArbs);
	return '';
}
?>