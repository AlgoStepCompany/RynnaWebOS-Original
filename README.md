# RynnaWebOS-Original

FR -- Rynna WebOS est un système d'exploitation internet (Desktop Virtual Manager) conçu en PHP 7, CSS 3, JQuery et Javascript depuis 2015. La première version à être disponible sur ce dépôt est là V 9.0 (Original).

US -- Rynna WebOS is an Internet operating system (Desktop Virtual Manager) designed in PHP 7, CSS 3, JQuery and Javascript since 2015. The first version to be available on this repository is there V 9.0 (Original).


------------- FRENCH / FRANCAIS --------------
**********************************************
Ce WebOS a été conçu uniquement en Français !
Cependant une branche "ENGLISH-VERSION" a été conçu pour ceux qui souhaitent le traduire en anglais.
Vous pouvez également tester le WebOS dans une version anglaise en développement sur http://rynnawebos.fr/loginus

L'installation de Rynna WebOS sur votre serveur local est simple : 

1 - Installer Wamp Server (Windows) ou Lamp (Linux) ou tout autre moteur Apache PHP 5 compatible PHP 7

2 - Concevez une base de données MySQL

3 - Injecter le fichier "inj-MySQL.sql" sur votre base de données MySQL

4 - Dans "www" (racine de votre site) déposez-y le contenu du projet dans un dossier que vous aurez préalablement créer :
Exemple :
--- www
     |_ mywebos
               |_ (contenu du WebOS)

5 - Editer les fichiers suivants pour y insérer les informations de votre serveur local (ou en ligne) ainsi que votre nom d'utilisateur, mot de passe serveur et le nom de votre base de données :
- modifuser.php
- newuser.php
- passwdperdu.php

Exemple "newuser.php" : 

$mysql_server = '127.0.0.1';

$mysql_username = 'root';

$mysql_password = 'wampserver';

$mysql_database = 'mywebosbdd';

$mysql_table = 'userswebos';

$success_page = './createuser.php';

$error_message = " ";


6 - Ouvrez une page locale sur votre navigateur et testez l'accès à votre site local.
Exemple : 
127.0.0.1/mywebos
Vous devriez être redirigé sur la page "index.php" du WebOS.

7 - Vérifiez que vous avez autorisé les droits d'écritures et modifications sur les dossier et fichiers suivants : 
- DOSSIERS : applisgenerated ; applisweb_vierge ; config_copie ; generatiug ; home
- FICHIERS : fileuploader.php ; newuser.php ; myexplorer.php ; modifuser.php

8 - Votre WebOS devrait être prêt à fonctionner !

ATTENTION : n'hésitez pas à parcourir chaque fichiers PHP, car certaines redirections ou certains liens internet redirigent vers nos propres serveurs par défaut du WebOS (soit rynnawebos.fr ou algostep-company.fr)
Si votre objectif est de mettre en ligne ce WebOS sur un serveur réseau (entreprise ou international) pensé à modifier intégralement le WebOS en supprimant ou modifiant chaque pointeurs (liens internet) !

Pour toutes questions notre équipe se tiens à votre disposition par e-mail sur support@rynnawebos.fr
*********************************************
---------------------------------------------
//
------------- ENGLISH / ANGLAIS --------------
**********************************************
This WebOS has been designed exclusively in French!
However, a branch "ENGLISH-VERSION" has been designed for those who wish to translate it into English.
You can also test the WebOS in an English version in development on http://rynnawebos.fr/loginus

Installing Rynna WebOS on your local server:

1 - Install Wamp Server (Windows) or Lamp (Linux) or any Apache PHP 5 compatible PHP 7 engine

2 - Design a MySQL database

3 - Inject the file "inj-MySQL.sql" on your MySQL database

4 - In "www" (root of your site) drop the contents of the project in a file that you will have previously created:
Example:
--- www
     | _ Mywebos
              | _ (WebOS content)

5 - Edit the following files to insert the information of your local (or online) server as well as your username, server password and the name of your database:

- modifuser.php
- newuser.php
- passwdperdu.php

Example "newuser.php":

$ Mysql_server = '127.0.0.1';

$ Mysql_username = 'root';

$ Mysql_password = 'wampserver';

$ Mysql_database = 'mywebosbdd';

$ Mysql_table = 'userswebos';

$ Success_page = './createuser.php';

$ Error_message = "";


6 - Open a local page on your browser and test access to your local site.
Example:
127.0.0.1/mywebos
You should be redirected to the webOS "index.php" page.

7 - Verify that you have allowed write and change permissions to the following folders and files:
- FOLDERS: applisgenerated; Applisweb_vierge; Config_copy; Generatiug; home
- FILES: fileuploader.php; Newuser.php; Myexplorer.php; modifuser.php

8 - Your WebOS should be ready to run!

WARNING: do not hesitate to browse every PHP file, because some redirects or some internet links redirect to our own WebOS default servers (either rynnawebos.fr or algostep-company.fr)
If your goal is to upload this WebOS on a network server (company or international) thought to completely modify the WebOS by deleting or modifying each pointer (internet links)!

For any questions, our team is at your disposal by e-mail on support@rynnawebos.fr
*********************************************
---------------------------------------------