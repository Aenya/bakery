<div class="row">
    <div class="container-fluid">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Offres du jour</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id',['model' => 'Dailies']) ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dailies as $daily): ?>
                            <tr>
                                <td><?= $daily->has('product') ? $daily->product->name : '' ?></td>
                                <td class="actions">
                                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> Enlever',
                                        ['action' => 'delete', $daily->id],
                                        ['class' => 'btn btn-danger btn-xs','escape' => false]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="panel-footer text-center">
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="table-responsive">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>Produits</h4>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('name',['model' => 'Products']) ?></th>
                            <th scope="col" class="hidden-xs hidden-sm"><?= $this->Paginator->sort('name',['model' => 'Categories']) ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= $product->name ?></td>
                                <td class="hidden-xs hidden-sm"><?= $product->has('category') ? $product->category->name : '' ?></td>
                                <td class="actions hidden-xs hidden-sm">
                                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-plus"></span> Ajouter',[
                                        'action' => 'addToDailies',$product->id],
                                        ['class' => 'btn btn-success btn-xs','escape' => false]) ?>
                                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-minus"></span> Enlever',[
                                        'controller' => 'Products','action' => 'view',$product->id],
                                        ['class' => 'btn btn-danger btn-xs','escape' => false]) ?>
                                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-eye-open"></span> Voir',[
                                        'controller' => 'Products','action' => 'view',$product->id],
                                        ['class' => 'btn btn-info btn-xs','escape' => false]) ?>
                                </td>
                                <td class="actions hidden-md hidden-lg">
                                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-plus"></span>',[
                                        'action' => 'addToDailies',$product->id],
                                        ['class' => 'btn btn-success btn-xs','escape' => false]) ?>
                                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-minus"></span>',[
                                        'controller' => 'Products','action' => 'view',$product->id],
                                        ['class' => 'btn btn-danger btn-xs','escape' => false]) ?>
                                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-eye-open"></span>',[
                                        'controller' => 'Products','action' => 'view',$product->id],
                                        ['class' => 'btn btn-info btn-xs','escape' => false]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="panel-footer text-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>