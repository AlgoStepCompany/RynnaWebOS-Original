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
<link href="font-awesome.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="terminated.css" rel="stylesheet">
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
<div id="Layer1" style="position:absolute;text-align:center;left:40px;top:79px;width:856px;height:495px;z-index:6;">
<div id="Layer1_Container" style="width:854px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Procédure d'installation locale du WebOS Rynna" style="position:absolute;left:11px;top:10px;width:828px;height:25px;z-index:0;" disabled>
<div id="wb_MaterialIcon1" style="position:absolute;left:25px;top:50px;width:100px;height:100px;text-align:center;z-index:1;">
<div id="MaterialIcon1"><i class="material-icons">&#xe564;</i></div></div>
<div id="wb_Text1" style="position:absolute;left:165px;top:91px;width:642px;height:19px;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:17px;"><strong>ETAPE 4 - REPARAMETRAGE ET CHARGEMENT DEFAUT</strong></span></div>
<hr id="Line1" style="position:absolute;left:11px;top:150px;width:828px;z-index:3;">
<div id="wb_Text2" style="position:absolute;left:11px;top:174px;width:828px;height:18px;text-align:center;z-index:4;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Patienter quelques instants merci . . .</span></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:375px;top:282px;width:100px;height:100px;text-align:center;z-index:5;">
<div id="FontAwesomeIcon1"><i class="fa fa-hourglass-start">&nbsp;</i></div></div>
</div>
</div>

<script>
var wb_Timer1;
function TimerStartTimer1()
{
   wb_Timer1 = setTimeout(function()
   {
      var event = null;
      window.location.href='./../inituser.php';
   }, 10000);
}
function TimerStopTimer1()
{
   clearTimeout(wb_Timer1);
}
TimerStartTimer1();
</script>

</body>
</html>