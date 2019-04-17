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
<link href="cloud3.css" rel="stylesheet">
<script src="jquery-3.3.1.min.js"></script>
<script src="wb.fileuploader.min.js"></script>
<script>
$(document).ready(function()
{
$('#wb_Extension1').FileUploader({ headings: ['Nom', 'Taille', 'Vider la liste'], script: 'cloud3_app_txt.php' });
});
</script>
</head>
<body>
<div id="Layer1" style="position:fixed;text-align:center;left:50%;margin-left:-340px;top:50%;margin-top:-208px;width:679px;height:414px;z-index:6;">
<div id="Layer1_Container" style="width:677px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Procédure d'envoi en ligne (Cloud) de votre application Web public" style="position:absolute;left:11px;top:10px;width:651px;height:25px;z-index:0;" disabled>
<div id="wb_Text1" style="position:absolute;left:16px;top:53px;width:646px;height:19px;z-index:1;">
<span style="color:#0000FF;font-family:Arial;font-size:16px;"><strong>Etape 2 - Hébergement du fichier texte de description (.txt)</strong></span></div>
<input type="submit" id="Button1" onclick="window.location.href='./cloud4.php';return false;" name="" value="J'ai déposé, Suivant !" style="position:absolute;left:364px;top:376px;width:290px;height:25px;z-index:2;">
<div id="wb_Text2" style="position:absolute;left:21px;top:89px;width:633px;height:16px;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Choisissez maintenant le fichier de description (format .Txt) à héberger sur le Cloud Applicatif Web Public :</span></div>
<input type="submit" id="Button3" onclick="window.location.href='./cloud2.php';return false;" name="" value="Retour arrière" style="position:absolute;left:21px;top:376px;width:181px;height:25px;z-index:4;">
<div id="wb_Extension1" style="position:absolute;left:21px;top:119px;width:633px;height:212px;z-index:5;">
<div id="Extension1">
<div class="upload-drop-target"><h2>Glisser et déposer votre fichier de description TXT ici (format .TXT)</h2></div>
<input type="file" multiple="">
<div class="upload-selected"></div>
<a class="button upload-choose" href="#">Choisir le fichier sur le disque dur local</a>
<a class="button upload-submit" href="#">Envoyer</a>
</div>
</div>
</div>
</div>

</body>
</html>