<?php

function size($path)
{
    $size = filesize($path);
    $units = array( 'B', 'Ko', 'Mo', 'Go', 'To', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1000)) : 0;
    return number_format($size / pow(1000, $power), 2, '.', ',') . ' ' . $units[$power];
}

function downloadImg($link, $id)
{
  $content = file_get_contents($link);
  file_put_contents(dirname(__FILE__).'/img/poster/'.$id.'.jpg', $content);
};

function stripAccents($stripAccents)
  {
      return strtr(utf8_decode($stripAccents),
          utf8_decode(
          'ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
          'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');
  }

function rm_words($entry,$DELETED_WORDS,$DELETED_START,$index='0'){
	$entry = strtolower($entry);

    if (($pos = strripos($entry, '/')) != false) {
      $entry = substr($entry, $pos+1);
    }


	$entry = str_replace("_"," ",$entry);
	$entry = str_replace("-"," ",$entry);
	$entry = str_replace("."," ",$entry);
	$entry = str_replace("+"," ",$entry);
  $entry = str_replace("/","",$entry);

  // on supprime les accents et caractères bizares ...
  $entry = stripAccents($entry);

// Patch dégueu pour le film la french !
  if (strstr($entry, 'la french') != false) {
    $position_fr = array_search('french', $DELETED_WORDS);
    // On remplace french par une chaine random
    $DELETED_WORDS[$position_fr] = 'fdsgsdfgsgs';
  }

for($i=0;$i<count($DELETED_WORDS);$i++){
   $entry = preg_replace('#'.$DELETED_WORDS[$i].'.*#','',$entry);
  }

for($i=0;$i<count($DELETED_START);$i++){
   $entry = preg_replace('#'.$DELETED_START[$i].'#','',$entry);
  }

	$entry = preg_replace('#\(.+\)#i','',$entry);
	$entry = preg_replace('#((19)[0-9]{2})|((20)[0-9]{2})#','',$entry); //supprime les annees 19xx a 20xx
  $entry = str_replace("{","",$entry);
  $entry = str_replace("}","",$entry);
  $entry = str_replace("(","",$entry);
  $entry = str_replace(")","",$entry);
  $entry = str_replace("[","",$entry);
  $entry = str_replace("]","",$entry);
  $entry = str_replace("  "," ",$entry);
  // juste parce que une majuscule c'est beau :D ....
	$entry = ucfirst($entry);
  // on supprime les espaces
	$entry = trim($entry);


  // On pourrait se passer de ça en les ajoutant à $rm dans config.php
  $entry = preg_replace("#1080p.*#si","",$entry);
  $entry = preg_replace("#720p.*#si","",$entry);
  // utile pour les séries :
	if ($index == '1'){
	$entry = preg_replace('#s[0-9]{1,2}e[0-9]{1,2}.+#i','',$entry); //supprime sxxexx et ce qui suit pour les séries
	$entry = preg_replace('#[0-9]{1,2}x[0-9]{1,2}.+#i','',$entry);//supprime 6x02 et ce qui suit
	$entry = preg_replace('#cd[0-9]{1}#i','',$entry);

	}
  if (substr($entry,-1)==" ") {

    $entry = substr($entry, 0, strlen($entry)-1);

  }

return $entry;
}

function findSeason ($string){
      preg_match ('#((s[0-9]{1,2})|(S[0-9]{1,2}))#', $string, $matches, PREG_OFFSET_CAPTURE);

      if (!empty(array_filter($matches))){
        $season = $matches[0][0];
      } else {
        $season = "";
      }
      $season = strtoupper($season);
  return $season;
}

function findEpisode ($string){

      preg_match ('#((e[0-9]{1,2})|(E[0-9]{1,2}))#', $string, $matches, PREG_OFFSET_CAPTURE);

      if (!empty(array_filter($matches))){
        $episode = $matches[0][0];
      } else {
        $episode = "";
      }
      $episode = strtoupper($episode);

  return $episode;
}


function findYear ($string){
      preg_match ('#((19)[0-9]{2})|((20)[0-9]{2})#', $string, $matches, PREG_OFFSET_CAPTURE);

      if (!empty(array_filter($matches))){
        $year = $matches[0][0];
      } else {
        $year = "";
      }
  return $year;
}

function findExt($string, $ext)
{
      $ext = str_replace(',', ')|(.', $ext);
      $ext = '(.'.$ext.')';
      preg_match ('#('.$ext.').*#', $string, $matches, PREG_OFFSET_CAPTURE);

      if (isset ($matches[0][0])){
        return $matches[0][0];
      } else {
        return false;
      }

}

function movePathSerie ($path, $name, $season, $episode, $ext)
{
    $newpath = $path.'/'.$name.'/'.$season.'/'.$name.'-'.$season.$episode.$ext;
    $newpath = str_replace(' ', '.', $newpath);
  return $newpath;
}


function movePath ($path, $name, $year, $ext)
{
  if ($year == ""){
    $newpath = $path.'/'.$name.$ext;
  }else {
    $newpath = $path.'/'.$year.'/'.$name.'-'.$year.$ext;
  }
  $newpath = str_replace(' ', '.', $newpath);

  return $newpath;
}

function movePathModerate ($path, $name, $year, $ext)
{
  if ($year == ""){
    $newpath = $path.'/'.$name.$ext;
  }else {
    $newpath = $path.'/'.$name.'-'.$year.$ext;
  }
  $newpath = str_replace(' ', '.', $newpath);

  return $newpath;
}

function getLang($videofile){
      $xyz = shell_exec("ffmpeg -i \"{$videofile}\" 2>&1");
      $search='/Stream \#0:[0-9]+\((.*?)\): Video/';
      preg_match_all($search, $xyz, $matches);
      if (empty($matches[1][0])) {
        $search='/Stream \#0:[0-9]+\((.*?)\): Audio/';
        preg_match_all($search, $xyz, $matches);
      }

      if (!empty($matches[1][0])){
      $return = strtoupper(substr($matches[1][0],0,2));
    }else {
      $return = '';
    }

    return $return;
}


function getSub($videofile){
      $xyz = shell_exec("ffmpeg -i \"{$videofile}\" 2>&1");
      $search='/Stream \#0:[0-9]+\((.*?)\): Subtitle/';
      preg_match_all($search, $xyz, $matches);


      if (!empty($matches[1][1])){
    $return = strtoupper(substr($matches[1][0],0,2)).','.strtoupper(substr($matches[1][1],0,2));
  } else {
    if (!empty($matches[1][0])){
    $return = strtoupper(substr($matches[1][0],0,2));
  } else {
    $return = '';

  }
  }

  return $return;
}

function getDef($videofile){
      $xyz = shell_exec("ffmpeg -i \"{$videofile}\" 2>&1");
      $search='/(\d{2,4})x(\d{2,4})/';
      preg_match($search, $xyz, $matches);
      if(!isset($matches[2])){
        return '';
      }
      $test = $matches[2];

          if ($test<700){$HD = 'SD';}

          if ($test>700 && $test <1000 ){$HD = 'HD720p';}

          if ($test>1000){$HD = 'HD1080p';}

    return $HD;
}

function getFilm ($search, $year, $file, $path, $apikey)
{

  require_once ("tmdb-api.php");

  $tmdb = new TMDB($apikey, 'fr');

  $movies = $tmdb->searchMovie($search);

  if($year != '')
  {
  $movie_number = 0;
  $i=0;
  foreach ($movies as $key) {
    if($movies[$i]->getYear()==$year){

  // evite les fausses détections
      if($movies[$i]->getOverview()!=''){
        $movie_number = $i;
      }

    };
    $i=$i+1;
  };
  }else {
    $movie_number = 0;
  };
  if (count($movies)==0){
    return "erreur dans le nom de fichier !";
  }
  $movie = $movies[$movie_number];

  $movie = $tmdb->getMovie($movie->getID());
  //Telechargement poster :
  downloadImg($tmdb->getImageURL('w185') . $movie->getPoster(), $movie->getID());

  //stockage dans la bdd :
  $id = $movie->getID();
  $titre = $movie->getTitle();
  $tagline = $movie->getTagline();
  $trailer = $movie->getTrailer();
  $resume = $movie->getOverview();
  $genre = $movie->getGenre();
  $real = $movie->getDirector();
  $acteur = $movie->getActor();
  $note = $movie->getVoteAverage();
  $annee = $movie->getYear();
  $time = $movie->getTime();

  $def = getDef($path.'/'.$file);
  $lang = getLang($path.'/'.$file);
  $sub = getSub($path.'/'.$file);

  $array = array(
    'tmdb' => $id,
    'titre_film' => $titre,
    'file_film' => $file,
    'annee_film' => $annee,
    'real_film' => $real,
    'genre_film' => $genre,
    'time_film' => $time,
    'resume_film' => $resume,
    'trailer_film' => $trailer,
    'acteur_film' => $acteur,
    'note_film' => $note,
    'tagline_film' => $tagline,
    'date_ajout' => '',
    'def_film' => $def,
    'audio' => $lang,
    'sub' => $sub);

    return $array;



}

function getEpisodeInfo($old_info, $season, $episode, $file, $path, $apikey)
{
  require_once ("tmdb-api.php");

  $tmdb = new TMDB($apikey, 'fr');
  $tmdb_en = new TMDB($apikey, 'en');

  $serie = $tmdb->getTVShow($old_info['id_tmdb']);

  $titre_episode = $tmdb_en->getEpisode($old_info['id_tmdb'], $season, $episode)->getName();
  $file = $file;

  $def = getDef($path.'/'.$file);
  $lang = getLang($path.'/'.$file);
  $sub = getSub($path.'/'.$file);

  $array = array(
    'id_tmdb' => $old_info['id_tmdb'],
    'titre' => $old_info['titre'],
    'file' => $file,
    'annee' => $old_info['annee'],
    'realisateur' => $old_info['realisateur'],
    'genre' => $old_info['genre'],
    'resume' => $old_info['resume'],
    'acteur' => $old_info['acteur'],
    'note' => $old_info['note'],
    'season' => $season,
    'episode' => $episode,
    'encours' => $old_info['encours'],
    'titre_episode' => $titre_episode,
    'def' => $def,
    'audio' => $lang,
    'sub' => $sub);

    return $array;
}

function getSerie ($search, $season, $episode, $file, $path, $apikey)
{

  require_once ("tmdb-api.php");

  $tmdb = new TMDB($apikey, 'fr');
  $tmdb_en = new TMDB($apikey, 'en');


  $series = $tmdb->searchTVShow($search);
  $serie_number = 0;

  if (count($series)==0){
    return "erreur dans le nom de fichier !";
  }
  // Fix à l'arrache pour la série H !
  if ($search == "H") {
    $serie_number = 1;
  }


  $serie = $series[$serie_number];
  $serie = $tmdb->getTVShow($serie->getID());
  //Telechargement poster :
  downloadImg($tmdb->getImageURL('w185') . $serie->getPoster(), $serie->getID());

  //stockage dans la bdd :
  $id_tmdb = $serie->getID();
  $titre = $tmdb_en->getTVShow($serie->getID())->getName();
  if ($titre == '') {
    $titre = $serie->getName();
  }

  $resume = $serie->getOverview();
  if ($resume == '') {
    $resume =$tmdb_en->getTVShow($serie->getID())->getOverview();
  }
  $genre = '';
  $real = '';
  $acteur = '';
  $note = $serie->getVoteAverage();
  $annee = $serie->getYear();
  $encours = $serie->getInProduction();
  $season = $season;
  $episode = $episode;
  $titre_episode = $tmdb_en->getEpisode($id_tmdb, $season, $episode)->getName();
  $file = $file;

  $def = getDef($path.'/'.$file);
  $lang = getLang($path.'/'.$file);
  $sub = getSub($path.'/'.$file);


  $array = array(
    'id_tmdb' => $id_tmdb,
    'titre' => $titre,
    'file' => $file,
    'annee' => $annee,
    'realisateur' => $real,
    'genre' => $genre,
    'resume' => $resume,
    'acteur' => $acteur,
    'note' => $note,
    'season' => $season,
    'episode' => $episode,
    'encours' => $encours,
    'titre_episode' => $titre_episode,
    'def' => $def,
    'audio' => $lang,
    'sub' => $sub);

    return $array;



}



 ?>
