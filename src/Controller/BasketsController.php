<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;

/**
 * Baskets Controller
 *
 * @property \App\Model\Table\BasketsTable $Baskets
 */
class BasketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Products']
        ];
        $baskets = $this->paginate($this->Baskets);

        $this->set(compact('baskets'));
        $this->set('_serialize', ['baskets']);
    }

    /**
     * View method
     *
     * @param string|null $id Basket id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $basket = $this->Baskets->get($id, [
            'contain' => ['Users', 'Products']
        ]);

        $this->set('basket', $basket);
        $this->set('_serialize', ['basket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $basket = $this->Baskets->newEntity();
        if ($this->request->is('post')) {
            $basket = $this->Baskets->patchEntity($basket, $this->request->data);
            if ($this->Baskets->save($basket)) {
                $this->Flash->success(__('The basket has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The basket could not be saved. Please, try again.'));
            }
        }
        $users = $this->Baskets->Users->find('list', ['limit' => 200]);
        $products = $this->Baskets->Products->find('list', ['limit' => 200]);
        $this->set(compact('basket', 'users', 'products'));
        $this->set('_serialize', ['basket']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Basket id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $basket = $this->Baskets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $basket = $this->Baskets->patchEntity($basket, $this->request->data);
            if ($this->Baskets->save($basket)) {
                $this->Flash->success(__('The basket has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The basket could not be saved. Please, try again.'));
            }
        }
        $users = $this->Baskets->Users->find('list', ['limit' => 200]);
        $products = $this->Baskets->Products->find('list', ['limit' => 200]);
        $this->set(compact('basket', 'users', 'products'));
        $this->set('_serialize', ['basket']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Basket id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $basket = $this->Baskets->get($id);
        if ($this->Baskets->delete($basket)) {

        } else {
            $this->Flash->error(__('The basket could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }

    public function plus($id = null)
    {
        $query = $this->Baskets->query();
        $update = $query->update()
            ->set(
                $query->newExpr('quantity = quantity + 1')
            )
            ->where(['id' => $id])
            ->execute();
        return $this->redirect($this->referer());
    }

    public function minus($id = null)
    {
        $query = $this->Baskets->query();
        $update = $query->update()
            ->set(
                $query->newExpr('quantity = quantity - 1')
            )
            ->where(['id' => $id])
            ->execute();
        $basket = $this->Baskets->get($id);
        if($basket->quantity == 0)
        {
            $this->Baskets->delete($basket);
        }
        return $this->redirect($this->referer());
    }
}
