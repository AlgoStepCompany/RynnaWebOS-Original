<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="logoutuser.css" rel="stylesheet">
<script src="jquery-3.1.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog1Options =
   {
      width: 440,
      height: 155,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      show: 'highlight',
      hide: 'highlight',
      autoOpen: true,
      classes: { 'ui-dialog': 'jQueryDialog1'} 
   };
   $("#jQueryDialog1").dialog(jQueryDialog1Options);
});
</script>
</head>
<body>
<div id="jQueryDialog1" style="z-index:2;" title="Deconnexion en cours...">
<div id="wb_Text1" style="position:absolute;left:7px;top:9px;width:414px;height:32px;text-align:justify;z-index:0;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Déconnexion et vidage mémoire en cours de votre session. Ne pas réactualiser la page...</span></div>
<hr id="Line1" style="position:absolute;left:217px;top:64px;width:2px;height:30px;z-index:1;">
</div>

<script>
var wb_Timer1;
function TimerStartTimer1()
{
   wb_Timer1 = setTimeout(function()
   {
      var event = null;
      window.location.href='./index.php';
   }, 3000);
}
function TimerStopTimer1()
{
   clearTimeout(wb_Timer1);
}
TimerStartTimer1();
</script>

</body>
</html>