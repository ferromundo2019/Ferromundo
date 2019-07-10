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
    <li><?= $this->Html->link(__('Sales'), ['controller' => 'Sales', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('SaleDetails'), ['controller' => 'SaleDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Roles'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<h1 class="page-header"><?=__('Purchase Details')?> 
<?= $this->Html->link('<span class="glyphicon-plus"></span>Add', ['controller'=>'PurchaseDetails','action'=>'add'], ['class'=> 'btn btn-sm btn-primary pull-right','escape'=>false])?>
</h1>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('article_id'); ?></th>
            <th><?= $this->Paginator->sort('purchase_id'); ?></th>
            <th><?= $this->Paginator->sort('quantity'); ?></th>
            <th><?= $this->Paginator->sort('cost'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($purchaseDetails as $purchaseDetail): ?>
        <tr>
            <td><?= $this->Number->format($purchaseDetail->id) ?></td>
            <td>
                <?= $purchaseDetail->has('article') ? $this->Html->link($purchaseDetail->article->name, ['controller' => 'Articles', 'action' => 'view', $purchaseDetail->article->id]) : '' ?>
            </td>
            <td>
                <?= $purchaseDetail->has('purchase') ? $this->Html->link($purchaseDetail->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseDetail->purchase->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($purchaseDetail->quantity) ?></td>
            <td><?= $this->Number->format($purchaseDetail->cost) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $purchaseDetail->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $purchaseDetail->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $purchaseDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetail->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
