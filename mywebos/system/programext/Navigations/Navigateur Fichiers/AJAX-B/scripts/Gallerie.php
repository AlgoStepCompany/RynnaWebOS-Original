<div class="Gal">
	<div id="<?php echo encode64($parent=UnRealPath(decode64($racine64).'../'));?>" title='<?php echo $parent;?>' onclick="location.href='<?php echo str_replace($racine64, encode64(UnRealPath($parent)), RebuildURL());?>'">
		<table><tbody><tr><td>
			<img src="<?php echo INSTAL_DIR; ?>icones/type-folder...png"><br>
			<p class="name"><?php echo str_replace('//', '/', realpath($parent).'/');?></p>
		</td></tr></tbody></table>
	</div>
</div>
<div id="Gal">
</div>