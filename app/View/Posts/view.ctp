<h1><?php echo $post['Post']['title'];?></h1>
<p><small>Creado: <?php echo $post['Post']['created']?></small></p>
<p><?php echo $post['Post']['body']?></p>

<p><?php echo $this->Html->link('Crear Post',array('action'=>'add')) ?></p> 