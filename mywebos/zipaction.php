<?php
// Créer par Maxime G. avec le soutient de Loic A. (AlgoStep Company) dans le cadre du developpement de Rynna WebOS (ZIP ACTION ARCHIVE UsernameSession)
session_start();
session_status();

//$_SESSION['username'] = 'usename_variable_session';

if (isset($_POST['process']) && $_POST['process'] == true) { // Si une requête est effectuée et qu'une variable 'process' vaut true
    $path = '/home/' . $_SESSION['username']; // Chemin du répertoire personnel
    $pathSave = '/home/' . $_SESSION['username'] . '/' . $_SESSION['username'] . '.zip'; // Chemin de sauvegarde de l'archive

    // Création de l'archive
    $zip = new ZipArchive();

    if($zip->open($pathSave, ZipArchive::CREATE) == true) { // Si succès de l'ouverture/création de l'archive

        // Ajout d'un fichier à l'archive
        $zip->addFile($path . '/home/protector.txt');

        // Fermeture/Sauvegarde de l'archive
        $zip->close();

        // On retourne les informations
        echo json_encode(array('success' => true, 'message' => 'Archive créée avec succès !', 'path' => $pathSave));
    } else { // Echec de l'ouverture/créaion
        // On retourne un message d'erreur
        echo json_encode(array('success' => false, 'message' => 'Impossible de créer l\'archive.'));
    }
    exit;
}

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
                    url: 'zipaction.php', // URL d'appel (dans ce cas, on appelle ce fichier)
                    type: 'POST', // Type de requête (GET ou POST)
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
