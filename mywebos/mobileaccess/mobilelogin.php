<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'loginform')
{
   $success_page = './sessionmobile.php';
   $error_page = './mobilelogin.php';
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
<html>
<head>
<meta charset="utf-8">
<title>Session Mobile</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="classic/jquery.mobile.theme-1.4.5.css" rel="stylesheet">
<link href="classic/jquery.mobile.icons-1.4.5.min.css" rel="stylesheet">
<link href="jquery.mobile.structure-1.4.5.min.css" rel="stylesheet">
<link href="RynnaWebOS_mobile.css" rel="stylesheet">
<link href="mobilelogin.css" rel="stylesheet">
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
<div data-role="page" data-theme="b" data-title="Session Mobile" id="mobilelogin">
<div class="ui-content" role="main">
<form name="loginform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<div class="ui-field-contain">
<label for="username">Nom de compte :</label>
<input type="text" id="username" style="" name="username" value="<?php echo $username; ?>" spellcheck="false">
</div><div class="ui-field-contain">
<label for="password">Mot de passe :</label>
<input type="password" id="password" style="" name="password" value="<?php echo $password; ?>" spellcheck="false">
</div><div id="rememberme">
<fieldset data-role="controlgroup" data-shadow="true">
<input type="checkbox" id="rememberme-0" name="rememberme" value="on" checked>
<label for="rememberme-0">Se rappeler de moi</label>
</fieldset>
</div><input type="submit" id="login" name="login" value="Connexion"></form>

<hr id="Line1" style="">
<input type="button" id="Button1" onclick="window.location.href='./infosmobile.html';return false;" name="" value="Annuler">
</div>
</div>
</body>
</html>