 <div class="page-header">
<h1>Blog posts</h1>
</div>
 <div class="col-lg-12 col-md-6">
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Acción</th>
        <th>Created</th>
    </tr>
   
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>

        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('class'=>'btn btn-lg btn-default'),
                array('confirm' => 'Esta seguro de eliminar el post?')
            )?>


            <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id']),array('class'=>'btn btn-lg btn-default'));?>
    </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
</div>

<?php echo $this->Html->link('Crear Post',array('action'=>'add')) ?>