<?php pr($pruebas); ?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
<fieldset>
	<legend><?php echo __('Agregar Usuario'); ?></legend>
	<?php echo $this->Form->input('username'); 
	echo $this->Form->input('password');
	echo $this->Form->input('role',array('options'=>array('admin'=>'Administrador','author'=>'Autor')));
	echo $this->Form->input('pruebas', array('type'=>'select', 'multiple'=>'checkbox'));
	?>
</fieldset>

<?php echo $this->Form->end(__('Enviar')); ?>

</div>