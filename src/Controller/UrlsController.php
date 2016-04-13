<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Urls Controller
 *
 * @property \App\Model\Table\UrlsTable $Urls
 */
class UrlsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('urls', $this->paginate($this->Urls));
        $this->set('_serialize', ['urls']);
    }

    /**
     * View method
     *
     * @param string|null $id Url id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $url = $this->Urls->get($id, [
            'contain' => []
        ]);
        $this->set('url', $url);
        $this->set('_serialize', ['url']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $url = $this->Urls->newEntity();
        if ($this->request->is('post')) {
            $url = $this->Urls->patchEntity($url, $this->request->data);
            if ($this->Urls->save($url)) {
                $this->Flash->success(__('The url has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The url could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('url'));
        $this->set('_serialize', ['url']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Url id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $url = $this->Urls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $url = $this->Urls->patchEntity($url, $this->request->data);
            if ($this->Urls->save($url)) {
                $this->Flash->success(__('The url has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The url could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('url'));
        $this->set('_serialize', ['url']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Url id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $url = $this->Urls->get($id);
        if ($this->Urls->delete($url)) {
            $this->Flash->success(__('The url has been deleted.'));
        } else {
            $this->Flash->error(__('The url could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
