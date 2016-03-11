<?php
namespace App\Controller;

use App\Controller\AppController;
require_once (ROOT .DS."webroot/funct_music.php");
require_once (ROOT .DS."webroot/getid3/getid3.php");




/**
 * Config Controller
 *
 * @property \App\Model\Table\ConfigTable $Config
 */
class TestController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
      $this->viewBuilder()->layout('music');

    }

    public function configure()
    {
      $this->viewBuilder()->layout('music_index');
    }

    public function info()
    {
      $this->viewBuilder()->layout('music_index');

      $song = '/home/stf/Musique/ODEZENNE/Dolziger.Str..2-[2015]/01-Un.corps.à.prendre.mp3';


      $Info = getExt($song);


      //$song = "/home/stf/Musique/Hyphen Hyphen - Times [2015]/04 - Cause I Got A Chance.mp3";
      $songInfo = getInfo($song, $song);

      $this->set('img', getImg($song));
      debug($songInfo);

    }


}
