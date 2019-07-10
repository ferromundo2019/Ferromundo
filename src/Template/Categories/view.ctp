<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
<li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
<li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Categories')?> </h1>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($category->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= h($category->description) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($category->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($category->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Articles') ?></h3>
    </div>
    <?php if (!empty($category->articles)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Brand Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Stack') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($category->articles as $articles): ?>
                <tr>
                    <td><?= h($articles->id) ?></td>
                    <td><?= h($articles->name) ?></td>
                    <td><?= h($articles->code) ?></td>
                    <td><?= h($articles->description) ?></td>
                    <td><?= h($articles->price) ?></td>
                    <td><?= h($articles->brand_id) ?></td>
                    <td><?= h($articles->category_id) ?></td>
                    <td><?= h($articles->stack) ?></td>
                    <td><?= h($articles->quantity) ?></td>
                    <td><?= h($articles->created) ?></td>
                    <td><?= h($articles->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Articles', 'action' => 'view', $articles->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Articles', 'action' => 'edit', $articles->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articles->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Articles</p>
    <?php endif; ?>
</div>
