<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="504.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog2Options =
   {
      width: 631,
      height: 335,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      autoOpen: true,
      classes: { 'ui-dialog': 'jQueryDialog2'} 
   };
   $("#jQueryDialog2").dialog(jQueryDialog2Options);
});
</script>
</head>
<body>
<div id="jQueryDialog2" style="z-index:3;" title="Erreur g&#233;n&#233;rale">
<input type="submit" id="Button2" onclick="window.location.href='./../session.php';return false;" name="" value="Revenir sur la session (si non connecté, retour login)" style="position:absolute;left:26px;top:21px;width:576px;height:25px;z-index:0;">
<div id="wb_Text2" style="position:absolute;left:25px;top:167px;width:576px;height:57px;z-index:1;">
<span style="color:#000000;font-family:Arial;font-size:16px;"><strong>Temps d'attente d'un serveur intermédiaire écoulé.<br><br>ERREUR SERVEUR INTERNE ou ESPACE WEBOS (504)</strong></span></div>
<div id="wb_FontAwesomeIcon2" style="position:absolute;left:264px;top:56px;width:100px;height:100px;text-align:center;z-index:2;">
<div id="FontAwesomeIcon2"><i class="fa fa-times-circle">&nbsp;</i></div></div>
</div>

</body>
</html>