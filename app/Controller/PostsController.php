<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public $paginate = array(
        'limit' => 20,
        'order' => array(
            'Post.id' => 'desc'
        )
    );

	public function admin_index() {
		$this->set('posts', $this->paginate());
	}

	public function admin_edit($id = null) {
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Post salvo com sucesso.'), 'messages/sucess');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Erro ao salvar o post.'), 'messages/error');
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id), 'recursive' => 1);
			$this->request->data = $this->Post->find('first', $options);
		}

		$categories = $this->Post->Category->generateTreeList(null, null, null, '- - ');
		$zones = $this->Post->Zone->find('list');
		$records = $this->Post->Record->find('list');
		$years = $this->Post->Year->find('list');
		$filters = $this->Post->Filter->find('list');
		$this->set(compact('categories', 'records', 'years', 'filters', 'zones'));
	}
	
	public function admin_delete($id = null) {
		$this->Post->id = $id;
		$this->request->onlyAllow('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('Post Excluído com sucesso.'), 'messages/sucess');
		} else {
			$this->Session->setFlash(__('Erro ao deletar o post.'), 'messages/error');
		}
		
		$this->redirect(array('action' => 'index'));
	}
}
