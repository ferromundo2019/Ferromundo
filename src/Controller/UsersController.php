<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Purchases', 'Sales']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();

        if($this->Auth->user()){
            $role = $this->Auth->user('role_id');
            if($role == 3 || $role == 4){
                $user['role_id'] = 4;
            }
            if($role == 2 && ($this->request->getData('role_id') == 1 || $this->request->getData('role_id') == 2)){
                $this->Flash->error(__('Denied Access'));
                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }
        }
        else{
            $user['role_id'] = 4;
        }

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $letter = $this->request->getData('email');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                $email = new Email(['transport' => 'gmail']);
                //$email->setSender('example@gmail.com', 'Add user');
                $email->setFrom(['ferromundo2019@gmail.com' => 'Ferromundo S.A.C.'])
                    ->setTo($letter)
                    ->setSubject(__('New User'))
                    ->send(__('Successfully registered user'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            $captcha=$_POST['g-recaptcha-response'];


            if ($captcha!="") { 
                if ($user) {
                    $this->Auth->setUser($user);
                    
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Flash->error('Your username or password is incorrect.');
            }
            else{
                $this->Flash->error('Invalid CAPTCHA');
            }
        }
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'add']);

        // load the Captcha component and set its parameter 
        $this->loadComponent('CakeCaptcha.Captcha', [ 
            'captchaConfig' => 'UsersCaptcha' 
        ]); 
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}
