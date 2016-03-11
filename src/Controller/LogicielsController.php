<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;

/**
 * Config Controller
 *
 * @property \App\Model\Table\ConfigTable $Config
 */
class LogicielsController extends AppController
{



    /**
     * Index method
     *
     * @return void
     */
    public function indexUser($dossier=array())
    {
      $dossier = func_get_args();
      $this->loadModel('Folders');
        $path = $this->Folders->findByType('Logiciels')->first()['path'];
        $filetype = $this->Folders->findByType('Logiciels')->first()['filetype'];
        $dir = new Folder($path);



        if (!empty($dossier)) {
          foreach ($dossier as $fold) {
            $path = $path.'/'.$fold;
          }


          $dir = new Folder($path);
        }

        $soft_original = $dir->read(true);
        $soft_original = str_replace($path.'/', '', $soft_original);
        

        $this->loadModel('Config');
        $url_soft = $this->Config->findByNom('url_logiciels')->first()['valeur'];
        array_unshift($dossier, $url_soft);
        $this->set('dossier', $dossier);
        $this->set('refer', $this->referer());
        $this->set('folders', $soft_original[0]);
        $this->set('softs', $soft_original[1]);

    }

    public function index()
       {
         $this->redirect(['action' => 'indexUser']);

       }


}
