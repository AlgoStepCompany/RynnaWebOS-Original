<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'loginform')
{
   $success_page = './../inituser.php';
   $error_page = './DeX.php';
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
   $sql = "SELECT password, fullname, active FROM ".$mysql_table." WHERE username = '".mysqli_real_escape_string($db, $_POST['username'])."'";
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
<html lang="fr">
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
<link href="DeX.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="wwb12.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Layer3").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer1").stickylayer({orientation: 7, position: [0, 0], delay: 0});
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
   $("#Layer4").stickylayer({orientation: 5, position: [0, 0], delay: 2000});
});
</script>
</head>
<body>
<div id="Layer2" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:17;">
<div id="Layer3" style="position:absolute;text-align:center;left:158px;top:176px;width:627px;height:264px;z-index:5;">
<div id="Layer3_Container" style="width:623px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Login1" style="position:absolute;left:149px;top:43px;width:448px;height:151px;text-align:right;z-index:0;">
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
<input type="submit" id="Button1" onclick="window.location.href='./../newuser.php';return false;" name="" value="Créer un nouveau compte" style="position:absolute;left:396px;top:215px;width:211px;height:25px;z-index:1;">
<input type="button" id="Button3" name="" value="Connexion à votre compte utilisateur" style="position:absolute;left:19px;top:8px;width:588px;height:25px;z-index:2;" disabled>
<div id="wb_FontAwesomeIcon7" style="position:absolute;left:19px;top:76px;width:105px;height:100px;text-align:center;z-index:3;">
<div id="FontAwesomeIcon7"><i class="fa fa-user-circle">&nbsp;</i></div></div>
</div>
</div>
<div id="Layer1" style="position:absolute;text-align:center;left:277px;top:564px;width:393px;height:83px;z-index:6;">
<div id="Layer1_Container" style="width:393px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer5" style="position:fixed;text-align:center;left:10px;top:auto;bottom:10px;width:72px;height:106px;z-index:7;">
<div id="Layer5_Container" style="width:72px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer6" style="position:fixed;text-align:center;left:auto;right:0px;top:0px;width:100px;height:100px;z-index:8;cursor: pointer;" onclick="$('#jQueryDialog3').dialog('open');return false;">
<div id="Layer6_Container" style="width:100px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer4" style="position:absolute;text-align:left;left:19px;top:14px;width:515px;height:122px;z-index:9;">
<div id="wb_Text10" style="position:absolute;left:19px;top:40px;width:476px;height:43px;text-align:center;z-index:4;">
<span style="color:#FFFFFF;font-family:'Palatino Linotype';font-size:32px;"><strong><em>DeX Version for Samsung DeX</em></strong></span></div>
</div>
</div>
<div id="jQueryDialog3" style="z-index:18;" title="Informations sur les Cookies g&#233;n&#233;rals et leurs utilisations dans le WebOS">
<div id="wb_Text5" style="position:absolute;left:14px;top:17px;width:650px;height:400px;text-align:justify;z-index:14;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong><u>Cookies information</u></strong><br><br>Les cookies sont de petits fichiers texte qui sont placés sur votre ordinateur par les sites web que vous visitez. Ils sont largement utilisés afin de permettre le fonctionnement des sites ou de rendre leur fonctionnement plus efficace, et de fournir des informations à leur propriétaire. L'utilisation de cookies est aujourd’hui la norme pour la plupart des sites. Vous pouvez gérer et contrôler les cookies en utilisant votre navigateur. Vous pouvez également les supprimer dans votre navigateur lorsque vous quittez le site.<br>Gestion des cookies<br><br>Pour la gestion des Cookies et de vos choix, la configuration de chaque navigateur est différente. Elle est décrite dans le menu d'aide de votre navigateur, qui vous permettra de savoir de quelle manière modifier vos souhaits en matière de Cookies.<br><br><strong><em>Types de cookies:<br></em></strong><br>&nbsp;&nbsp;&nbsp; - «&nbsp;Cookies de Session&nbsp;» restent stockés dans votre navigateur seulement durant votre session de navigation c'est à dire jusqu'à ce que vous quittiez le site.<br>&nbsp;&nbsp;&nbsp; - «&nbsp;Cookies Persistants&nbsp;» restent dans votre navigateur après la session (sauf si vous les avez supprimés).<br>&nbsp;&nbsp;&nbsp; - «&nbsp;Cookies de Performance&nbsp;» collectent des informations sur votre utilisation du site, comme les pages web visitées et les messages d'erreur, ils ne recueillent pas de renseignements concernant des personnes identifiées, et les informations collectées sont agrégées de sorte qu’elles sont rendues anonymes. Les cookies de performance sont utilisés pour améliorer la façon dont fonctionne un site web.<br>&nbsp;&nbsp;&nbsp; - «&nbsp;Cookies de Fonctionnalité&nbsp;» permettent au site de se rappeler les choix que vous faites sur le site web (tels que des modifications de la taille du texte, des pages personnalisées) ou activer des services tels que des commentaires sur un blog.</span></div>
<input type="button" id="Button7" onclick="$('#jQueryDialog3').dialog('close');return false;" name="" value="Compris" style="position:absolute;left:229px;top:449px;width:235px;height:25px;z-index:15;">
</div>

</body>
</html>