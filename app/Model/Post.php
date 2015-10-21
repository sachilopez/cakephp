<?php 
/**
* 
*/
class Post extends AppModel
{
	
	public $displayField = 'title';
	public $name = 'Post';

//VALIDACIONES
public $validate = array(
        'title' => array(
            'required' => array(
            	'rule'=>'notEmpty',
            	'message'=>'El titulo es requerido'

            	)
        ),

        'body' => array(
            'rule' => 'notEmpty'
        )
    );

}

?>