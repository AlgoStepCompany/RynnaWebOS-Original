<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./../index.php');
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
      header('Location: ./../index.php');
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
<link href="lshdyatrjk2op2.css" rel="stylesheet">
<script src="jquery-3.3.1.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 9, position: [0, 0], delay: 0});
});
</script>
</head>
<body>
<div id="Layer1" style="position:absolute;text-align:center;left:40px;top:79px;width:856px;height:495px;z-index:16;">
<div id="Layer1_Container" style="width:854px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Procédure d'installation locale du WebOS Rynna" style="position:absolute;left:11px;top:10px;width:828px;height:25px;z-index:0;" disabled>
<div id="wb_MaterialIcon1" style="position:absolute;left:25px;top:50px;width:100px;height:100px;text-align:center;z-index:1;">
<div id="MaterialIcon1"><i class="material-icons">&#xe564;</i></div></div>
<div id="wb_Text1" style="position:absolute;left:165px;top:91px;width:642px;height:19px;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:17px;"><strong>ETAPE 2 - INSTALLATION DU CODE SOURCE SUR VOTRE SERVEUR</strong></span></div>
<hr id="Line1" style="position:absolute;left:11px;top:150px;width:828px;z-index:3;">
<input type="submit" id="Button1" onclick="window.location.href='./terminated.php';return false;" name="" value="Terminé" style="position:absolute;left:684px;top:450px;width:155px;height:25px;z-index:4;">
<input type="submit" id="Button3" onclick="window.location.href='./install.php';return false;" name="" value="Précédent" style="position:absolute;left:11px;top:450px;width:155px;height:25px;z-index:5;">
<div id="wb_Text2" style="position:absolute;left:11px;top:174px;width:828px;height:16px;z-index:6;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Choisissez la version que vous souhaitez : </span></div>
<div id="wb_Text3" style="position:absolute;left:46px;top:222px;width:193px;height:54px;text-align:center;z-index:7;">
<span style="color:#FF9615;font-family:Arial;font-size:15px;"><strong>DERNIERE VERSION EN COURS DE DEVELOPPEMENT</strong></span></div>
<div id="wb_Text4" style="position:absolute;left:320px;top:220px;width:193px;height:36px;text-align:center;z-index:8;">
<span style="color:#FF9615;font-family:Arial;font-size:15px;"><strong>DERNIERE VERSION STABLE FIXE</strong></span></div>
<div id="wb_Text5" style="position:absolute;left:614px;top:220px;width:193px;height:36px;text-align:center;z-index:9;">
<span style="color:#FF9615;font-family:Arial;font-size:15px;"><strong>VERSION STABLE FIXE PRECEDENTE</strong></span></div>
<input type="submit" id="Button4" onclick="window.location.href='https://github.com/AlgoStepCompany/RynnaWebOS-Original/archive/master.zip';return false;" name="" value="TELECHARGER" style="position:absolute;left:69px;top:308px;width:142px;height:91px;z-index:10;">
<input type="submit" id="Button5" onclick="alert('revenez a 16H15 ce 29 Mars !');return false;" name="" value="VERSION 40.0 (CRIMERIA)" style="position:absolute;left:307px;top:308px;width:219px;height:91px;z-index:11;">
<input type="submit" id="Button6" onclick="window.location.href='https://github.com/AlgoStepCompany/RynnaWebOS-Original/archive/v30.0-Vegasis.zip';return false;" name="" value="VERSION 30.0 (VEGASIS)" style="position:absolute;left:601px;top:308px;width:219px;height:91px;z-index:12;">
<div id="wb_Text6" style="position:absolute;left:69px;top:407px;width:142px;height:24px;text-align:center;z-index:13;">
<span style="color:#000000;font-family:Arial;font-size:9.3px;"><em>Cette version peut être considérée comme instable</em></span></div>
<hr id="Line2" style="position:absolute;left:266px;top:215px;width:1px;z-index:14;">
<hr id="Line3" style="position:absolute;left:569px;top:215px;width:1px;z-index:15;">
</div>
</div>

</body>
</html>