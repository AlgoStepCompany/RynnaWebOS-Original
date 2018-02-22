<?php
$host_name = 'IP_serveur_ici';
$database = 'database_nom_ici';
$user_name = 'username_root_ici';
$password = 'password_database_ici';

$dbh = null;
try {
  $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}
?>