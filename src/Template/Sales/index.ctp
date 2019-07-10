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
    <li><?= $this->Html->link(__('SaleDetails'), ['controller' => 'SaleDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Roles'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h1 class="page-header"><?=__('Sales')?> 
<?= $this->Html->link('<span class="glyphicon-plus"></span>Add', ['controller'=>'Sales','action'=>'add'], ['class'=> 'btn btn-sm btn-primary pull-right','escape'=>false])?>

</h1>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('user_id'); ?></th>
            <th><?= $this->Paginator->sort('document_type'); ?></th>
            <th><?= $this->Paginator->sort('date'); ?></th>
            <th><?= $this->Paginator->sort('detail+'); ?></th>
            <th><?= $this->Paginator->sort('sold'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sales as $sale): ?>
        <tr>
            <td><?= $this->Number->format($sale->id) ?></td>
            <td>
                <?= $sale->has('user') ? $this->Html->link($sale->user->name, ['controller' => 'Users', 'action' => 'view', $sale->user->id]) : '' ?>
            </td>
            <td><?= h($sale->document_type) ?></td>
            <td><?= h($sale->date) ?></td>
            <td><?php if($sale->sold != 1){
                echo $this->Html->link('', ['controller' => 'SaleDetails', 'action' => 'detail', $sale->id], ['title' => __('+detail'), 'class' => 'btn btn-default glyphicon glyphicon-plus']);
            }
            else{
                echo h(__('Sold'));
            } ?></td>
            <td><?php if($sale->sold != 1){
                echo $this->Form->postLink('', ['action' => 'sold', $sale->id], ['confirm' => __('Are you sure to sell # {0}? This action is irreversible' , $sale->id), 'title' => __('Sell'), 'class' => 'btn btn-default glyphicon glyphicon-piggy-bank']);
            }
            else{
                echo h(__('Sold'));
            } ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $sale->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $sale->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
