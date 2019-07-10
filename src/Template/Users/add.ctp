<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('Articles'), ['controller' => 'Articles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Brands'), ['controller' => 'Brands', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Purchases'), ['controller' => 'Purchases', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('PurchaseDetails'), ['controller' => 'PurchaseDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Sales'), ['controller' => 'Sales', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('SaleDetails'), ['controller' => 'SaleDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Roles'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']); ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Articles'), ['controller' => 'Articles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Brands'), ['controller' => 'Brands', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Purchases'), ['controller' => 'Purchases', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('PurchaseDetails'), ['controller' => 'PurchaseDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Sales'), ['controller' => 'Sales', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('SaleDetails'), ['controller' => 'SaleDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Roles'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']); ?></li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Users')?> </h1>

<?= $this->Form->create($user, ['novalidate']); ?>
<fieldset>
    <legend><?= __('Add {0}', [__('User')]) ?></legend>
    <?php

    if($this->request->getSession()->read('Auth.User')){
        if($this->request->getSession()->read('Auth.User')['role_id'] == 1){
            echo $this->Form->control('role_id', ['options' => $roles]);
        }
        else if($this->request->getSession()->read('Auth.User')['role_id'] == 2){
            echo $this->Form->label('role-id', ['Role'],['class' => 'control-label']);
            echo $this->Form->select(
                'role_id',
                [3=>__('Empleado'), 4=>__('Cliente')], ['id' => 'role-id']
            );
        }
    }

    //echo $this->Form->control('role_id', ['options' => $roles]);
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    echo $this->Form->control('name');
    echo $this->Form->control('surname');
    echo $this->Form->control('phone');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
