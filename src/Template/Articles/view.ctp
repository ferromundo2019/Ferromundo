<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
<li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Sale Details'), ['controller' => 'SaleDetails', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sale Detail'), ['controller' => 'SaleDetails', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
<li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Sale Details'), ['controller' => 'SaleDetails', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sale Detail'), ['controller' => 'SaleDetails', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Articles')?> </h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($article->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($article->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Code') ?></td>
            <td><?= h($article->code) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= h($article->description) ?></td>
        </tr>
        <tr>
            <td><?= __('Brand') ?></td>
            <td><?= $article->has('brand') ? $this->Html->link($article->brand->name, ['controller' => 'Brands', 'action' => 'view', $article->brand->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Category') ?></td>
            <td><?= $article->has('category') ? $this->Html->link($article->category->name, ['controller' => 'Categories', 'action' => 'view', $article->category->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Price') ?></td>
            <td><?= $this->Number->format($article->price) ?></td>
        </tr>
        <tr>
            <td><?= __('Stack') ?></td>
            <td><?= $this->Number->format($article->stack) ?></td>
        </tr>
        <tr>
            <td><?= __('Quantity') ?></td>
            <td><?= $this->Number->format($article->quantity) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($article->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related PurchaseDetails') ?></h3>
    </div>
    <?php if (!empty($article->purchase_details)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Article Id') ?></th>
                <th><?= __('Purchase Id') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Cost') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($article->purchase_details as $purchaseDetails): ?>
                <tr>
                    <td><?= h($purchaseDetails->id) ?></td>
                    <td><?= h($purchaseDetails->article_id) ?></td>
                    <td><?= h($purchaseDetails->purchase_id) ?></td>
                    <td><?= h($purchaseDetails->quantity) ?></td>
                    <td><?= h($purchaseDetails->cost) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'PurchaseDetails', 'action' => 'view', $purchaseDetails->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'PurchaseDetails', 'action' => 'edit', $purchaseDetails->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'PurchaseDetails', 'action' => 'delete', $purchaseDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetails->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related PurchaseDetails</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related SaleDetails') ?></h3>
    </div>
    <?php if (!empty($article->sale_details)): ?>
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
            <?php foreach ($article->sale_details as $saleDetails): ?>
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
