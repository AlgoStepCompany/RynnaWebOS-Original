<?php

// Créer par Maxime G. avec le soutient de Loic A. (AlgoStep Company) dans le cadre du developpement de Rynna WebOS (ZIP ACTION ARCHIVE UsernameSession)
// VERSION 1.1 - Ajout de la securite (correction faille)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'logoutform')
{
   if (session_id() == "")
   {
      session_start();
   }
   unset($_SESSION['username']);
   unset($_SESSION['fullname']);
   header('Location: ./index.php');
   exit;
}
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./index.php');
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
      header('Location: ./index.php');
      exit;
   }
}
session_status();


class zip
{
   private $zip;
   public function __construct( $file_name, $zip_directory)
   {
        $this->zip = new ZipArchive();
        $this->path = $zip_directory . $file_name . '.zip';
        $this->zip->open( $this->path, ZipArchive::CREATE );
    }
      
   /**
     * Get the absolute path to the zip file
     * @return string
     */
    public function get_zip_path()
    {
        return $this->path;
    }
       
    /**
     * Add a directory to the zip
     * @param $directory
     */
    public function add_directory( $directory )
    {
        if( is_dir( $directory ) && $handle = opendir( $directory ) )
        {
            $this->zip->addEmptyDir( $directory );
            while( ( $file = readdir( $handle ) ) !== false )
            {
                if (!is_file($directory . '/' . $file))
                {
                    if (!in_array($file, array('.', '..')))
                    {
                        $this->add_directory($directory . '/' . $file );
                    }
                }
                else
                {
                    $this->add_file($directory . '/' . $file);                }
            }
        }
    }
   
    /**
     * Add a single file to the zip
     * @param string $path
     */
    public function add_file( $path )
    {
        $this->zip->addFile( $path, $path);
    }
   
    /**
     * Close the zip file
     */
    public function save()
    {
        $this->zip->close();
    }
}




$path = __DIR__ . '\\home\\' . $_SESSION['username']; // Chemin du répertoire personnel
$pathSave = __DIR__ . '\\home\\' . $_SESSION['username'] . '\\' . $_SESSION['username'] . '.zip'; // Chemin de sauvegarde de l'archive

if (isset($_POST['process']) && $_POST['process'] == true) { // Si une requête est effectuée et qu'une variable 'process' vaut true

	$zip = new zip($_SESSION['username'],  'home/' . $_SESSION['username'] . '/');
	$zip->add_directory(__DIR__ . '\\home\\' . $_SESSION['username'] . '\\');
	$zip->save();

	// On retourne les informations
	echo json_encode(array('success' => true, 'message' => 'Archive créée avec succès !', 'path' => $pathSave));
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
                    url: '/mywebos/zipaction.php', // URL d'appel (dans ce cas, on appelle ce fichier)
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
