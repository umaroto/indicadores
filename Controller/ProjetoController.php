<?php
App::uses('AppController', 'Controller');

class ProjetoController extends AppController {

    private function _getCategories(){
        $this->loadModel('Category');
        $categories = $this->Category->find('all', array(
            'conditions' => array('parent_id IS NULL'),
            'recursive' => -1
        ));
        return $categories;
    }

	public function index() {
        $this->loadModel('Page');

        $this->layout = 'interna';

        $options = array('conditions' => array('Page.slug' => 'project'), 'recursive' => 1);

        $this->set(array(
                'categories' => $this->_getCategories(),
                'banners' => $this->getBanners(),
                'data' => $this->Page->find('first', $options)
            )
        );
	}
}