<?php
App::uses('AppController', 'Controller');

class BannersController extends AppController {

	public $paginate = array(
        'limit' => 20,
        'order' => array(
            'Banner.id' => 'desc'
        )
    );

    public $path = 'uploads/banners';

	public function admin_index() {
		$this->Banner->recursive = 0;
		$this->set('banners', $this->paginate());
	}

	public function admin_edit($id = null) {
		if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($_FILES['imagem']['name']) && !empty($_FILES['imagem']['name'])) {
                $t = time();
                $this->request->data['Banner']['image'] = $this->admin_uploadify($t);
            }

			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash(__('Banner salvo com sucesso.'), 'messages/sucess');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Erro ao salvar banner.'), 'messages/error');
			}
		} else {
			$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
			$this->request->data = $this->Banner->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->Banner->id = $id;
		$this->request->onlyAllow('post', 'delete');
		if ($this->Banner->delete()) {
			$this->Session->setFlash(__('Banner deletado com sucesso.'), 'messages/sucess');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Erro ao deletar banner.'), 'messages/error');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_uploadify($name){
        $targetPath = WWW_ROOT . $this->path;

        if(!is_dir($targetPath)){
            mkdir($targetPath, 0755);
        }

        if (!empty($_FILES)) {
            $tempFile = $_FILES['imagem']['tmp_name'];

            $fileTypes = array('jpg','jpeg','gif','png');
            $fileParts = pathinfo($_FILES['imagem']['name']);

            $arq = $name.'.'.$fileParts['extension'];
            $targetFile = rtrim($targetPath,'/') . '/' . $arq;

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);
                return $arq;
            } else {
                return '';
            }
        }
        exit;
    }

	public function admin_getImage($name = '1373653482', $type = '.jpg'){
        if ($this->request->is('ajax') OR 1 == 1)
        {
            $this->layout = 'ajax';
            $this->set('arquivo',  $this->path.'/'.$name.$type);
        }
    }
}