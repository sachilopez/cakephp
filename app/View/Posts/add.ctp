
<div class="page-header">
<h1>Agregar Post</h1>
</div>
<div class="container">
<div class="col-lg-4 col-md-4 col-sm-4">
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Guardar Post');
?>

<?php echo $this->Html->link('Lista Post',array('action'=>'index')) ?>
</div>
</div>