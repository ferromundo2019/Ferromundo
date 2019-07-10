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
    <li><?= $this->Html->link(__('Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Brands'), ['controller' => 'Brands', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Purchases'), ['controller' => 'Purchases', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('PurchaseDetails'), ['controller' => 'PurchaseDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Sales'), ['controller' => 'Sales', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('SaleDetails'), ['controller' => 'SaleDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Roles'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']); ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Brands'), ['controller' => 'Brands', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Purchases'), ['controller' => 'Purchases', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('PurchaseDetails'), ['controller' => 'PurchaseDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Sales'), ['controller' => 'Sales', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('SaleDetails'), ['controller' => 'SaleDetails', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Roles'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']); ?></li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?=__('Articles')?> </h1>

<?= $this->Form->create($article, ['novalidate']); ?>
<fieldset>
    <legend><?= __('Add {0}', [__('Article')]) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('code');
    echo $this->Form->control('description');
    echo $this->Form->control('price');
    echo $this->Form->control('brand_id', ['options' => $brands]);
    echo $this->Form->control('category_id', ['options' => $categories]);
    echo $this->Form->control('stack');
    //echo $this->Form->control('quantity');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
