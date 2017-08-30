<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ');
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
      header('Location: ');
      exit;
   }
}

// Traitement du formulaire
if (isset($_POST['editbox1'])) { // Si le formulaire a été validé
    if (!empty($_POST['editbox1']) && !empty($_POST['textarea1'])) { // Si les données ne sont pas vides
		
        // Procédure de création du dosssier contenant le code EditBox1 dans ./applisgenerated/[EditBox1]
        
		$getcwd = getcwd();
		
		$mkusercreategen = $getcwd . '\\..\applisgenerated\\' . $_POST['editbox1'];
	    $mktempusercreategen = mkdir($mkusercreategen);
		if (!$mktempusercreategen) { // Si échec du mkdir
			echo '<script>alert("Ce programme existe deja !")</script>';
			exit;
		}
		
        $mkusercreategen2 = $mkusercreategen . '\\images';
	    $mktempusercreategen2 = mkdir($mkusercreategen2);
		if (!$mktempusercreategen2) { // Si échec du mkdir
			echo '<script>alert("Erreur lors de la création du dossier (1)")</script>';
			exit;
		}
	
	    // Dbut de la copie des fichiers
		
	    $algofilegen1 = $getcwd . "\..\applisweb_vierge\MaterialIcons-Regular.eot";
	    $algofilegen2 = $getcwd . "\..\applisweb_vierge\MaterialIcons-Regular.ijmap";
	    $algofilegen3 = $getcwd . "\..\applisweb_vierge\MaterialIcons-Regular.svg";
	    $algofilegen4 = $getcwd . "\..\applisweb_vierge\MaterialIcons-Regular.ttf";
	    $algofilegen5 = $getcwd . "\..\applisweb_vierge\MaterialIcons-Regular.woff";
	    $algofilegen6 = $getcwd . "\..\applisweb_vierge\MaterialIcons-Regular.woff2";
	    $algofilegen7 = $getcwd . "\..\applisweb_vierge\monapplis.css";
	    $algofilegen8 = $getcwd . "\..\applisweb_vierge\RynnaWebOS.css";
	    $algofilegen9 = $getcwd . "\..\applisweb_vierge\images\newscreenx2.jpg";
	    
        // Fin de la copie en mémoire des chemins des fichiers des Applis Web externe à générer
	    
		copy($algofilegen1, "$mkusercreategen\MaterialIcons-Regular.eot");
	    copy($algofilegen2, "$mkusercreategen\MaterialIcons-Regular.ijmap");
	    copy($algofilegen3, "$mkusercreategen\MaterialIcons-Regular.svg");
	    copy($algofilegen4, "$mkusercreategen\MaterialIcons-Regular.ttf");
	    copy($algofilegen5, "$mkusercreategen\MaterialIcons-Regular.woff");
	    copy($algofilegen6, "$mkusercreategen\MaterialIcons-Regular.woff2");
	    copy($algofilegen7, "$mkusercreategen\monapplis.css");
	    copy($algofilegen8, "$mkusercreategen\RynnaWebOS.css");
	    copy($algofilegen9, "$mkusercreategen2\newscreenx2.jpg");
	    
		// Fin de la copie des fichiers
		
		// Création du scriptportant le nom de editbox1
		
		$file = fopen($mkusercreategen . '/' . $_POST['editbox1'] . '.php', 'w+');
		if (!$file) { // Si échec lors de l'ouverture du fichier
			echo '<script>alert("Erreur lors de l\'ouverture du fichier")</script>';
			exit;
		}
		
		$ret = fwrite($file, $_POST['textarea1']);
		if (!$ret) { // Si échec lors de l'écriture dans le fichier
			echo '<script>alert("Erreur lors de l\'écriture dans le fichier")</script>';
			exit;
		}
		
		$ret = fclose($file);
		if (!$ret) { // Si échec lors de la fermeture du fichier
			echo '<script>alert("Erreur lors de la fermeture du fichier")</script>';
			exit;
		}
	}
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>RynnaWebOS</title>
        <meta name="generator" content="AlgoStep Company - 2006-2017">
        <link href="RynnaWebOS.css" rel="stylesheet">
        <link href="generatiugtest.css" rel="stylesheet">
    </head>
    <body>
        <div id="Layer1" style="position:fixed;overflow:auto;text-align:left;left:0;top:0;right:0;bottom:0;z-index:3;">
        <form method="POST" action="">
<textarea name="textarea1" style="position:absolute;left:12px;top:55px;width:523px;height:231px;z-index:0;" rows="11" cols="72" spellcheck="false">
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Nom de la fenetre -->
<title>RynnaWebOS</title>
<!-- Nom du developpeur -->
<meta name="generator" content="AlgoStep Company - 2006-2017">
<!-- NE PAS MODIFIER -->
<link href="RynnaWebOS.css" rel="stylesheet">
<!-- NE PAS MODIFIER -->
<link href="monapplis.css" rel="stylesheet">
</head>
<body>
<!-- Changer ici uniquement l adresse Web indiquée par votre cible (page web ou encore programme SWF/PHP/SQL/HTML/JAVASCRIPT/JAVA) -->
<div id="Layer1" style="position:fixed;overflow:auto;text-align:left;left:0;top:0;right:0;bottom:0;z-index:1;">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
src="http://VOTRE-ADRESSE-WEB-ICI.fr">
</iframe><br />
</div>
</body>
</html>
</textarea>
            <input type="submit" value="Génerer maintenant l'application Web !" style="position:absolute;left:11px;top:313px;width:535px;height:61px;z-index:1;">
            <input type="text" style="position:absolute;left:11px;top:16px;width:524px;height:17px;line-height:17px;z-index:2;" name="editbox1" value="Nom de mon application Web" maxlength="30" spellcheck="false">
        </form>
		</div>
    </body>
</html>
