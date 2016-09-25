<div class="container-fluid">
    <div class="row">
        <div class="containers col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Profil de <?= h($user->login) ?></h4>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-10 col-md-6 col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item active">Mes informations</li>
                                <li class="list-group-item"><label>Prénom :</label> <?= h($user->firstname) ?></li>
                                <li class="list-group-item"><label>Nom :</label> <?= h($user->lastname) ?></li>
                                <li class="list-group-item"><label>E-mail :</label> <?= h($user->email) ?></li>
                                <li class="list-group-item"><label>Téléphone :</label> <?= h($user->cellphone) ?></li>
                            </ul>
                        </div>
                        <div class="col-sm-10 col-md-6 col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item active">Mes commandes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Login') ?></th>
            <td><?= h($user->login) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($user->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($user->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cellphone') ?></th>
            <td><?= h($user->cellphone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Admin') ?></th>
            <td><?= $user->is_admin ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Member') ?></th>
            <td><?= $user->is_member ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($user->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Delivered') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->user_id) ?></td>
                <td><?= h($orders->date) ?></td>
                <td><?= h($orders->is_active) ?></td>
                <td><?= h($orders->delivered) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
