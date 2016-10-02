<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Basket cell
 */
class BasketCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('Baskets');
        $baskets = $this->Baskets->find('all',[
            'contain' => ['Products'],
            'conditions' => [
                'user_id' => $this->request->session()->read('Auth.User.id')
            ]
        ])->all();
        $total = $this->Baskets->find('all',[
            'contain' => ['Products'],
            'conditions' => [
                'user_id' => $this->request->session()->read('Auth.User.id')
            ],
            'fields' => [
                'total' => 'sum(Products.price * Baskets.quantity)'
            ]
        ]);
        $mobile = $this->Baskets->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id')])->count();
        $this->set(compact('baskets'));
        $this->set('total',$total);
        $this->set('mobile',$mobile);
    }
}
