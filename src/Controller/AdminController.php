<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;


/**
 * Config Controller
 *
 * @property \App\Model\Table\ConfigTable $Config
 */
class AdminController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {


      // ---- METHODE temporaire ! ----
      // ConnectionManager::get('default')->disconnect();
      // ConnectionManager::drop('default');
      // ConnectionManager::config('default', [
      //     'className' => 'Cake\Database\Connection',
      //     'driver' => 'Cake\Database\Driver\Mysql',
      //     'persistent' => false,
      //     'host' => 'localhost',
      //     'username' => 'my_app',
      //     'password' => 'sekret',
      //     'database' => 'my_app',
      //     'encoding' => 'utf8',
      //     'timezone' => 'UTC',
      //     'cacheMetadata' => true,
      // ]);
      // ConnectionManager::get('default')->connect();
      // $db = ConnectionManager::get('default');

      $this->loadModel('Films');
      $this->loadModel('Series');
      $this->loadModel('Music');
      $this->loadModel('Users');

      $query =  $this->Users->findByRole('admin');
      $nb_admin = 0;
      foreach ($query as $music) {
        $nb_admin += 1;
      }
      $query =  $this->Users->find('all');
      $nb_user = 0;
      foreach ($query as $music) {
        $nb_user += 1;
      }


// Musique
$query =  $this->Music->find('all');
$nb_music = 0;
foreach ($query as $music) {
  $nb_music += 1;
}

$query =  $this->Music->find('all')->distinct('artist');
$nb_artist = 0;
foreach ($query as $artist) {
  $nb_artist += 1;
}

$query =  $this->Music->find('all')->distinct('album');
$nb_album = 0;
foreach ($query as $artist) {
  $nb_album += 1;
}

// FILMS
      $query =  $this->Films->find('all');
      $nb_films = 0;
      foreach ($query as $film) {
        $nb_films += 1;
      }

      $query = $this->Films->findByAlert('1');
      $nb_films_alert = 0;
      foreach ($query as $film) {
        $nb_films_alert += 1;
      }

      $query =  $this->Series->find('all');
      $nb_ep = 0;
      foreach ($query as $film) {
        $nb_ep += 1;
      }

      $query =  $this->Series->find('all')->distinct('id_tmdb');
      $nb_series = 0;
      foreach ($query as $film) {
        $nb_series += 1;
      }

      $query = $this->Series->findByAlert('1');
      $nb_series_alert = 0;
      foreach ($query as $film) {
        $nb_series_alert += 1;
      }



      $this->set('nb_films', $nb_films);
      $this->set('nb_films_alert', $nb_films_alert);

      $this->set('nb_series', $nb_series);
      $this->set('nb_ep', $nb_ep);

      $this->set('nb_series_alert', $nb_series_alert);

      $this->set('nb_music', $nb_music);
      $this->set('nb_artist', $nb_artist);
      $this->set('nb_album', $nb_album);

      $this->set('nb_user', $nb_user);
      $this->set('nb_admin', $nb_admin);

    }

    public function configure()
    {

    }


}
