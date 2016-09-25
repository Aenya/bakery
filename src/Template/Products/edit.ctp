<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Basket'), ['controller' => 'Basket', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Basket'), ['controller' => 'Basket', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dailies'), ['controller' => 'Dailies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Daily'), ['controller' => 'Dailies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Products'), ['controller' => 'OrderProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Product'), ['controller' => 'OrderProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('price');
            echo $this->Form->input('image');
            echo $this->Form->input('category_id', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
