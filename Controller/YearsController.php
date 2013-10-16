<?php
App::uses('AppController', 'Controller');

class YearsController extends AppController {

	public $paginate = array(
        'limit' => 20,
        'order' => array(
            'Year.title' => 'asc'
        )
    );

	public function admin_index() {
		$this->Year->recursive = 0;
		$this->set('years', $this->paginate());
	}

	public function admin_edit($id = null) {
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Year->save($this->request->data)) {
				$this->Session->setFlash(__('Ano salvo com sucesso.'), 'messages/sucess');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Erro ao deletar ano.'), 'messages/error');
			}
		} else {
			$options = array('conditions' => array('Year.' . $this->Year->primaryKey => $id));
			$this->request->data = $this->Year->find('first', $options);
		}
	}
	
	public function admin_delete($id = null) {
		$this->Year->id = $id;
		$this->request->onlyAllow('post', 'delete');
		if ($this->Year->delete()) {
			$this->Session->setFlash(__('Ano deletado com sucesso.'), 'messages/sucess');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Erro ao deletar ano.'), 'messages/error');
		$this->redirect(array('action' => 'index'));
	}
}
