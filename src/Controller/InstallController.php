<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Auth\DefaultPasswordHasher;

class InstallController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */

     // new File (ROOT . '/config/installed.txt', true, 0777);


    public function index()
    {

    }

    public function finish()
    {
      new File (ROOT . '/config/installed.txt', true, 0777);
    }

    public function migrate()
    {
      ConnectionManager::get('default')->connect();

      $conn = ConnectionManager::get('default');
      // Creation des tables manquantes et champs
      $sql_request = file_get_contents(ROOT . '/config/bdd_migrate.sql');
      if ($conn->query($sql_request)) {
        $this->Flash->success(__("Base de données à jour !"));
      }

      if ($this->request->is('post')) {
          $data = $this->request->data;

          $sql_request = 'INSERT INTO `config` (`id`, `nom`, `valeur`) VALUES
          (10, "access", "'.$data['Access'].'"),
          (11, "menu", "'.$data['Menu'].'"),
          (12, "user_upload", "'.$data['Upload'].'"),
          (13, "symlink", "'.$data['Symlink'].'");';

          if ($conn->query($sql_request)) {
            $this->Flash->success(__("Media configuré !"));
            return $this->redirect(['action' => 'finish']);

          } else {
            $this->Flash->error(__("Erreur"));
          }

      }




    }

    public function folderconfig()
    {
      $conn = ConnectionManager::get('default');

      if ($this->request->is('post')) {
          $data = $this->request->data;

          $sql_request = 'INSERT INTO `folders` (`id`, `path`, `filetype`, `type`) VALUES
          (1, "'.$data['Films'].'", "avi,mkv,mpg,mov", "Films"),
          (2, "'.$data['Musique'].'", "mp3,flac,acc", "Musique"),
          (3, "'.$data['Series'].'", "avi,mkv,mpg,mov,mp4", "Series"),
          (4, "'.$data['Films_upload'].'", "avi,mkv,mpg,mov,mp4", "Film_upload"),
          (5, "'.$data['Series_upload'].'", "avi,mkv,mpg,mov,mp4", "Serie_upload"),
          (6, "'.$data['Musique_upload'].'", "mp3,flac,acc", "Musique_upload"),
          (7, "'.$data['Films_user'].'", "avi,mkv,mpg,mov,mp4", "Film_user"),
          (8, "'.$data['Series_user'].'", "avi,mkv,mpg,mov,mp4", "Serie_user"),
          (9, "'.$data['Logiciels'].'", "*", "Logiciels"),
          (10, "'.$data['Jeux'].'", "*", "Jeux");';

          if ($conn->query($sql_request)) {
            $this->Flash->success(__("Dossiers configurés !"));
            return $this->redirect(['action' => 'urlconfig']);

          } else {
            $this->Flash->error(__("Erreur"));
          }

      }

    }

    public function urlconfig()
    {
      $conn = ConnectionManager::get('default');

      if ($this->request->is('post')) {
          $data = $this->request->data;

          $sql_request = 'INSERT INTO `urls` (`id`, `nom`, `valeur`) VALUES
          (1, "url_film", "'.$data['Films'].'"),
          (2, "url_serie", "'.$data['Series'].'"),
          (3, "url_jeux", "'.$data['Jeux'].'"),
          (4, "url_logiciels", "'.$data['Logiciels'].'"),
          (5, "base", "'.$data['Base'].'"),
          (6, "url_music", "'.$data['Musique'].'"),
          (7, "url_film_mod", "'.$data['Films_user'].'"),
          (8, "url_serie_mod", "'.$data['Series_user'].'")';

          if ($conn->query($sql_request)) {
            $this->Flash->success(__("Urls configurées !"));
            return $this->redirect(['action' => 'config']);

          } else {
            $this->Flash->error(__("Erreur"));
          }

      }

    }

    public function config()
    {
      $conn = ConnectionManager::get('default');

      if ($this->request->is('post')) {
          $data = $this->request->data;

          $sql_request = 'INSERT INTO `config` (`id`, `nom`, `valeur`) VALUES
          (9, "tmdb_api_key", "'.$data['Tmdb_api_key'].'"),
          (10, "access", "'.$data['Access'].'"),
          (11, "menu", "'.$data['Menu'].'"),
          (12, "user_upload", "'.$data['Upload'].'"),
          (13, "symlink", "'.$data['Symlink'].'");';

          if ($conn->query($sql_request)) {
            $this->Flash->success(__("Media configuré !"));
            return $this->redirect(['action' => 'finish']);

          } else {
            $this->Flash->error(__("Erreur"));
          }

      }

    }


    public function dbcreate()
    {
      $conn = ConnectionManager::get('default');

      if ($this->request->is('post')) {
          $data = $this->request->data;
          // on hash le pass
          $data['password'] = (new DefaultPasswordHasher)->hash($data['password']);

          $sql_request = 'INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
          (1, "'.$data['login'].'", "'.$data['password'].'", "admin", NULL, NULL)';

          if ($conn->query($sql_request)) {
            $this->Flash->success(__("Admin créé !"));
            return $this->redirect(['action' => 'folderconfig']);

          } else {
            $this->Flash->error(__("Erreur"));
          }

      }

      $sql_request = file_get_contents(ROOT . '/config/bdd.sql');
      if ($conn->query($sql_request)) {
        $this->Flash->success(__("Données importées dans la base de donnée avec succès !"));
      } else {
        $this->Flash->error(__("Erreur dans l'import de la base de données !"));
      }
    }

    public function dbConfig()
    {

      if ($this->request->is('post')) {
          $field = $this->request->data;

          // Read app.PHP file and store to new file
              $handle = @fopen(ROOT . '/config/app.php', "r");
              if ($handle == false) {
                $handle = @fopen(ROOT . '/config/app.dafault.php', "r");
              }
              new File (ROOT . '/config/appNew.php', true, 0777);
              $handleWrite = @fopen(ROOT . '/config/appNew.php', "w");

              $check=0;
              $checkIntermediate=0;

              if ($handle & $handleWrite) {
                  while (($buffer = fgets($handle)) !== false) {
                      // Verify if handle is on Datasources
                      if (ltrim($buffer)== "'Datasources' => [\n") $checkIntermediate=1;
                      // Verify if handle is on default
                      if (ltrim($buffer)=="'default' => [\n" & $checkIntermediate) $check=1;

                      if ($check) switch (substr(ltrim($buffer),0, 8))
                      {
                          case "'host' =":
                              $count= substr($buffer, 0,strlen($buffer)- strlen(ltrim($buffer)));
                              $buffer=$count."'host' =>'".$field['host']."',\n";
                              break;
                          case "'usernam":
                              $count= substr($buffer, 0,strlen($buffer)- strlen(ltrim($buffer)));
                              $buffer=$count."'username' =>'".$field['login']."',\n";
                              break;
                          case "'passwor":
                              $count= substr($buffer, 0,strlen($buffer)- strlen(ltrim($buffer)));
                              $buffer=$count."'password' => '". $field['password']."',\n";
                              break;
                          case "'databas":
                              $count= substr($buffer, 0,strlen($buffer)- strlen(ltrim($buffer)));
                              $buffer=$count."'database' => '".$field['database']."',\n";
                              break;
                          case "],\n":
                              $check=0;
                              break;
                      }
                      // Write in new file
                      fputs($handleWrite, $buffer);
                  }
                  fclose($handle);
                  fclose($handleWrite);
              }
              unlink(ROOT . '/config/app.php');
              rename(ROOT . '/config/appNew.php', ROOT . '/config/app.php');
              return $this->redirect(['action' => 'dbcreate']);
            }
    }




}
