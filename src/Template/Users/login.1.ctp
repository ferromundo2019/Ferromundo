<?php
$this->extend('../Layout/TwitterBootstrap/cover');
?>
<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>

<?= captcha_image_html() ?> 
  <?=$this->Form->input('CaptchaCode', [
    'label' => 'Retype the characters from the picture:', 
    'maxlength' => '10', 
    'style' => 'width: 270px;', 
    'id' => 'CaptchaCode' 
  ]) ?> 
  
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>