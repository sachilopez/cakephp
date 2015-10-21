 <!--<pre>
 <?php 
//print_r($users);
 ?>
</pre>-->

 <div class="page-header">
<h1>Usuarios del  posts</h1>
</div>
 <div class="col-lg-12 col-md-6">
<table class="table table-striped">
    <tr>
        <th>Nombre</th>
        <th>Rol</th>
        <th>Creado</th>
        <th>Acciones</th>
       
    </tr>
   
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['role']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>
        <td>
            <?php echo $this->Form->postLink('Eliminar',array('action' => 'delete', $user['User']['id']),
                array('class'=>'btn btn-lg btn-default'),
                array('confirm' => 'Esta seguro de eliminar el post?')
            )?>

			<?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id']),array('class'=>'btn btn-lg btn-default'));?>


    </td>
    </tr>
    <?php endforeach; ?>

</table>
</div>

<?php echo $this->Html->link('Crear Usuario',array('action'=>'add')) ?>