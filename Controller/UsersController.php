<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function admin_login() {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function admin_logout() {
        $this->redirect($this->Auth->logout());
    }

    public function admin_index() {
        $this->layout = 'admin';
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function admin_edit($id = null) {
        $this->User->id = $id;

        if ($this->request->is('post'))
        {
            unset($this->request->data['User']['cpassword']);

            if ($this->User->save($this->request->data))
            {
                $this->Session->setFlash(__('Usuário salvo com sucesso.'), 'messages/sucess');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erro ao salvar o Usuário.'), 'messages/error');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            if(isset($this->request->data['User']['password'])){
                unset($this->request->data['User']['password']);
            }
        }
    }

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário deletado com sucesso.'), 'messages/sucess');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Erro ao deletar Usuário.'), 'messages/error');
        $this->redirect(array('action' => 'index'));
    }
}