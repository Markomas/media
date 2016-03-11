<?php


Zip('css/','test.zip');





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

            if (is_dir($file) === true)
            {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            }
            else if (is_file($file) === true)
            {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    }
    else if (is_file($source) === true)
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
      exit();
  }

  if(file_exists($destination)){
      unlink($destination);

  }


}

?>
