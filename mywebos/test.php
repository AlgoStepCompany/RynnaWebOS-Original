<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="test.css" rel="stylesheet">
<script src="jquery-3.3.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Dialog1").dialog(
   {
      title: 'Test JQuery Dialog JQuery 2018-2019',
      width: 271,
      height: 300,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: false,
      hide: false,
      autoOpen: true,
      classes: {'ui-dialog': 'Dialog1'} 
   });
});
</script>
</head>
<body>
<div id="Dialog1" style="z-index:1;">
<div id="wb_RadioButton1" style="position:absolute;left:26px;top:16px;width:219px;height:214px;z-index:0;">
<input type="radio" id="RadioButton1" name="Name" value="on" checked style="position:absolute;left:0;top:0;"><label for="RadioButton1"></label></div>
</div>

</body>
</html>