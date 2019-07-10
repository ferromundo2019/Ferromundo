<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseDetail $purchaseDetail
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $purchaseDetail->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetail->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Purchase Details'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>

<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $purchaseDetail->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetail->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Purchase Details'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Purchase Details')?> </h1>
<?= $this->Form->create($purchaseDetail); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Purchase Detail']) ?></legend>
    <?php
    echo $this->Form->control('article_id', ['options' => $articles]);
    echo $this->Form->control('purchase_id', ['options' => $purchases]);
    echo $this->Form->control('quantity');
    echo $this->Form->control('cost');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
