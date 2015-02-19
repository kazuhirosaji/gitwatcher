<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Repos Controller
 *
 * @property \App\Model\Table\ReposTable $Repos
 */
class ReposController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Languages']
        ];
        $this->set('repos', $this->paginate($this->Repos));
        $this->set('_serialize', ['repos']);
    }

    /**
     * View method
     *
     * @param string|null $id Repo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $repo = $this->Repos->get($id, [
            'contain' => ['Users', 'Languages']
        ]);
        $this->set('repo', $repo);
        $this->set('_serialize', ['repo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $repo = $this->Repos->newEntity();
        if ($this->request->is('post')) {
            $repo = $this->Repos->patchEntity($repo, $this->request->data);
            if ($this->Repos->save($repo)) {
                $this->Flash->success('The repo has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The repo could not be saved. Please, try again.');
            }
        }
        $users = $this->Repos->Users->find('list', ['limit' => 200]);
        $languages = $this->Repos->Languages->find('list', ['limit' => 200]);
        $this->set(compact('repo', 'users', 'languages'));
        $this->set('_serialize', ['repo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Repo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $repo = $this->Repos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $repo = $this->Repos->patchEntity($repo, $this->request->data);
            if ($this->Repos->save($repo)) {
                $this->Flash->success('The repo has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The repo could not be saved. Please, try again.');
            }
        }
        $users = $this->Repos->Users->find('list', ['limit' => 200]);
        $languages = $this->Repos->Languages->find('list', ['limit' => 200]);
        $this->set(compact('repo', 'users', 'languages'));
        $this->set('_serialize', ['repo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Repo id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $repo = $this->Repos->get($id);
        if ($this->Repos->delete($repo)) {
            $this->Flash->success('The repo has been deleted.');
        } else {
            $this->Flash->error('The repo could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
