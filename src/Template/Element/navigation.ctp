<nav class="navbar navbar-default hidden-xs hidden-sm">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Boulangerie du Quai</a>
        </div>
        <ul class="nav navbar-nav">
            <li><?= $this->Html->link(__('Homepage'),['controller' => 'Users','action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Our products'),['controller' => 'Dailies','action' => 'liste']) ?></li>
            <li><?= $this->Html->link(__('Contact Us'),['controller' => 'Contact','action' => 'add']) ?></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if($this->request->session()->read('Auth.User.id'))
            {
                ?>
                <li><?= $this->Html->link('<span class="glyphicon glyphicon-user"></span> '.__('My profile'),['controller' => 'Users','action' => 'view',$this->request->session()->read('Auth.User.login')],['escape' => false]) ?></li>
                <?php if($this->request->session()->read('Auth.User.is_admin')): ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-th"></span> Gestion
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?= $this->Html->link('Produits',['controller'=>'Products','action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Produits du jour',['controller'=>'Dailies','action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Commandes',['controller'=>'Orders','action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Utilisateurs',['controller'=>'Users','action' => 'index']) ?></li>
                    </ul>
                </li>
                <?php endif; ?>
                <li class="hidden-md hidden-lg"><?= $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span> '.__('My cart'),['controller' => 'Baskets','action' => 'view',$this->request->session()->read('Auth.User.id')],['escape' => false]) ?></li>
                <li><?= $this->Html->link('<span class="glyphicon glyphicon-log-out"></span> '.__('Log out'),['controller' => 'Users','action' => 'logout'],['escape' => false]) ?></li>
                <?php
            }
            else {
                ?>
                <li><?= $this->Html->link('<span class="glyphicon glyphicon-log-in"></span> '.__('Log in'),['controller' => 'Users','action' => 'login'],['escape' => false]) ?></li>
                <li><?= $this->Html->link('<span class="glyphicon glyphicon-log-in"></span> '.__('Register'),['controller' => 'Users','action' => 'add'],['escape' => false]) ?></li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>