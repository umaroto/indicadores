<?php
App::uses('AppController', 'Controller');

class ValuesController extends AppController {

	public $paginate = array(
        'limit' => 20,
        'order' => array(
            'Post.id' => 'desc'
        ),
        'recursive' => 0
    );

	public function admin_index() {
	    $this->set('posts', $this->paginate('Post'));
	}

	public function admin_edit($id = null) {
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Value->deleteAll(array("Post.id" => $this->request->data['Post']['id']));
			foreach ($this->request->data as $key => $value) {
				foreach ($value as $k => $v) {
					$this->Value->create();
					$this->Value->set(array(
					    'value' => $v['value'],
						'year_id' => $v['year_id'],
						'filter_id' => $v['filter_id'],
						'zone_id' => $v['zone_id'],
						'post_id' => $v['post_id']
					));
					$this->Value->save();
				}
			}
			$this->Session->setFlash(__('Post salvo com sucesso.'), 'messages/sucess');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->data = $this->Value->Post->findById( $id );
	}

	public function exporta(){
		if(!isset($this->request->params['pass']) OR empty($this->request->params['pass'])){
			$this->redirect('/');
		}
		$this->layout = 'xls';

		$slug = count($this->request->params['pass']) > 0 ? $this->request->params['pass'][0] : $this->request->params['pass'];
		$dados = isset($this->request->params['pass'][1]) ? $this->request->params['pass'][1] : '';
		$post = $this->Value->Post->findBySlug( $slug );
		$this->set(array(
			'post' => $post,
			'dados' => $dados
		));
	}

	public function grafico(){

		if(!isset($this->request->params['pass']) OR empty($this->request->params['pass'])){
			$this->redirect('/');
		}

		$this->layout = 'interna';
		$post = $this->Value->Post->findBySlug( $this->request->params['pass'] );

		$this->loadModel('Category');
		$breadcrumbs = $this->Category->getPath($post['Category']['id']);

		$parent = $post['Category']['parent_id'];
		if ($parent)
		{
			while (true) {
				$parent    = $this->Category->findById($parent);
				$parent_id = $parent['Category']['id'];
				$parent    = $parent['Category']['parent_id'];

				if ($parent == null) {
					break;
				}
			}

			$icon = $this->getIcon($parent_id);
		}
		else
		{
			$icon = $this->getIcon($post['Category']['id']);
		}

		$this->set(array(
			'categories' => $this->Category->find('all', array(
				'conditions' => array('parent_id IS NULL'),
				'recursive' => -1
			)),
			'breadcrumbs' => $breadcrumbs,
			'post' => $post,
			'banners' => $this->getBanners(),
			'icon' => $icon
		));
	}
}
