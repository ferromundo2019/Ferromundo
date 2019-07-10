<?php
/* @var $this \Cake\View\View */
$this->Html->css('BootstrapUI.captcha/bdc-layout-stylesheet', ['block'=>true]);
$this->Html->css('BootstrapUI.signin', ['block' => true]);?>

<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6Lc00KgUAAAAADW6h82LlPsCAuHs5UiRB7kgomKz'
        });
      };
    </script>

<?php $this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->getParam('controller'), $this->request->getParam('action')]) . '" ');
$this->start('tb_body_start');
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash)) {
        echo $this->Flash->render();
    }
    $this->end();
}
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <div class="container">
<?php
$this->end();
?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
<?php
$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->start('tb_footer');
echo ' ';
$this->end();

$this->append('content', '</div>');
echo $this->fetch('content');


