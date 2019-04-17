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
<link href="cloud2.css" rel="stylesheet">
</head>
<body>
<div id="Layer1" style="position:fixed;text-align:center;left:50%;margin-left:-340px;top:50%;margin-top:-208px;width:679px;height:414px;z-index:5;">
<div id="Layer1_Container" style="width:677px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Procédure d'envoi en ligne (Cloud) de votre application Web public" style="position:absolute;left:11px;top:10px;width:651px;height:25px;z-index:0;" disabled>
<div id="wb_Text1" style="position:absolute;left:16px;top:53px;width:646px;height:19px;z-index:1;">
<span style="color:#0000FF;font-family:Arial;font-size:16px;"><strong>Etape 1 - Vérification de votre Application Web.</strong></span></div>
<input type="submit" id="Button1" onclick="window.location.href='./cloud3.php';return false;" name="" value="Je confirme !" style="position:absolute;left:473px;top:376px;width:181px;height:25px;z-index:2;">
<div id="wb_Text2" style="position:absolute;left:21px;top:89px;width:633px;height:272px;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Vérifions ensemble votre application.<br><br>1 - Elle doit être placé dans un dossier compressé (ZIP) comportant le nom de votre application.<br>Si celle-ci s'appel &quot;MEDIA&quot; par exemple, le dossier contenant votre application doit s'appeler &quot;MEDIA.zip&quot;<br><br>2 - Vous devez avoir en votre possession une image (qui servira de logo) de votre Application, elle doit être au format PNG et ne pas dépasser 100x100 pixel.<br></span><span style="color:#DC143C;font-family:Arial;font-size:13px;">Cette image doit se nommer pareillement que votre dossier !<br></span><span style="color:#000000;font-family:Arial;font-size:13px;"><br>3 - Vous devez avoir en votre possession un fichier texte avec une description de votre projet, il doit être au format TXT.<br></span><span style="color:#DC143C;font-family:Arial;font-size:13px;">Ce fichier doit se nommer pareillement que votre dossier !</span><span style="color:#000000;font-family:Arial;font-size:13px;"><br><br>4 - L'image PNG et le fichier texte TXT ne doivent pas être placé dans le dossier de votre Application.<br><br>5 - Récapitulation <em>en prenant comme exemple &quot;MEDIA&quot;</em>&nbsp; ; vous devriez avoir un ZIP &quot;MEDIA.zip&quot; avec une image &quot;MEDIA.PNG&quot; et un fichier texte &quot;MEDIA.TXT&quot;.</span></div>
<input type="submit" id="Button3" onclick="window.location.href='./cloudstop.php';return false;" name="" value="Non ce n'est pas le cas..." style="position:absolute;left:16px;top:376px;width:181px;height:25px;z-index:4;">
</div>
</div>

</body>
</html>