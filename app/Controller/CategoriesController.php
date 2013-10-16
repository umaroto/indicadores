<?php
App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

	public $paginate = array(
        'limit' => 20,
        'order' => array(
            'Category.id' => 'desc'
        )
    );

    private function _getCategories(){
    	$categories = $this->Category->find('all', array(
			'conditions' => array('parent_id IS NULL'),
			'recursive' => -1
		));
		return $categories;
    }

	public function index() {
		$this->LoadModel('Biblioteca');

		$this->set(array(
			'categories' => $this->_getCategories(),
			'banners' => $this->getBanners(),
			'documentos' => $this->Biblioteca->find('all', array('order' => array('id' => 'desc'), 'limit' => '12'))
			)
		);
	}

	public function tema() {
		if(!isset($this->request->params['pass']) OR empty($this->request->params['pass'])){
			$this->redirect('/');
		}

		$this->layout = 'interna';
		$tema = $this->Category->find('first', array(
			'conditions' => array('Category.slug' => $this->request->params['pass']),
		));

		$breadcrumbs = $this->Category->getPath($tema['Category']['id']);

		$icon = $breadcrumbs[0];
		$icon = $this->getIcon($icon['Category']['id']);

		$children = $this->Category->find('all', array(
			'conditions' => array(
				'Category.rght <' => $tema['Category']['rght'],
				'Category.lft >' => $tema['Category']['lft']
			),
			'order' => array(
				'Category.lft ASC'
			)
		));

		$this->set(array(
			'categories' => $this->_getCategories(),
			'tema' => $tema,
			'childrens' => $children,
			'banners' => $this->getBanners(),
			'breadcrumbs' => $breadcrumbs,
			'icon' => $icon
		));
	}

	public function getPosts($id){
		return $this->Category->Post->find('all', array(
			'conditions' => array('Post.category_id' => $id),
			'recursive' => -1,
			'fields' => array('Post.title', 'Post.slug')
		));
	}


	public function admin_index() {
		$this->Category->recursive = 1;
		$this->set('categories', $this->paginate());
	}

	public function admin_edit($id = null) {
		if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->Category->save($this->request->data)) {
					$this->Session->setFlash(__('Categoria salva com sucesso.'), 'messages/sucess');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Erro ao salvar a categoria.'), 'messages/error');
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}

		$this->set('categories', $this->Category->generateTreeList(null, null, null, '- - '));
	}

	public function admin_delete($id = null) {
		$this->Category->id = $id;
		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('Categoria Excluída com sucesso.'), 'messages/sucess');
		} else {
			$this->Session->setFlash(__('Erro ao deletar categoria.'), 'messages/error');
		}

		$this->redirect(array('action' => 'index'));
	}

	public function lista($id){
		$categories = $this->Category->findById($id);
		$this->set('categories', $categories);
	}

	public function admin_tree(){
		debug($this->Category->generateTreeList(null, null, null, '_'));
		exit;
	}
}
