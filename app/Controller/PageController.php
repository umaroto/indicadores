<?php
App::uses('AppController', 'Controller');

class PageController extends AppController {

	public $path = 'uploads/upload';

	public function admin_index() {

	}

	public function admin_project() {

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('Página salva com sucesso.'), 'messages/sucess');
			} else {
				$this->Session->setFlash(__('Erro ao salvar o página.'), 'messages/error');
			}
		}

		$options = array('conditions' => array('Page.slug' => 'project'), 'recursive' => 1);
		$this->request->data = $this->Page->find('first', $options);
	}

	public function admin_indicators() {

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('Página salva com sucesso.'), 'messages/sucess');
			} else {
				$this->Session->setFlash(__('Erro ao salvar o página.'), 'messages/error');
			}
		}

		$options = array('conditions' => array('Page.slug' => 'indicators'), 'recursive' => 1);
		$this->request->data = $this->Page->find('first', $options);
	}

	public function upload(){
		$targetPath = WWW_ROOT . $this->path;
		if(!is_dir($targetPath)){
            mkdir($targetPath, 0755);
        }

		if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];

            $fileTypes = array('jpg','jpeg','gif','png');
            $fileParts = pathinfo($_FILES['file']['name']);

            $arq = time().'.'.$fileParts['extension'];
            $targetFile = rtrim($targetPath,'/') . '/' . $arq;

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);
                $array = array(
					'error' => false,
					'path' => Router::url('/') . $this->path . '/' . $arq
				);
            } else {
                $array = array(
					'error' => 'filetype'
				);
            }
        } else {
        	$array = array(
				'error' => 'filetype'
			);
        }
		
		echo json_encode($array);
		exit;
	}
}
