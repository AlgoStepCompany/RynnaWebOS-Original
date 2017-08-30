<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./../loginusers.php');
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
      header('Location: ./../loginusers.php');
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
<link href="amazon.css" rel="stylesheet">
</head>
<body>
<div id="Layer1" style="position:fixed;overflow:auto;text-align:left;left:0;top:0;right:0;bottom:0;z-index:1;">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="https://www.amazon.fr/">
</iframe><br />
</div>

</body>
</html>