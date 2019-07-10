<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $supplier->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?></li>
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
        ['action' => 'delete', $supplier->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Suppliers')?> </h1>

<?= $this->Form->create($supplier); ?>
<fieldset>
    <legend><?= __('Edit {0}', [__('Supplier')]) ?></legend>
    <?php
    echo $this->Form->control('ruc');
    echo $this->Form->control('social_reason');
    echo $this->Form->control('contact_name');
    echo $this->Form->control('phone');
    echo $this->Form->control('address');
    echo $this->Form->control('email');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
