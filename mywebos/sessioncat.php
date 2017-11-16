<?php
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
?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="sessioncat.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 9, position: [0, 0], delay: 1});
});
</script>
</head>
<body>
<div id="Layer1" style="position:absolute;text-align:center;left:23px;top:25px;width:797px;height:507px;z-index:3;">
<div id="Layer1_Container" style="width:795px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text1" style="position:absolute;left:11px;top:14px;width:766px;height:68px;z-index:0;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">Catalogue liste (session Rynna WebOS) :<br>(CommandLine) - Utilisable en cas de problème d'affichage en mode fenêtré (IUG).<br><br>&gt; Indiquer votre commande ci-dessous pour accéder directement à la page demandé pour effectuer vos tests :</span></div>
<div id="wb_Logout1" style="position:absolute;left:591px;top:471px;width:184px;height:23px;z-index:1;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Fermer le Catalogue" id="Logout1">
</form>
</div>
<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:16px;top:101px;width:764px;height:350px;z-index:2;" rows="22" cols="149" spellcheck="false">EN DEVELOPPEMENT
</textarea>
</div>
</div>

</body>
</html>