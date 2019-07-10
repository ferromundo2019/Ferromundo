<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?> </li>
<li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?> </li>
<li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Suppliers')?> </h1>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($supplier->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Ruc') ?></td>
            <td><?= h($supplier->ruc) ?></td>
        </tr>
        <tr>
            <td><?= __('Social Reason') ?></td>
            <td><?= h($supplier->social_reason) ?></td>
        </tr>
        <tr>
            <td><?= __('Contact Name') ?></td>
            <td><?= h($supplier->contact_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Phone') ?></td>
            <td><?= h($supplier->phone) ?></td>
        </tr>
        <tr>
            <td><?= __('Address') ?></td>
            <td><?= h($supplier->address) ?></td>
        </tr>
        <tr>
            <td><?= __('Email') ?></td>
            <td><?= h($supplier->email) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($supplier->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($supplier->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($supplier->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Purchases') ?></h3>
    </div>
    <?php if (!empty($supplier->purchases)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Supplier Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Document Type') ?></th>
                <th><?= __('Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($supplier->purchases as $purchases): ?>
                <tr>
                    <td><?= h($purchases->id) ?></td>
                    <td><?= h($purchases->supplier_id) ?></td>
                    <td><?= h($purchases->user_id) ?></td>
                    <td><?= h($purchases->document_type) ?></td>
                    <td><?= h($purchases->date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Purchases', 'action' => 'view', $purchases->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Purchases', 'action' => 'edit', $purchases->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Purchases', 'action' => 'delete', $purchases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchases->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Purchases</p>
    <?php endif; ?>
</div>
