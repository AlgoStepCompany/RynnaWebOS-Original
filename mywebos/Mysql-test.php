<?php
// Servez vous de ce fichier pour tester votre connexion en MySQL classique PHP5 ou PHP 7 (ATTENTION dans cette version MySQLi non compatible !)
$host_name = '';
$database = 'userswebos';
$user_name = '';
$password = '';

$connect = mysql_connect($host_name, $user_name, $password, $database);
if (mysql_errno()) {
    die('<p>La connexion au serveur MySQL a échoué: '.mysql_error().'</p>');
} else {
    echo '<p>Connexion au serveur MySQL établie avec succès.</p >';
}
?>