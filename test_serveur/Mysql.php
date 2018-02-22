<?php
$host_name = 'IP_serveur_ici';
$database = 'database_nom_ici';
$user_name = 'username_root_ici';
$password = 'password_database_ici';

$connect = mysql_connect($host_name, $user_name, $password, $database);
if (mysql_errno()) {
    die('<p>La connexion au serveur MySQL a échoué: '.mysql_error().'</p>');
} else {
    echo '<p>Connexion au serveur MySQL établie avec succès.</p >';
}
?>