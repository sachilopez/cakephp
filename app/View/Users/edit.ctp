<h2>Editar Usuario</h2>
<?php 
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('role',array('options'=>array('admin'=>'Admin','author'=>'Author')));
echo $this->Form->end('Enviar');

 ?>