<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SaleDetails Controller
 *
 * @property \App\Model\Table\SaleDetailsTable $SaleDetails
 *
 * @method \App\Model\Entity\SaleDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SaleDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles', 'Sales']
        ];
        $saleDetails = $this->paginate($this->SaleDetails);

        $this->set(compact('saleDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Sale Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saleDetail = $this->SaleDetails->get($id, [
            'contain' => ['Articles', 'Sales']
        ]);

        $this->set('saleDetail', $saleDetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $saleDetail = $this->SaleDetails->newEntity();
        if ($this->request->is('post')) {
            $saleDetail = $this->SaleDetails->patchEntity($saleDetail, $this->request->getData());

                if ($this->SaleDetails->save($saleDetail)) {
                    $this->Flash->success(__('The sale detail has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The sale detail could not be saved. Please, try again.'));
          
        }
        $options = array();
        foreach ($this->paginate($this->SaleDetails->Sales->find()->where(['sold' != 0])) as $sale){
            if($sale->sold != 1){   
                $options[$sale->id] = $sale->id.') '.$this->SaleDetails->Sales->Users->get($sale->user_id)->name;
            }
        }
        $articles = $this->SaleDetails->Articles->find('list', ['limit' => 200]);
        $sales = $this->SaleDetails->Sales->find('list', ['limit' => 200]);
        $this->set(compact('saleDetail', 'articles', 'sales', 'options'));
    }

    public function detail($id = null)
    {
        $saleDetail = $this->SaleDetails->newEntity();
        if ($this->request->is('post')) {
            $saleDetail = $this->SaleDetails->patchEntity($saleDetail, $this->request->getData());

                if ($this->SaleDetails->save($saleDetail)) {
                    $this->Flash->success(__('The sale detail has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The sale detail could not be saved. Please, try again.'));
          
        }
        $options = array();
        foreach ($this->paginate($this->SaleDetails->Sales->find()->where(['sold' != 0])) as $sale){
            $options[$sale->id] = $sale->id.') '.$this->SaleDetails->Sales->Users->get($sale->user_id)->name;
        }
        $articles = $this->SaleDetails->Articles->find('list', ['limit' => 200]);
        $sales = $this->SaleDetails->Sales->find('list', ['limit' => 200]);
        $this->set(compact('saleDetail', 'articles', 'sales', 'options', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $saleDetail = $this->SaleDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saleDetail = $this->SaleDetails->patchEntity($saleDetail, $this->request->getData());
            if ($this->SaleDetails->save($saleDetail)) {
                $this->Flash->success(__('The sale detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale detail could not be saved. Please, try again.'));
        }
        $articles = $this->SaleDetails->Articles->find('list', ['limit' => 200]);
        $sales = $this->SaleDetails->Sales->find('list', ['limit' => 200]);
        $this->set(compact('saleDetail', 'articles', 'sales'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saleDetail = $this->SaleDetails->get($id);
        if ($this->SaleDetails->delete($saleDetail)) {
            $this->Flash->success(__('The sale detail has been deleted.'));
        } else {
            $this->Flash->error(__('The sale detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
