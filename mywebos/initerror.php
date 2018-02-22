<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./index.php');
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
      header('Location: ./index.php');
      exit;
   }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'logoutform')
{
   if (session_id() == "")
   {
      session_start();
   }
   unset($_SESSION['username']);
   unset($_SESSION['fullname']);
   header('Location: ./index.php');
   exit;
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="initerror.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#jQueryButton1").button({ icon: 'ui-icon-play', iconPosition: 'beginning' });
});
</script>
</head>
<body>
<div id="Layer1" style="position:absolute;text-align:center;left:18px;top:74px;width:536px;height:301px;z-index:4;">
<div id="Layer1_Container" style="width:534px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Choix d'ouverture de session" style="position:absolute;left:11px;top:10px;width:512px;height:25px;z-index:0;" disabled>
<button type="button" id="jQueryButton1" onclick="window.location.href='./session.php';return false;" name="" value="LIVE SESSION" style="position:absolute;left:26px;top:172px;width:482px;height:40px;z-index:1;">LIVE SESSION</button>
<div id="wb_Logout1" style="position:absolute;left:28px;top:235px;width:480px;height:35px;z-index:2;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Annuler et retour arrière (se déconnecter)" id="Logout1">
</form>
</div>
<div id="wb_Text1" style="position:absolute;left:14px;top:51px;width:509px;height:91px;text-align:center;z-index:3;">
<span style="color:#FF0000;font-family:Arial;font-size:16px;"><strong>AVERTISSEMENT</strong> : votre résolution actuelle est inférieur à 1180X720, en conséquance il est possible que la session du WebOS ne s'affiche pas correctement !<br>Vous pouvez tout de même accéder à votre session normale mais nous vous conseillons d'augmenter votre résolution d'écran.</span></div>
</div>
</div>

</body>
</html>