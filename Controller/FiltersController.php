<?php
App::uses('AppController', 'Controller');

class FiltersController extends AppController {

	public $paginate = array(
        'limit' => 20,
        'order' => array(
            'Filter.title' => 'asc'
        )
    );

	public function admin_index() {
		$this->Filter->recursive = 0;
		$this->set('filters', $this->paginate());
	}

	public function admin_edit($id = null) {
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Filter->save($this->request->data)) {
				$this->Session->setFlash(__('Filtro salvo com sucesso.'), 'messages/sucess');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Erro ao deletar filtro.'), 'messages/error');
			}
		} else {
			$options = array('conditions' => array('Filter.' . $this->Filter->primaryKey => $id));
			$this->request->data = $this->Filter->find('first', $options);
		}
	}
	
	public function admin_delete($id = null) {
		$this->Filter->id = $id;
		$this->request->onlyAllow('post', 'delete');
		if ($this->Filter->delete()) {
			$this->Session->setFlash(__('Filtro deletado com sucesso.'), 'messages/sucess');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Erro ao deletar filtro.'), 'messages/error');
		$this->redirect(array('action' => 'index'));
	}
}