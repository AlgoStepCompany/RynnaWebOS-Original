<?php
$host_name = '';
$database = '';
$user_name = '';
$password = '';
$connect = mysqli_connect($host_name, $user_name, $password, $database);

if (mysqli_connect_errno()) {
    die('<p>La connexion au serveur MySQL a �chou�: '.mysqli_connect_error().'</p>');
} else {
    echo '<p>Connexion au serveur MySQL �tablie avec succ�s.</p >';
}
?>