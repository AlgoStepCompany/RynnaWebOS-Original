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
<link href="cloud6.css" rel="stylesheet">
</head>
<body>
<div id="Layer1" style="position:fixed;text-align:center;left:50%;margin-left:-350px;top:50%;margin-top:-208px;width:699px;height:414px;z-index:5;">
<div id="Layer1_Container" style="width:697px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Procédure d'envoi en ligne (Cloud) de votre application Web public" style="position:absolute;left:16px;top:10px;width:661px;height:25px;z-index:0;" disabled>
<div id="wb_Text1" style="position:absolute;left:16px;top:53px;width:661px;height:19px;z-index:1;">
<span style="color:#0000FF;font-family:Arial;font-size:16px;"><strong>Etape finale : vérification de votre application en ligne !</strong></span></div>
<input type="submit" id="Button3" onclick="window.location.href='./cloud5.php';return false;" name="" value="Retour arrière" style="position:absolute;left:21px;top:376px;width:181px;height:25px;z-index:2;">
<div id="wb_Text2" style="position:absolute;left:16px;top:81px;width:661px;height:64px;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Voyez vous votre application ?<br><br>Si OUI vous pouvez fermer cette fenêtre ! Votre application est désormais en ligne !<br>Si NON une erreur est possible... réessayer en revenant en arrière (bouton &quot;Retour arrière&quot;).</span></div>
<div id="Html1" style="position:absolute;left:16px;top:157px;width:661px;height:204px;z-index:4">
<object name="cloudappstestk1" data="cloudappstest.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object></div>
</div>
</div>

</body>
</html>