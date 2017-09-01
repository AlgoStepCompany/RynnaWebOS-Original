# VERSION MAJEURE ET VERSION MINEURE (French/Français)
# COMMENT CA MARCHE ?

Rynna WebOS est découpé en 2 numéros d'identification de version (de 0.1 à l'infini) découpé en deux chiffres : le premier indique la version principale et le second chiffre indique la version de rectification.

Par exemple lorsque la version 5.0 est sortie il s'agissait d'une version MAJEURE. C'est à dire une version Stable, Principale et Nouvelle.

Lorsque la version 5.1 est sortie cela signifie qu'il s'agit d'une première version de rectification (.1).  
Cela peut alors continuer jusqu'à un maximum de X.9, mais il n'est pas obligatoire d'arriver à 9 niveaux de rectifications.  
Si jamais une version de rectification comporte un bug général ou une faille elle sera corrigée très rapidement (sous 12 heures maximums) et dans ce cas une lettre viendra se greffer au code de version ; exemple : 5.1b.

Au final les versions normale seront toujours comme ceci (exemple) : 

8.0 (majeure)  
8.1 (mineure, rectification N°1)  
8.2 (mineure, rectification N°2)  
8.3 (mineure, rectification N°3)  
8.4 (mineure, rectification N°4)  
... (et suivants)  
9.0 (majeure)  
9.1 (mineure, rectification N°1)  
...  

ATTENTION

- Si vous découvrez une version X suivie du symbôle "$" (exemple : 8.2$) nous vous déconseillons TRES fortement de l'utiliser pour votre serveur local ou en ligne car il s'agit d'une version qui présente un problème au niveau de la gestion de la mémoire de la session PHP, ou encore un problème de performance trop importante.  
Dans ce cas nous vous conseillons d'attendre la version supérieur.  
Mais si vous êtes "joueur" vous pouvez tout de même mettre à jour votre système avec une version "$"  

- Si vous découvrez une version X suivie du symbôle "&" (exemple : 8.2&) nous vous déconseillons de l'utiliser pour votre serveur local ou en ligne car cette version est utilisée pour des tests de comportements lors de changement de plugins ou JQuery/Javascript/ActionScript interne (comme un changement de JQuery par exemple ou un changement au niveau du comportement de la session ou du "core" lié au noyau).  
Dans ce cas nous vous conseillons d'attende la version supérieur.  
Mais si vous êtes "joueur" vous pouvez tout de même mettre à jour votre système avec une version "&"  

- Si vous découvrez une version X suivie du symbôle "em+" (exemple : 8.2em+) nous vous déconseillons de l'utiliser pour votre serveur local ou en ligne car cette version est utilisée pour des tests de comportements lors du changement interne JQuery du comportement des fenêtres et du thème par défaut (exemple ; agrandissement, positionnement, reflexion, prgem ou encore ID/GUID).  
Dans ce cas nous vous conseillons d'attende la version supérieur.  
Mais si vous êtes "joueur" vous pouvez tout de même mettre à jour votre système avec une version "em+"  

Dans ces cas particuliés nous ne serons pas responsable en cas de dommage lors de l'intégration sur votre serveur d'une version "&" ou "$" ou "em+" !

------------------------

# MAJOR VERSION AND MINOR VERSION (English / Anglais)
# How does it work? ?

Rynna WebOS is split into two version ID numbers (from 0.1 to infinity) divided into two digits: the first indicates the main version and the second digit indicates the rectification version.

For example, when version 5.0 was released, it was a MAJOR version. That is to say a Stable, Main and New version.

When version 5.1 is output this means that it is a first rectification version (.1).  
This can then continue up to a maximum of X.9, but it is not mandatory to arrive at 9 levels of rectifications.  
If a rectification version contains a general bug or a fault it will be corrected very quickly (within 12 hours maximum) and in this case a letter will be grafted to the version code; Example: 5.1b.

In the end the normal versions will always be like this (example):

8.0 (major)  
8.1 (minor, rectification No. 1)  
8.2 (minor, rectification No. 2)  
8.3 (minor, rectification No. 3)  
8.4 (minor, rectification No. 4)  
... (and following)  
9.0 (major)  
9.1 (minor, rectification No. 1)  
...  

WARNING

- If you discover an X version followed by the "$" symbol (example: 8.2$) we strongly discourage you from using it for your local or online server because it is a version with a problem Of the memory management of the session PHP, or a problem of performance too large.  
In this case we advise you to wait for the higher version.  
But if you are a "player" you can still update your system with a "$"  

- If you discover an X version followed by the "&" symbol (example: 8.2&) we do not recommend using it for your local or online server because this version is used for behavior testing when changing plugins or JQuery / Javascript / internal ActionScript (such as a change in JQuery, for example, or a change in the behavior of the kernel session or core).  
In this case we advise you to wait for the higher version.  
But if you are a "player" you can still update your system with an "&"  

- If you discover an X version followed by the "em +" symbol (example: 8.2em+) we do not recommend using it for your local or online server because this version is used for behavioral testing during the internal JQuery behavior change Windows and the default theme (eg, enlargement, positioning, reflection, prgem or ID / GUID).  
In this case we advise you to wait for the higher version.  
But if you are "player" you can still update your system with an "em +" version  

In these special cases we will not be responsible for any damage when integrating an "&" or "$" or "em +" version on your server!
