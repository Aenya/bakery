<?php if($baskets->first() !== null): ?>
        <nav class="hidden-xs hidden-sm pull-right" style="position:relative">
                <div id="show-shop-cart" class="btn btn-primary verticaltext" style="display: none;">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Panier
                </div>
                <div id="shop-cart" class="panel panel-primary">
                        <div class="panel-heading text-center">
                                <div class="pull-left">
                                        <span id="hide-shop-cart" class="btn btn-xs glyphicon glyphicon-menu-right"></span>
                                </div>
                                Panier
                        </div>
                        <table class="table">
                                <tr>
                                        <th>Produit</th>
                                        <th>Prix</th>
                                        <th>Quantité</th>
                                        <th> </th>
                                </tr>
                                <?php foreach ($baskets as $basket): ?>
                                        <tr>
                                                <td><?= $basket->product->name ?></td>
                                                <td><?= $basket->product->price ?>€</td>
                                                <td><?= $basket->quantity ?></td>
                                                <td>
                                                        <?= $this->Form->postLink('<span class="glyphicon glyphicon-plus"></span>',[
                                                            'controller' => 'Baskets', 'action' => 'plus',$basket->id],
                                                            ['class'=>'btn btn-warning btn-xs','escape' => false]) ?>
                                                        <?= $this->Form->postLink('<span class="glyphicon glyphicon-minus"></span>',[
                                                            'controller' => 'Baskets', 'action' => 'minus',$basket->id],
                                                            ['class'=>'btn btn-warning btn-xs','escape' => false]) ?>
                                                        <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',[
                                                            'controller' => 'Baskets', 'action' => 'delete',$basket->id],
                                                            ['class'=>'btn btn-danger btn-xs','escape' => false]) ?>
                                                </td>
                                        </tr>
                                <?php endforeach; ?>
                                <tr>
                                        <td colspan=2><label>Total</label></td>
                                        <td colspan="2"><?php foreach($total as $t) { echo round($t->total,2); } ?>€</td>
                                </tr>
                        </table>
                        <div class="panel-footer text-center">
                                <?= $this->Html->link(__('Order it'),['controller'=>'Orders','action' => 'add'],['class' => 'btn btn-success']) ?>
                        </div>
                </div>
        </nav>
<?php endif; ?>

