<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Query;

/**
 * Dailies Controller
 *
 * @property \App\Model\Table\DailiesTable $Dailies
 */
class DailiesController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['liste']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $dailies = $this->Dailies->find('all',['contain' => 'Products']);
        $dailies = $this->paginate($dailies,['scope' => 'dailies']);
        $products = $this->Dailies->Products->find('all',['contain' => 'Categories']);
        $products = $this->paginate($products,['scope' => 'produits']);

        $this->set(compact('dailies','products'));
        $this->set('_serialize', ['dailies','products']);
    }

    /**
     * View method
     *
     * @param string|null $id Daily id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $daily = $this->Dailies->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('daily', $daily);
        $this->set('_serialize', ['daily']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $daily = $this->Dailies->newEntity();
        if ($this->request->is('post')) {
            $daily = $this->Dailies->patchEntity($daily, $this->request->data);
            if ($this->Dailies->save($daily)) {
                $this->Flash->success(__('The daily has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The daily could not be saved. Please, try again.'));
            }
        }
        $products = $this->Dailies->Products->find('list', ['limit' => 200]);
        $this->set(compact('daily', 'products'));
        $this->set('_serialize', ['daily']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Daily id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $daily = $this->Dailies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $daily = $this->Dailies->patchEntity($daily, $this->request->data);
            if ($this->Dailies->save($daily)) {
                $this->Flash->success(__('The daily has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The daily could not be saved. Please, try again.'));
            }
        }
        $products = $this->Dailies->Products->find('list', ['limit' => 200]);
        $this->set(compact('daily', 'products'));
        $this->set('_serialize', ['daily']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Daily id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $daily = $this->Dailies->get($id);
        if ($this->Dailies->delete($daily)) {
            $this->Flash->success(__('The daily has been deleted.'));
        } else {
            $this->Flash->error(__('The daily could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addToDailies($id=null)
    {
        $this->request->allowMethod(['post']);
        $check = $this->Dailies->find()->where(['product_id' => $id])->count();
        if($check==0) {
            $daily = $this->Dailies->newEntity();
            $data = [
                'product_id' => $id
            ];
            $daily = $this->Dailies->patchEntity($daily,$data);
            if($this->Dailies->save($daily))
            {
                $this->Flash->success(__('The daily has been added.'));
            }
            else
            {
                $this->Flash->error(__('The daily could not be added.'));
            }
            return $this->redirect($this->referer());
        }
        return $this->redirect($this->referer());
    }

    public function liste()
    {
        $dailies = $this->Dailies->find()->contain(['Products','Products.Categories']);
        $dailies = $this->paginate($dailies);
        if($this->Auth->user() && !$this->Auth->user('is_admin'))
        {
            $button = true;
        }
        else
        {
            $button = false;
        }
        $this->set('button',$button);
        $this->set(compact('dailies'));
        $this->set('_serialize',['dailies']);
    }
}
