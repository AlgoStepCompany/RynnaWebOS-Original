<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./refused.php');
   exit;
}
if (isset($_SESSION['expires_by']))
{
   $expires_by = intval($_SESSION['expires_by']);
   if (time() < $expires_by)
   {
      $_SESSION['expires_by'] = time() + intval($_SESSION['expires_timeout']);
   }
   else
   {
      unset($_SESSION['username']);
      unset($_SESSION['expires_by']);
      unset($_SESSION['expires_timeout']);
      header('Location: ./refused.php');
      exit;
   }
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="clouddroits.css" rel="stylesheet">
</head>
<body>
<div id="Layer1" style="position:fixed;text-align:center;left:50%;margin-left:-350px;top:50%;margin-top:-208px;width:699px;height:414px;z-index:5;">
<div id="Layer1_Container" style="width:697px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Procédure d'envoi en ligne (Cloud) de votre application Web public" style="position:absolute;left:11px;top:10px;width:666px;height:25px;z-index:0;" disabled>
<div id="wb_Text1" style="position:absolute;left:16px;top:53px;width:661px;height:57px;z-index:1;">
<span style="color:#0000FF;font-family:Arial;font-size:16px;"><strong>Droits d'utilisation et de mise en ligne d'application Web :<br>Conditions d'utilisations fixes, non mise à jour, fixant les règles à respecter pour tout développeurs :</strong></span></div>
<input type="submit" id="Button1" onclick="window.location.href='./cloud2.php';return false;" name="" value="J'ACCEPTE" style="position:absolute;left:429px;top:376px;width:248px;height:25px;z-index:2;">
<input type="submit" id="Button3" onclick="window.location.href='./cloudoff.php';return false;" name="" value="JE REFUSE" style="position:absolute;left:21px;top:376px;width:181px;height:25px;z-index:3;">
<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:17px;top:123px;width:650px;height:221px;z-index:4;" rows="12" cols="105" spellcheck="false">Article 1 - Cette licence ne s'applique qu'au site web rynnawebos.fr.
Si vous utilisez le WebOS sur un autre serveur, contacter votre Administrateur serveur.

Article 2 - Tous développeurs, toutes personnes, peut déposer sa propre application Web sur le serveur pour la rendre disponible aurpsè de tous.

Article 3 - Toutes les applications sont autorisées sauf les applications suivantes : 
- Pornographie interdite
- Code de piratage/exploitation de faille(s) interdit
- Fausse application Web copiant sans autorisation des applications d'origines

Article 4 - Les Administrateurs du WebOS s'autorisent le droit d'analyser et de vérifier toutes les applications sur le Cloud Public.
Attention : toutes applications n'étant pas Zippé (ZIP) et ne comportant pas de fichier de description (.TXT) et d'un icone image de 100X100 pixel maximum (.PNG) sera supprimée immédiatement sans prévenir ses auteurs.

Article 5 - Il est formallement interdit de concevoir des codes PHP spéciaux dont le but est de contourner un blocage de sécurité du WebOS.

Article 6 - Votre Application Web, une fois validée et en ligne, sera disponible en illimité et sans date de fin ; sauf si vous (développeurs/auteurs) décidez de nous écrire pour supprimer votre application.

Article 7 - Pour mettre à jour votre Application Web ; ré-herbegez votre application sous le même nom ; nous analyserons votre application dans les 72 heures et mettront à jour votre ZIP. Vous pouvez aussi les nommer différements si vous souhaitez garder vos anciennes Applications Web pour le publique.

Article 8 - Une application Web comportant le même nom ne pourra pas être remplacée automatiquement (par sécurité). L'hébergeur refusera par sécurité de remplacer des applications comportant le même nom.

Article 9 - Les archives RAR ne sont pas autorisées.

Article 10 - Dans votre archive ZIP contenant votre application veuillez à toujours avoir comme fichier d'amorçage un fichier appelé "index" au format HTML, HTM ou PHP.
Tout autres formats de contenu est autorisés.</textarea>
</div>
</div>

</body>
</html>