<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index', 'admin' => true),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'logout'),
            'loginAction' => array('controller' => 'users', 'action' => 'login', 'admin' => true)
        ),
        'DebugKit.Toolbar'
    );

    public function beforeFilter() {
        if (!isset($this->request->params['admin']) ){
            $this->Auth->allow();
        } else {
            $this->set('title_for_layout', 'Gerenciador de Conteúdo :: Contacto Net');
            $this->layout = 'admin';
        }

        define('BASE', $_SERVER['REMOTE_ADDR'] == '192.168.0.1' ? 'http://192.168.0.1/0Desenv/indicadoresalphaville/cake/' : 'http://www.indicadoresalphaville.com.br/cake/');
    }

    public function getBanners() {
        $this->loadModel('Banners');
        $banners = $this->Banners->find('all');

        return $banners;
    }

    public function getIcon($id = 0) {
        $icons = array(
            'icone-temas.jpg', // Default
            'icone-desenvolvimento-social.jpg',
            'icone-infraestrutura-urbana.jpg',
            'icone-temas.jpg',
            'icone-meio-ambiente.jpg'
        );

        if (isset($icons[$id])) {
            return $icons[$id];
        } else {
            return $icons[0];
        }
    }
}
