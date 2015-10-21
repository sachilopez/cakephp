<?php 
/**
* 
*/
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');


	class User extends AppModel {
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Nombre de Usuario Obligatorio'
            ),
            'unique' => array(
            'rule' => 'isUnique',
            'required' => 'create',
            'message' => 'El usuario ya existe'
    ),

        ),


        'password' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'password  Requerido'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}

}

 ?>