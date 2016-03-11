# CakePHP Application Skeleton

[![License](https://poser.pugx.org/cakephp/app/license.svg)](https://packagist.org/packages/cakephp/app)

Media V2 réécrit entièrement sur [CakePHP](http://cakephp.org) 3

Cette application développée sous CakePHP permet l'indexation des films, séries, musique, jeux et logiciels.

Elle permet le streaming et le téléchargement depuis l'interface web.

## Fonctionnalités :

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

#### Base de donnée:

Afin de configurer la base de donnée de l'application, il suffit d'éditer le fichier
```
/config/app.default.conf
```
et éditer la section DataSources (lignes 206)
```
'host' => 'localhost',
'username' => 'my_app',
'password' => 'secret',
'database' => 'my_app',
```
il est nécessaire de renommer app.default.conf en app.conf
```
mv /config/app.default.conf /config/app.conf
```

J'ai fait un dump de la base de donnée minimale à importer dans votre DB, situé dans à la racine dans le fichier :
```
media_export.sql
```

#### Apache :
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
DocumentRoot /var/www/media

<Directory /var/www/media>
    Options FollowSymLinks
    AllowOverride All
</Directory>

```

On redémarre apache (ou reload)
```
sudo service apache2 reload
```

#### Aplication :

Votre app est maintenant en route, vous pouvez dès à présent vous connecter à l'addresse qui correspond à votre config apache.

Les identifiants par défaut sont : admin / admin

Nous allons maintenant configurer les dossiers :
Pour celà, il faut se loguer aller dans Administration > Configuration > Dossiers
Pour chaque dossier, éditez le chemin en fonction de l'emplacement où vous avez créé le dossier.

Une fois celà effectué nous pouvons configurer les url : Administration > Configuration > URL
Celà correspond aux alias que vous avez créés sous apache.
Il faut aussi complèter l'url de base de votre installation (base)
Il est aussi nécessaire de fournir votre clé d'api theMovieDataBase (tmdb_api_key) > Il suffit de s'inscrire sur themoviedb.org de créer un compte : Mon compte > API

Tout est maintenant parfaitement configuré pour utiliser l'application.
