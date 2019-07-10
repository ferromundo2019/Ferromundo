<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Purchases Controller
 *
 * @property \App\Model\Table\PurchasesTable $Purchases
 *
 * @method \App\Model\Entity\Purchase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchasesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Suppliers', 'Users']
        ];
        
        $purchases = $this->paginate($this->Purchases);

        $this->set(compact('purchases'));
    }

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * View method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchase = $this->Purchases->get($id, [
            'contain' => ['Suppliers', 'Users', 'PurchaseDetails']
        ]);

        $detallesCompra = array();
        $total = 0;
        foreach ($purchase->purchase_details as $detalles){
            $article = $this->Purchases->PurchaseDetails->Articles->findById($detalles->article_id)->firstOrFail();
            $detallesCompra[] = array('id'=>$detalles->id, 'article'=>$article->name, 'quantity'=>$detalles->quantity,
             'cost'=>$detalles->cost, 'total'=>$detalles->quantity*$detalles->cost, 'code'=>$article->code, 'description'=>$article->description);
        }

        foreach ($detallesCompra as $details){
            $total += $details['total'];
        }

        $this->viewBuilder()->setOptions([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Purchase_' . $id . '.pdf'
            ]
        ]);

        $user = $this->Auth->user();
        

        $this->set('purchase', $purchase, 'detallesCompra', $detallesCompra);
        $this->set(compact('detallesCompra', 'total', 'user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchase = $this->Purchases->newEntity();
        if ($this->request->is('post')) {
            $purchase = $this->Purchases->patchEntity($purchase, $this->request->getData());
            if ($this->Purchases->save($purchase)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $options = array();
        foreach ($this->paginate($this->Purchases->Suppliers->find()->where(['id' >= 0])) as $supplier){
            $options[$supplier->id] = $supplier->social_reason;
        }
        $suppliers = $this->Purchases->Suppliers->find('list', ['limit' => 200]);
        $users = $this->Purchases->Users->find('list', ['limit' => 200]);
        $this->set(compact('purchase', 'suppliers', 'users', 'options'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchase = $this->Purchases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchase = $this->Purchases->patchEntity($purchase, $this->request->getData());
            if ($this->Purchases->save($purchase)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $suppliers = $this->Purchases->Suppliers->find('list', ['limit' => 200]);
        $users = $this->Purchases->Users->find('list', ['limit' => 200]);
        $this->set(compact('purchase', 'suppliers', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchase = $this->Purchases->get($id);
        if ($this->Purchases->delete($purchase)) {
            $this->Flash->success(__('The purchase has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function purchase($id = null)
    {
        //$this->Flash->error($this->paginate($this->Purchases->Suppliers->find()->where(['id' >= 0])));
        $purchase = $this->Purchases->newEntity();
        $purchase_detail = $this->Purchases->PurchaseDetails->newEntity();
        if ($this->request->is('post')) {
 
            $purchase_array = array();
            $purchase_array['supplier_id'] = $this->request->getData('supplier_id');
            $purchase_array['user_id'] = $this->request->getData('user_id');
            $purchase_array['document_type'] = $this->request->getData('document_type');
            $purchase_array['date'] = $this->request->getData('date');

            $purchase = $this->Purchases->patchEntity($purchase, $purchase_array);
            if ($this->Purchases->save($purchase)) {

                $details_array = array();
                $details_array['article_id'] = $this->request->getData('article_id');
                $details_array['purchase_id'] = $this->request->getData('purchase_id');
                foreach ($this->paginate($this->Purchases->find()->where(['id' >= 0])) as $compra){
                    if($compra->id > $details_array['purchase_id']){
                    $details_array['purchase_id'] = $compra->id;
                    }
                }
                $details_array['quantity'] = $this->request->getData('quantity');
                $details_array['cost'] = $this->request->getData('cost');
                $purchase_detail = $this->Purchases->PurchaseDetails->patchEntity($purchase_detail, $details_array);

                $articulo = $this->Purchases->PurchaseDetails->Articles->get($details_array['article_id']);
                $update = array('quantity'=>$articulo->quantity + $details_array['quantity']);

                $articulo = $this->Purchases->PurchaseDetails->Articles->patchEntity($articulo, $update);
            
                if($this->Purchases->PurchaseDetails->Articles->save($articulo)){
                    if ($this->Purchases->PurchaseDetails->save($purchase_detail)) {
                        $this->Flash->success(__('The article has been purchased.'));

                        return $this->redirect(['controller' => 'Articles', 'action' => 'index']);
                    }
                    $this->Flash->error(__('The purchase detail could not be saved. Please, try again.'));
                }
                $this->Flash->error(__('The article could not be updated. Please, try again.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $options = array();
        foreach ($this->paginate($this->Purchases->Suppliers->find()->where(['id' >= 0])) as $supplier){
            $options[$supplier->id] = $supplier->social_reason;
        }
        $article = $this->Purchases->PurchaseDetails->Articles->get($id)->name;
        $suppliers = $this->Purchases->Suppliers->find('list', ['limit' => 200]);
        $users = $this->Purchases->Users->find('list', ['limit' => 200]);
        $this->set(compact('purchase', 'suppliers', 'users','options', 'id', 'article'));
    }

    public function beforeRender(Event $event) {
        if(!$this->Auth->user()){
            $this->Flash->error(__('Do you not have a permission'));
            return $this->redirect($this->referer());
        }
        else{
            if($this->Auth->user('role_id') == 4){
                $this->Flash->error(__('Do you not have a permission'));
                return $this->redirect($this->referer());
            }
        }
    }
}
