<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="kernel.css" rel="stylesheet">
<script src="jquery-3.1.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog2Options =
   {
      width: 631,
      height: 639,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      autoOpen: true,
      classes: { 'ui-dialog': 'jQueryDialog2'} 
   };
   $("#jQueryDialog2").dialog(jQueryDialog2Options);
});
</script>
</head>
<body>
<div id="jQueryDialog2" style="z-index:3;" title="Erreur g&#233;n&#233;rale irr&#233;cup&#233;rrable">
<input type="submit" id="Button2" onclick="window.location.href='./../session.php';return false;" name="" value="Revenir sur la session (si non connecté, retour login)" style="position:absolute;left:26px;top:21px;width:576px;height:25px;z-index:0;">
<div id="wb_Text2" style="position:absolute;left:25px;top:167px;width:576px;height:394px;z-index:1;">
<span style="color:#000000;font-family:Arial;font-size:16px;"><strong>Erreur interne irrécupérrable lié au système.<br>Code d'erreur : KERNEL_IO<br><br>Cette erreur peut venir de plusieurs choses :<br></strong></span><span style="color:#000000;font-family:Arial;font-size:13px;"><br>- Problème de mémoire RAM sur le serveur<br>- Problème de comportement du processeur sur le serveur<br>- Problème de Drivers/Pilotes sur le serveur<br>- Problème de bibliothèque générique interne du serveur (dism /ScanHealth PowerShell sur Windows côté serveur nécessaire)<br>- Problème lié au service Web qui gère l'affichage et les connexions en PHP 7 sur le serveur<br><br></span><span style="color:#000000;font-family:Arial;font-size:16px;"><strong>En aucun cas ce problème ne viens de vous (côté client).<br>Nous vous invitons à contacter d'urgence l'Administrateur du serveur pour l'informer du problème (car celui-ci peut impacter le serveur lui même).<br><br>Pour votre sécurité nous rappelons que ce WebOS (serveur complet http://rynnawebos.fr) est sauvegardé tout les 15 jours (sauvegarde des données sur un autre serveur de secours).<br>Nous ne savons cependant pas comment d'autres Administrateurs (utilisant ce WebOS via le code source publié gratuitement) sauvegarde le serveur (si vous utilisez ce WebOS via une autre adresse internet).</strong></span></div>
<div id="wb_FontAwesomeIcon2" style="position:absolute;left:247px;top:55px;width:135px;height:100px;text-align:center;z-index:2;">
<div id="FontAwesomeIcon2"><i class="fa fa-connectdevelop">&nbsp;</i></div></div>
</div>

</body>
</html>