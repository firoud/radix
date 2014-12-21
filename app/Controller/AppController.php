<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
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
	
public $heplers = array('Html', 'Js', 'Form', 'Options.Option');	
	
	public $components = array(
		'Session', 'Paginator', 'Options.Option',
		'Auth' => array(
		'loginAction' => array('plugin' => 'users', 'controller' => 'users', 'action' => 'login' , 'prefix' => false),
		'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
		'logoutRedirect' => array('plugin' => 'users', 'controller' => 'users', 'action' => 'login' , 'prefix' => false)
	 )
	);
	
	
	public function beforeFilter() {
		
		$this->Auth->allow('display', 'index', 'view');
		
		$current_user = $this->Auth->user();
		$loggedIn = $this->Auth->loggedIn();
		
		$this->set(compact('current_user', 'loggedIn'));

			// set backend and frontend theme
			if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
				
				$this->theme = 'Chain';
				
				} else {
				
				$this->theme = 'Default';					
					
			
			}
		
	}
	
	
}
