# CakePHP Application Skeleton

[![License](https://poser.pugx.org/cakephp/app/license.svg)](https://packagist.org/packages/cakephp/app)

Media V2 réécrit entièrement sur [CakePHP 3](http://cakephp.org)

Cette application développée sous CakePHP permet l'indexation des films, séries, musique, jeux et logiciels.

Elle permet le streaming et le téléchargement depuis l'interface web.

## Fonctionnalités :
#### Nouveautés de la version 2.3 :
- Passage à l'API TMDB V3
- Regroupement par nom de série en partie Admin et sélection multiple possible.
- Modification du traitement des fichiers (meilleure détection des noms)
- Modifications diverses sur la partie installation (app.php, schéma de migration, ...)
- Correction de nombreux bugs (doublons dans les séries, décompte des fichiers, problèmes symlinks, ...)

_____________________________
##### Notes pour la mise à jour :

- Nécessaire d'être en version 2.1 minimum pour mettre à jour vers 2.3 ( sinon réinstallation complète ...)
- Un simple [code]git pull[/code] pour récupérer les modifications
- Rendez vous à l'url de votre installation de Media et suivez le guide !
_____________________________

##### Notes pour une nouvelle installation :

- Nécessaire d'avoir un serveur web complet apache/nginx +mysql correctement configuré !
- Un simple git clone https://github.com/stonfute/media.git pour récupérer l'appli
- Suivez la documentation ci-dessous 
- Créez manuellement la base de donnée mysql qui va accueillir Media
- Rendez vous à l'url de votre installation de Media et suivez le guide !
_____________________________

#### Nouveautées de la version 2.1 :
  * Mise en place d'un installeur qui facilite la migration et l'installation.
  * Mise en place d'une méthode de traitement des fichiers par symlink.
  * Gestion des utilisateurs et possibilité de passer le site en privé.
  * Possibilité de supprimer le bouton upload et les sections inutilisées.
  * Amélioration du processus de modération.

#### Films et Séries :
  * Import, Renommage et classement automatique des fichiers:
    * /Année/Titre-Année pour les films
    * /Titre/Saison/Titre-EXXSXX pour les séries
  * Récupération des infos par l'API themoviedatabase
  * Génération d'une fiche pour chaque série/film contenant l'affiche, le resumé, la bande annonce, note, acteurs, ....
  * Possibilité d'upload des fichiers depuis la webui
    * Pour les utilisateurs admin : sans modération
    * Sans compte utilisateur : processus de modération dans l'interface administrateur
  * Streaming et téléchargement des films et séries
  * Edition manuelle ou semi-automatique des fiches en cas d'erreur

#### Musique :
  * Import, Renommage et classement automatique des fichiers:
    * /Artiste/album/XX-Titre
  * Récupération des infos par lecture du tag id3
  * Classement par album ou artiste
  * Possibilité d'upload des fichiers depuis la webui
    * Pour les utilisateurs admin : sans modération
    * Sans compte utilisateur : pas implémenté
  * Streaming et téléchargement :
    * Gestion des playlist (sauvergarde des playlists en cours de réalisation)
    * Téléchargement des musiques par album ou unitaire
  * Edition manuelle en cas d'erreur

#### Logiciels et Jeux :
  * Affichage de l'arborescence des dossiers (cakebox like)
  * Pas d'indexation dans la base de donnée !


## Installation & configuration :

### Installation :

Concernant l'installation, rien de bien méchant, si ce n'est qu'un simple
```
git clone https://github.com/stonfute/media
```
L'application nécessite cependant quelques dépendances, ffmpeg pour les infos sur la qualité des fichiers, sous-titres et langues
```
sudo apt-get install ffmpeg
```
Je pars du  principe, que vous avez un serveur web complet (apache ou nginx, mysql, php5.5 minimum)

CakePHP nécessite l'installation de php5-intl et php5-curl:
```
sudo apt-get install php5-intl php5-curl

```

CakePHP nécessite l'activation du module rewrite d'apache :
```
sudo a2enmod rewrite
```
### Configuration :

#### Création des dossiers

Afin de fonctionner correctement, il est nécessaire de créer les dossiers suivants où vous le souhaitez.
Je vous conseille, dans un premier temps de créer des dossiers séparé de votre bibliothèque multimédia.
Nous importerons vos fichiers par la suite.

Liste des dossiers à créer:

* Films : Contient les films classés, renommés et indexés
* Musique : Contient les musiques classée, renommése et indexées
* Series : Contient les séries classées, renommées et indexées
* Film_upload	: Contient les films avant traitement
* Serie_upload : Contient les séries avant traitement
* Musique_upload : Contient la musique avant traitement
* Film_user	: Contient les films uploadés par les utilisateurs externes
* Serie_user : Contient les séries uploadées par les utilisateurs externes
* Jeux : Contient les jeux
* Logiciels	: Contient les logiciels

Apache doit avoir des droits d'écriture sur ces dossiers.


#### Serveur web :
Il est nécessaire de correctement configurer  tous les dossiers dans lequels vos fichiers sont présents.
Pour celà, il faut générer un alias pour chacun des dossiers suivants !

Si vous regardez dans la db importé, j'ai utilisé les alias suivants.

* Films : /access/films
* Musique : /access/music
* Series : /access/series
* Film_user	: /access/film_mod
* Serie_user : /access/serie_mod
* Jeux : /access/jeux
* Logiciels	: /access/logiciels


##### Apache :
Pour chacun des dossier cité ci-dessus vous devez créer un alias :

```
Alias /access/films /var/www/films/
<Directory "/var/www/films">
    Options -Indexes
    Require all granted
    Satisfy Any
    Header set Content-Disposition "attachment"
</Directory>
```
De cette manière là vous pourrez télécharger/streamer les fichiers

Après la conf apache est classique pour un site web, on follow les symlinks, ...
```
<VirtualHost *:80>

        ServerName 127.0.0.1

        DocumentRoot /var/www/media

        <Directory /var/www/media>
            Options FollowSymLinks
            AllowOverride All
        </Directory>

</VirtualHost>
```

On redémarre apache (ou reload)
```
sudo service apache2 reload
```

##### Nginx :
Pour chacun des dossier cité ci-dessus vous devez créer un alias :

```
location /home/library/Jeux {
    alias /access/jeux;
    allow all;
    satisfy any;
    add_header Content-Disposition "attachment";
}
```
De cette manière là vous pourrez télécharger/streamer les fichiers

Après la conf nginx est classique pour un site web, on follow les symlinks, ...
```
server {
    listen   80;
    server_name mediaNDD.com;
    rewrite 301 http://mediaNDD.com$request_uri permanent;

    # root directive should be global
    root   /usr/share/nginx/media/webroot;
    index  index.php;

    access_log /var/log/nginx/mediaaccess.log;
    error_log /var/log/nginx/mediaerror.log;

    location / {
        try_files $uri /index.php?$args;
   }

   location ~ \.php$ {
    try_files $uri =404;
    include /etc/nginx/fastcgi_params;
    fastcgi_pass    unix:/var/run/php5-fpm.sock;
    fastcgi_index   index.php;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
  }

}
```

On redémarre apache (ou reload)
```
sudo service apache2 reload
```

#### Application :

Votre app est maintenant en route, vous pouvez dès à présent vous connecter à l'addresse qui correspond à votre config Apache /Nginx afin de commencer à configurer votre installation. Laissez-vous guider !


Il est nécessaire de fournir votre clé d'api theMovieDataBase (tmdb_api_key) > Il suffit de s'inscrire sur themoviedb.org de créer un compte : Mon compte > API


## Import de la bibliothèque existante :

Que ce soit pour les Films, la Musique ou encore les Séries, le schéma d'import est le même :
* On dépose les fichiers (avec ou sans sous dossiers) dans le dossier Film_upload, Musique_upload ou Serie_upload (on peut aussi utiliser le formulaire d'upload)
* On se rend dans Films > Upload / Ajout automatique
* On clique sur renommer (page peut être lente à charger en cas de grosse importation)
* On vérifie que les fichiers sont correctements renommés (ou pas ...)
* On clique sur importer (de même le temps de process peut être long > temps d'accès à l'api)
