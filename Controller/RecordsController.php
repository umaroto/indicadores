<?php
App::uses('AppController', 'Controller');

class RecordsController extends AppController {

	public $paginate = array(
        'limit' => 20,
        'order' => array(
            'Record.post_id' => 'desc',
            'Record.order'
        )
    );

	public function admin_index() {
		if(isset($this->request->data['post'])){
			$this->paginate = array(
		        'conditions' => array('Record.post_id' => $this->request->data['post'])
		    );
		}
		
		$data = $this->paginate();
		$this->set('records', $data);

		$posts = $this->Record->Post->find('all');
		$this->set(compact('posts'));
	}

	public function admin_edit($id = null) {
		if ($this->request->is('post') || $this->request->is('put')) {

			//Configurando Ordem para +1
			if(empty($this->request->data['Record']['id'])){
				$ordem = $this->Record->find(
					'first', array(
						'conditions' => array('Record.post_id' => 2),
						'fields' => array('MAX(Record.order) as ordem'	)
					)
				);
				$this->request->data['Record']['order'] = $ordem[0]['ordem'] + 1;
			}
			//Configurando Ordem para +1

			if ($this->Record->save($this->request->data)) {
				$this->Session->setFlash(__('Ficha salva com sucesso.'), 'messages/sucess');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Erro ao salvar a ficha.'), 'messages/error');
			}
		} else {
			$options = array('conditions' => array('Record.' . $this->Record->primaryKey => $id));
			$this->request->data = $this->Record->find('first', $options);
		}
		$posts = $this->Record->Post->find('all', array('order' => 'Post.title'));
		$this->set(compact('posts'));
	}
	
	public function admin_delete($id = null) {
		$this->Record->id = $id;
		$this->request->onlyAllow('post', 'delete');
		if ($this->Record->delete()) {
			$this->Session->setFlash(__('Ficha deletada com sucesso.'), 'messages/sucess');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Erro ao deletar a ficha.'), 'messages/error');
		$this->redirect(array('action' => 'index'));
	}
}
