<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./infosmobile.html');
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
      header('Location: ./infosmobile.html');
      exit;
   }
}
if (session_id() == "")
{
   session_start();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Session Mobile</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="classic/jquery.mobile.theme-1.4.5.css" rel="stylesheet">
<link href="classic/jquery.mobile.icons-1.4.5.min.css" rel="stylesheet">
<link href="jquery.mobile.structure-1.4.5.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="RynnaWebOS_mobile.css" rel="stylesheet">
<link href="sessionmobile.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script>
$(document).on("mobileinit", function()
{
   $.mobile.ajaxEnabled = false;
   $.mobile.defaultPageTransition = "slide";
});
</script>
<script src="jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<div data-role="page" data-theme="b" data-title="Session Mobile" id="sessionmobile">
<div class="ui-content" role="main">
<div id="wb_JavaScript1">
<div style="color:#FFFFFF;font-size:12px;font-family:Arial;font-weight:normal;font-style:normal;text-align:center;text-decoration:none" id="basicclock"></div>
<script>
function clock() 
{
   var digital = new Date();
   var hours = digital.getHours();
   var minutes = digital.getMinutes();
   var seconds = digital.getSeconds();
   if (minutes <= 9) minutes = "0" + minutes;
   if (seconds <= 9) seconds = "0" + seconds;
   dispTime = hours + ":" + minutes + ":" + seconds;

   var basicclock = document.getElementById('basicclock');
   basicclock.innerHTML = dispTime;
   setTimeout("clock()", 1000);
}
clock();
</script>

</div>
<hr id="Line1" style="">
<div id="wb_FontAwesomeIcon1" style="text-align:center;">
<a href="./sessionmobile.php"><div id="FontAwesomeIcon1"><i class="fa fa-home">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon2" style="text-align:center;">
<a href="./../addeosapps/uploadsms.php"><div id="FontAwesomeIcon2"><i class="fa fa-cloud-upload">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon3" style="text-align:center;">
<a href="./../addeosapps/ebook.php"><div id="FontAwesomeIcon3"><i class="fa fa-book">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon4" style="text-align:center;">
<a href="https://github.com"><div id="FontAwesomeIcon4"><i class="fa fa-git">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon5" style="text-align:center;">
<a href="./../addeosapps/fargo.php"><div id="FontAwesomeIcon5"><i class="fa fa-paint-brush">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon6" style="text-align:center;">
<a href="https://www.google.fr/maps"><div id="FontAwesomeIcon6"><i class="fa fa-map-marker">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon7" style="text-align:center;">
<a href="./../addeosapps/navigateur.php"><div id="FontAwesomeIcon7"><i class="fa fa-edge">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon8" style="text-align:center;">
<a href="./../addeosapps/wikipedia.php"><div id="FontAwesomeIcon8"><i class="fa fa-wikipedia-w">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon9" style="text-align:center;">
<a href="./../addeosapps/lemonde.php"><div id="FontAwesomeIcon9"><i class="fa fa-wpexplorer">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon10" style="text-align:center;">
<a href="./../addeosapps/sncf.php"><div id="FontAwesomeIcon10"><i class="fa fa-train">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon11" style="text-align:center;">
<a href="./../addeosapps/devise.php"><div id="FontAwesomeIcon11"><i class="fa fa-euro">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon12" style="text-align:center;">
<a href="./../addeosapps/meteo.php"><div id="FontAwesomeIcon12"><i class="fa fa-snowflake-o">&nbsp;</i></div></a></div>
<hr id="Line2" style="">
<input type="button" id="Button1" onclick="window.location.href='./mobilelogin.php';return false;" name="" value="Deconnexion">

<div id="wb_LoginName1" style="text-align:center;">
<span id="LoginName1">Bienvenue <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['username'];
}
else
{
   echo 'Not logged in';
}
?>, navigation rapide disponible !</span></div>
</div>
</div>
</body>
</html>