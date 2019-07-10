<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $category->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
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
        ['action' => 'delete', $category->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Categories')?> </h1>

<?= $this->Form->create($category); ?>
<fieldset>
    <legend><?= __('Edit {0}', [__('Category')]) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('description');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
