<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{

  public function beforeFilter(Event $event)
     {
       parent::beforeFilter($event);
       $this->Auth->deny('index');
     }


     public function isAuthorized($user)
     {

         if ($this->request->here === $this->request->webroot.'users/view/'.$user['id']) {
             return true;
         }
         if ($this->request->here === $this->request->webroot.'users/edit/'.$user['id']) {
             return true;
         }

         return parent::isAuthorized($user);
     }






  public function login()
  {

      if ($this->request->is('post')) {
        
          $user = $this->Auth->identify();
          if ($user) {
              $this->Auth->setUser($user);
                $this->Flash->success(__("Connecté en tant que : ".$user['role']));
              return $this->redirect($this->Auth->redirectUrl());
          }
          $this->Flash->error(__("Nom d'utilisateur ou mot de passe incorrect, essayez à nouveau."));
      }
  }

  public function logout()
  {
      $user = $this->Auth->user();
      $this->Flash->success(__($user['username'].' déconnecté !'));
      return $this->redirect($this->Auth->logout());
  }

     public function index()
     {
        $this->set('users', $this->Users->find());
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__("L'utilisateur a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter l'utilisateur."));
        }
        $this->set('user', $user);
    }

    public function edit($id = null)
{
    $user = $this->Users->get($id);
    if ($this->request->is(['post', 'put'])) {
        $this->Users->patchEntity($user, $this->request->data);
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Les informations été mis à jour.'));
            return $this->redirect(['action' => 'view', $id = $user['id']]);
        }
        $this->Flash->error(__('Impossible de mettre à jour les informations.'));
    }

    $this->set('user', $user);
}

public function delete($id)
{
    $this->request->allowMethod(['post', 'delete']);

    $user = $this->Users->get($id);
    if ($this->Users->delete($user)) {
        $this->Flash->success(__("L'utilisateur avec l'id: {0} a été supprimé.", h($id)));
        return $this->redirect(['action' => 'index']);
    }
}

}



 ?>
