<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="panel panel-warning">
            <div class="panel-heading text-center">
                <?= $this->Form->create($product) ?>
                <fieldset>
                    <h4><?= __('Add Product') ?></h4>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->input('name',['class' => 'form-control']);
                echo $this->Form->input('category_id',['class' => 'form-control'], ['options' => $categories]);
                echo $this->Form->input('description',['class' => 'form-control']);
                echo $this->Form->input('price',['type' => 'number','step'=> '0.01','min' => '0.01','class' => 'form-control']);
                echo '<sub>Utilisez la virgule en séparateur</sub>';
                echo $this->Form->input('image',['class' => 'form-control']);

                ?>
                </fieldset>
            </div>
            <div class="panel-footer text-center">
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
