<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./../refused.php');
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
      header('Location: ./../refused.php');
      exit;
   }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="wordpad.css" rel="stylesheet">
</head>
<body>
<div id="Layer1" style="position:fixed;overflow:auto;text-align:left;left:0;top:0;right:0;bottom:0;z-index:2;">
<div id="wb_Flash1" style="position:absolute;left:8px;top:9px;width:689px;height:642px;z-index:0;">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="100%" height="100%" id="Flash1">
<param name="movie" value="wordpad.swf">
<param name="quality" value="High">
<param name="scale" value="ShowAll">
<param name="wmode" value="Transparent">
<param name="play" value="true">
<param name="loop" value="false">
<param name="menu" value="false">
<param name="allowfullscreen" value="false">
<param name="allowscriptaccess" value="sameDomain">
<param name="sAlign" value="tl">
<embed src="wordpad.swf" width="100%" height="100%" quality="High" wmode="Transparent" loop="false" play="true" menu="false" allowfullscreen="false" allowscriptaccess="sameDomain" scale="ShowAll" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflash">
</embed>
</object>
</div>

</div>
</body>
</html>