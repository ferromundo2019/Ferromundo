<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sales Controller
 *
 * @property \App\Model\Table\SalesTable $Sales
 *
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $sales = $this->paginate($this->Sales);

        $this->set(compact('sales'));
    }

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    /**
     * View method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => ['Users', 'SaleDetails']
        ]);

        $detallesVenta = array();
        $total = 0;
        foreach ($sale->sale_details as $detalles){
            $article = $this->Sales->SaleDetails->Articles->findById($detalles->article_id)->firstOrFail();
            $detallesVenta[] = array('id'=>$detalles->id, 'article'=>$article->name, 'quantity'=>$detalles->quantity,
             'cost'=>$detalles->cost, 'total'=>$detalles->quantity*$detalles->cost, 'code'=>$article->code, 'description'=>$article->description);
        }

        foreach ($detallesVenta as $details){
            $total += $details['total'];
        }
        $user = $this->Auth->user();
        $this->viewBuilder()->setOptions([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Sale_' . $id . '.pdf'
            ]
        ]);
        $this->set('sale', $sale);
        $this->set(compact('detallesVenta', 'total', 'user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sale = $this->Sales->newEntity();
        if ($this->request->is('post')) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $users = $this->Sales->Users->find('list', ['limit' => 200]);
        $user = $this->Auth->user('id');
        $this->set(compact('sale', 'users', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $users = $this->Sales->Users->find('list', ['limit' => 200]);
        $this->set(compact('sale', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sale = $this->Sales->get($id);
        if ($this->Sales->delete($sale)) {
            $this->Flash->success(__('The sale has been deleted.'));
        } else {
            $this->Flash->error(__('The sale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function sold($id = null){
        if($this->Sales->findById($id)->firstOrFail()->sold == 1){
            return $this->redirect(['action' => 'index']);
        }
        $sale = $this->Sales->get($id, [
            'contain' => ['Users', 'SaleDetails']
        ]);

        $articulos = array();
        foreach($sale->sale_details as $detalles){
            if(array_key_exists($detalles->article_id, $articulos)){
                $articulos[$detalles->article_id] += $detalles->quantity;
            }
            else{
                $articulos[$detalles->article_id] = $detalles->quantity;
            }
        }
        $uploaded = array();
        foreach($articulos as $clave=>$valor){
            $article = $this->Sales->SaleDetails->Articles->get($clave);
            $cantidad = array('quantity'=>0);
            $cantidad['quantity'] = $article->quantity-$valor;
            if($cantidad['quantity']<0){
                $this->Flash->error(__('Out of stock. Stock of'.' '.$article['name'].' '.__('is').' '.$article['quantity']));
                foreach($uploaded as $key=>$value){
                    $article = $this->Sales->SaleDetails->Articles->get($key);
                    $cantidad['quantity'] = $article->quantity+$value;
                    $article = $this->Sales->SaleDetails->Articles->patchEntity($article, $cantidad);
                    if($this->Sales->SaleDetails->Articles->save($article)){

                    }
                }
                return $this->redirect(['action' => 'index']);
            }
            else{
                $article = $this->Sales->SaleDetails->Articles->patchEntity($article, $cantidad);
                if($this->Sales->SaleDetails->Articles->save($article)){
                    $uploaded[$clave] = $valor;
                }
            }
        }
        $sale = $this->Sales->get($id);
        $venta = array('sold'=>1);
        $sale = $this->Sales->patchEntity($sale, $venta);
        $this->Sales->save($sale);
        $this->Flash->success(__('Sale made successfully'));
        return $this->redirect(['action' => 'index']);
    }
}
