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
<link href="inituser.css" rel="stylesheet">
<script src="jquery-3.3.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script>
$(document).ready(function()
{
   $("#jQueryButton1").button({ icon: 'ui-icon-play', iconPosition: 'beginning' });
   $("#ThemeableButton1").button({ icon: 'ui-icon-wrench', iconPosition: 'beginning' });
});
</script>
</head>
<body>
<div id="Layer1" style="position:fixed;text-align:center;left:50%;margin-left:-269px;top:50%;margin-top:-126px;width:536px;height:250px;z-index:4;">
<div id="Layer1_Container" style="width:534px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Choix d'ouverture de session" style="position:absolute;left:11px;top:10px;width:512px;height:25px;z-index:0;" disabled>
<button type="button" id="jQueryButton1" onclick="window.location.href='./session.php';return false;" name="" value="SESSION NORMALE" style="position:absolute;left:28px;top:57px;width:482px;height:40px;z-index:1;cursor: pointer;">SESSION NORMALE</button>
<div id="wb_Logout1" style="position:absolute;left:28px;top:190px;width:480px;height:35px;z-index:2;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Annuler et retour arrière (se déconnecter)" id="Logout1">
</form>
</div>
<button type="button" id="ThemeableButton1" onclick="alert('Cette fonction n est plus disponible pour le moment');return false;" name="" value="SESSION ALLEGEE" style="position:absolute;left:28px;top:111px;width:482px;height:40px;z-index:3;cursor: pointer;" disabled>SESSION ALLEGEE</button>
</div>
</div>

<div id="Html1" style="position:absolute;left:47px;top:345px;width:100px;height:100px;z-index:6">
<script>
if (screen.width <= 1180)
{
   window.location = 'initerror.php';
}
else
{

}
</script></div>
</body>
</html>