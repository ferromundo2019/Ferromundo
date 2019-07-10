<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Brand $brand
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $brand->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $brand->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Brands'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>

<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $brand->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $brand->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Brands'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Brands')?> </h1>
<?= $this->Form->create($brand); ?>
<fieldset>
    <legend><?= __('Edit {0}', [__('Brand')]) ?></legend>
    <?php
    echo $this->Form->control('name');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
