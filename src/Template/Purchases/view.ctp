<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Purchase'), ['action' => 'edit', $purchase->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Purchase'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id)]) ?> </li>
<li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Purchase'), ['action' => 'edit', $purchase->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Purchase'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id)]) ?> </li>
<li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('Export to PDF'), ['action' => 'view', $purchase->id, '_ext' => 'pdf']); ?></li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Purchases')?> </h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($purchase->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Supplier') ?></td>
            <td><?= $purchase->has('supplier') ? $this->Html->link($purchase->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $purchase->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $purchase->has('user') ? $this->Html->link($purchase->user->name, ['controller' => 'Users', 'action' => 'view', $purchase->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Document Type') ?></td>
            <td><?= h($purchase->document_type) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($purchase->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Date') ?></td>
            <td><?= h($purchase->date) ?></td>
        </tr>
        <tr>
            <td><?= __('Purchased') ?></td>
            <td><?= $purchase->purchased ? __('Yes') : __('No').' '.$this->Form->postLink('', ['action' => 'purchased', $purchase->id], ['confirm' => __('Are you sure to buy # {0}? This action is irreversible' , $purchase->id), 'title' => __('Purchase'), 'class' => 'btn btn-default glyphicon glyphicon-piggy-bank']); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related PurchaseDetails') ?></h3>
    </div>
    <?php if (!empty($purchase->purchase_details)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Article') ?></th>
                
                <th><?= __('Quantity') ?></th>
                <th><?= __('Cost') ?></th>
                <th><?= __('Total') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($detallesCompra as $details): ?>
                <tr>
                    <td><?= h($details['id']) ?></td>
                    <td><?= h($details['article']) ?></td>
                    
                    <td><?= h($details['quantity']) ?></td>
                    <td><?= h($details['cost']) ?></td>
                    <td><?= h($details['total']) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'PurchaseDetails', 'action' => 'view', $details['id']], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'PurchaseDetails', 'action' => 'edit', $details['id']], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'PurchaseDetails', 'action' => 'delete', $details['id']], ['confirm' => __('Are you sure you want to delete # {0}?', $details['id']), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related PurchaseDetails</p>
    <?php endif; ?>
</div>
