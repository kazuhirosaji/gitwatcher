<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\LanguagesTable;
use Cake\ORM\TableRegistry;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Repos']
        ]);
        $events = $this->getGithubEvents($user['name']);

        $ONEDAY = 24 * 60 * 60;
        $commit_dates = array();
        $lastMonth = time() + (-30 * $ONEDAY);
        $now = time();
        for($day = $lastMonth; $day < $now + $ONEDAY; $day += $ONEDAY) {
            $commit_dates[date('Y-m-d', $day)] = 0;
        }
        foreach($events as $event) {
            $created = substr($event['created_at'], 0, 10);
            $commit_dates[$created]++;
        }
        $this->set(compact('user', 'commit_dates'));
        $this->set('_serialize', ['user']);
    }

    private function getGithubEvents($user_name) {
        $events = file_get_contents('https://api.github.com/users/'.$user_name.'/events');
        return json_decode($events , true);
    }

    private function getGithubRepos($user_name) {
        $repos = file_get_contents('https://api.github.com/users/'.$user_name.'/repos');
        return json_decode($repos , true);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();


        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            $user = $this->Users->save($user);
            if ($user) {
                $this->Flash->success('The user has been saved.');
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
                return $this->redirect(['action' => 'index']);
            }

            $languages = TableRegistry::get('Languages');
            $repos = TableRegistry::get('Repos');

            $repositories = $this->getGithubRepos($this->request->data['name']);
            $is_saved = false;

            foreach($repositories as $repository) {
                // save language
                $data = array();
                $data['name'] = $repository['language'];
                unset($language);

                if ($data['name']) {
                    $query = $languages->find('all', [
                        'conditions' => ['Languages.name' => $data['name']]
                    ]);
                    $language = $query->first();

                    if (!$language) {
                        $language = $languages->newEntity();
                        $repo_lang = $languages->patchEntity($language, $data);
                        $language = $languages->save($repo_lang);
                        if ($language) {
                            $is_saved = true;
                        } else {
                            $this->Flash->error('The language could not be saved. Please, try again.');
                        }                    
                    }

                }

                // save repo
                $is_saved = false;
                $data = array();
                $data['title'] = $repository['name'];
                $data['url'] = $repository['html_url'];
                $data['language_id'] = $language['id'];
                $data['user_id'] = $user['id'];
                if ($data['title']) {
                    $repo = $repos->newEntity();
                    $repo = $repos->patchEntity($repo, $data);
                    if ($repos->save($repo)) {
                        $is_saved = true;
                    } else {
                        $this->Flash->error('The repository could not be saved. Please, try again.');
                    }                    
                }
            }
            if ($is_saved) {
                $this->Flash->success('The language has been saved.');
            }
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
