<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;

/**
 * Config Controller
 *
 * @property \App\Model\Table\ConfigTable $Config
 */
class JeuxController extends AppController
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
        $path = $this->Folders->findByType('Jeux')->first()['path'];
        $filetype = $this->Folders->findByType('Jeux')->first()['filetype'];
        $dir = new Folder($path);



        if (!empty($dossier)) {
          foreach ($dossier as $fold) {
            $path = $path.'/'.$fold;
          }


          $dir = new Folder($path);
        }

        $jeux_original = $dir->read(true);
        $jeux_original = str_replace($path.'/', '', $jeux_original);

        $this->loadModel('Urls');
        $url_jeux = $this->Urls->findByNom('url_jeux')->first()['valeur'];
        array_unshift($dossier, $url_jeux);
        $this->set('dossier', $dossier);
        $this->set('refer', $this->referer());
        $this->set('folders', $jeux_original[0]);
        $this->set('jeux', $jeux_original[1]);

    }

    public function index()
       {
         $this->redirect(['action' => 'indexUser']);

       }



}
