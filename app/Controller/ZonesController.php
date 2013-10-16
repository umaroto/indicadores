<?php
App::uses('AppController', 'Controller');

class ZonesController extends AppController {

	public $paginate = array(
        'limit' => 20,
        'order' => array(
            'Zone.id' => 'desc'
        )
    );

	public function admin_index() {
		$this->Zone->recursive = 0;
		$this->set('zones', $this->paginate());
	}

	public function admin_edit($id = null) {
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Zone->save($this->request->data)) {
				$this->Session->setFlash(__('Cobertura salvo com sucesso.'), 'messages/sucess');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Erro ao deletar cobertura.'), 'messages/error');
			}
		} else {
			$options = array('conditions' => array('Zone.' . $this->Zone->primaryKey => $id));
			$this->request->data = $this->Zone->find('first', $options);
		}
	}
	
	public function admin_delete($id = null) {
		$this->Zone->id = $id;
		$this->request->onlyAllow('post', 'delete');
		if ($this->Zone->delete()) {
			$this->Session->setFlash(__('Cobertura deletado com sucesso.'), 'messages/sucess');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Erro ao deletar cobertura.'), 'messages/error');
		$this->redirect(array('action' => 'index'));
	}
}