<?php
App::uses('AppController', 'Controller');

class BibliotecaController extends AppController {

    private function _getCategories(){
        $this->loadModel('Category');
        $categories = $this->Category->find('all', array(
            'conditions' => array('parent_id IS NULL'),
            'recursive' => -1
        ));
        return $categories;
    }

    private function _getBibliotecas(){
        $this->loadModel('Bibliotecas');
        $bibliotecas = $this->Bibliotecas->find('all');
        return $bibliotecas;
    }

	public function index() {
        $this->layout = 'interna';

        $this->set(array(
            'bibliotecas' => $this->_getBibliotecas(),
            'categories' => $this->_getCategories(),
            'banners' => $this->getBanners()
            )
        );
	}
}