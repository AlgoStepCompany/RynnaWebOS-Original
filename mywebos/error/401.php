<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="401.css" rel="stylesheet">
<script src="jquery-3.3.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog2Options =
   {
      width: 629,
      height: 287,
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
<div id="jQueryDialog2" style="z-index:2;" title="Erreur g&#233;n&#233;rale">
<div id="wb_Text2" style="position:absolute;left:25px;top:141px;width:576px;height:57px;z-index:0;">
<span style="color:#000000;font-family:Arial;font-size:16px;"><strong>Une authentification est nécessaire pour accéder à la ressource demandée.<br><br>ERREUR CLIENT-USER (401)</strong></span></div>
<div id="wb_FontAwesomeIcon2" style="position:absolute;left:264px;top:27px;width:100px;height:100px;text-align:center;z-index:1;">
<div id="FontAwesomeIcon2"><i class="fa fa-times-circle">&nbsp;</i></div></div>
</div>

</body>
</html>