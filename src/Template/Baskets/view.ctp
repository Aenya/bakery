<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Basket'), ['action' => 'edit', $basket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Basket'), ['action' => 'delete', $basket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $basket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Baskets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Basket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="baskets view large-9 medium-8 columns content">
    <h3><?= h($basket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $basket->has('user') ? $this->Html->link($basket->user->id, ['controller' => 'Users', 'action' => 'view', $basket->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $basket->has('product') ? $this->Html->link($basket->product->name, ['controller' => 'Products', 'action' => 'view', $basket->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($basket->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($basket->quantity) ?></td>
        </tr>
    </table>
</div>
