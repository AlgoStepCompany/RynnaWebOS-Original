<?php
	session_start();
	$rootdir = "en_attente_validation";
	$imagedir = "images";
	
	$imagedir = "images";

	if ( ! is_dir($rootdir) )
	{
		echo "Unable to get access to $rootdir, contact your web administrator.";
		die();
	}
	
	$currentdir = $_GET['path'];
	
	// on tronque le debut si c'est un /
	if ( substr($currentdir,0,1) == "/" )
	{
		$currentdir = substr($currentdir,1,strlen($currentdir) - 1);
	}
	
	// si la fin de $currentdir = .. alors on retourne a la racine de ce dossier
	if ( substr($currentdir, strlen($currentdir) - 2, 2) == ".." )
	{
		// strip last /..
		$currentdir = substr($currentdir, 0, strlen($currentdir) - 3);
		
		// strip last /dirname
		$currentdir = substr($currentdir, 0, strrpos($currentdir,"/"));
	}
	
	// si la fin de $currentdir = /. alors on retourne a la racine de ce dossier
	if ( substr($currentdir, strlen($currentdir) - 2, 2) == "/." )
	{
		$currentdir = substr($currentdir, 0,strlen($currentdir) - 2);
	}
	
	// evite tout probleme de securite MAISempeche les nom de rep avec .. dedans
	$currentdir = str_replace("..", "", $currentdir);

	// on traite les actions spÃ©ciales
	$action = $_GET['action'];
	switch($action)
	{
		case "mkdir":
			if ( isset($_GET['arg'] ) )
			{
				// evite tout probleme de securite MAIS empeche les nom de rep avec .. dedans
				$mkdir = str_replace("..", "", $_GET['arg']);
				umask (0);
				mkdir($rootdir . "/" . $currentdir . "/" . $mkdir);			
			}
			else
			{
				$affiche_creer_formulaire = true;

			}
			break;
			
			case "touch":
			if ( isset($_GET['arg'] ) )
			{
				// evite tout probleme de securite MAIS empeche les nom de rep avec .. dedans
				$touch = str_replace("..", "", $_GET['arg']);
				umask (0);
				touch($rootdir . "/" . $currentdir . "/" . $touch);			
			}
			else
			{
				$affiche_creer_fichier = true;

			}
			break;
		
		case "rm";
			if ( isset($_GET['confirmation'] ) )
			{
				// evite tout probleme de securite MAIS empeche les nom de rep avec .. dedans
				$rm = str_replace("..", "", $_GET['path']);
				
				if ( isset($_GET['file']) )
					$rm = $rm . "/" . str_replace("..","", $_GET['file']) ;
					
				system("rm -r '". $rootdir . "/" . $rm . "'") ;
			}
			else
			{
				if( ! isset($_GET['infirmation']))
					$affiche_supprimer_formulaire=true;

			}
			// si l'on ne supprimait pas un fichier (donc un rep, on doit retourner a la racine quelque soit la reponse
			if ( ( isset($_GET['confirmation']) || isset($_GET['infirmation']) ) && ! isset($_GET['file']) )
				// strip last /dirname pour retourner au parent du rep en cours
				$currentdir = substr($currentdir, 0, strrpos($currentdir,"/"));					
			break;
			
		case "deconnection":
		
			break;
			
		case "upload":
			if ( ! isset($_FILES['uploadFile']) )
			$affiche_upload_formulaire = true;
			break;

	}
	
	// l'upload se fait en post (l'action)
	if (isset($_POST['action']) && $_POST['action'] == "upload")
	{
		if ( isset($_FILES['uploadFile']) )
		{
			$file_name = $_FILES['uploadFile']['name'];
			
			// strip file_name of slashes
			$file_name = stripslashes($file_name);
			if ($_POST['date']) 
			{
				$file_name = date("Y-m-d-H\hi-") . $file_name;
			}
			
			$uploaddir = $rootdir . "/" .  str_replace("..","",urldecode($_POST['path']));
			
			$file_name = $uploaddir . "/" . str_replace("'","",$file_name);
			$copy = copy($_FILES['uploadFile']['tmp_name'],$file_name);
			// check if successfully copied
			if( ! $copy)
			{
			 	echo basename($file_name) . " | <b>Impossible d'uploader</b>!<br>";
			}				
		}
	}
?>

<html>
<head>
<title>
	Proposer votre application - /<?php echo $currentdir; ?>
</title>
</head>
<body>

<BIG><BIG>Dossier public (en attente de validation)<?php echo $currentdir; ?></BIG></BIG>

<table border=1 width=100%>
<tr><td colspan=2>

<!-- Toolbar -->
<table width=100%>
<tr><td>
<!-- <a href="<? echo $_self . "?path=";  ?>">Racine</a> | -->
<!-- <a href="<? echo $_self . "?action=mkdir&path=" . urlencode($currentdir); ?>">Creer Repertoire</a> |   -->
<!-- <a href="<? echo $_self . "?action=touch&path=" . urlencode($currentdir); ?>">Creer Fichier</a> | --> 
<a href="<? echo $_self . "?action=upload&path=" . urlencode($currentdir); ?>">Uploader</a>
</td><td align=right>
WebOS Uploader V3
</td></tr>
</table>
<?php

if ( $affiche_creer_formulaire )
{
	// affichage du formulaire pour creer un repertoire
	?>
	<hr>
	<form method="get">
	<input type="hidden" name="path" value="<? echo $currentdir ?>" />
	<input type="hidden" name="action" value="mkdir" />
	Nom du repertoire : <input type="text" name="arg" value=""/>
	<input type="submit" value="Creer" />
	</form>
	<?php
}

if ( $affiche_creer_fichier )
{
	// affichage du formulaire pour creer un repertoire
	?>
	<hr>
	<form method="get">
	<input type="hidden" name="path" value="<? echo $currentdir ?>" />
	<input type="hidden" name="action" value="touch" />
	Nom du fichier + Extension (ex : nom.txt) : <input type="text" name="arg" value=""/>
	<input type="submit" value="Creer" />
	</form>
	<?php
}

if ( $affiche_supprimer_formulaire )
{
	// affichage du formulaire pour supprimer un repertoire
	?>
	<hr>
	<form method="get">
	<input type="hidden" name="path" value="<? echo $currentdir ?>" />
	<?
	if ( isset($_GET['file']) )
		echo "<input type=\"hidden\" name=\"file\" value=\"" . $_GET['file'] . "\" />";
	?>
	<input type="hidden" name="action" value="rm" />
	Supprimer <? echo $currentdir . "/"; if (isset($_GET['file'])) echo $_GET['file']; ?> ? 
	<input type="submit" name="confirmation" value="Oui" />
	<input type="submit" name="infirmation" value="Non" />
	</form>
	<?php
}

if ( $affiche_upload_formulaire )
{
	?>
	<hr>
	<form enctype="multipart/form-data" method="post">
	Fichier : <input name="uploadFile" type="file" id="uploadFile" />
	<input type="hidden" name="action" value="upload" />
	<input type="hidden" name="path" value="<? echo urlencode($currentdir);?>">
	<input type="submit" name="submit" value="Uploader" />
	&nbsp;&nbsp;<input type="checkbox" name="date" CHECKED/>Dater le fichier
	</form>
	<?php
}

?>

</td></tr>

</td>
</tr>
</table>
