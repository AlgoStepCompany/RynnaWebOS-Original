<?php
/**-------------------------------------------------
 | AJAX-Browser  -  by Alban LOPEZ
 | Copyright (c) 2007 Alban LOPEZ
 | Email bugs/suggestions to alban.lopez@gmail.com
 +--------------------------------------------------
 | This script has been created and released under
 | the GNU GPL and is free to use and redistribute
 | only if this copyright statement is not removed
 +--------------------------------------------------*/

$file_globalconf = INSTAL_DIR.'ajaxb.conf';
$file_accounts = INSTAL_DIR.'accounts.conf';
$file_blacklist = INSTAL_DIR.'blacklist.conf';

$account_exemple = array (
	'code' => '',
	'usr_email' => '',
	'language_file' => 'Language en.php',
	'def_mode' => 'arborescence',		// ['arborescence', 'gallerie']
	'def_racine' => './',
	'mini_size' => 100,					// [75, 100, 200, 300, 400]
	'last' => '',
	'IP_count' => array ( ),
	'droits' => array (
		'.VIEW' => FALSE, 				// view hidden files
		'..VIEW' => FALSE, 				// browse parent directory
		'REN' => FALSE, 				// rename item(s)
		'NEW' => FALSE, 				// make new folder or file
		'COPY' => FALSE, 				// copy item(s)
		'MOVE' => FALSE, 				// move item(s)
		'DEL' => FALSE, 				// remove definitively item(s)
		'CP_VIEW' => FALSE, 			// view item with CodePress
		'CP_EDIT' => FALSE, 			// edit item with CodePress
		'DOWNLOAD' => FALSE, 			// download item(s)
		'UPLOAD' => 'NO', 				// upload item(s) ['NO', 'OnlyAlways', 'ExceptRestrict', 'ALL']
		'UNCOMPRESS' => FALSE, 		// Uncompress file
		'GLOBAL_SETTING' => FALSE,	// setup global value
		'GLOBAL_ACCOUNTS' => FALSE	// setup one's account
		)
	);

$ajaxb_conf_exemple = array (
	'admin_email' => 'alban.lopez@gmail.com',
	'ajaxb_miror' => 'ajaxbrowser.free.fr',
	'restrict_mask' => array ('*.php','*.php5','*.asp','*.bin','*.exe'),
	'always_mask' => array ('*.html','*.avi','*.png','*.jpg','*.txt'),
	'codepress_mask' => array ('*.html','*.txt','*.php','*.php5','*.asp','*.*~'),
	'mini_dir' => './Mini/',
	'mini_intervale' => 250,
	'spy_dir' => './Spy/',
	'spy' => array (
		'ip' => false,
		'log' => false,
		'action' => false,
		'browse' => false
		),
	);

		$spath=session_save_path();
		if (!is_dir($spath) && !empty($spath))
		{
			$ErrrorMsg .= __FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
			if (!is_dir(mkdirs(str_replace(realpath('./'), '.', $spath), 0700, true)))
			{
				$ErrrorMsg .= __FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
				echo $ABS[100].' ("'.session_save_path().'").<br>';
			}
		}
		ini_set('session.use_cookies', '1');
		ini_set('session.use_only_cookies', '0');
		session_cache_limiter ('nocache');
		session_cache_expire (60);			// Configure le délai d'expiration à 30 minutes
		session_start();						// On démarre la session avant toute autre chose

	if (isset($stop))
	{
		$_SESSION['AJAX-B'] = array(0);	// on vide bien la variable de session
		unset($_SESSION['AJAX-B']);		// et on detruit le contenue de session ki nous conserne
		if (empty($_SESSION))			// si aprés ca la session est vide on peut en deduire que personne d'autre ne l'utilise
		{
			setcookie(session_name(), '', time()-100000, '/');	// on force le cookie de session a etre périmé
			session_destroy();								 // on detruit la session sur le serveur
		}
	}

	if (!file_exists($file_globalconf)) file_put_contents($file_globalconf, var_export($ajaxb_conf_exemple, true));
	if (!file_exists($file_blacklist)) file_put_contents($file_blacklist, 'array()');

	if ((!file_exists($file_accounts) || filesize($file_accounts)<100) && empty($_SESSION['AJAX-B']))
	{
		$ErrrorMsg .= __FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
		if ($code1==$code2 && !empty($login))
		{
			$account_exemple['droits']['GLOBAL_SETTING']=true;
			$account_exemple['droits']['GLOBAL_ACCOUNTS']=true;
			$account_exemple["IP_count"][$_SERVER['REMOTE_ADDR']]++;
			file_put_contents($file_accounts, var_export(addUser($account_exemple, is_file($file_accounts)?eval('return '.file_get_contents($file_accounts).';'):array(), $login, $code1), true));
		}
		else
		{
			$ErrrorMsg .= __FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
?>
<html>
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<title><?php echo $ABS[1];?></title>
	</head>
	<style type="text/css">
		html, body, table { position: absolute;width:100%;height:100%;padding:0px;margin:0px;}
		body {font-size:10px;}
		input, span {width:120px;}
		input:hover {background:rgb(230,250,210);}
		td, tr {vertical-align:middle;text-align:center;}
		div {margin-left: auto;margin-right:auto;background-color:rgb(220,230,255);padding:2px 10px;width:250px;-moz-border-radius:8px;font-weight:bold;border:1px solid gray;}
	</style>
	<body onLoad="document.getElementById('login').focus()">
		<form method="post" action="?">
		<table >
		<tr>
			<td>
				<div>
					<p><?php echo $ABS[101];?></p>
					<p><?php echo $ABS[102];?></p>
					<p><span><?php echo $ABS[5];?> : </span><input type="text" id="login" name="login"></p>
					<p><span><?php echo $ABS[6];?> : </span><input type="password" name="code1"></p>
					<p><span><?php echo $ABS[6];?> : </span><input type="password" name="code2"></p>
					<p><input type="submit" value="Make Account"></p>
					<a href="http://ajaxbrowser.free.fr/"><?php echo $ABS[301];?></a>
				</div>
			</td>
		<tr>
		</table>
	</form>
	</body>
</html>
<?php
			exit ();
		}
	}
	elseif (empty($_SESSION['AJAX-B']))
	{
		$GLOBALS['AJAX-Var']['global'] = eval('return '.file_get_contents($file_globalconf).';');
		$GLOBALS['AJAX-Var']['accounts'] = eval('return '.file_get_contents($file_accounts).';');
		$GLOBALS['AJAX-Var']['blacklist'] = eval('return '.file_get_contents($file_blacklist).';');
		
		if (($a=$GLOBALS['AJAX-Var']['blacklist'][$_SERVER['REMOTE_ADDR']])>10)
		{
			$ErrrorMsg .= __FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
			echo ($a+1).$ABS[35];
			$GLOBALS['AJAX-Var']['blacklist'][$_SERVER['REMOTE_ADDR']]++;
			file_put_contents($file_blacklist, var_export($GLOBALS['AJAX-Var']['blacklist'], true));
			exit();
		}
		elseif (isset($login) && $GLOBALS['AJAX-Var']['accounts'][$login]["code"]==crypt($code,$login))
		{
			$ErrrorMsg .= __FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
			$GLOBALS['AJAX-Var']["accounts"][$login]["IP_count"][$_SERVER['REMOTE_ADDR']]++;
			$GLOBALS['AJAX-Var']["accounts"][$login]["last"] = date ("d/m/y H:i:s",time());

			$_SESSION['AJAX-B'] = array_merge(
				array('login' => $login),
				$GLOBALS['AJAX-Var']['global'],
				$GLOBALS['AJAX-Var']['accounts'][$login]);
			unset ($_SESSION['AJAX-B']['code']);
			file_put_contents($file_accounts, var_export($GLOBALS['AJAX-Var']['accounts'], true));
			if ($_SESSION['AJAX-B']['spy']['log'])
				file_put_contents ($_SESSION['AJAX-B']['spy_dir'].'/Log.spy', $login.($_SESSION['AJAX-B']['spy']['ip']?' > '.$_SERVER['REMOTE_ADDR']:'').' ['.date ("d/m/y H:i:s",time()).'] > '.$_SERVER['HTTP_USER_AGENT']."\n", FILE_APPEND);
		}
		else
		{
			if (!empty($login))
			{
				$ErrrorMsg .= __FILE__."\n".'Problem on line '.(__LINE__ - 2)."\n";
				if ($_SESSION['AJAX-B']['spy']['log'])
					file_put_contents ($_SESSION['AJAX-B']['spy_dir'].'/WRONG_Log.spy', $login.($GLOBALS['AJAX-Var']['global']['spy']['ip']?' > '.$_SERVER['REMOTE_ADDR']:'').' ['.date ("d/m/y H:i:s",time()).'] > '.$_SERVER['HTTP_USER_AGENT']."\n", FILE_APPEND);
				$GLOBALS['AJAX-Var']['blacklist'][$_SERVER['REMOTE_ADDR']]++;
				file_put_contents($file_blacklist, var_export($GLOBALS['AJAX-Var']['blacklist'], true));
			}
		?>
		<html>
			<head>
				<meta content="text/html; charset=UTF-8" http-equiv="content-type">
				<title><?php echo $ABS[1];?></title>
			</head>
			<style type="text/css">
				html, body, table { position: absolute;width:100%;height:100%;padding:0px;margin:0px;}
				body {font-size:10px;}
				input, span {width:120px;}
				input:hover {background:rgb(230,250,210);}
				td, tr {vertical-align:middle;text-align:center;}
				div {margin-left: auto;margin-right:auto;background-color:rgb(220,230,255);padding:2px 10px;width:250px;-moz-border-radius:8px;font-weight:bold;border:1px solid gray;}
			</style>
			<script type="text/javascript" src="<?php echo INSTAL_DIR; ?>scripts/Dom-drag.js"></script>
			<script type="text/javascript" src="<?php echo INSTAL_DIR; ?>scripts/Dom-event.js"></script>
			<script type="text/javascript" src="<?php echo INSTAL_DIR; ?>scripts/Common.js"></script>
			<body onLoad="document.getElementById('login').focus()">
			<form method="post" action="?">
				<table >
				<tr>
					<td>
						<div>
							<p><span><?php echo $ABS[5];?> : </span><input type="text" id="login" name="login" value="<?php echo $login?$login:"anonymous"; ?>"></p>
							<p><span><?php echo $ABS[6];?> : </span><input type="password" name="code"></p>
							<p><button type="submit" name="mode" value="arborescence"><?php echo $ABS[12];?></button><button type="submit" name="mode" value="gallerie"><?php echo $ABS[13];?></button></p>
							<a href="http://ajaxbrowser.free.fr/"><?php echo $ABS[301];?></a>
						</div>
					</td>
				<tr>
				</table>
			</form>
			</body>
		</html>
		<?php
		exit();
		}
	}
?>