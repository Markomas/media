# CakePHP Application Skeleton

[![License](https://poser.pugx.org/cakephp/app/license.svg)](https://packagist.org/packages/cakephp/app)

Media V2 réécrit entièrement sur [CakePHP](http://cakephp.org) 3

Cette application développée sous CakePHP permet l'indexation des films, séries, musique, jeux et logiciels.

Elle permet le streaming et le téléchargement depuis l'interface web.

## Fonctionnalités :

### * Films et Séries :
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

### * Musique :
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

### * Logiciels et Jeux :
  * Affichage de l'arborescence des dossiers (cakebox like)
  * Pas d'indexation dans la base de donnée !
