<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./demousr.php');
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
      header('Location: ./demousr.php');
      exit;
   }
}
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   $accessdenied_page = '';
   header('Location: '.$accessdenied_page);
   exit;
}
$mysql_server = '';
$mysql_username = '';
$mysql_password = '';
$mysql_database = '';
$mysql_table = 'userswebos';
$error_message = '';
$db_username = '';
$db_fullname = '';
$db_email = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'editprofileform')
{
   $success_page = './modif.php';
   $oldusername = $_SESSION['username'];
   $newusername = $_POST['username'];
   $newemail = $_POST['email'];
   $newpassword = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];
   $newfullname = $_POST['fullname'];
   if ($newpassword != $confirmpassword)
   {
      $error_message = 'Les mots de passes ne correspondent pas. Veuillez reessayer.';
   }
   else
	   	   // Majuscules interdites
   if (!preg_match("/^[a-z0-9_!@$]{1,50}$/", $newusername))
   {
      $error_message = 'Votre nom de compte n existe pas. Veuillez reessayer.';
   }
   else
   if (!empty($newpassword) && !preg_match("/^[A-Za-z0-9_!@$]{1,50}$/", $newpassword))
   {
      $error_message = 'Votre mot de passe n est pas valide. Veuillez reessayer.';
   }
   else
   if (!preg_match("/^[A-Za-z0-9_!@$.' &]{1,50}$/", $newfullname))
   {
      $error_message = 'Le pseudonyme n est pas valide. Veuillez reessayer.';
   }
   else
   if (!preg_match("/^.+@.+\..+$/", $newemail))
   {
      $error_message = 'Votre e-mail n est pas valide. Veuillez reessayer.';
   }
   else
   {
      $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
      if (!$db)
      {
         die('Failed to connect to database server!<br>'.mysqli_error($db));
      }
      mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
      mysqli_set_charset($db, 'utf8');
      if ($oldusername != $newusername)
      {
         $sql = "SELECT username FROM ".$mysql_table." WHERE username = '".mysqli_real_escape_string($db, $newusername)."'";
         $result = mysqli_query($db, $sql);
         if ($data = mysqli_fetch_array($result))
         {
            $error_message = '';
         }
      }
      if (empty($error_message))
      {
         $crypt_pass = md5($newpassword);
         $newusername = mysqli_real_escape_string($db, $newusername);
         $newemail = mysqli_real_escape_string($db, $newemail);
         $newfullname = mysqli_real_escape_string($db, $newfullname);
         $sql = "UPDATE `".$mysql_table."` SET `username` = '$newusername', `fullname` = '$newfullname', `email` = '$newemail' WHERE `username` = '$oldusername'";
         mysqli_query($db, $sql);
         if (!empty($newpassword))
         {
            $sql = "UPDATE `".$mysql_table."` SET `password` = '$crypt_pass' WHERE `username` = '$oldusername'";
            mysqli_query($db, $sql);
         }
      }
      mysqli_close($db);
      if (empty($error_message))
      {
         $_SESSION['username'] = $newusername;
         $_SESSION['fullname'] = $newfullname;
         header('Location: '.$success_page);
         exit;
      }
   }
}
$db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
if (!$db)
{
   die('Failed to connect to database server!<br>'.mysqli_error($db));
}
mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
mysqli_set_charset($db, 'utf8');
$sql = "SELECT * FROM ".$mysql_table." WHERE username = '".$_SESSION['username']."'";
$result = mysqli_query($db, $sql);
if ($data = mysqli_fetch_array($result))
{
   $db_username = $data['username'];
   $db_fullname = $data['fullname'];
   $db_email = $data['email'];
}
mysqli_close($db);
if (session_id() == "")
{
   session_start();
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="modifuser.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="wwb12.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog2Options =
   {
      width: 671,
      height: 389,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: true,
      show: 'highlight',
      hide: 'highlight',
      autoOpen: true,
      classes: { 'ui-dialog': 'jQueryDialog2'} 
   };
   $("#jQueryDialog2").dialog(jQueryDialog2Options);
});
</script>
</head>
<body>

<div id="jQueryDialog2" style="z-index:4;" title="G&#233;rer votre compte personnel">
<div id="wb_EditProfile1" style="position:absolute;left:17px;top:96px;width:621px;height:231px;text-align:right;z-index:0;">
<form name="editprofileform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="editprofileform">
<input type="hidden" name="form_name" value="editprofileform">
<table id="EditProfile1">
<tr>
   <td class="header" colspan="2">Mettre a jour votre compte utilisateur</td>
</tr>
<tr>
   <td class="label"><label for="fullname">Pseudonyme:</label></td>
   <td class="row"><input class="input" name="fullname" type="text" id="fullname" value="<?php echo $db_fullname; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="username">Nom de compte:</label></td>
   <td class="row"><input class="input" name="username" type="text" id="username" value="<?php echo $db_username; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="password">Mot de passe:</label></td>
   <td class="row"><input class="input" name="password" type="password" id="password"></td>
</tr>
<tr>
   <td class="label"><label for="confirmpassword">Confirmer votre mot de passe:</label></td>
   <td class="row"><input class="input" name="confirmpassword" type="password" id="confirmpassword"></td>
</tr>
<tr>
   <td class="label"><label for="email">E-mail:</label></td>
   <td class="row"><input class="input" name="email" type="text" id="email" value="<?php echo $db_email; ?>"></td>
</tr>
<tr>
   <td colspan="2"><?php echo $error_message; ?></td>
</tr>
<tr>
   <td>&nbsp;</td><td style="text-align:left;vertical-align:bottom"><input class="button" type="submit" name="update" value="VALIDER" id="update"></td>
</tr>
</table>
</form>
</div>
<div id="wb_Text9" style="position:absolute;left:15px;top:42px;width:623px;height:32px;z-index:1;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Modifier votre compte entrainera un re-démarrage de votre session !</strong><br>Modifier votre nom de compte provoquera la perte de votre espace personnel sur l'hébergeur de fichiers !</span></div>
<div id="wb_LoginName1" style="position:absolute;left:15px;top:11px;width:461px;height:26px;z-index:2;">
<span id="LoginName1">Bienvenue <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['username'];
}
else
{
   echo '!ERREUR!';
}
?> ; voici vos paramètres  :</span></div>
</div>

<script>
var wb_Timer1;
function TimerStartTimer1()
{
   wb_Timer1 = setInterval(function()
   {
      var event = null;
      $('#jQueryDialog2').dialog('open');
   }, 1000);
}
function TimerStopTimer1()
{
   clearInterval(wb_Timer1);
}
TimerStartTimer1();
</script>

</body>
</html>