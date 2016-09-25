<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create() ?>
                <h4><?= __("Merci de rentrer vos nom d'utilisateur et mot de passe") ?></h4>
            </div>
            <div class="panel-body">
                <?= $this->Form->input('login',['class' => 'form-control']) ?>
                <?= $this->Form->input('password',['class' => 'form-control']) ?>
            </div>
            <div class="panel-footer text-center">
                <?= $this->Form->button(__('Se Connecter'),['class' => 'btn btn-success']); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>