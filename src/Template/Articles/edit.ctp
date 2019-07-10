<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $article->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
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
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $article->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
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
<?= $this->Form->create($article); ?>
<fieldset>
    <legend><?= __('Edit {0}', [__('Article')]) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('code');
    echo $this->Form->control('description');
    echo $this->Form->control('price');
    echo $this->Form->control('brand_id', ['options' => $brands]);
    echo $this->Form->control('category_id', ['options' => $categories]);
    echo $this->Form->control('stack');
    echo $this->Form->control('quantity');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
