<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="errormailstats.css" rel="stylesheet">
<script src="jquery-3.1.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog1Options =
   {
      width: 572,
      height: 161,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
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
<div id="jQueryDialog1" style="z-index:2;" title="Erreur !">
<input type="submit" id="Button1" onclick="window.location.href='./passwdperdu.php';return false;" name="" value="Recommencer" style="position:absolute;left:207px;top:73px;width:157px;height:25px;z-index:0;">
<div id="wb_Text1" style="position:absolute;left:11px;top:15px;width:535px;height:16px;z-index:1;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Désolé, impossible de trouver l'adresse mail que vous avez indiqué. Merci de réessayer.</span></div>
</div>

</body>
</html>