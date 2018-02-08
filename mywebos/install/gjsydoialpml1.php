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
<link href="gjsydoialpml1.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 9, position: [0, 0], delay: 0});
});
</script>
</head>
<body>
<div id="Layer1" style="position:absolute;text-align:center;left:40px;top:79px;width:856px;height:495px;z-index:12;">
<div id="Layer1_Container" style="width:854px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Procédure d'installation locale du WebOS Rynna" style="position:absolute;left:11px;top:10px;width:828px;height:25px;z-index:0;" disabled>
<div id="wb_MaterialIcon1" style="position:absolute;left:25px;top:50px;width:100px;height:100px;text-align:center;z-index:1;">
<div id="MaterialIcon1"><i class="material-icons">&#xe564;</i></div></div>
<div id="wb_Text1" style="position:absolute;left:165px;top:91px;width:642px;height:19px;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:17px;"><strong>ETAPE 2 - PARAMETRAGE RAPIDE DE VOTRE SERVEUR</strong></span></div>
<hr id="Line1" style="position:absolute;left:11px;top:150px;width:828px;z-index:3;">
<input type="submit" id="Button1" onclick="window.location.href='./lshdyatrjk2op2.php';return false;" name="" value="Suivant" style="position:absolute;left:684px;top:450px;width:155px;height:25px;z-index:4;">
<input type="submit" id="Button3" onclick="window.location.href='./install.php';return false;" name="" value="Précédent" style="position:absolute;left:11px;top:450px;width:155px;height:25px;z-index:5;">
<div id="wb_Text2" style="position:absolute;left:11px;top:174px;width:828px;height:16px;z-index:6;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Merci de remplir les champs suivants :</span></div>
<div id="wb_Text3" style="position:absolute;left:25px;top:215px;width:174px;height:112px;z-index:7;">
<span style="color:#000000;font-family:Arial;font-size:13px;">SERVEUR :<br><br>VOTRE PSEUDONYME : <br><br>PORT DEFAUT WEBOS : <br><br>SERVICES WEB ACCESS :</span></div>
<input type="text" id="Editbox1" style="position:absolute;left:235px;top:207px;width:173px;height:16px;line-height:16px;z-index:8;" name="Editbox1" value="127.0.0.1" maxlength="15" spellcheck="false">
<input type="text" id="Editbox2" style="position:absolute;left:235px;top:242px;width:173px;height:16px;line-height:16px;z-index:9;" name="Editbox1" value="" maxlength="60" spellcheck="false">
<input type="text" id="Editbox3" style="position:absolute;left:235px;top:276px;width:173px;height:16px;line-height:16px;z-index:10;" name="Editbox1" value="80;443" spellcheck="false">
<div id="wb_Checkbox1" style="position:absolute;left:234px;top:316px;width:41px;height:20px;z-index:11;">
<input type="checkbox" id="Checkbox1" name="Checkbox1" value="" checked style="position:absolute;left:0;top:0;"><label for="Checkbox1"></label></div>
</div>
</div>

</body>
</html>