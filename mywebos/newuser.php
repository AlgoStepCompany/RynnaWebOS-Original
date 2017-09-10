<?php
$mysql_server = '';
$mysql_username = '';
$mysql_password = '';
$mysql_database = '';
$mysql_table = 'userswebos';
$success_page = './createuser.php';
$error_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'signupform')
{
	// Nouveauté MySQLi
   $newusername = $_POST['username'];
   $newemail = $_POST['email'];
   $newpassword = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];
   $newfullname = $_POST['fullname'];
   $code = 'NA';
   if ($newpassword != $confirmpassword)
   {
      $error_message = 'Les mots de passe ne correspondent pas. Merci de reessayer.';
   }
   else
	   // Majuscules interdites
   if (!preg_match("/^[a-z0-9_!@$]{1,50}$/", $newusername))
   {
      $error_message = 'Votre nom de compte n est pas valide. Veuillez reessayer.';
   }
   else
   if (!preg_match("/^[A-Za-z0-9_!@$]{1,50}$/", $newpassword))
   {
      $error_message = 'Votre mot de passe n est pas valide. Veuillez reessayer.';
   }
   else
   if (!preg_match("/^[A-Za-z0-9_!@$.' &]{1,50}$/", $newfullname))
   {
      $error_message = 'Votre pseudonyme n est pas valide.';
   }
   else
   if (!preg_match("/^.+@.+\..+$/", $newemail))
   {
      $error_message = 'Adresse e-mail que vous avez entrez n est pas correcte.';
   }
   if (empty($error_message))
   {
      $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
      if (!$db)
      {
         die('Failed to connect to database server!<br>'.mysqli_error($db));
      }
      mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
      mysqli_set_charset($db, 'utf8');
      $sql = "SELECT username FROM ".$mysql_table." WHERE username = '".$newusername."'";
      $result = mysqli_query($db, $sql);
      if ($data = mysqli_fetch_array($result))
      {
         $error_message = 'Le nom de compte renseigner existe deja. Merci d en choisir un autre.';
      }
   }
   if (empty($error_message))
   {
      $crypt_pass = md5($newpassword);
      $newusername = mysqli_real_escape_string($db, $newusername);
      $newemail = mysqli_real_escape_string($db, $newemail);
      $newfullname = mysqli_real_escape_string($db, $newfullname);
      $sql = "INSERT `".$mysql_table."` (`username`, `password`, `fullname`, `email`, `active`, `code`) VALUES ('$newusername', '$crypt_pass', '$newfullname', '$newemail', 1, '$code')";
      $result = mysqli_query($db, $sql);
      mysqli_close($db);
	  	  	  // Procédure de création de la session personnelle (30 secondes maximums de créations)
	  // Dernière modification : Version 7.8 de Rynna WebOS
	  $mkusercreate = 'home/' . $_POST["username"];
		$mktempusercreate = mkdir($mkusercreate);
		// Nouvelle ajout : le dossier config pour les nouveaux comptes pour les sessions personnalisables
		mkdir("$mkusercreate/config/");
		$algofile1 = "config_copie/config/ftpserv.txt";
		$algofile2 = "config_copie/config/LISEZ-MOI.txt";
		$algofile3 = "config_copie/config/muse.txt";
		$algofile4 = "config_copie/config/notepad.txt";
		$algofile5 = "config_copie/config/notepadactiv.txt";
		$algofile6 = "config_copie/config/onglet1.txt";
		$algofile7 = "config_copie/config/onglet2.txt";
		$algofile8 = "config_copie/config/onglet3.txt";
		$algofile9 = "config_copie/config/onglet4.txt";
		$algofile10 = "config_copie/config/temp.txt";
		// Fin de la copie en mémoire des chemins des fichiers de configurations
			// Copie des ficheirs dans la session personnelle
			copy($algofile1, "$mkusercreate/config/ftpserv.txt");
			copy($algofile2, "$mkusercreate/config/LISEZ-MOI.txt");
			copy($algofile3, "$mkusercreate/config/muse.txt");
			copy($algofile4, "$mkusercreate/config/notepad.txt");
			copy($algofile5, "$mkusercreate/config/notepadactiv.txt");
			copy($algofile6, "$mkusercreate/config/onglet1.txt");
			copy($algofile7, "$mkusercreate/config/onglet2.txt");
			copy($algofile8, "$mkusercreate/config/onglet3.txt");
			copy($algofile9, "$mkusercreate/config/onglet4.txt");
			copy($algofile10, "$mkusercreate/config/temp.txt");
			// Fin de la copie des fichiers dans le répertoire de l utilisateur
      $mailfrom = 'support@rynnawebos.fr';
      ini_set('sendmail_from', $mailfrom);
      $subject = 'Compte WebOS Rynna creer !';
      $message = 'Votre nom de compte a bien ete creer.';
      $message .= "\r\nUsername: ";
      $message .= $newusername;
      $message .= "\r\n";
	  $message .= 'Bienvenue sur votre nouveau bureau virtuel !';
      $message .= "\r\n";
	  $message .= 'Vous pouvez desormais vous connecter sur http://rynnawebos.fr/login/index.php ';
      $message .= "\r\n";
      $header  = "From: support@rynnawebos.fr"."\r\n";
      $header .= "Reply-To: support@rynnawebos.fr"."\r\n";
      $header .= "MIME-Version: 1.0"."\r\n";
      $header .= "Content-Type: text/plain; charset=utf-8"."\r\n";
      $header .= "Content-Transfer-Encoding: 8bit"."\r\n";
      $header .= "X-Mailer: PHP v".phpversion();
      mail("{$newemail} <{$newemail}>", $subject, $message, $header, '-f'.$mailfrom);
      mail('support@rynnawebos.fr', $subject, $message, $header);
      header('Location: '.$success_page);
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
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="newuser.css" rel="stylesheet">
<script src="jquery-3.1.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="wwb12.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog2Options =
   {
      width: 634,
      height: 426,
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
   var jQueryDialog1Options =
   {
      modal: true,
      width: 865,
      height: 470,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      show: 'highlight',
      hide: 'fade',
      autoOpen: true,
      classes: { 'ui-dialog': 'jQueryDialog1'} 
   };
   $("#jQueryDialog1").dialog(jQueryDialog1Options);
});
</script>
</head>
<body>
<div id="jQueryDialog2" style="z-index:6;" title="Cr&#233;er un nouveau compte utilisateur">
<div id="wb_Signup1" style="position:absolute;left:17px;top:111px;width:598px;height:219px;text-align:right;z-index:0;">
<form name="signupform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="signupform">
<input type="hidden" name="form_name" value="signupform">
<table id="Signup1">
<tr>
   <td class="header" colspan="2">Remplissez les champs pour poursuivre</td>
</tr>
<tr>
   <td class="label"><label for="fullname">Pseudonyme (pour le Tchat) :</label></td>
   <td class="row"><input class="input" name="fullname" type="text" id="fullname"></td>
</tr>
<tr>
   <td class="label"><label for="username">Nom de compte (minuscules uniquement) :</label></td>
   <td class="row"><input class="input" name="username" type="text" id="username"></td>
</tr>
<tr>
   <td class="label"><label for="password">Mot de passe (attention minuscule et majuscule) :</label></td>
   <td class="row"><input class="input" name="password" type="password" id="password"></td>
</tr>
<tr>
   <td class="label"><label for="confirmpassword">Confirmer mot de passe (reecrire une seconde fois) :</label></td>
   <td class="row"><input class="input" name="confirmpassword" type="password" id="confirmpassword"></td>
</tr>
<tr>
   <td class="label"><label for="email">E-mail (pour vous envoyer vos identifiants) :</label></td>
   <td class="row"><input class="input" name="email" type="text" id="email"></td>
</tr>
<tr>
   <td colspan="2"><?php echo $error_message; ?></td>
</tr>
<tr>
   <td>&nbsp;</td><td style="text-align:left;vertical-align:bottom"><input class="button" type="submit" name="signup" value="Valider" id="signup"></td>
</tr>
</table>
</form>
</div>
<input type="submit" id="Button1" onclick="window.location.href='./index.php';return false;" name="" value="Annuler et revenir en arrière" style="position:absolute;left:343px;top:343px;width:272px;height:25px;z-index:1;">
<div id="wb_Text1" style="position:absolute;left:9px;top:13px;width:605px;height:80px;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Une fois valider merci de patienter. La création d'un nouveau compte peut prendre jusqu'à 1 minute.<br>ATTENTION : les caractères que vous utiliserez pour créer votre Nom de Compte doivent être uniquement en minuscules. Par contre pour votre mot de passe celui-ci devra respecter la casse (minuscules et/ou majuscules).</strong></span></div>
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
</script>

<div id="jQueryDialog1" title="Licence Utilisateur (OBLIGATOIRE)">
<div id="Html17" style="position:absolute;left:11px;top:13px;width:821px;height:351px;overflow:auto;z-index:3">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/licencenewusers.php">
</iframe><br /></div>
<input type="submit" id="Button2" onclick="window.location.href='./index.php';return false;" name="" value="Je refuse la licence" style="position:absolute;left:28px;top:382px;width:222px;height:25px;z-index:4;">
<input type="submit" id="Button3" onclick="TimerStartTimer1();$('#jQueryDialog1').dialog('close');return false;" name="" value="J'accepte la licence" style="position:absolute;left:584px;top:382px;width:248px;height:25px;z-index:5;">
</div>

</body>
</html>
