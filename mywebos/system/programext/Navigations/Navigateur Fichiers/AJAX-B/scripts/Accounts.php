<?php
function LstAccount ()
{
        global $ABS;
?>
<table id='UsrLst' class="LstArray">
        <colgroup><col width='130px'><col width='30px'></colgroup>
                <?php
                foreach ($GLOBALS['AJAX-Var']['accounts'] as $UserName => $UserConf)
                {
                ?>
                <tr title="<?php echo $ABS[3].' : '.$UserConf['last']; ?>">
                        <td class="bold italic"><?php echo $UserName.' ( '.array_sum ($UserConf['IP_count']).' )';?></td>
                        <td>
                                <IMG src='<?php echo INSTAL_DIR; ?>icones/Infos.png' title='<?php echo $ABS[601]; ?>' onclick="RQT.get(ServActPage,{method:'post', parameters:'mode=request&accounts=edituser&user=<?php echo $UserName;?>', onEnd:'OpenBox(request.responseText);'});"/>
                                <IMG src='<?php echo INSTAL_DIR; ?>icones/Trash.png' title='<?php echo $ABS[602]; ?>' onclick="RQT.get(ServActPage,{method:'post', parameters:'mode=request&accounts=removeuser&user=<?php echo $UserName;?>', onEnd:'PopBox(\'mode=request&accounts=\',\'OpenBox(request.responseText);\');'});"/>
                        </td>
                </tr>
  <?php
                }
                ?>
                <tr>
                        <td>
                <?php echo $ABS[528]; ?>
                <SELECT name="UnBlackListed">
<?php foreach ($GLOBALS['AJAX-Var']['BlackList'] as $ip => $n) echo "                   <OPTION value=\"$ip\">".$n." => [".$ip."]</OPTION>";?>
                </SELECT>
                        </td>
                        <td title="UnblacListed this">
                                <IMG style="vertical-align:middle;text-align:center;" src='<?php echo INSTAL_DIR; ?>icones/type-reload.png' title='<?php echo $ABS[652]; ?>' onclick="RQT.get(ServActPage,{method:'post', parameters:'mode=request&accounts=&UnBlackListed=<?php echo $_SERVER['REMOTE_ADDR'];?>', onEnd:'OpenBox(request.responseText);'});"/>
                        </td>
                </tr>
                <tr>
                        <td colspan=2 class="button">
                                <div class="center"  onclick="if (NewUser=prompt('<?php echo $ABS[653]; ?>')) {RQT.get(ServActPage,{method:'post', parameters:'mode=request&accounts=adduser&user='+NewUser, onEnd:'PopBox(\'mode=request&accounts=edituser&user='+NewUser+'\',\'OpenBox(request.responseText);\');'});}"><?php echo $ABS[603]; ?></div>
                        </td>
                </tr>
</table>
<?php
}
function editAccount($UserName, $StrToSaveThis, $onend)
{
        global $ABS;
?>
<table style="width:400px;margin:3px;margin-right:15px;">
        <tr>
                <td colspan=2 class="border">
                        <span class="large"><?php echo $ABS[11].' : '.$UserName; ?></span><br/>
                        <table style="width:100%;margin:3px;">
                                <tr>
                                        <td><?php echo $ABS[604]; ?></td>
                                        <td><?php echo $ABS[605]; ?> : <input title="<?php echo $ABS[606]; ?>" type='checkbox' onchange="ID('ChgCODE').disabled=!this.checked;this.checked?ID('ChgCODE').value='<?php echo $ABS[607]; ?>':ID('ChgCODE').value='<?php echo $ABS[608]; ?>';" name="NewCode"/></p></td>
                                </tr>
                                <tr>
                                        <td><input class="border" type='text' name='usr_email' value="<?php echo $GLOBALS['AJAX-Var']['accounts'][$UserName]['usr_email']; ?>"/></td>
                                        <td><input class="border" title="<?php echo $ABS[609]; ?>" disabled=true type='text' name='code' id="ChgCODE" value="<?php echo $ABS[608]; ?>"/></td>
                                </tr>
<?php
        $LangLst = DirSort (INSTAL_DIR, array('Language*.php'));
        if ($LangLst)
        {
                $realABS = $ABS;
                foreach ($LangLst as $Lang)
                { // checked="checked"
                        include (INSTAL_DIR.$Lang);
                        echo "  <tr><td  colspan=\"2\" class=\"center\">
                <INPUT type=radio name=\"LANG\" value=\"".encode64($Lang)."\" id=\"".encode64($Lang)."\" ".(($GLOBALS['AJAX-Var']['accounts'][$UserName]['language_file']==$Lang) ? "checked=\"checked\"" : "").">
                        <label for=\"".encode64($Lang)."\" title=\"By: ".$ABS['language_translator']."\">".$ABS['language_in_Language'].' ('.$ABS['language_in_English'].') V'.$ABS['language_version'].' <img  '.$ABS['language_src_flag']." title=\"".$ABS['language_abbreviation']."\"></label><br/>
        </td></tr>\n";
                }
                $ABS = $realABS;
                if ($_SESSION['AJAX-B']['droits']['GLOBAL_ACCOUNTS'] || $_SESSION['AJAX-B']['droits']['GLOBAL_SETTING'])
                        echo '<tr><td colspan="2"><a href="http://ajaxbrowser.free.fr/Ajax-B_Pub/en/download.php#lang">'.$ABS[648].'</a></td></tr>';
                else
                        echo '<tr><td colspan="2"><a href="javascript:return false;" onclick="PopBox(\'mode=request&message=Please,%20Could%20you%20install%20:%20...%20language%20pack.%20Thank%20you.&titre=Add%20another%20language&contact=\',\'OpenBox(request.responseText);\');">'.$ABS[649].'</a></td></tr>';
        }
        elseif ($_SESSION['AJAX-B']['droits']['GLOBAL_ACCOUNTS'] || $_SESSION['AJAX-B']['droits']['GLOBAL_SETTING'])
                echo '<tr><td colspan="2"><a href="http://ajaxbrowser.free.fr/Ajax-B_Pub/en/download.php#lang">Get Languages</a></td></tr>'; // ne pas utiliser de variable $ABS[...]
?>
                        </table>
                </td>
        </tr>
        <tr><td colspan="2"><br/><?php echo $ABS[610]; ?></td></tr>
        <tr>
                <td class="border">
<?php
if ($_SESSION['AJAX-B']['droits']['GLOBAL_ACCOUNTS'] || ($UserName==$_SESSION['AJAX-B']['login'] && $_SESSION['AJAX-B']['droits']['GLOBAL_SETTING']))
{?>
                        <?php echo $ABS[611]; ?><br/>
                        <INPUT class="border" type='text' ondblclick="this.value=base64.decode(racine64);" title="<?php echo $ABS[500]; ?>" name="def_racine" VALUE="<?php echo $GLOBALS['AJAX-Var']['accounts'][$UserName]['def_racine']; ?>"/><br/>
                        <INPUT name="VIEWparent" id="..VIEW" type="checkbox" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['..VIEW']?'checked':'');?>>
                                <label for="..VIEW"><?php echo $ABS[612]; ?></label><br/>
<?php }?>
                        <br/><?php echo $ABS[613]; ?><br/>
                        <INPUT type=radio name="def_mode" value="arborescence" id="arbs" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['def_mode']=='arborescence') ? "checked" : ""; ?>>
                                <label for="arbs"><?php echo $ABS[12]; ?></label><br/>
                        <INPUT type=radio name="def_mode" value="gallerie" id="gal" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['def_mode']=='gallerie') ? "checked" : ""; ?>>
                                <label for="gal"><?php echo $ABS[13]; ?></label>
                </td>
                <td class="border" title="<?php echo $ABS[613]; ?>"><?php echo $ABS[614]; ?><br/>
                        <INPUT type=radio name="mini_size" value="75" id="size75" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['mini_size']==75) ? "checked" : ""; ?>>
                                <label for="size75"><?php echo $ABS[615]; ?> (75px)</label><br/>
                        <INPUT type=radio name="mini_size" value="100" id="size100" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['mini_size']==100) ? "checked" : ""; ?>>
                                <label for="size100"><?php echo $ABS[616]; ?> (100px)</label><br/>
                        <INPUT type=radio name="mini_size" value="200" id="size200" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['mini_size']==200) ? "checked" : ""; ?>>
                                <label for="size200"><?php echo $ABS[617]; ?> (200px)</label><br/>
                        <INPUT type=radio name="mini_size" value="300" id="size300" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['mini_size']==300) ? "checked" : ""; ?>>
                                <label for="size300"><?php echo $ABS[618]; ?> (300px)</label><br/>
                        <INPUT type=radio name="mini_size" value="400" id="size400" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['mini_size']==400) ? "checked" : ""; ?>>
                                <label for="size400"><?php echo $ABS[619]; ?> (400px)</label><br/>
                </td>
        </tr>
<?php
if ($_SESSION['AJAX-B']['droits']['GLOBAL_ACCOUNTS'] || ($UserName==$_SESSION['AJAX-B']['login'] && $_SESSION['AJAX-B']['droits']['GLOBAL_SETTING']))
{?>
        <tr><td colspan="2"><br/><?php echo $ABS[620]; ?></td></tr>
        <tr>
                <td class="border">
                        <input name="NEW" id="NEW" type="checkbox" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['NEW']?'checked':'');?>>
                                <label for="NEW" title="<?php echo $ABS[622]; ?>"><?php echo $ABS[621]; ?></label><br/>
                        <input name="REN" id="REN" type="checkbox" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['REN']?'checked':'');?>>
                                <label for="REN" title="<?php echo $ABS[624]; ?>"><?php echo $ABS[623]; ?></label><br/>
                        <input name="DEL" id="DEL" type="checkbox" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['DEL']?'checked':'');?>>
                                <label for="DEL" title='<?php echo $ABS[626]; ?>'><?php echo $ABS[625]; ?></label><br/>
                        <input name="UNCOMP" id="UNCOMP" type="checkbox" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['UNCOMPRESS']?'checked':'');?>>
                                <label for="UNCOMP" title='<?php echo $ABS[651]; ?>'><?php echo $ABS[650]; ?></label><br/>
                </td>
                <td class="border">
                        <input name="VIEWhiden" id=".VIEW" type="checkbox" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['.VIEW']?'checked':'');?>>
                                <label for=".VIEW" title="<?php echo $ABS[628]; ?>"><?php echo $ABS[627]; ?></label><br/>
                        <input name="COPY" id="COPY" type="checkbox" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['COPY']?'checked':'');?>>
                                <label for="COPY" title="<?php echo $ABS[630]; ?>"><?php echo $ABS[629]; ?></label><br/>
                        <input name="MOVE" id="MOVE" type="checkbox" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['MOVE']?'checked':'');?>>
                                <label for="MOVE" title="<?php echo $ABS[632]; ?>"><?php echo $ABS[631]; ?></label><br/>
                </td>
        </tr>
        <tr><td colspan="2"><br/><?php echo $ABS[633]; ?></td></tr>
        <tr>
                <td colspan="2" class="border">
                        <input name="CP_VIEW" id="CP-VIEW" type="checkbox" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['CP_VIEW']?'checked':'');?>>
                                <label for="CP-VIEW"><?php echo $ABS[634]; ?></label><br/>
                        <input name="CP_EDIT" id="CP-EDIT" type="checkbox" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['CP_EDIT']?'checked':'');?>>
                                <label for="CP-EDIT"><?php echo $ABS[635]; ?></label>
                                <p><?php echo $ABS[636]; ?><br/><?php echo implode(', ',$GLOBALS['AJAX-Var']['global']['codepress_mask']);?></p>
                </td>
        </tr>
        <tr><td colspan="2"><br/><?php echo $ABS[637]; ?></td></tr>
        <tr>
                <td colspan="2" class="border">
                        <input name="DOWNLOAD" id="DOWNLOAD" type="checkbox" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['DOWNLOAD']?'checked':'');?>>
                                <label for="DOWNLOAD"><?php echo $ABS[638]; ?></label><br/><br/><?php echo $ABS[639]; ?><br/>
                        <INPUT type=radio name="UPLOAD" value="NO" id="NO" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['UPLOAD']=='NO') ? "checked" : ""; ?>>
                                <label for="NO"><?php echo $ABS[640]; ?></label><br/>
                        <INPUT type=radio name="UPLOAD" value="OnlyAlways" id="OA" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['UPLOAD']=='OnlyAlways') ? "checked" : ""; ?>>
                                <label for="OA"><?php echo $ABS[641].' : '.implode(', ',$GLOBALS['AJAX-Var']['global']['always_mask']);?> (<?php echo $ABS[14]; ?>)</label><br/>
                        <INPUT type=radio name="UPLOAD" value="ExceptRestrict" id="ER" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['UPLOAD']=='ExceptRestrict') ? "checked" : ""; ?>>
                                <label for="ER"><?php echo $ABS[642].' : '.implode(', ',$GLOBALS['AJAX-Var']['global']['restrict_mask']);?></label><br/>
                        <INPUT type=radio name="UPLOAD" value="ALL" id="all" <?php echo ($GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['UPLOAD']=='ALL') ? "checked" : ""; ?>>
                                <label for="all"><?php echo $ABS[643]; ?></label><br/>
                </td>
        </tr>
        <tr><td colspan="2"><br/><?php echo $ABS[644]; ?></td></tr>
        <tr><td colspan="2" class="border">
                <input name="GLOBAL_SETTING" id="GLOBAL-SETTING" type="checkbox" <?php echo $GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['GLOBAL_SETTING']?'checked':'';?>>
                <label for="GLOBAL-SETTING"><?php echo $ABS[645]; ?></label><br/>
                <input name="GLOBAL_ACCOUNTS" id="GLOBAL-ACCOUNTS" type="checkbox" <?php echo $GLOBALS['AJAX-Var']['accounts'][$UserName]['droits']['GLOBAL_ACCOUNTS']?'checked':'';?>>
                <label for="GLOBAL-ACCOUNTS"><?php echo $ABS[646]; ?></label><br/>
        </td></tr>
<?php }?>
        <tr class="center"><td colspan=2 title="<?php echo $ABS[647]; ?>">
                <SELECT>
<?php foreach ($GLOBALS['AJAX-Var']['accounts'][$UserName]['IP_count'] as $ip => $n) echo "                                     <OPTION>".$n." => [".$ip."]</OPTION>";?>
                </SELECT></td></tr>
        <tr>
                <td class="button center" style="width:50%;" onclick="PopBox('mode=request&accounts=','OpenBox(request.responseText);')"><?php echo $ABS[4]; ?></td>
                <td class="button center" style="width:50%;" onclick="form=document.forms[0];PopBox('mode=request<?php echo $StrToSaveThis;?>'+
(form.NewCode.checked?'&code='+form.code.value:'')+ '&def_mode='+getCheckedRadio(form.def_mode)+ '&mini_size='+getCheckedRadio(form.mini_size)+ '&usr_email='+base64.encode(form.usr_email.value)+ '&LANG='+getCheckedRadio(form.LANG)<?php if ($_SESSION['AJAX-B']['droits']['GLOBAL_ACCOUNTS'] || ($UserName==$_SESSION['AJAX-B']['login'] && $_SESSION['AJAX-B']['droits']['GLOBAL_SETTING']))
echo "+ '&def_racine='+base64.encode(form.def_racine.value)+ '&VIEWhiden='+form.VIEWhiden.checked+ '&VIEWparent='+form.VIEWparent.checked+ '&DEL='+form.DEL.checked+ '&NEW='+form.NEW.checked+ '&REN='+form.REN.checked+ '&COPIE='+form.COPY.checked+ '&MOVE='+form.MOVE.checked+ '&CP_VIEW='+form.CP_VIEW.checked+ '&CP_EDIT='+form.CP_EDIT.checked+ '&DOWNLOAD='+form.DOWNLOAD.checked+ '&GLOBAL_SETTING='+form.GLOBAL_SETTING.checked+ '&GLOBAL_ACCOUNTS='+form.GLOBAL_ACCOUNTS.checked+ '&UPLOAD='+getCheckedRadio(form.UPLOAD)+ '&UNCOMP='+form.UNCOMP.checked";?>, '<?php echo $onend;?>')"><?php echo $ABS[10]; ?></td>
        </tr>
</table>
<?php
}
function saveAccount($UserName)
{
        global $usr_email, $def_mode, $def_racine, $mini_size, $code, $VIEWhiden, $VIEWparent, $REN, $NEW, $COPIE, $MOVE, $DEL, $CP_VIEW, $CP_EDIT, $DOWNLOAD, $GLOBAL_SETTING, $GLOBAL_ACCOUNTS, $UPLOAD, $LANG, $UNCOMP, $file_accounts;
        $droit = $_SESSION['AJAX-B']['droits'];
        $is_admin = $droit['GLOBAL_ACCOUNTS'];

        $GLOBALS['AJAX-Var']['accounts'][$UserName] = array (
                'code' => $code ? crypt($code,$UserName) : $GLOBALS['AJAX-Var']['accounts'][$UserName]['code'],
                'usr_email' => decode64($usr_email),
                'language_file' => decode64($LANG),
                'def_mode' => $def_mode,
                'mini_size' => eval('return '.$mini_size.';'),
                'last' => $GLOBALS['AJAX-Var']["accounts"][$UserName]['last'],
                'IP_count' => $GLOBALS['AJAX-Var']["accounts"][$UserName]['IP_count'],
                'def_racine' => $is_admin ? UnRealPath(decode64($def_racine)) : $GLOBALS['AJAX-Var']["accounts"][$UserName]['def_racine'],
                'droits' =>array (
                        '.VIEW' => $is_admin?eval('return '.$VIEWhiden.';'):$droit['.VIEW'],
                        '..VIEW' => $is_admin?eval('return '.$VIEWparent.';'):$droit['..VIEW'],
                        'REN' => $is_admin?eval('return '.$REN.';'):$droit['REN'],
                        'NEW' => $is_admin?eval('return '.$NEW.';'):$droit['NEW'],
                        'COPY' => $is_admin?eval('return '.$COPIE.';'):$droit['COPY'],
                        'MOVE' => $is_admin?eval('return '.$MOVE.';'):$droit['MOVE'],
                        'DEL' => $is_admin?eval('return '.$DEL.';'):$droit['DEL'],
                        'CP_VIEW' => $is_admin?eval('return '.$CP_VIEW.';'):$droit['CP_VIEW'],
                        'CP_EDIT' => $is_admin?eval('return '.$CP_EDIT.';'):$droit['CP_EDIT'],
                        'DOWNLOAD' => $is_admin?eval('return '.$DOWNLOAD.';'):$droit['DOWNLOAD'],
                        'GLOBAL_SETTING' => $is_admin?eval('return '.$GLOBAL_SETTING.';'):$droit['GLOBAL_SETTING'],
                        'GLOBAL_ACCOUNTS' => $is_admin?eval('return '.$GLOBAL_ACCOUNTS.';'):$droit['GLOBAL_ACCOUNTS'],
                        'UNCOMPRESS' => $is_admin?eval('return '.$UNCOMP.';'):$droit['UNCOMPRESS'],
                        'UPLOAD' => $is_admin?$UPLOAD:$droit['UPLOAD'],
                        ),
                );
        file_put_contents($file_accounts, var_export($GLOBALS['AJAX-Var']['accounts'], true));
        if ($_SESSION['AJAX-B']['login'] == $UserName)
        {
                $_SESSION['AJAX-B'] = array_merge(
                        array('login' => $UserName),
                        $GLOBALS['AJAX-Var']['global'],
                        $GLOBALS['AJAX-Var']['accounts'][$UserName]);
                unset ($_SESSION['AJAX-B']['code']);
        }
}
?>
