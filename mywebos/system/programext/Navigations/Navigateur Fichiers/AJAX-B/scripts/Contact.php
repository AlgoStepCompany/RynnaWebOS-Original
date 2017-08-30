<?php
if ($contact=="send" && !empty($expediteur) &&  !empty($titre) &&  !empty($message))
{
	if (mail($GLOBALS['AJAX-Var']['admin_email'], trim(stripslashes($titre)), trim(stripslashes($message))."\n\nAJAX-Browser : ".$_SESSION['AJAX']['login'], "From: ".$_SESSION['AJAX-B']['login']." <".$expediteur.">\nMIME-Version: 1.0"))
		echo $ABS[701]."<br><br> :\n".$titre."<br><br> :\n".$message."<br><br>\n";
	else
		echo "<div class='alert'>$ABS[702]<br>$ABS[703]<br></div>\n";
}
?>
	<label for="expediteur"><?php echo $ABS[704];?> :</label>
	<br>
	<input class="w3" name="expediteur" id="expediteur" value="<?php	echo (!empty($expediteur))?$expediteur:$_SESSION['AJAX-B']['usr_email'];?>" />
	<br>
	<label for="titre"><?php echo $ABS[705];?> : </label>
	<br>
	<input class="w3" size="30" name="titre" id="titre" value="<?php echo (!empty($titre))?stripslashes($titre):'';?>" />
	<br>
	<label for="message"><?php echo $ABS[706];?></label>
	<br>
	<textarea class="w3" name="message" id="message" rows="10"><?php echo (!empty($message))?stripslashes($message):'';?></textarea>
	<br>
	<div class="w3 border center" onclick="form=document.forms[0];PopBox('mode=request&contact=send&expediteur='+form.expediteur.value+'&titre='+form.titre.value+'&message='+form.message.value,'OpenBox(request.responseText);')">Send</div>