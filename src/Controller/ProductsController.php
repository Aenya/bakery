<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'Baskets', 'Dailies', 'OrderProducts']
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function liste($id = null)
    {
        $products = $this->Products->find('all');
        if($id != null)
        {
            $tag = $this->Products->Categories->get($id);
            $products->where(['category_id' => $tag]);
        }
        $products = $this->paginate($products);
        $this->set(compact('products'));
    }

    // function to add products to shopping cart

    public function addToCart($id=null)
    {
        $product = $this->Products->get($id);
        $user = $this->Products->Baskets->Users->get($this->Auth->user('id'));
        $check = $this->Products->Baskets->find()->where(['product_id' => $id,'user_id' => $this->Auth->user('id')])->count();
        if($check!=0)
        {
            $query = $this->Products->Baskets->query();
            $update = $query->update()
                ->set(
                    $query->newExpr('quantity = quantity + 1')
                )
                ->where(['product_id' => $id,'user_id' => $this->Auth->user('id')])
                ->execute();
            return $this->redirect($this->referer());
        }
        else {
            $baskets = $this->Products->Baskets->newEntity();
            $data = [
                'user_id' => $user->id,
                'product_id' => $id,
                'quantity' => 1
            ];
            $baskets = $this->Products->Baskets->patchEntity($baskets, $data);
            if ($this->Products->Baskets->save($baskets)) {
                echo $this->Flash->success('Product correctly added to cart.');
                return $this->redirect($this->referer());
            } else {
                echo $this->Flash->error('Impossible to add this product to your cart.');
                return $this->redirect($this->referer());
            }
        }
    }

    public function deleteFromCart($id=null)
    {
        // to do
    }
}
