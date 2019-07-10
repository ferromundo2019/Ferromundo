<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id)]) ?> </li>
<li><?= $this->Html->link(__('List Sales'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sale'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Sale Details'), ['controller' => 'SaleDetails', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sale Detail'), ['controller' => 'SaleDetails', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id)]) ?> </li>
<li><?= $this->Html->link(__('List Sales'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sale'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Sale Details'), ['controller' => 'SaleDetails', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sale Detail'), ['controller' => 'SaleDetails', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($sale->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $sale->has('user') ? $this->Html->link($sale->user->name, ['controller' => 'Users', 'action' => 'view', $sale->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Document Type') ?></td>
            <td><?= h($sale->document_type) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($sale->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Date') ?></td>
            <td><?= h($sale->date) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related SaleDetails') ?></h3>
    </div>
    <?php if (!empty($sale->sale_details)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Article Id') ?></th>
                <th><?= __('Sale Id') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Cost') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($sale->sale_details as $saleDetails): ?>
                <tr>
                    <td><?= h($saleDetails->id) ?></td>
                    <td><?= h($saleDetails->article_id) ?></td>
                    <td><?= h($saleDetails->sale_id) ?></td>
                    <td><?= h($saleDetails->quantity) ?></td>
                    <td><?= h($saleDetails->cost) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'SaleDetails', 'action' => 'view', $saleDetails->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'SaleDetails', 'action' => 'edit', $saleDetails->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'SaleDetails', 'action' => 'delete', $saleDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleDetails->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related SaleDetails</p>
    <?php endif; ?>
</div>
