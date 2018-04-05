<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./index.php');
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
      header('Location: ./index.php');
      exit;
   }
}
$users = array("root"); // Changer le nom root par le nom de compte Administrateur avec autorisation d'accès à ce fichier !
if (!in_array($_SESSION['username'], $users))
{
   header('Location: ./index.php');
   exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'logoutform')
{
   if (session_id() == "")
   {
      session_start();
   }
   unset($_SESSION['username']);
   unset($_SESSION['fullname']);
   header('Location: ./index.php');
   exit;
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>ServerManager</title>
<meta name="author" content="AlgoStep Company">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 day">
<meta name="expires" content="Fri, 06 Apr 2018 16:24:51 GMT">
<meta name="generator" content="AlgoStep Company - ServerManager">
<link href="base/jquery-ui.min.css" rel="stylesheet">
<link href="ServerManager.css" rel="stylesheet">
<link href="mgmtadmin.css" rel="stylesheet">
<script src="jquery-3.3.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="wwb12.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog2Options =
   {
      width: 1153,
      height: 709,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog2'} 
   };
   $("#jQueryDialog2").dialog(jQueryDialog2Options);
   var jQueryDialog3Options =
   {
      width: 1121,
      height: 684,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog3'} 
   };
   $("#jQueryDialog3").dialog(jQueryDialog3Options);
   var jQueryDialog4Options =
   {
      width: 1090,
      height: 694,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog4'} 
   };
   $("#jQueryDialog4").dialog(jQueryDialog4Options);
   var jQueryDialog1Options =
   {
      width: 1090,
      height: 705,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog1'} 
   };
   $("#jQueryDialog1").dialog(jQueryDialog1Options);
   var jQueryDialog5Options =
   {
      width: 862,
      height: 588,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog5'} 
   };
   $("#jQueryDialog5").dialog(jQueryDialog5Options);
   var jQueryDialog6Options =
   {
      width: 1040,
      height: 588,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog6'} 
   };
   $("#jQueryDialog6").dialog(jQueryDialog6Options);
});
</script>
</head>
<body>
<div id="Layer3" style="position:fixed;text-align:left;left:0;top:0;bottom:0;width:266px;z-index:18;">
<div id="wb_Text2" style="position:absolute;left:9px;top:82px;width:236px;height:16px;z-index:0;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Consoles Graphiques :</span></div>
<input type="submit" id="Button1" onclick="$('#jQueryDialog1').dialog('open');return false;" name="" value="WebOS N°1 (/login)" style="position:absolute;left:31px;top:120px;width:204px;height:25px;z-index:1;">
<input type="submit" id="Button2" onclick="$('#jQueryDialog2').dialog('open');return false;" name="" value="WebOS N°2 (/mywebos)" style="position:absolute;left:31px;top:155px;width:204px;height:25px;z-index:2;">
<input type="submit" id="Button3" onclick="$('#jQueryDialog3').dialog('open');return false;" name="" value="WebOS N°3 (/webosbis)" style="position:absolute;left:31px;top:190px;width:204px;height:25px;z-index:3;">
<input type="submit" id="Button4" onclick="$('#jQueryDialog4').dialog('open');return false;" name="" value="WebOS N°4 (/webos4)" style="position:absolute;left:31px;top:227px;width:204px;height:25px;z-index:4;">
<div id="wb_Text3" style="position:absolute;left:8px;top:267px;width:237px;height:16px;z-index:5;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Management Serveur :</span></div>
<input type="submit" id="Button5" onclick="$('#jQueryDialog5').dialog('open');return false;" name="" value="Ouvrir Racine Serveur" style="position:absolute;left:31px;top:302px;width:204px;height:25px;z-index:6;">
<input type="submit" id="Button6" onclick="$('#jQueryDialog6').dialog('open');return false;" name="" value="Ouvrir Logs PHP/MySQL" style="position:absolute;left:31px;top:339px;width:204px;height:25px;z-index:7;">
</div>

<!-- CHANGER LES CHEMINS DES SITES WEB VERS LE VOTRE OU REMPLACER http://rynnawebos.fr PAR 127.0.0.1 SI VOTRE SERVEUR EST LOCAL -->
<div id="jQueryDialog2" style="z-index:20;" title="WebOS 2 - Console graphique virtuelle">
<object data="http://rynnawebos.fr/mywebos/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog3" style="z-index:21;" title="WebOS 3 - Console graphique virtuelle">
<object data="http://rynnawebos.fr/webosbis/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog4" style="z-index:22;" title="WebOS 4 - Console graphique virtuelle">
<object data="http://rynnawebos.fr/webos4/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog1" style="z-index:23;" title="WebOS 1 - Console graphique virtuelle">
<object data="http://rynnawebos.fr/login/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="Layer1" style="position:fixed;text-align:left;left:0;top:0;right:0;height:74px;z-index:24;">
<div id="wb_Text1" style="position:absolute;left:14px;top:11px;width:420px;height:32px;z-index:13;">
<span style="color:#FFFFFF;font-family:Arial;font-size:27px;"><strong><em>Server-Manager </em></strong></span><span style="color:#FFFFFF;font-family:'Lucida Sans Unicode';font-size:13px;"><strong>(V 2.0)</strong></span></div>
<div id="Layer2" style="position:fixed;text-align:left;left:auto;right:0px;top:0px;width:318px;height:45px;z-index:14;">
<div id="wb_Logout1" style="position:absolute;left:31px;top:7px;width:258px;height:29px;z-index:12;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Quitter l'espace d'administration" id="Logout1">
</form>
</div>
</div>
</div>
<div id="jQueryDialog5" style="z-index:25;" title="Racine Serveur (Management) - s&#233;curis&#233;">
<object data="z3rt6GV8uT44.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog6" style="z-index:26;" title="Logs PHP/MySQL Server (Management) - s&#233;curis&#233;">
<object data="php-GtVF56aZ2aaLo.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:295px;top:102px;width:562px;height:429px;z-index:27;" rows="26" cols="91" spellcheck="false">Notes personnelles : 

</textarea>
<hr id="Line1" style="position:absolute;left:298px;top:559px;width:571px;z-index:28;">
</body>
</html>