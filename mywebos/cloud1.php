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
<link href="cloud1.css" rel="stylesheet">
</head>
<body>
<div id="Layer1" style="position:fixed;text-align:center;left:50%;margin-left:-340px;top:50%;margin-top:-203px;width:679px;height:404px;z-index:3;">
<div id="Layer1_Container" style="width:677px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Procédure d'envoi en ligne (Cloud) de votre application Web public" style="position:absolute;left:11px;top:10px;width:651px;height:25px;z-index:0;" disabled>
<div id="wb_Text1" style="position:absolute;left:16px;top:53px;width:646px;height:312px;z-index:1;">
<span style="color:#0000FF;font-family:Arial;font-size:16px;"><strong>Bienvenue développeur !<br></strong></span><span style="color:#000000;font-family:Arial;font-size:16px;"><br>Cette fenêtre vous permet de proposer librement des applications Web de votre propre création, quelle que soit leurs tailles, leurs contenus et les services que vous proposez.<br><br>Vous avez conçu une calculatrice scientifique ? <br>Un Générateur de mots de passe ?<br><br></span><span style="color:#FF4500;font-family:Arial;font-size:16px;">La seule condition est de vous munir d'une <strong>application au format Web</strong> ( .Php ; .Css ; .Html ; .Htm ; .Txt ; .Js ; etc.....) compressé au format <strong>ZIP</strong><br>Vous devrez également vous munir d'une image .<strong>PNG </strong>d'une taille de 100X100 ; cette image servira d'icone pour votre application sur la bibliothèque public Cloud du serveur.<br>Et pour finir vous devrez également insérer un fichier .<strong>TXT </strong>(texte) qui servira de fichier de description et/ou de licence pour votre Application Web.</span><span style="color:#000000;font-family:Arial;font-size:16px;"><br><br>Si vous êtes prêt à continuer : cliquez sur &quot;<strong>Suivant</strong>&quot;.<br>Sinon quitter cette fenêtre.</span></div>
<input type="submit" id="Button1" onclick="window.location.href='./clouddroits.php';return false;" name="" value="Suivant" style="position:absolute;left:513px;top:364px;width:141px;height:25px;z-index:2;">
</div>
</div>

</body>
</html>