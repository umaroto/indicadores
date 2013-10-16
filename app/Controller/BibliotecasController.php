<?php
App::uses('AppController', 'Controller');

class BibliotecasController extends AppController {

    // public $components = array('RequestHandler');

	public function admin_index() {
		$this->Biblioteca->recursive = 0;
		$this->set('bibliotecas', $this->paginate());
	}

    public $path = 'uploads/biblioteca/publicacoes';

    public function admin_edit($id = null) {
        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                $t = time();
                $this->request->data['Biblioteca']['image'] = $this->admin_publicacoesImagens($t);
            }
            if (isset($_FILES['archive']['name']) && !empty($_FILES['archive']['name'])) {
                $t = time();
                $this->request->data['Biblioteca']['archive'] = $this->admin_publicacoesArquivos($t);
            }

            if ($this->Biblioteca->save($this->request->data)) {
                $this->Session->setFlash(__('Biblioteca salva com sucesso.'), 'messages/sucess');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erro ao salvar a Biblioteca.'), 'messages/error');
            }
        } else {
            $options = array('conditions' => array('Biblioteca.' . $this->Biblioteca->primaryKey => $id));
            $this->request->data = $this->Biblioteca->find('first', $options);
        }

        $bibliotecas = $this->Biblioteca->findById($id);
        $this->set('bibliotecas', $bibliotecas);
    }

    public function admin_delete($id = null) {
        $this->Biblioteca->id = $id;
        $this->request->onlyAllow('post', 'delete');
        if ($this->Biblioteca->delete()) {
            $this->Session->setFlash(__('Biblioteca excluída com sucesso.'), 'messages/sucess');
        } else {
            $this->Session->setFlash(__('Erro ao deletar Biblioteca.'), 'messages/error');
        }

        $this->redirect(array('action' => 'index'));
    }

    public function admin_publicacoesArquivos($name){
        $targetPath = WWW_ROOT . $this->path . '/arquivos';

        if(!is_dir($targetPath)){
            mkdir($targetPath, 0755);
        }

        if (!empty($_FILES)) {
            debug($_FILES);
            $tempFile = $_FILES['archive']['tmp_name'];

            $fileTypes = array('pdf');
            $fileParts = pathinfo($_FILES['archive']['name']);

            $arq = $name.'.'.$fileParts['extension'];
            $targetFile = rtrim($targetPath,'/') . '/' . $arq;

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);
                return $arq;
            } else {
                return 'Arquivo Inválido';
            }
        }
        exit;
    }

    public function admin_publicacoesImagens($name){
        $targetPath = WWW_ROOT . $this->path . '/imagens';

        if(!is_dir($targetPath)){
            mkdir($targetPath, 0755);
        }

        if (!empty($_FILES)) {
            $tempFile = $_FILES['image']['tmp_name'];

            $fileTypes = array('jpg','jpeg');
            $fileParts = pathinfo($_FILES['image']['name']);

            $arq = $name.'.'.$fileParts['extension'];
            $targetFile = rtrim($targetPath,'/') . '/' . $arq;

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile) or die('erro ao mover upload');
                return $arq;
            } else {
                return 'Arquivo Inválido';
            }
        }
        exit;
    }

    public function admin_publicacoesGetImage($name = '1373653482', $type = '.jpg'){
        if ($this->request->is('ajax') OR 1 == 1)
        {
            $this->layout = 'ajax';
            $this->set('arquivo',  $this->path.'/imagens/'.$name.$type);
        }
    }

    public function getArquivo($name = '') {
        $this->response->file("webroot/uploads/biblioteca/publicacoes/arquivos/{$name}.pdf", array('download' => true, 'name' => $name));
        return $this->response;
    }
}
