<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<title>MULTIUSERS_KRNL</title>
<meta name="robots" content="INDEX, FOLLOW">
<link href="mint-choc/jquery.ui.all.css" rel="stylesheet">
<link href="Untitled1.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<script src="jquery-2.1.1.min.js"></script>
<script src="jquery.ui.core.min.js"></script>
<script src="jquery.ui.widget.min.js"></script>
<script src="jquery.ui.mouse.min.js"></script>
<script src="jquery.ui.button.min.js"></script>
<script src="jquery.ui.draggable.min.js"></script>
<script src="jquery.ui.position.min.js"></script>
<script src="jquery.ui.resizable.min.js"></script>
<script src="jquery.ui.dialog.min.js"></script>
<script src="jquery.ui.effect.min.js"></script>
<script src="jquery.ui.effect-pulsate.min.js"></script>
<script src="jquery.ui.effect-blind.min.js"></script>
<script src="jquery.ui.effect-bounce.min.js"></script>
<script src="jquery.ui.effect-clip.min.js"></script>
<script src="jquery.ui.effect-drop.min.js"></script>
<script src="jquery.ui.effect-explode.min.js"></script>
<script src="jquery.ui.effect-fade.min.js"></script>
<script src="jquery.ui.effect-fold.min.js"></script>
<script src="jquery.ui.effect-highlight.min.js"></script>
<script src="jquery.ui.effect-scale.min.js"></script>
<script src="jquery.ui.effect-shake.min.js"></script>
<script src="jquery.ui.effect-slide.min.js"></script>
<script src="wb.rotate.min.js"></script>
<script src="wwb10.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog1Opts =
   {
      width: 774,
      height: 220,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      show: 'pulsate',
      hide: 'pulsate',
      autoOpen: true
   };
   $("#jQueryDialog1").dialog(jQueryDialog1Opts);
});
</script>
</head>
<body onclick="Animate('wb_Text1', '', '', '', '', '0.5', 1500, '');return false;">
<div id="jQueryDialog1" style="z-index:1;" title="Service Multi-Session Utilisateurs">
<div id="wb_Text1" style="position:absolute;left:24px;top:30px;width:703px;height:114px;text-align:center;z-index:0;">
<span style="color:#FFFFFF;font-family:Arial;font-size:17px;"><strong>L'accès à la multi-session utilisateur secondaire est en cours de chargement.<br><br>Patienter quelques instants...<br><br>Durant votre session n'actualiser pas vos fenêtres, vous risquez de perdre le focus actuel.</strong></span></div>
</div>

<script>
var wb_Timer1;
function TimerStartTimer1()
{
   wb_Timer1 = setTimeout(function()
   {
      window.location.href='http://rynnawebos.fr/login/user2.php';
      $('#jQueryDialog1').dialog('close');
   }, 7420);
}
function TimerStopTimer1()
{
   clearTimeout(wb_Timer1);
}
TimerStartTimer1();
</script>

<script>
var wb_Timer2;
function TimerStartTimer2()
{
   wb_Timer2 = setInterval(function()
   {
      Toggle('jQueryDialog1', 'highlight', 500);
   }, 1000);
}
function TimerStopTimer2()
{
   clearInterval(wb_Timer2);
}
TimerStartTimer2();
</script>

</body>
</html>