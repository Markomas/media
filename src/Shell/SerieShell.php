<?php
namespace App\Shell;

use Cake\Console\Shell;

class SerieShell extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Series');

    }

    public function rename($url)
    {
      $this->out(print_r($url. '/series/rename', true));

        file_get_contents($url. '/series/rename');
        $this->out(print_r('Series rename : OK', true));
    }
}



 ?>