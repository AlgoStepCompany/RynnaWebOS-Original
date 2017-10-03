<?php 
	session_start();
	// Script de copie
    $ouverture1 = opendir ('home/' . $_SESSION['username']); 
    unlink ('home/' . $_SESSION['username'] . '/mybg.jpg'); 
    $file1 = 'backgroundimage/B00img901.jpg'; 
    $newfile1 = 'home/' . $_SESSION['username'] . '/mybg.jpg';

    if (!copy($file1, $newfile1)) {
    echo "La copie du fichier a échoué !\n"; 
    }
   closedir ($ouverture1);
   ?>