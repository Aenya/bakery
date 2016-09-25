<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderProducts index large-9 medium-8 columns content">
    <h3><?= __('Order Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderProducts as $orderProduct): ?>
            <tr>
                <td><?= $orderProduct->has('order') ? $this->Html->link($orderProduct->order->id, ['controller' => 'Orders', 'action' => 'view', $orderProduct->order->id]) : '' ?></td>
                <td><?= $orderProduct->has('product') ? $this->Html->link($orderProduct->product->name, ['controller' => 'Products', 'action' => 'view', $orderProduct->product->id]) : '' ?></td>
                <td><?= $this->Number->format($orderProduct->quantity) ?></td>
                <td><?= $this->Number->format($orderProduct->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderProduct->order_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderProduct->order_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderProduct->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderProduct->order_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
