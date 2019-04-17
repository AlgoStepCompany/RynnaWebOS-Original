<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'loginform')
{
   $success_page = './inituser.php';
   $error_page = './index.php';
   $mysql_server = '';
   $mysql_username = '';
   $mysql_password = '';
   $mysql_database = '';
   $mysql_table = 'userswebos';
   $crypt_pass = md5($_POST['password']);
   $found = false;
   $fullname = '';
   $session_timeout = 3600;
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
   if (!$db)
   {
      die('Failed to connect to database server!<br>'.mysqli_error($db));
   }
   mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
   mysqli_set_charset($db, 'utf8');
   $sql = "SELECT * FROM ".$mysql_table." WHERE username = '".mysqli_real_escape_string($db, $_POST['username'])."'";
   $result = mysqli_query($db, $sql);
   if ($data = mysqli_fetch_array($result))
   {
      if ($crypt_pass == $data['password'] && $data['active'] != 0)
      {
         $found = true;
         $fullname = $data['fullname'];
      }
   }
   mysqli_close($db);
   if($found == false)
   {
      header('Location: '.$error_page);
      exit;
   }
   else
   {
      if (session_id() == "")
      {
         session_start();
      }
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['fullname'] = $fullname;
      $_SESSION['expires_by'] = time() + $session_timeout;
      $_SESSION['expires_timeout'] = $session_timeout;
      $rememberme = isset($_POST['rememberme']) ? true : false;
      if ($rememberme)
      {
         setcookie('username', $_POST['username'], time() + 3600*24*30);
         setcookie('password', $_POST['password'], time() + 3600*24*30);
      }
      header('Location: '.$success_page);
      exit;
   }
}
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<script src="jquery-3.3.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script src="wwb14.min.js"></script>
<script>
$(document).ready(function()
{
   $("#jQueryDialog1").dialog(
   {
      title: 'Les options générales et informations sur le serveur',
      modal: true,
      width: 546,
      height: 415,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: false,
      hide: false,
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog1'} 
   });
   $("#jQueryDialog5").dialog(
   {
      title: 'Informations Kernel',
      width: 673,
      height: 331,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog5'} 
   });
   $("#jQueryDialog6").dialog(
   {
      title: 'Bugs signalés',
      width: 655,
      height: 282,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog6'} 
   });
   $("#Layer1").stickylayer({orientation: 7, position: [0, 15], delay: 1000});
   $("#jQueryDialog2").dialog(
   {
      title: 'Compatibilité des navigateurs pour utiliser le WebOS (Tests mis à jours le 17/04/19) :',
      width: 831,
      height: 571,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog2'} 
   });
   $("#jQueryProgressbar1").progressbar(
   {
      value: 100
   });
   $("#jQueryProgressbar2").progressbar(
   {
      value: 95
   });
   $("#jQueryProgressbar3").progressbar(
   {
      value: 30
   });
   $("#jQueryProgressbar4").progressbar(
   {
      value: false
   });
   $("#jQueryProgressbar5").progressbar(
   {
      value: 90
   });
   $("#jQueryProgressbar6").progressbar(
   {
      value: 100
   });
   $("#jQueryProgressbar7").progressbar(
   {
      value: 60
   });
   $("#jQueryProgressbar8").progressbar(
   {
      value: 0
   });
   $("#jQueryTabs1").tabs(
   {
      show: false,
      hide: false,
      event: 'click',
      collapsible: false
   });
   $("#Layer5").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:13px;\">Le WebOS fonctionne sous PHP 7</span>",
      items: '#Layer5',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip9' }
   });
   $("#wb_FontAwesomeIcon5").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:13px;\">Le WebOS est conçu en HTML 5</span>",
      items: '#wb_FontAwesomeIcon5',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip10' }
   });
   $("#wb_FontAwesomeIcon9").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:13px;\">Le WebOS est libre de droit, retrouvez le code source sur GitHub</span>",
      items: '#wb_FontAwesomeIcon9',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip11' }
   });
   $("#wb_FontAwesomeIcon8").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:13px;\">Le WebOS dispose d'une licence GPL 3 et CC</span>",
      items: '#wb_FontAwesomeIcon8',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip12' }
   });
   $("#jQueryDialog3").dialog(
   {
      title: 'Informations sur les Cookies générals et leurs utilisations dans le WebOS',
      width: 693,
      height: 528,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog3'} 
   });
   $("#jQueryDialog4").dialog(
   {
      title: 'Envoyer un mail au support ?',
      width: 707,
      height: 556,
      position: { my: 'left top', at: 'right top', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: true,
      show: { effect: 'slide', direction: 'right', duration: 400 },
      hide: { effect: 'slide', direction: 'right', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog4'} 
   });
   $("#jQueryProgressbar1").tooltip(
   {
      hide: false,
      show: false,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:16px;\"><strong>Mozilla Firefox :</strong><br>- Compatible avec Flash, Javascript et Jquery<br>- Fonctions JS d'appels fonctionnels<br>- Fluide et stable</span>",
      items: '#jQueryProgressbar1',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip1' }
   });
   $("#jQueryProgressbar2").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:16px;\"><strong>Google Chrome :</strong><br>- Compatible avec Flash, Javascript et Jquery<br>- Fonctions JS d'appels NON fonctionnels<br>- Fluide et stable</span>",
      items: '#jQueryProgressbar2',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip2' }
   });
   $("#jQueryProgressbar3").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:16px;\"><strong>Internet Explorer :</strong><br>- Compatible avec Javascript et Jquery mais bug avec Flash<br>- Fonctions JS d'appels NON fonctionnels<br>- Assez stable mais fluidité très mauvaise</span>",
      items: '#jQueryProgressbar3',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip3' }
   });
   $("#jQueryProgressbar4").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:16px;\"><strong>Microsoft Edge :</strong><br></span><span style=\"color:#FF0000;font-family:'MS Shell Dlg';font-size:16px;\">NON TESTE POUR L'INSTANT</span>",
      items: '#jQueryProgressbar4',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip4' }
   });
   $("#jQueryProgressbar5").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:16px;\"><strong>Maxthon 5 :</strong><br>- Compatible avec Flash, Javascript et Jquery<br>- Fonctions JS d'appels fonctionnels<br>- Stable et assez fluide (léger accoups possible)</span>",
      items: '#jQueryProgressbar5',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip5' }
   });
   $("#jQueryProgressbar6").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:16px;\"><strong>Néon :</strong><br>- Compatible avec Flash, Javascript et Jquery<br>- Fonctions JS d'appels fonctionnels<br>- Fluide et stable</span>",
      items: '#jQueryProgressbar6',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip6' }
   });
   $("#jQueryProgressbar7").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:16px;\"><strong>Opéra :</strong><br>- Compatible avec Flash, Javascript et Jquery<br>- Fonctions JS d'appels NON fonctionnels<br>- Stable mais fluidité moyenne</span>",
      items: '#jQueryProgressbar7',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip7' }
   });
   $("#jQueryProgressbar8").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:16px;\"><strong>Safari :</strong><br></span><span style=\"color:#FF0000;font-family:'MS Shell Dlg';font-size:16px;\"><em>Non Compatible généralement avec le WebOS</em></span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:16px;\"><br>- Assez fluide mais très instable, provoquant divers Crash du navigateur</span>",
      items: '#jQueryProgressbar8',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip8' }
   });
});
</script>
<!-- Insert Google Analytics code here -->
</head>
<body>
<div id="jQueryDialog1">
<div id="Layer6" style="position:absolute;text-align:left;left:15px;top:217px;width:503px;height:131px;z-index:0;">
</div>
<div id="wb_FontAwesomeIcon2" style="position:absolute;left:43px;top:38px;width:100px;height:100px;text-align:center;z-index:1;">
<a href="#" onclick="$('#jQueryDialog5').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon2"><i class="fa fa-database"></i></div></a></div>
<div id="wb_Text4" style="position:absolute;left:36px;top:138px;width:114px;height:32px;text-align:center;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Informations sur le WebOS</span></div>
<div id="wb_FontAwesomeIcon3" style="position:absolute;left:212px;top:38px;width:100px;height:100px;text-align:center;z-index:3;">
<a href="#" onclick="$('#jQueryDialog6').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon3"><i class="fa fa-hourglass-end"></i></div></a></div>
<div id="wb_Text6" style="position:absolute;left:205px;top:138px;width:114px;height:32px;text-align:center;z-index:4;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Afficher les bugs recensés</span></div>
<hr id="Line1" style="position:absolute;left:15px;top:201px;width:503px;z-index:5;">
<div id="wb_FontAwesomeIcon4" style="position:absolute;left:373px;top:38px;width:100px;height:100px;text-align:center;z-index:6;">
<a href="#" onclick="$('#jQueryDialog3').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon4"><i class="fa fa-compress"></i></div></a></div>
<div id="wb_Text3" style="position:absolute;left:366px;top:138px;width:114px;height:32px;text-align:center;z-index:7;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Informations sur les Cookies</span></div>
<div id="Layer5" style="position:absolute;text-align:center;left:36px;top:225px;width:72px;height:106px;z-index:8;">
<div id="Layer5_Container" style="width:72px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="wb_FontAwesomeIcon5" style="position:absolute;left:169px;top:242px;width:85px;height:89px;text-align:center;z-index:9;">
<div id="FontAwesomeIcon5"><i class="fa fa-html5"></i></div></div>
<div id="wb_FontAwesomeIcon8" style="position:absolute;left:304px;top:249px;width:80px;height:74px;text-align:center;z-index:10;">
<div id="FontAwesomeIcon8"><i class="fa fa-creative-commons"></i></div></div>
<div id="wb_FontAwesomeIcon9" style="position:absolute;left:420px;top:249px;width:80px;height:74px;text-align:center;z-index:11;">
<div id="FontAwesomeIcon9"><i class="fa fa-git"></i></div></div>
</div>

<div id="jQueryDialog5" style="z-index:75;">
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:9px;top:8px;width:113px;height:116px;text-align:center;z-index:12;">
<div id="FontAwesomeIcon1"><i class="fa fa-server"></i></div></div>
<div id="wb_Text1" style="position:absolute;left:139px;top:16px;width:478px;height:176px;text-align:justify;z-index:13;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Rynna WebOS utilise un moteur PHP 7 (appelé noyau PHP) pour fonctionner.<br>Le WebOS est codé en différents langages : PHP, CSS, Javascript, JQuery et utilise des applications et outils développés majoritairement en Java, Flash Player, Ajax et ASPX pour les applications virtualisées.<br><br>Rynna WebOS a été conçu par 13 développeurs depuis Mars 2015 à l'aide des logiciels suivants : Notepad++ (gratuit), Wysiwyg Web Builder (payant), Paint.NET (gratuit), Visual Studio ASP.NET (gratuit), OpenElement (gratuit) et Blisk (gratuit).<br><br>Le code source complet de Rynna WebOS est disponible ici même :</span></div>
<input type="submit" id="Button2" onclick="window.location.href='https://github.com/AlgoStepCompany';return false;" name="" value="Se rendre sur Github pour découvrir et télécharger le code source du WebOS" style="position:absolute;left:28px;top:210px;width:616px;height:43px;z-index:14;">
</div>

<div id="jQueryDialog6" style="z-index:76;">
<div id="Blog1" style="overflow:auto;position:absolute;left:30px;top:23px;width:598px;height:173px;z-index:15;">
<div class="blogitem">
   <span class="blogsubject">Problème SSL sur iframes</span>
   <div class="no-thumb"></div>
   <div class="blogdate">09/01/2018<br></div>
   <span style="color:#000000;">Certains programmes ne fonctionneront pas en version HTTPS (SSL sécurisé) sur le WebOS.</span><br>
   <div class="blogcomments"><a href="mailto:support@rynnawebos.fr?subject=Probl%E8me%20SSL%20sur%20iframes">Envoyer un mail</a></div>
</div>
<div class="clearfix visible-col1"></div>
</div>
</div>

<div id="Layer2" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:77;">
<div id="Layer1" style="position:absolute;text-align:center;left:347px;top:575px;width:393px;height:83px;z-index:27;">
<div id="Layer1_Container" style="width:393px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer4" style="position:fixed;text-align:center;left:0px;top:0px;width:140px;height:32px;z-index:28;">
<div id="Layer4_Container" style="width:136px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer8" style="position:fixed;text-align:center;left:auto;right:20px;top:auto;bottom:20px;width:76px;height:57px;z-index:29;cursor: pointer;" onclick="$('#jQueryDialog2').dialog('open');return false;">
<div id="Layer8_Container" style="width:76px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer9" style="position:fixed;text-align:left;left:auto;right:15px;top:15px;width:110px;height:108px;z-index:30;">
<div id="wb_MaterialIcon1" style="position:absolute;left:17px;top:14px;width:77px;height:80px;text-align:center;z-index:16;">
<a href="#" onclick="$('#jQueryDialog4').dialog('open');return false;"><div id="MaterialIcon1"><i class="material-icons">&#xe001;</i></div></a></div>
</div>
<form name="loginform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<div id="Layer10" style="position:fixed;text-align:left;left:50%;margin-left:-239px;top:50%;margin-top:-213px;width:477px;height:424px;z-index:31;">
<div id="wb_FontAwesomeIcon7" style="position:absolute;left:179px;top:20px;width:106px;height:87px;text-align:center;z-index:17;">
<div id="FontAwesomeIcon7"><i class="fa fa-user-circle-o"></i></div></div>
<div id="wb_Text8" style="position:absolute;left:108px;top:120px;width:248px;height:19px;text-align:center;z-index:18;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;"><strong>Nom de compte :</strong></span></div>
<div id="wb_Text20" style="position:absolute;left:108px;top:207px;width:248px;height:19px;text-align:center;z-index:19;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;"><strong>Mot de passe :</strong></span></div>
<input type="text" id="Editbox1" style="position:absolute;left:108px;top:159px;width:238px;height:18px;z-index:20;" name="username" value="" maxlength="80" spellcheck="false" placeholder="minuscule et chiffre uniquement">
<input type="password" id="Editbox2" style="position:absolute;left:108px;top:248px;width:238px;height:18px;z-index:21;" name="password" value="" maxlength="100" spellcheck="false" placeholder="mot de passe du compte">
<input type="submit" id="Button5" name="submit" value="Se connecter" style="position:absolute;left:167px;top:322px;width:131px;height:35px;z-index:22;cursor: pointer;">
<div id="wb_Text19" style="position:absolute;left:108px;top:282px;width:248px;height:13px;z-index:23;cursor: help;" onclick="window.location.href='./passwdperdu.php';return false;">
<span style="color:#F5F5F5;font-family:Arial;font-size:11px;"><strong><em>Oublie du mot de passe ?</em></strong></span></div>
<input type="button" id="Button4" onclick="$('#jQueryDialog1').dialog('open');return false;" name="" value="Options" style="position:absolute;left:20px;top:382px;width:161px;height:25px;z-index:24;cursor: pointer;">
<input type="submit" id="Button1" onclick="window.location.href='./newuser.php';return false;" name="" value="Créer un compte" style="position:absolute;left:285px;top:382px;width:171px;height:25px;z-index:25;cursor: pointer;">
</div>
</form>
<div id="Layer3" style="position:fixed;text-align:left;left:0px;top:auto;bottom:0px;width:295px;height:76px;z-index:32;">
<div id="wb_Text10" style="position:absolute;left:13px;top:16px;width:265px;height:44px;z-index:26;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Version 50.0 (Release)<br>Desktop Virtual Manager (DVM)<br></em></span><span style="color:#FFFFFF;font-family:Arial;font-size:9.3px;"><em>PHP 7, CSS 3, JQuery 3.3.1</em></span></div>
</div>
</div>
<div id="Layer7" style="position:fixed;text-align:center;left:0;top:0;right:0;bottom:0;z-index:78;">
<div id="Layer7_Container" style="width:2996px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_FontAwesomeIcon6" style="position:absolute;left:25px;top:23px;width:120px;height:96px;text-align:center;z-index:33;">
<div id="FontAwesomeIcon6"><i class="fa fa-exclamation-triangle"></i></div></div>
<div id="wb_Text9" style="position:absolute;left:167px;top:23px;width:684px;height:360px;z-index:34;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>OUPS !<br><br>Il semblerais que le WebOS ne soit pas compatible avec votre navigateur Web actuel ou que votre navigateur internet actuel a un problème...<br><br>Pour remédier à cela nous vous conseillons d'utiliser les navigateurs suivants : <br><br>- Mozilla Firefox<br>- Google Chrome<br>- Internet Explorer<br>- Microsoft Edge<br>- Opéra (Néon)<br><br>et de vous assurer que ceux-ci sont à jour pour pouvoir supporter une interface internet dynamique (JQuery/PHP/CSS 3).<br><br>Vous pouvez aussi essayer de vider le Cache de votre navigateur internet actuel.<br><br>Si le problème persiste ; contactez l'administrateur du serveur sur support@rynnawebos.fr pour plus d'information.</strong></span></div>
</div>
</div>
<script>
var wb_Timer1;
function TimerStartTimer1()
{
   wb_Timer1 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer7', 0);
   }, 25);
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
   wb_Timer2 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer7', 0);
   }, 75);
}
function TimerStopTimer2()
{
   clearTimeout(wb_Timer2);
}
TimerStartTimer2();
</script>

<div id="jQueryDialog2" style="z-index:81;">
<div id="wb_Text2" style="position:absolute;left:8px;top:12px;width:792px;height:32px;text-align:justify;z-index:41;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Navigateurs internet les plus performants, fiables et fluides pour utiliser le WebOS correctement (passer votre souris sur les barres pour recevoir plus d'informations) :</span></div>
<div id="wb_Text11" style="position:absolute;left:32px;top:61px;width:179px;height:270px;z-index:42;">
<span style="color:#000000;font-family:Arial;font-size:15px;"><strong>Mozilla Firefox<br><br>Google Chrome<br><br>Internet Explorer<br><br>Microsoft Edge<br><br>Maxthon 5<br><br>Néon<br><br>Opéra<br><br>Safari</strong></span></div>
<div id="jQueryProgressbar1"  style="position:absolute;left:236px;top:60px;width:549px;height:17px;z-index:43;">
</div>
<div id="jQueryProgressbar2"  style="position:absolute;left:236px;top:99px;width:549px;height:17px;z-index:44;">
</div>
<div id="jQueryProgressbar3"  style="position:absolute;left:236px;top:134px;width:549px;height:17px;z-index:45;">
</div>
<div id="jQueryProgressbar4"  style="position:absolute;left:236px;top:170px;width:549px;height:17px;z-index:46;">
</div>
<div id="jQueryProgressbar5"  style="position:absolute;left:236px;top:208px;width:549px;height:17px;z-index:47;">
</div>
<div id="jQueryProgressbar6"  style="position:absolute;left:236px;top:246px;width:549px;height:17px;z-index:48;">
</div>
<div id="jQueryProgressbar7"  style="position:absolute;left:236px;top:280px;width:549px;height:17px;z-index:49;">
</div>
<div id="jQueryProgressbar8"  style="position:absolute;left:236px;top:312px;width:549px;height:17px;z-index:50;">
</div>
<div id="wb_Text12" style="position:absolute;left:17px;top:362px;width:770px;height:16px;z-index:51;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><u>De quoi cela parle t-il ?</u></span></div>
<div id="jQueryTabs1" style="position:absolute;left:14px;top:388px;width:776px;height:104px;z-index:52;">
<ul>
<li><a href="#jquerytabs1-page-0"><span>JQuery</span></a></li>
<li><a href="#jquerytabs1-page-1"><span>Flash</span></a></li>
<li><a href="#jquerytabs1-page-2"><span>Javascript</span></a></li>
<li><a href="#jquerytabs1-page-3"><span>Fonctions JS d'appels</span></a></li>
<li><a href="#jquerytabs1-page-4"><span>Fluidité</span></a></li>
<li><a href="#jquerytabs1-page-5"><span>Stabilité</span></a></li>
</ul>
<div style="height:82px;" id="jquerytabs1-page-0">
<div id="wb_Text13" style="position:absolute;left:16px;top:12px;width:738px;height:32px;z-index:35;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Jquery est un langage Web avancé permettant l'affichage des fenêtres du WebOS et des divers boutons et options visuelles, y compris l'animation des images et la gestion interne du WebOS.</span></div>
</div>
<div style="height:82px;" id="jquerytabs1-page-1">
<div id="wb_Text14" style="position:absolute;left:14px;top:13px;width:738px;height:32px;z-index:36;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Flash est un langage d'animation pour divers médias. Plusieurs logiciels basiques ou avancés sont conçus en Flash et peuvent être lancés dans le WebOS.</span></div>
</div>
<div style="height:82px;" id="jquerytabs1-page-2">
<div id="wb_Text15" style="position:absolute;left:14px;top:14px;width:738px;height:32px;z-index:37;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Javascript est un langage de scripting ; il permet d'effectuer toutes les actions internes du WebOS (appels des sites par redirections automatiques lors d'un clic sur un contrôle par exemple). C'est une fonction indispensable au WebOS.</span></div>
</div>
<div style="height:82px;" id="jquerytabs1-page-3">
<div id="wb_Text16" style="position:absolute;left:16px;top:9px;width:738px;height:45px;z-index:38;">
<span style="color:#000000;font-family:Arial;font-size:12px;">Les Fonctions JS (javascript) d'appels permettent de créer les liaisons entre le clic sur un objet (action) vers les balises qui se trouvent dans la pluspart des applications du WebOS. Sans cette fonction vous serez obligé de cliquer manuellement sur &quot;Charger/Actualiser&quot; sur certains programmes pour forcer leurs affichages !</span></div>
</div>
<div style="height:82px;" id="jquerytabs1-page-4">
<div id="wb_Text17" style="position:absolute;left:16px;top:14px;width:738px;height:32px;z-index:39;">
<span style="color:#000000;font-family:Arial;font-size:13px;">La fluidité du WebOS est calculée sur le déplacement des fenêtres à l'écran, des animations JS/JQuery mais aussi du multi-tâches supportés par votre navigateur. Plus la fluidité est bonne plus vous pourrez afficher rapidement vos programmes.</span></div>
</div>
<div style="height:82px;" id="jquerytabs1-page-5">
<div id="wb_Text18" style="position:absolute;left:14px;top:9px;width:738px;height:45px;z-index:40;">
<span style="color:#000000;font-family:Arial;font-size:12px;">La stabilité du WebOS est basé sur la navigateur internet qui le supporte. Le WebOS est conçu pour s'adapter au maximum des navigateurs existants mais certains peuvent ne pas supporter certains scripts et ainsi ralentir ou bloquer (provoquant des crashs) lors votre utilisation du WebOS.</span></div>
</div>
</div>
</div>





<div id="jQueryDialog3" style="z-index:86;">
<input type="button" id="Button7" onclick="$('#jQueryDialog3').dialog('close');return false;" name="" value="Compris" style="position:absolute;left:229px;top:433px;width:235px;height:25px;z-index:60;">
<div id="wb_Text5" style="position:absolute;left:17px;top:12px;width:659px;height:400px;text-align:justify;z-index:61;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong><u>Cookies information</u></strong><br><br>Les cookies sont de petits fichiers texte qui sont placés sur votre ordinateur par les sites web que vous visitez. Ils sont largement utilisés afin de permettre le fonctionnement des sites ou de rendre leur fonctionnement plus efficace, et de fournir des informations à leur propriétaire. L'utilisation de cookies est aujourd’hui la norme pour la plupart des sites. Vous pouvez gérer et contrôler les cookies en utilisant votre navigateur. Vous pouvez également les supprimer dans votre navigateur lorsque vous quittez le site.<br>Gestion des cookies<br><br>Pour la gestion des Cookies et de vos choix, la configuration de chaque navigateur est différente. Elle est décrite dans le menu d'aide de votre navigateur, qui vous permettra de savoir de quelle manière modifier vos souhaits en matière de Cookies.<br><br><strong><em>Types de cookies:<br></em></strong><br>&nbsp;&nbsp;&nbsp; - « Cookies de Session » restent stockés dans votre navigateur seulement durant votre session de navigation c'est à dire jusqu'à ce que vous quittiez le site.<br>&nbsp;&nbsp;&nbsp; - « Cookies Persistants » restent dans votre navigateur après la session (sauf si vous les avez supprimés).<br>&nbsp;&nbsp;&nbsp; - « Cookies de Performance » collectent des informations sur votre utilisation du site, comme les pages web visitées et les messages d'erreur, ils ne recueillent pas de renseignements concernant des personnes identifiées, et les informations collectées sont agrégées de sorte qu’elles sont rendues anonymes. Les cookies de performance sont utilisés pour améliorer la façon dont fonctionne un site web.<br>&nbsp;&nbsp;&nbsp; - « Cookies de Fonctionnalité » permettent au site de se rappeler les choix que vous faites sur le site web (tels que des modifications de la taille du texte, des pages personnalisées) ou activer des services tels que des commentaires sur un blog.</span></div>
</div>

<div id="jQueryDialog4" style="z-index:87;">
<div id="Html1" style="position:absolute;left:21px;top:78px;width:656px;height:406px;z-index:62">
<?php
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = 'support@rynnawebos.fr';

// copie ? (envoie une copie au visiteur)
$copie = 'oui';

// Action du formulaire (si votre page a des paramètres dans l'URL)
// si cette page est index.php?page=contact alors mettez index.php?page=contact
// sinon, laissez vide
$form_action = '';

// Messages de confirmation du mail
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";

// Message d'erreur du formulaire
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

/*
	********************************************************************************************
	FIN DE LA CONFIGURATION
	********************************************************************************************
*/

/*
 * cette fonction sert à nettoyer et enregistrer un texte
 */
function Rec($text)
{
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc())
	{
		$text = stripslashes($text);
	}

	$text = nl2br($text);
	return $text;
};

/*
 * Cette fonction sert à vérifier la syntaxe d'un email
 */
function IsEmail($email)
{
	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
	return (($value === 0) || ($value === false)) ? false : true;
}

// formulaire envoyé, on récupère tous les champs.
$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

// On va vérifier les variables et l'email ...
$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
$err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin

if (isset($_POST['envoi']))
{
	if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
	{
		// les 4 variables sont remplies, on génère puis envoie le mail
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'From:'.$nom.' <'.$email.'>' . "\r\n" .
				'Reply-To:'.$email. "\r\n" .
				'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
				'Content-Disposition: inline'. "\r\n" .
				'Content-Transfer-Encoding: 7bit'." \r\n" .
				'X-Mailer:PHP/'.phpversion();

		// envoyer une copie au visiteur ?
		if ($copie == 'oui')
		{
			$cible = $destinataire.';'.$email;
		}
		else
		{
			$cible = $destinataire;
		};

		// Remplacement de certains caractères spéciaux
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('<br>','',$message);
		$message = str_replace('<br />','',$message);
		$message = str_replace("&lt;","<",$message);
		$message = str_replace("&gt;",">",$message);
		$message = str_replace("&amp;","&",$message);

		// Envoi du mail
		$num_emails = 0;
		$tmp = explode(';', $cible);
		foreach($tmp as $email_destinataire)
		{
			if (mail($email_destinataire, $objet, $message, $headers))
				$num_emails++;
		}

		if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
		{
			echo '<p>'.$message_envoye.'</p>';
		}
		else
		{
			echo '<p>'.$message_non_envoye.'</p>';
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...
		echo '<p>'.$message_formulaire_invalide.'</p>';
		$err_formulaire = true;
	};
}; // fin du if (!isset($_POST['envoi']))

if (($err_formulaire) || (!isset($_POST['envoi'])))
{
	// afficher le formulaire
	echo '
	<form id="contact" method="post" action="'.$form_action.'">
	<fieldset><legend>Vos coordonnées</legend>
		<p><label for="nom">Nom :</label><input type="text" id="nom" name="nom" value="'.stripslashes($nom).'" tabindex="1" /></p>
		<p><label for="email">Email :</label><input type="text" id="email" name="email" value="'.stripslashes($email).'" tabindex="2" /></p>
	</fieldset>

	<fieldset><legend>Votre message :</legend>
		<p><label for="objet">Objet :</label><input type="text" id="objet" name="objet" value="'.stripslashes($objet).'" tabindex="3" /></p>
		<p><label for="message">Message :</label><textarea id="message" name="message" tabindex="4" cols="30" rows="8">'.stripslashes($message).'</textarea></p>
	</fieldset>

	<div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer le formulaire !" /></div>
	</form>';
};
?></div>
<div id="wb_Text7" style="position:absolute;left:21px;top:16px;width:656px;height:48px;z-index:63;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Un problème de connexion ? Un compte qui ne répond plus ? Vous pensez que quelqu'un d'autre que vous a accès à votre session ? Une erreur d'affichage ? Une autre question ?<br><strong>Envoyer à notre équipe un e-mail pour être rapidement dépanné !</strong></span></div>
</div>









<div style="z-index:96">
<script>
var isMobile = (/iphone|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));
if (isMobile)
{
   location.replace("./mobileaccess/infosmobile.html");
}  
</script>  </div>
</body>
</html>