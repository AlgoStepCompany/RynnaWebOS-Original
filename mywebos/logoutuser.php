<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="logoutuser.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Layer2").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer3").stickylayer({orientation: 7, position: [0, 0], delay: 0});
});
</script>
</head>
<body>
<script>
var wb_Timer1;
function TimerStartTimer1()
{
   wb_Timer1 = setTimeout(function()
   {
      var event = null;
      window.location.href='./index.php';
   }, 4000);
}
function TimerStopTimer1()
{
   clearTimeout(wb_Timer1);
}
TimerStartTimer1();
</script>

<div id="Layer1" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:5;">
<div id="Layer2" style="position:absolute;text-align:left;left:297px;top:166px;width:516px;height:347px;z-index:1;">
</div>
<div id="Layer3" style="position:absolute;text-align:left;left:250px;top:594px;width:610px;height:92px;z-index:2;">
<div id="wb_Text1" style="position:absolute;left:31px;top:28px;width:549px;height:37px;text-align:center;z-index:0;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;"><strong>Fermeture de votre session en cours.<br><em>Patienter...</em></strong></span></div>
</div>
</div>
</body>
</html>
