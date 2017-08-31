<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'loginform')
{
   $success_page = './session.php';
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
   $db = mysql_connect($mysql_server, $mysql_username, $mysql_password);
   if (!$db)
   {
      die('Failed to connect to database server!<br>'.mysql_error());
   }
   mysql_select_db($mysql_database, $db) or die('Failed to select database<br>'.mysql_error());
   mysql_set_charset('utf8', $db);
   $sql = "SELECT password, fullname, active FROM ".$mysql_table." WHERE username = '".mysql_real_escape_string($_POST['username'])."'";
   $result = mysql_query($sql, $db);
   if ($data = mysql_fetch_array($result))
   {
      if ($crypt_pass == $data['password'] && $data['active'] != 0)
      {
         $found = true;
         $fullname = $data['fullname'];
      }
   }
   mysql_close($db);
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
<meta name="description" content="Rynna WebOS (systeme exploitation internet)
Dev AlgoStep Company - SIRET 817 727 357 00011">
<meta name="keywords" content="Rynna WebOS, AlgoStep Company, WebOS, Chrome WebOS, Edge WebOS, Firefox WebOS, All WebOS">
<meta name="author" content="AlgoStep Company">
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="rynnalogofavicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="Sans titre.png" rel="apple-touch-icon" sizes="229x231">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<script src="jquery-3.1.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script src="wwb12.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog1Options =
   {
      modal: true,
      width: 718,
      height: 417,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog1'} 
   };
   $("#jQueryDialog1").dialog(jQueryDialog1Options);
   var jQueryDialog5Options =
   {
      width: 675,
      height: 323,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog5'} 
   };
   $("#jQueryDialog5").dialog(jQueryDialog5Options);
   var jQueryDialog6Options =
   {
      width: 657,
      height: 381,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog6'} 
   };
   $("#jQueryDialog6").dialog(jQueryDialog6Options);
   $("#Layer3").stickylayer({orientation: 9, position: [0, 0], delay: 1});
   $("#Layer1").stickylayer({orientation: 7, position: [0, 0], delay: 1000});
   $("#Layer5").stickylayer({orientation: 4, position: [10, 10], delay: 1000});
   $("#Layer6").stickylayer({orientation: 2, position: [0, 0], delay: 1000});
   var jQueryDialog3Options =
   {
      width: 694,
      height: 537,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog3'} 
   };
   $("#jQueryDialog3").dialog(jQueryDialog3Options);
   $("#Layer4").stickylayer({orientation: 5, position: [0, 0], delay: 1});
   $("#Layer7").stickylayer({orientation: 3, position: [10, 10], delay: 1000});
});
</script>
</head>
<body>
<div id="jQueryDialog1" title="Que souhaitez-vous faire ?">
<div id="wb_FontAwesomeIcon2" style="position:absolute;left:43px;top:38px;width:100px;height:100px;text-align:center;z-index:0;">
<a href="#" onclick="$('#jQueryDialog5').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon2"><i class="fa fa-database">&nbsp;</i></div></a></div>
<div id="wb_Text4" style="position:absolute;left:36px;top:138px;width:114px;height:32px;text-align:center;z-index:1;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Informations sur le WebOS</span></div>
<div id="wb_FontAwesomeIcon3" style="position:absolute;left:212px;top:38px;width:100px;height:100px;text-align:center;z-index:2;">
<a href="#" onclick="$('#jQueryDialog6').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon3"><i class="fa fa-hourglass-end">&nbsp;</i></div></a></div>
<div id="wb_Text6" style="position:absolute;left:205px;top:138px;width:114px;height:32px;text-align:center;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Afficher les bugs recensés</span></div>
<div id="wb_FontAwesomeIcon4" style="position:absolute;left:387px;top:38px;width:100px;height:100px;text-align:center;z-index:4;">
<a href="javascript:popupwnd('http://algostep-company.fr','yes','yes','yes','yes','yes','yes','5','5','1024','768')" target="_self"><div id="FontAwesomeIcon4"><i class="fa fa-home">&nbsp;</i></div></a></div>
<div id="wb_Text7" style="position:absolute;left:380px;top:138px;width:114px;height:32px;text-align:center;z-index:5;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Découvrir AlgoStep Company (pop-up)</span></div>
<div id="wb_FontAwesomeIcon5" style="position:absolute;left:561px;top:38px;width:100px;height:100px;text-align:center;z-index:6;">
<a href="#" onclick="$('#jQueryDialog1').dialog('close');window.location.href='./passwdperdu.php';return false;"><div id="FontAwesomeIcon5"><i class="fa fa-unlock-alt">&nbsp;</i></div></a></div>
<div id="wb_Text8" style="position:absolute;left:554px;top:138px;width:114px;height:32px;text-align:center;z-index:7;">
<span style="color:#000000;font-family:Arial;font-size:13px;">&quot;J'ai perdu mon mot de passe&quot;</span></div>
<div id="wb_Text3" style="position:absolute;left:17px;top:209px;width:671px;height:32px;text-align:center;z-index:8;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Où est héberger le WebOS ? Sur quel serveur ? Cliquez sur le logo ci-dessous pour découvrir 1and1 et le type de serveur utilisé (Unlimited Windows Pro)</strong></span></div>
<div id="wb_Image1" style="position:absolute;left:197px;top:259px;width:323px;height:95px;z-index:9;">
<a href="javascript:popupwnd('https://www.1and1.fr/hebergement-windows','yes','yes','yes','yes','yes','yes','5','5','1024','768')" target="_self"><img src="images/1and1.png" id="Image1" alt=""></a></div>
</div>

<div id="jQueryDialog5" style="z-index:37;" title="Informations Kernel">
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:9px;top:8px;width:113px;height:116px;text-align:center;z-index:10;">
<div id="FontAwesomeIcon1"><i class="fa fa-server">&nbsp;</i></div></div>
<div id="wb_Text1" style="position:absolute;left:139px;top:16px;width:478px;height:176px;text-align:justify;z-index:11;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Rynna WebOS utilise un moteur PHP 7 (appelé noyau PHP) pour fonctionner.<br>Le WebOS est codé en différents langages : PHP, CSS, Javascript, JQuery et utilise des applications et outils développés majoritairement en Java, Flash Player, Ajax et ASPX pour les applications virtualisées.<br><br>Rynna WebOS a été conçu par 3 développeurs depuis Mars 2015 à l'aide des logiciels suivants : Notepad++ (gratuit), Wysiwyg Web Builder (payant), Paint.NET (gratuit), Visual Studio ASP.NET (gratuit), OpenElement (gratuit) et Blisk (gratuit).<br><br>Le code source complet de Rynna WebOS est disponible ici même :</span></div>
<input type="submit" id="Button2" onclick="window.location.href='https://github.com/AlgoStepCompany';return false;" name="" value="Découvrir, apprendre et télécharger le code source de Rynna WebOS" style="position:absolute;left:28px;top:210px;width:616px;height:43px;z-index:12;">
</div>

<div id="jQueryDialog6" style="z-index:38;" title="Bugs signal&#233;s">
<div id="Blog1" style="overflow:auto;position:absolute;left:30px;top:23px;width:598px;height:288px;z-index:13;">
<div class="blogitem">
   <span class="blogsubject">Problème SSL sur iframes</span>
   <div class="no-thumb"></div>
   <div class="blogdate">13/08/2017<br></div>
   <span style="color:#000000;">Certains programmes ne fonctionneront pas en version HTTPS (SSL sécurisé) sur le WebOS.</span><br>
   <div class="blogcomments"><a href="mailto:support@rynnaebos.fr?subject=Probl%E8me%20SSL%20sur%20iframes">Envoyer un mail</a></div>
</div>
<div class="clearfix visible-col1"></div>
</div>
</div>

<div id="Layer2" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:39;">
<div id="Layer3" style="position:absolute;text-align:center;left:158px;top:143px;width:627px;height:392px;z-index:20;">
<div id="Layer3_Container" style="width:627px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text2" style="position:absolute;left:28px;top:42px;width:568px;height:128px;text-align:justify;z-index:14;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong>Vous pouvez désormais vous connecter à votre compte à l'aide de vos identifiants. Vous devez respecter la casse utilisateur et de votre mot de passe.<br><br></strong></span><span style="color:#000000;font-family:Arial;font-size:13px;"><strong><em>Si vous souhaitez découvrir le WebOS sans créer de compte vous pouvez utiliser la démo en cliquant sur le bouton &quot;DEMO&quot; !</em></strong></span><span style="color:#1E90FF;font-family:Arial;font-size:13px;"><strong><em><br></em></strong></span><span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong><br>Si vous n'avez pas encore de compte vous pouvez en créer un nouveau en cliquant sur &quot;Créer un nouveau compte&quot; :</strong></span></div>
<div id="wb_Login1" style="position:absolute;left:28px;top:185px;width:568px;height:151px;text-align:right;z-index:15;">
<form name="loginform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<table id="Login1">
<tr>
   <td class="header" colspan="2">Connexion à votre session</td>
</tr>
<tr>
   <td class="label"><label for="username">Nom de compte (minuscule uniquement) :</label></td>
   <td class="row"><input class="input" name="username" type="text" id="username" value="<?php echo $username; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="password">Mot de passe (respecter la casse) :</label></td>
   <td class="row"><input class="input" name="password" type="password" id="password" value="<?php echo $password; ?>"></td>
</tr>
<tr>
   <td>&nbsp;</td><td class="row"><input id="rememberme" type="checkbox" name="rememberme"><label for="rememberme">Se rappeler de moi</label></td>
</tr>
<tr>
   <td>&nbsp;</td><td style="text-align:left;vertical-align:bottom"><input class="button" type="submit" name="login" value="Connexion" id="login"></td>
</tr>
</table>
</form>
</div>
<input type="submit" id="Button1" onclick="window.location.href='./newuser.php';return false;" name="" value="Créer un nouveau compte" style="position:absolute;left:384px;top:347px;width:211px;height:25px;z-index:16;">
<input type="button" id="Button3" name="" value="Connexion à votre compte utilisateur" style="position:absolute;left:19px;top:8px;width:588px;height:25px;z-index:17;" disabled>
<input type="button" id="Button4" onclick="$('#jQueryDialog1').dialog('open');return false;" name="" value="Infos complémentaires ?" style="position:absolute;left:28px;top:347px;width:156px;height:25px;z-index:18;">
<input type="submit" id="Button5" onclick="window.location.href='./demosession.php';return false;" name="" value="DEMO" style="position:absolute;left:223px;top:347px;width:124px;height:25px;z-index:19;">
</div>
</div>
<div id="wb_Text10" style="position:absolute;left:7px;top:7px;width:250px;height:44px;z-index:21;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><em>Version 9.1 (Release)<br>Desktop Virtual Manager (DVM)<br></em></span><span style="color:#000000;font-family:Arial;font-size:9.3px;"><em>PHP 7, CSS 3, JQuery 3.1.1</em></span></div>
<div id="Layer1" style="position:absolute;text-align:center;left:277px;top:564px;width:393px;height:83px;z-index:22;">
<div id="Layer1_Container" style="width:393px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer5" style="position:absolute;text-align:center;left:13px;top:555px;width:72px;height:106px;z-index:23;">
<div id="Layer5_Container" style="width:72px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer6" style="position:absolute;text-align:center;left:873px;top:16px;width:100px;height:100px;z-index:24;" onclick="$('#jQueryDialog3').dialog('open');return false;">
<div id="Layer6_Container" style="width:100px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer4" style="position:absolute;text-align:center;left:284px;top:12px;width:464px;height:105px;z-index:25;">
<div id="Layer4_Container" style="width:464px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<script>
if (screen.width <= 640)
{
   window.location = 'noscreen.php';
}
else
if (screen.width <= 800)
{
   window.location = 'noscreen.php';
}
else
{
}
</script>
<!-- ATTENTION : MODIFIER le chemin ci-dessous pour pointer sur la version Anglaise du code source ! -->
<div id="Layer7" style="position:absolute;text-align:center;left:877px;top:609px;width:92px;height:52px;z-index:27;" onclick="window.location.href='http://rynnawebos.fr/loginus/index.php';return false;">
<div id="Layer7_Container" style="width:92px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
</div>
<div id="jQueryDialog3" style="z-index:40;" title="Informations sur les Cookies">
<div id="wb_Text5" style="position:absolute;left:14px;top:17px;width:650px;height:400px;text-align:justify;z-index:34;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong><u>Cookies information</u></strong><br><br>Les cookies sont de petits fichiers texte qui sont placés sur votre ordinateur par les sites web que vous visitez. Ils sont largement utilisés afin de permettre le fonctionnement des sites ou de rendre leur fonctionnement plus efficace, et de fournir des informations à leur propriétaire. L'utilisation de cookies est aujourd’hui la norme pour la plupart des sites. Vous pouvez gérer et contrôler les cookies en utilisant votre navigateur. Vous pouvez également les supprimer dans votre navigateur lorsque vous quittez le site.<br>Gestion des cookies<br><br>Pour la gestion des Cookies et de vos choix, la configuration de chaque navigateur est différente. Elle est décrite dans le menu d'aide de votre navigateur, qui vous permettra de savoir de quelle manière modifier vos souhaits en matière de Cookies.<br><br><strong><em>Types de cookies:<br></em></strong><br>&nbsp;&nbsp;&nbsp; - « Cookies de Session » restent stockés dans votre navigateur seulement durant votre session de navigation c'est à dire jusqu'à ce que vous quittiez le site.<br>&nbsp;&nbsp;&nbsp; - « Cookies Persistants » restent dans votre navigateur après la session (sauf si vous les avez supprimés).<br>&nbsp;&nbsp;&nbsp; - « Cookies de Performance » collectent des informations sur votre utilisation du site, comme les pages web visitées et les messages d'erreur, ils ne recueillent pas de renseignements concernant des personnes identifiées, et les informations collectées sont agrégées de sorte qu’elles sont rendues anonymes. Les cookies de performance sont utilisés pour améliorer la façon dont fonctionne un site web.<br>&nbsp;&nbsp;&nbsp; - « Cookies de Fonctionnalité » permettent au site de se rappeler les choix que vous faites sur le site web (tels que des modifications de la taille du texte, des pages personnalisées) ou activer des services tels que des commentaires sur un blog.</span></div>
<input type="button" id="Button7" onclick="$('#jQueryDialog3').dialog('close');return false;" name="" value="Compris" style="position:absolute;left:229px;top:449px;width:235px;height:25px;z-index:35;">
</div>

</body>
</html>
