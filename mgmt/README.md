# Server-Manager pour/for Rynna WebOS !

### Le Server-Manager est un programme Web conçu par AlgoStep Company pour vous permettre de gérer votre serveur et jusqu'à 4 WebOS différents hébergés sur votre serveur FTP.

### The Server Manager is a Web program designed by AlgoStep Company to allow you to manage your server and up to 4 different WebOS hosted on your FTP server.

# UPDATE : 16/03/2018 - ALPHA SERVER-MANAGER

### ------------- FRENCH / FRANCAIS --------------
**********************************************
### INSTALLATION

1 - Copier le dossier "mgmt" à la racine même de votre serveur FTP. Si vous avez bien suivi le tutoriel d'installation de votre WebOS, votre WebOS doit être placé dans un dossier comportant le nom de "mywebos". Mais vous pourrez toujours changer le nom du dossier par la suite.

2 - Editer le fichier "index.php" dans le dossier "mgmt" et indiquer vos paramètres serveur :

(exemple :)
$mysql_server = 'adresse-de-votre-serveur';  
$mysql_username = 'nom-utilisateur-MySQL';  
$mysql_password = 'mot-de-passe-MySQL';  
$mysql_database = 'nom-database-MySQL';  
$mysql_table = 'userswebos';  

3 - Changer le nom des deux fichiers suivants : "php-GtVF56aZ2aaLo.php" et "z3rt6GV8uT44.php" par des noms différents et uniques. NE JAMAIS DONNER CES INFORMATIONS à quelqu'un d'autre que vous même !
Pour ne pas vous perdre, n'effacez pas "php-" au début du premier fichier !

4 - Notez bien les nouveaux noms des fichiers que vous avez choisit.
Pour l'exemple on va immaginer que vous avez choisit "php-blablabla.php" et "hahaha.php"...

5 - Editer le fichier "mgmtadmin.php" et modifiez les informations suivantes :

### LIGNE 27 :
```php
$users = array("root");
```

- Changer root par le nom d'utilisateur de votre choix ; celui-ci sera LE SEUL à pouvoir se connecter à l'interface d'administration ! NE DONNEZ PAS CETTE INFORMATION à vos utilisateurs !

### LIGNE 225 à 235 :
```html
<div id="jQueryDialog2" style="z-index:44;" title="WebOS 2 - Console graphique virtuelle">
<object data="http://rynnawebos.fr/mywebos/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog3" style="z-index:45;" title="WebOS 3 - Console graphique virtuelle">
<object data="http://rynnawebos.fr/webosbis/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog4" style="z-index:46;" title="WebOS 4 - Console graphique virtuelle">
<object data="http://rynnawebos.fr/webos4/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>
```

- Changer le site cible par votre propre site et le lien vers votre WebOS. Ceci est simple et rapide à faire.Si vous n'avez pas d'autres WebOS alors vous pouvez supprimer les liens restants.

### LIGNE 297 :
```html
<object data="php-GtVF56aZ2aaLo.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object></div>
```

- Changer le php-GtVF56aZ2aaLo.php par le nouveau nom que vous lui avez attribué dans le point N°3.
Pour l'exemple nous auront donc : 
```html
<object data="php-blablabla.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object></div>
```

### LIGNE 302 :
```html
<object data="z3rt6GV8uT44.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object></div>
```

- Changer le z3rt6GV8uT44.php par le nouveau nom que vous lui avez attribué dans le point N°3.
Pour l'exemple nous auront donc : 
```html
<object data="hahaha.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object></div>
```

### LIGNE 320 :
```html
object data="http://rynnawebos.fr/login/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
```

- Changer le site cible par votre propre site et le lien vers votre WebOS. Ceci est simple et rapide à faire.Si vous n'avez pas d'autres WebOS alors vous pouvez supprimer les liens restants.


6 - Paramétrage terminé ! Vous pouvez désormais vous connecter avec le compte Administrateur que vous avez choisit (root par défaut) sur http://votre-site-web-personnel.fr/mgmt

### *****************************************************************************

###------------- ENGLISH / ANGLAIS --------------
**********************************************
### INSTALLATION

1 - Copy the "mgmt" folder to the root of your FTP server. If you have followed the installation tutorial of your WebOS, your WebOS must be placed in a folder with the name "mywebos". But you can always change the name of the folder later.

2 - Edit the file "index.php" in the "mgmt" folder and indicate your server parameters:

(example :)
$ mysql_server = 'address-of-your-server';
$ mysql_username = 'username-MySQL';
$ mysql_password = 'MySQL-password';
$ mysql_database = 'mysql-database-name';
$ mysql_table = 'userswebos';

3 - Change the name of the following two files: "php-GtVF56aZ2aaLo.php" and "z3rt6GV8uT44.php" by different and unique names. NEVER give this information to anyone other than yourself!
To not get lost, do not delete "php-" at the beginning of the first file!

4 - Note the new names of the files you have chosen.
For the example we will imagine that you have chosen "php-blablabla.php" and "hahaha.php" ...

5 - Edit the file "mgmtadmin.php" and edit the following information:

### LINE 27:
```Php
$ users = array ("root");
```

- Change root by the user name of your choice; this one will be the ONLY one to be able to connect to the interface of administration! DO NOT give this information to your users!

### LINE 225 to 235:
```Html
<div id = "jQueryDialog2" style = "z-index: 44;" title = "WebOS 2 - Virtual Graphical Console">
<object data = "http://rynnawebos.com/mywebos/index.php" type = "text / html" width = "100%" height = "100%" style = "overflow: auto"> </ object>
</ Div>

<div id = "jQueryDialog3" style = "z-index: 45;" title = "WebOS 3 - Virtual Graphical Console">
<object data = "http://rynnawebos.com/webosbis/index.php" type = "text / html" width = "100%" height = "100%" style = "overflow: auto"> </ object>
</ Div>

<div id = "jQueryDialog4" style = "z-index: 46;" title = "WebOS 4 - Virtual Graphical Console">
<object data = "http://rynnawebos.com/webos4/index.php" type = "text / html" width = "100%" height = "100%" style = "overflow: auto"> </ object>
</ Div>
```

- Change the target site by your own site and the link to your WebOS. This is quick and easy to do. If you do not have other WebOS then you can delete the remaining links.

### LINE 297:
```Html
<object data = "php-GtVF56aZ2aaLo.php" type = "text / html" width = "100%" height = "100%" style = "overflow: auto"> </ object> </ div>
```

- Change the php-GtVF56aZ2aaLo.php by the new name you gave it in point N ° 3.
For example : 
```html
<object data="php-blablabla.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object></div>
```

### LINE 302:
```Html
<object data = "z3rt6GV8uT44.php" type = "text / html" width = "100%" height = "100%" style = "overflow: auto"> </ object> </ div>
```

- Change the z3rt6GV8uT44.php by the new name that you have assigned in point # 3.
For example :
```Html
<object data = "hahaha.php" type = "text / html" width = "100%" height = "100%" style = "overflow: auto"> </ object> </ div>
```

### LINE 320:
```Html
object data = "http://rynnawebos.com/login/index.php" type = "text / html" width = "100%" height = "100%" style = "overflow: auto"> </ object>
```

- Change the target site by your own site and the link to your WebOS. This is quick and easy to do. If you do not have other WebOS then you can delete the remaining links.


6 - Setup completed! You can now log in with the Administrator account you have chosen (default root) at http://yoursite-web-personal.com/mgmt

---------------
