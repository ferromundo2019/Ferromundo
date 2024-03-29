<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Brands', 'Categories']
        ];
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Brands', 'Categories', 'PurchaseDetails', 'SaleDetails']
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $brands = $this->Articles->Brands->find('list', ['limit' => 200]);
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $this->set(compact('article', 'brands', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $brands = $this->Articles->Brands->find('list', ['limit' => 200]);
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $this->set(compact('article', 'brands', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //use Cake\Event\Event;
    public function beforeRender(Event $event)
    {
        if($this->Auth->user()){
            $role = $this->Auth->user('role_id');
            if($role == 2 || $role == 3){
                foreach($this->Articles->find() as $article){
                    if($article->quantity < $article->stack){
                        $this->Flash->error(__('Low stock of').' '.$article->name);
                        
                    }
                }
            }
        }
    }
}
