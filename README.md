# RynnaWebOS-Original

# Vous visionnez en ce moment la version 9.1b (Release) du code source.
Cette version sera mise à jour en fonction de l'avancement du WebOS.

# You are currently viewing version 9.1b (Release) of the source code.
This version will be updated according to the progress of WebOS.

# UPDATE : 01/09/2017

****************

FR -- Rynna WebOS est un système d'exploitation internet (Desktop Virtual Manager) conçu en PHP 7, CSS 3, JQuery et Javascript depuis 2015.

US -- Rynna WebOS is an Internet operating system (Desktop Virtual Manager) designed in PHP 7, CSS 3, JQuery and Javascript since 2015.

/!\ PASSWORD/MOT DE PASSE (WebOS USER DEFAULT/UTILISATEUR PAR DEFAUT) : 

user = password

root = password


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
- index.php

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
- DOSSIERS : applisgenerated ; applisweb_vierge ; config_copie ; generatiug ; home ; uploads
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

1 - Install Wamp Server (Windows) or Lamp (Linux) or any Apache PHP 5, compatible PHP 7 engine

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
- index.php

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
- FOLDERS: applisgenerated; Applisweb_vierge; Config_copy; Generatiug; home ; uploads
- FILES: fileuploader.php; Newuser.php; Myexplorer.php; modifuser.php

8 - Your WebOS should be ready to run!

WARNING: do not hesitate to browse every PHP file, because some redirects or some internet links redirect to our own WebOS default servers (either rynnawebos.fr or algostep-company.fr)
If your goal is to upload this WebOS on a network server (company or international) thought to completely modify the WebOS by deleting or modifying each pointer (internet links)!

For any questions, our team is at your disposal by e-mail on support@rynnawebos.fr
*********************************************
---------------------------------------------

//////// FRENCH - FRANCE - METTRE A JOUR VOTRE CODE SUR VOTRE SERVEUR \\\\\\\\\

Si vous être développeur et que vous avez déjà modifier du code du WebOS sur votre serveur nous vous conseillons de remplacer uniquement les pages mises à jour. Sinon vous pouvez faire ceci :

1 - Télécharger le contenu ZIP du projet

2 - Remplacer tout le contenu PHP, CSS, JS à la racine dans votre dossier WebOS

3 - Remplacez tout les dossiers sur votre serveur SAUF les dossiers suivants : home ; applisgenerated ; uploads

4 - Remettez toutes vos informations de connexion au serveur MySQL (ou local MySQL) en modifiant les pages suivantes : index.php ; newuser.php ; modifuser.php ; passwdperdu.php

5 - Votre WebOS sur votre serveur est maintenant à jour dans la nouvelle version


||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

//////// ENGLISH - ANGLAIS - UPDATE YOUR CODE ON YOUR SERVER \\\\\\\\\\\ '

If you are a developer and have already modified WebOS code on your server, we recommend that you only replace the updated pages. Otherwise you can do this:

1 - Download ZIP content of the project

2 - Replace all PHP, CSS, JS content at the root in your WebOS folder

3 - Replace all folders on your server EXCEPT the following folders: home; Applisgenerated; uploads

4 - Give all your login information to the MySQL (or local MySQL) server by modifying the following pages: index.php; Newuser.php; Modifuser.php; passwdperdu.php

5 - Your WebOS on your server is now up to date in the new version

