<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rmwords Controller
 *
 * @property \App\Model\Table\RmwordsTable $Rmwords
 */
class RmwordsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('rmwords', $this->paginate($this->Rmwords));
        $this->set('_serialize', ['rmwords']);
    }

    /**
     * View method
     *
     * @param string|null $id Rmword id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rmword = $this->Rmwords->get($id, [
            'contain' => []
        ]);
        $this->set('rmword', $rmword);
        $this->set('_serialize', ['rmword']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rmword = $this->Rmwords->newEntity();
        if ($this->request->is('post')) {
            $rmword = $this->Rmwords->patchEntity($rmword, $this->request->data);
            if ($this->Rmwords->save($rmword)) {
                $this->Flash->success(__('The rmword has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rmword could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rmword'));
        $this->set('_serialize', ['rmword']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rmword id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rmword = $this->Rmwords->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rmword = $this->Rmwords->patchEntity($rmword, $this->request->data);
            if ($this->Rmwords->save($rmword)) {
                $this->Flash->success(__('The rmword has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rmword could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rmword'));
        $this->set('_serialize', ['rmword']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rmword id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rmword = $this->Rmwords->get($id);
        if ($this->Rmwords->delete($rmword)) {
            $this->Flash->success(__('The rmword has been deleted.'));
        } else {
            $this->Flash->error(__('The rmword could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
