<?php 
/**
* 
*/
App::uses('AppController', 'Controller');

class PostsController extends AppController
{
	public $helpers = array('Html', 'Form');
    public $components = array('Session');

	 function index() {
        $this->set('posts', $this->Post->find('all'));
    }

    public function view($id = null) {
        $this->set('post', $this->Post->findById($id));
    }


    //AGREGAR 
    public function add() {
            if ($this->request->is('post')) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('El post ha sido creado.');
                $this->redirect(array('action' => 'index'));
            }
}

}

	/*public function edit($id=null){
		if (!$id){
			throw new NotFoundException('El posts no existe');					# code...
		}

		$post = $this->Post->findById($id);

		if (!$post){

			throw new NotFoundException('El posts no existe');			
		}

		if ($this->request->is(array('post','put')){
			$this->Post->id=$id;
			if ($this->Post->save($this->request->data)){

				$this->Session->setFlash('El posts se actualizo');
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash('Ocurrio un error');

		}
		if (!$this->request->data){
			$this->request->data=$post;
		}
	}*/


	public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('El post no existe'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Post invalido'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->Post->id = $id;
        if ($this->Post->save($this->request->data)) {
            $this->Session->setFlash(__('Tu post ha sido actualizado.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Error al actualizar el post.'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}


function delete($id){
	if (!$this->request->is('post')) {
		throw new MethodNotAllowebException();		
	}
	if ($this->Post->delete($id)) {
		$this->Session->setFlash('El post numero: ' .$id.'  se elimino');
		$this->redirect(array('action'=>'index'));
	}

}

public function isAuthorized($user) {
    // All registered users can add posts
    if ($this->action === 'add') {
        return true;
    }

    // The owner of a post can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $postId = (int) $this->request->params['pass'][0];
        if ($this->Post->isOwnedBy($postId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
}

/*function delete($id) {
    if (!$this->request->is('post')) {
        throw new MethodNotAllowedException();
    }
    if ($this->Post->delete($id)) {
        $this->Flash->success('The post with id: ' . $id . ' has been deleted.');
        $this->redirect(array('action' => 'index'));
    }
}*/

}
//cierre de la clase

?>