<div class="container-fluid">
    <div class="row">
        <div class="containers col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
            <?php foreach($dailies as $daily): ?>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h5><?= $daily->has('product') ? $daily->product->name : '' ?></h5>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <p><?= $daily->has('product') ? $daily->product->image : '' ?></p>
                            </div>
                            <label>Desscription :</label>
                            <p class="list-group-item"><?= $daily->has('product') ? $daily->product->description : '' ?></p>
                            <label>Prix :</label>
                            <p class="list-group-item text-center"><?= $daily->has('product') ? $daily->product->price : '' ?>€</p>
                            <?php if($button): ?>
                                <div class="text-center">
                                    <p><?= $this->Form->postLink('<span class="glyphicon glyphicon-shopping-cart"></span> '.__('Add to cart'),['controller'=>'Products','action' => 'addToCart',$daily->product->id],
                                            ['class' => 'btn btn-success btn-cart','escape' => false]) ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>