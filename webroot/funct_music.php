<?php
include 'getid3/getid3.php';

function movePath ($path, $artist, $album, $year, $num, $song, $ext)
{

  $newpath = $path.'/'.$artist.'/'.$album.'-['.$year.']/'.sprintf( "%02d",$num).'-'.$song.'.'.$ext;
  $newpath = str_replace(' ', '.', $newpath);

  return $newpath;
}

function getInfo($song='', $path)
{
  $getID3 = new getID3();
  $songInfo = $getID3->analyze($song);
    $songInfo = array(
      'song' => getTitle($song,$songInfo),
      'album' => getAlbum($song,$songInfo),
      'artist' => getArtist($song,$songInfo),
      'num' => getNum($song,$songInfo),
      'year' => getYear($song,$songInfo),
      'file' => $path,
      'time' => getTime($song,$songInfo),
      'genre' => getGenre($song,$songInfo),
      'cover' => getImg($song,$songInfo));


      return $songInfo;

}

function getArtist($song='',$songInfo)
{
    if (isset($songInfo['tags']['id3v2']['artist'])) {
      $songInfo = $songInfo['tags']['id3v2']['artist'][0];
      return $songInfo;
    } else {
      return '';
    }
}
function getTitle($song='',$songInfo)
{
    if (isset($songInfo['tags']['id3v2']['title'])) {
      $songInfo = $songInfo['tags']['id3v2']['title'][0];
      return $songInfo;
    } else {
      return '';
    }
}
function getAlbum($song='',$songInfo)
{
    if (isset($songInfo['tags']['id3v2']['album'])) {
      $songInfo = $songInfo['tags']['id3v2']['album'][0];
      return $songInfo;
    } else {
      return '';
    }
}
function getYear($song='',$songInfo)
{
    if (isset($songInfo['tags']['id3v2']['year'])) {
      $songInfo = $songInfo['tags']['id3v2']['year'][0];
      return $songInfo;
    } else {
      return '';
    }
}
function getTime($song='',$songInfo)
{
    if (isset($songInfo['playtime_string'])) {
      $songInfo = $songInfo['playtime_string'];
      return $songInfo;
    } else {
      return '';
    }
}
function getExt($song='')
{
  $getID3 = new getID3();
  $songInfo = $getID3->analyze($song);

    if (isset($songInfo['fileformat'])) {
      $songInfo = $songInfo['fileformat'];
      return $songInfo;
    } else {
      return '';
    }
}


function getNum($song='', $songInfo)
{
    if (isset($songInfo['tags']['id3v2']['track_number'])) {
      $songInfo = $songInfo['tags']['id3v2']['track_number'][0];
      return $songInfo;
    } else {
      return '';
    }
}

function getGenre($song='', $songInfo)
{
    if (isset($songInfo['tags']['id3v2']['genre'][0])) {
      $songInfo = $songInfo['tags']['id3v2']['genre'][0];
    } else {
      $songInfo = '';
    }
    return $songInfo;
}

function getImg($song='', $songInfo ='')
{

      if (isset($songInfo['comments']['picture'])) {
          if (isset($songInfo['comments']['picture'][0]['image_mime'])) {
              $mime = preg_split('/\//', $songInfo['comments']['picture'][0]['image_mime']);
              if (isset($mime[1])) {
                $extension = $mime[1];
              } else {
                $extension = 'jpg';
              }

          } else {
              $extension = 'jpg';
          }

          $name = md5(getArtist($song,$songInfo).getAlbum($song,$songInfo));
          $path = dirname(__FILE__).'/img/album/'.$name.'.'.$extension;

          if (!file_exists($path)) {
              if (!file_exists(dirname(__FILE__).'/img/album/')) {
                  new Folder(dirname(__FILE__).'/img/album/', true, 0777);
              }
              $file = fopen($path, "w");
              fwrite($file, $songInfo['comments']['picture'][0]['data']);
              fclose($file);
          }
          return $name.'.'.$extension;

      } else {
        return 'no-cover.png';
      }
}

function Zip($source, $destination)
{
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file)
        {
            $file = str_replace('\\', '/', realpath($file));

           if (is_file($file) === true && substr(strrchr($file,'.'),1) == 'mp3')
            {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    }
    else if (is_file($source) === true && substr(strrchr($source,'.'),1) == 'mp3')
    {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

  $zip->close();

  if(file_exists($destination)){
      //Set Headers:
      header('Pragma: public');
      header('Expires: 0');
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($destination)) . ' GMT');
      header('Content-Type: application/force-download');
      header('Content-Disposition: inline; filename="'.$destination.'"');
      header('Content-Transfer-Encoding: binary');
      header('Content-Length: ' . filesize($destination));
      header('Connection: close');
      readfile($destination);
      unlink($destination);
      exit();

  }


}

 ?>
