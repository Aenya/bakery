<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Basket'), ['controller' => 'Basket', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Basket'), ['controller' => 'Basket', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dailies'), ['controller' => 'Dailies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Daily'), ['controller' => 'Dailies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Products'), ['controller' => 'OrderProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Product'), ['controller' => 'OrderProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($product->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Basket') ?></h4>
        <?php if (!empty($product->basket)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->basket as $basket): ?>
            <tr>
                <td><?= h($basket->id) ?></td>
                <td><?= h($basket->product_id) ?></td>
                <td><?= h($basket->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Basket', 'action' => 'view', $basket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Basket', 'action' => 'edit', $basket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Basket', 'action' => 'delete', $basket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $basket->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Dailies') ?></h4>
        <?php if (!empty($product->dailies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->dailies as $dailies): ?>
            <tr>
                <td><?= h($dailies->id) ?></td>
                <td><?= h($dailies->product_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Dailies', 'action' => 'view', $dailies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Dailies', 'action' => 'edit', $dailies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Dailies', 'action' => 'delete', $dailies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dailies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Order Products') ?></h4>
        <?php if (!empty($product->order_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->order_products as $orderProducts): ?>
            <tr>
                <td><?= h($orderProducts->order_id) ?></td>
                <td><?= h($orderProducts->product_id) ?></td>
                <td><?= h($orderProducts->quantity) ?></td>
                <td><?= h($orderProducts->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderProducts', 'action' => 'view', $orderProducts->order_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderProducts', 'action' => 'edit', $orderProducts->order_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderProducts', 'action' => 'delete', $orderProducts->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderProducts->order_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
