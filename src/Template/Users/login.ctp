<?php
$this->extend('../Layout/TwitterBootstrap/cover');
?>
<h1><?=__('Login')?></h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>


<div id="html_element" class="html_element"></div>
  
<?= $this->Form->button(__('Access')) ?>
<?= $this->Form->end() ?>