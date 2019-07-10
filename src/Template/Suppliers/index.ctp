<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('Articles'), ['controller' => 'Articles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Brands'), ['controller' => 'Brands', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Purchases'), ['controller' => 'Purchases', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('PurchaseDetails'), ['controller' => 'PurchaseDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Sales'), ['controller' => 'Sales', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('SaleDetails'), ['controller' => 'SaleDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Roles'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<h1 class="page-header"><?=__('Suppliers')?> 
<?= $this->Html->link('<span class="glyphicon-plus"></span>Add', ['controller'=>'Suppliers','action'=>'add'], ['class'=> 'btn btn-sm btn-primary pull-right','escape'=>false])?>
</h1>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('ruc'); ?></th>
            <th><?= $this->Paginator->sort('social_reason'); ?></th>
            <th><?= $this->Paginator->sort('contact_name'); ?></th>
            <th><?= $this->Paginator->sort('phone'); ?></th>
            <th><?= $this->Paginator->sort('address'); ?></th>
            <th><?= $this->Paginator->sort('email'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($suppliers as $supplier): ?>
        <tr>
            <td><?= $this->Number->format($supplier->id) ?></td>
            <td><?= h($supplier->ruc) ?></td>
            <td><?= h($supplier->social_reason) ?></td>
            <td><?= h($supplier->contact_name) ?></td>
            <td><?= h($supplier->phone) ?></td>
            <td><?= h($supplier->address) ?></td>
            <td><?= h($supplier->email) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $supplier->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $supplier->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
