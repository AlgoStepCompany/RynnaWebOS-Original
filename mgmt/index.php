<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'loginform')
{
   $success_page = './mgmtadmin.php';
   $error_page = './index.php';
   $mysql_server = '';
   $mysql_username = '';
   $mysql_password = '';
   $mysql_database = '';
   $mysql_table = 'userswebos';
   $crypt_pass = md5($_POST['password']);
   $found = false;
   $fullname = '';
   $session_timeout = 600;
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
<meta charset="utf-8">
<title>ServerManager</title>
<meta name="author" content="AlgoStep Company">
<meta name="generator" content="AlgoStep Company - ServerManager">
<link href="ServerManager.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 9, position: [0, 0], delay: 0});
});
</script>
</head>
<body>
<div id="Layer1" style="position:absolute;text-align:left;left:37px;top:39px;width:994px;height:595px;z-index:6;">
<div id="wb_Text1" style="position:absolute;left:14px;top:23px;width:132px;height:32px;z-index:0;">
<span style="color:#FFFFFF;font-family:Arial;font-size:27px;"><strong>Server</strong></span></div>
<div id="wb_Text2" style="position:absolute;left:72px;top:46px;width:158px;height:32px;z-index:1;">
<span style="color:#FFFFFF;font-family:Arial;font-size:27px;"><strong>Manager</strong></span></div>
<div id="wb_Text3" style="position:absolute;left:730px;top:16px;width:250px;height:16px;text-align:right;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Version 1.0</span></div>
<hr id="Line1" style="position:absolute;left:14px;top:103px;width:966px;z-index:3;">
<div id="wb_Text4" style="position:absolute;left:15px;top:120px;width:955px;height:189px;text-align:justify;z-index:4;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">Bienvenue dans Server-Manager d'AlgoStep Company® !<br>Grâce à cette interface vous pouvez gérer et vérifier tout les WebOS installés sur votre serveur et parcourir les données de vos sites hébergeant un WebOS.<br>Vous pouvez également les tester grâce au système d'aperçu des WebOS virtualisé (compatible PHP 7 uniquement).<br><br>Cette version du Server-Manager vous permet d'utiliser simultanément jusqu'à <u>4 consoles graphiques virtuelles</u> (soit 4 WebOS différents) sur votre serveur.<br><em>Pour augmenter cette valeur vous pouvez ajouter manuellement, par le code source du fichier &quot;mgmtadmin.php&quot;, des Items à la ListView1.</em><br><br><strong><u>Pour commencer veuillez vous identifier avec votre compte Administrateur Serveur pour vous connecter à votre espace de Management :</u></strong></span></div>
<div id="wb_Login1" style="position:absolute;left:252px;top:345px;width:490px;height:217px;z-index:5;">
<form name="loginform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<table id="Login1">
<tr>
   <td class="header">Connexion requise</td>
</tr>
<tr>
   <td class="label"><label for="username">Identifiant</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="username" type="text" id="username" value="<?php echo $username; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="password">Mot de passe</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="password" type="password" id="password" value="<?php echo $password; ?>"></td>
</tr>
<tr>
   <td style="text-align:center;vertical-align:bottom"><input class="button" type="submit" name="login" value="Verifier" id="login"></td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>