<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $purchase->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?></li>
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
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $purchase->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Purchases')?> </h1>
<?= $this->Form->create($purchase); ?>
<fieldset>
    <legend><?= __('Edit {0}', [__('Purchase')]) ?></legend>
    <?php
    echo $this->Form->control('supplier_id', ['options' => $suppliers]);
    echo $this->Form->control('user_id', ['options' => $users]);
    echo $this->Form->control('document_type');
    echo $this->Form->control('date');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
