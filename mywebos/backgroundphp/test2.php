<?php

// TEST /!\ NE PAS UTILISER (ERREUR AJAX !)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'logoutform')
{
   if (session_id() == "")
   {
      session_start();
   }
   unset($_SESSION['username']);
   unset($_SESSION['fullname']);
   header('Location: ./errorzip.php');
   exit;
}
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./errorzip.php');
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
      header('Location: ./errorzip.php');
      exit;
   }
}
session_status();


    $cheminxc3="./home/";
    $pathxc3="./backgroundimage/linux/";
      $imagexc3="linux1.jpg";
         $newimagexc3="/backgroundusrx";

    copy($pathxc3.$imagexc3, $cheminxc3.$_SESSION['username'].$newimagexc3.".jpg");

?>

<!doctype html>
<html lang="fr"><!-- On précise la langue de la page -->
    <head>
        <!-- Format UTF-8 -->
        <meta charset="utf-8">

        <!-- Importation de la librairie jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Titre de la page -->
        <title>Télécharger répertoire</title>
    </head>
    <body>
        <div>

            <!-- Le bouton de téléchargement -->
            <button id="download-button">Télécharger</button>

            <!-- Bloc pour afficher le path -->
            <div id="display-url"></div>
        </div>
    </body>

    <script type="text/javascript">
        // Lorsque la page est chargée
        $(document).ready(function () {

            // On définit une action au click sur le bouton
            $('#download-button').on('click', function () {

                // Appel ajax
                $.ajax({
                    url: '/login/backgroundphp/test2.php', // URL d'appel (dans ce cas, on appelle ce fichier)
                    type: 'GET', // Type de requête (GET ou POST)
                    data : { process : 'true' }, // Données envoyées
                    dataType : 'json', // On précise que le format est JSON pour le bon transport des données dans les deux sens
                    error: function() { // En cas d'erreur de la requete ajax
                        alert('ERREUR !!'); // Affichage d'un message d'erreur
                    },
                    success: function(data) { // En cas de succès de la requête ajax
                        if (data.success) { // Si la requête dit que l'action a réussie
                            alert(data.message); // Affichage du message
                            $('#display-url').text(data.path); // Affichae du chemin sur le serveur
                        } else { // Si la requête dit que l'action a éhoué
                            alert(data.message); // Affichage du message
                            $('body').css('background-color', 'red'); // Arrièer-plan mis en rouge
                        }
                    }
                });
            });

        });
    </script>
</html>
