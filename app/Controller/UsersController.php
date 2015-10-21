<?php 
/**
* 
*/
App::uses('AppController', 'Controller');

class UsersController extends AppController
{

public $helpers = array('Html', 'Form','Js');
    public $components = array('Session');
	/*public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'posts',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        )
    );*/


	public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    //$this->Auth->allow('login', 'logout');
}

public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Session->setFlash(__('Usuario o password invalido'));
    }
}

public function logout() {
    return $this->redirect($this->Auth->logout());
}


    
    /*public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }*/

    function index() {
        $this->set('users', $this->User->find('all'));
    }


   /* public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario Invalido'));
        }
        $this->set('user', $this->User->findById($id));
    }*/

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuario guardado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('No se pudo guardar el usuario.')
            );
        }
        //cargar un Modelo
        $this->loadModel('Prueba');
        $this->set('pruebas', $this->Prueba->find('list'));// Llama a todos los campos de la tabla
      

    }


    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario Invalido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuario modificado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('No se pudo realizar la modificación')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuario eliminado'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Error al eliminar el usuario'));
        return $this->redirect(array('action' => 'index'));
    }	
}



 ?>