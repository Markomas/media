<?php
namespace App\Shell;

use Cake\Console\Shell;

class FilmShell extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Films');

    }

    public function rename()
    {

        
        $this->out(print_r('Films rename : OK', true));
    }
}



 ?>