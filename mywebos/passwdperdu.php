<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'forgotpasswordform')
{
   $email = isset($_POST['email']) ? addslashes($_POST['email']) : '';
   $success_page = './passwdok.php';
   $error_page = './errormailstats.php';
   $mysql_server = '';
   $mysql_username = '';
   $mysql_password = '';
   $mysql_database = '';
   $mysql_table = 'userswebos';
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
   if (!$db)
   {
      die('Failed to connect to database server!<br>'.mysqli_error($db));
   }
   mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
   mysqli_set_charset($db, 'utf8');
   $sql = "SELECT * FROM ".$mysql_table." WHERE email = '".mysqli_real_escape_string($db, $email)."'";
   $result = mysqli_query($db, $sql);
   if ($data = mysqli_fetch_array($result))
   {
      $alphanum = array('a','b','c','d','e','f','g','h','i','j','k','m','n','o','p','q','r','s','t','u','v','x','y','z','A','B','C','D','E','F','G','H','I','J','K','M','N','P','Q','R','S','T','U','V','W','X','Y','Z','2','3','4','5','6','7','8','9');
      $chars = sizeof($alphanum);
      $a = time();
      mt_srand($a);
      for ($i=0; $i < 6; $i++)
      {
         $randnum = intval(mt_rand(0,55));
         $newpassword .= $alphanum[$randnum];
      }
      $crypt_pass = md5($newpassword);
      $sql = "UPDATE `".$mysql_table."` SET `password` = '$crypt_pass' WHERE `email` = '$email'";
      mysqli_query($db, $sql);
      $mailto = $_POST['email'];
      $mailfrom = 'passwdrecovery@rynnawebos.fr';
      ini_set('sendmail_from', $mailfrom);
      $subject = 'Recuperation mot de passe WebOS';
	  // Espace à la fin pour indiquer le nouveau MDP
      $message = 'Voici votre mot de passe pour votre session:   ';
      $message .= $newpassword;
      $header  = "From: passwdrecovery@rynnawebos.fr"."\r\n";
      $header .= "Reply-To: passwdrecovery@rynnawebos.fr"."\r\n";
      $header .= "MIME-Version: 1.0"."\r\n";
      $header .= "Content-Type: text/plain; charset=utf-8"."\r\n";
      $header .= "Content-Transfer-Encoding: 8bit"."\r\n";
      $header .= "X-Mailer: PHP v".phpversion();
      mail("{$mailto} <{$mailto}>", $subject, $message, $header, '-f'.$mailfrom);
      header('Location: '.$success_page);
   }
   else
   {
      header('Location: '.$error_page);
   }
   mysqli_close($db);
   exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="passwdperdu.css" rel="stylesheet">
<script src="jquery-3.1.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog1Options =
   {
      width: 652,
      height: 211,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      show: 'highlight',
      hide: 'highlight',
      autoOpen: true,
      classes: { 'ui-dialog': 'jQueryDialog1'} 
   };
   $("#jQueryDialog1").dialog(jQueryDialog1Options);
});
</script>
</head>
<body>
<div id="jQueryDialog1" style="z-index:2;" title="Vous avez perdu votre mot de passe ?">
<div id="wb_PasswordRecovery1" style="position:absolute;left:21px;top:12px;width:596px;height:108px;text-align:right;z-index:0;">
<form name="forgotpasswordform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="forgotpasswordform">
<input type="hidden" name="form_name" value="forgotpasswordform">
<table id="PasswordRecovery1">
<tr>
   <td class="header" colspan="2">Recuperation du mot de passe de session</td>
</tr>
<tr>
   <td class="label"><label for="email">Email:</label></td>
   <td class="row"><input class="input" name="email" type="text" id="email"></td>
</tr>
<tr>
   <td>&nbsp;</td><td style="text-align:left;vertical-align:bottom"><input class="button" type="submit" name="submit" value="Recuperer" id="submit"></td>
</tr>
</table>
</form>
</div>
<input type="submit" id="Button1" onclick="window.location.href='./index.php';return false;" name="" value="Annuler" style="position:absolute;left:521px;top:130px;width:96px;height:25px;z-index:1;">
</div>

</body>
</html>