<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class ContatoController extends AppController {

    private function _getCategories(){
        $this->loadModel('Category');
        $categories = $this->Category->find('all', array(
            'conditions' => array('parent_id IS NULL'),
            'recursive' => -1
        ));
        return $categories;
    }

	public function index() {
        if ($this->request->is('post'))
        {
            $post = $this->request->data;

            $html  = "<p><strong>Nome:</strong> {$post['nome']}</p>";
            $html .= "<p><strong>Email:</strong> {$post['email']}</p>";
            $html .= "<p><strong>Assunto:</strong> {$post['assunto']}</p>";
            $html .= "<p><strong>Mensagem:</strong><br />" . nl2br($post['mensagem']) . "</p>";

            $mail = new CakeEmail();
            $mail->emailFormat('html')
                 // ->template('welcome')
                 // ->viewVars($post)
                 ->from(array($post['email'] => $post['nome']))
                 ->to('php2@contactonet.com')
                 ->subject('Contato do site Indicadores Alphaville')
                 ->send($html);
                 // ->send($post['assunto'] . ' - ' . $post['mensagem']);

            $this->Session->setFlash(__('Mensagem enviada com sucesso.'), 'messages/sucess');
        }

        $this->layout = 'interna';

        $this->set(array(
            'categories' => $this->_getCategories(),
            'banners' => $this->getBanners()
            )
        );
	}
}