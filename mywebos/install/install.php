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
<link href="install.css" rel="stylesheet">
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
<div id="Layer1" style="position:absolute;text-align:center;left:40px;top:79px;width:856px;height:495px;z-index:7;">
<div id="Layer1_Container" style="width:854px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Procédure d'installation locale du WebOS Rynna" style="position:absolute;left:11px;top:10px;width:828px;height:25px;z-index:0;" disabled>
<div id="wb_MaterialIcon1" style="position:absolute;left:25px;top:50px;width:100px;height:100px;text-align:center;z-index:1;">
<div id="MaterialIcon1"><i class="material-icons">&#xe564;</i></div></div>
<div id="wb_Text1" style="position:absolute;left:165px;top:91px;width:642px;height:19px;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:17px;"><strong>ETAPE 1 - PRESENTATION DE L'INSTALLATEUR RAPIDE</strong></span></div>
<hr id="Line1" style="position:absolute;left:11px;top:150px;width:828px;z-index:3;">
<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:11px;top:169px;width:818px;height:245px;z-index:4;" rows="14" cols="133" readonly spellcheck="false">Bienvenue sur l'installateur contrôlé du WebOS Rynna !

Vous allez procéder à l'installation locale du WebOS sur votre serveur.

Avant tout vous devez disposer d'un serveur (FTP ou dédié) sous Windows, Linux, CPCDOS, NTK (WRK) ou encore MAC OSx et celui-ci doit supporter le PHP 5 et 7, CSS 3 ainsi qu'un système Apache pour une base de données en MySQLi.
Si vous n'avez pas de serveur prêt installé, merci d'en installer un avant de déployer votre propre WebOS à partir de cette procédure.

Les codes sources qui vous seront proposés dépendent de l'avancement du WebOS ; vous aurez plusieurs choix au moment venu mais sachez que la licence incluse sur le projet (GPL3) devra être formellement respectée.</textarea>
<input type="submit" id="Button1" onclick="window.location.href='./lshdyatrjk2op2.php';return false;" name="" value="Suivant" style="position:absolute;left:684px;top:450px;width:155px;height:25px;z-index:5;">
<input type="submit" id="Button3" onclick="window.location.href='./../inituser.php';return false;" name="" value="Précédent" style="position:absolute;left:11px;top:450px;width:155px;height:25px;z-index:6;">
</div>
</div>

</body>
</html>