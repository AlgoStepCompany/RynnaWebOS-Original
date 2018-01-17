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
<script src="jquery-3.2.1.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="wwb12.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#jQueryButton1").button({ icon: 'ui-icon-folder-collapsed', iconPosition: 'beginning' });
   $("#jQueryButton2").button({ icon: 'ui-icon-wrench', iconPosition: 'beginning' });
   $("#Layer2").stickylayer({orientation: 5, position: [0, 0], delay: 0});
   $("#Layer4").stickylayer({orientation: 5, position: [0, 0], delay: 0});
});
</script>
</head>
<body>
<div id="Layer1" style="position:absolute;text-align:center;left:88px;top:66px;width:536px;height:285px;z-index:5;">
<div id="Layer1_Container" style="width:534px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Choix d'ouverture de session" style="position:absolute;left:11px;top:10px;width:512px;height:25px;z-index:0;" disabled>
<div id="wb_Text1" style="position:absolute;left:20px;top:53px;width:494px;height:18px;text-align:center;z-index:1;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Quel type de session souhaitez-vous ouvrir ?</span></div>
<button type="button" id="jQueryButton1" onclick="window.location.href='./session.php';return false;" onmouseenter="ShowObject('Layer2', 1);ShowObject('Layer3', 0);ShowObject('Layer4', 0);return false;" onmouseleave="ShowObject('Layer2', 0);return false;" name="" value="Session normale (par défaut)" style="position:absolute;left:28px;top:90px;width:482px;height:40px;z-index:2;">Session normale (par défaut)</button>
<button type="button" id="jQueryButton2" onclick="window.location.href='./sessionmse.php';return false;" onmouseenter="ShowObject('Layer4', 1);ShowObject('Layer2', 0);ShowObject('Layer3', 0);return false;" onmouseleave="ShowObject('Layer4', 0);return false;" name="" value="Session allégée (mode sans echec)" style="position:absolute;left:28px;top:143px;width:482px;height:40px;z-index:3;">Session allégée (mode sans echec)</button>
<div id="wb_Logout1" style="position:absolute;left:28px;top:222px;width:480px;height:35px;z-index:4;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Annuler et retour arrière (se déconnecter)" id="Logout1">
</form>
</div>
</div>
</div>

<div id="Layer2" style="position:absolute;text-align:left;left:666px;top:265px;width:477px;height:184px;z-index:7;">
</div>
<script>
var wb_Timer1;
function TimerStartTimer1()
{
   wb_Timer1 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer2', 0);
      ShowObject('Layer3', 0);
      ShowObject('Layer4', 0);
   }, 25);
}
function TimerStopTimer1()
{
   clearTimeout(wb_Timer1);
}
TimerStartTimer1();
</script>

<div id="Layer4" style="position:absolute;text-align:left;left:666px;top:34px;width:477px;height:191px;z-index:9;">
</div>
</body>
</html>