<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Purchase Detail'), ['action' => 'edit', $purchaseDetail->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Purchase Detail'), ['action' => 'delete', $purchaseDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetail->id)]) ?> </li>
<li><?= $this->Html->link(__('List Purchase Details'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase Detail'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Purchase Detail'), ['action' => 'edit', $purchaseDetail->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Purchase Detail'), ['action' => 'delete', $purchaseDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetail->id)]) ?> </li>
<li><?= $this->Html->link(__('List Purchase Details'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase Detail'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Purchase Details')?> </h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($purchaseDetail->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Article') ?></td>
            <td><?= $purchaseDetail->has('article') ? $this->Html->link($purchaseDetail->article->name, ['controller' => 'Articles', 'action' => 'view', $purchaseDetail->article->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Purchase') ?></td>
            <td><?= $purchaseDetail->has('purchase') ? $this->Html->link($purchaseDetail->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseDetail->purchase->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($purchaseDetail->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Quantity') ?></td>
            <td><?= $this->Number->format($purchaseDetail->quantity) ?></td>
        </tr>
        <tr>
            <td><?= __('Cost') ?></td>
            <td><?= $this->Number->format($purchaseDetail->cost) ?></td>
        </tr>
    </table>
</div>

