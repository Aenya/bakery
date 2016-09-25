<div class="row">
    <div class="col-sm12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <?php
        foreach($products as $product){
?>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-success">
                <div class="panel-heading text-center">
                    <span class="h6"><?= $product->name ?></span>
                </div>
                <div class="panel-body">
                    <label>Description :</label>
                    <p class="list-group-item"><?= $product->description ?></p>
                    <label>Prix :</label>
                    <p class="list-group-item text-center"><?= $product->price ?> €</p>
                </div>
                <div class="panel-footer text-center">
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-shopping-cart"></span> '.__('Add to cart'),['action' => 'addToCart',$product->id],['class' => 'btn btn-success btn-cart','escape' => false]) ?>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<div class="paginator text-center">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>