<?php
App::uses('UsersAppController', 'Users.Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends UsersAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	

/**
 * beforeFilter method
 *
 * @return void
 */	
	
	public function beforeFilter() {
		
		parent::beforeFilter();
		$this->Auth->allow('register');
		
		$title_for_layout = __('Users');
		$screen_icon = 'user';
			
		$this->set( compact('title_for_layout' ,'screen_icon') );
		
	}	
	



	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' . __('Invalid username or password, try again') . '</div>');
			}
		}
	}
	
	
	public function admin_login() {
		
		$this->layout = 'signin';
		
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' . __('Invalid username or password, try again') . '</div>');
			}
		}
	}	
	
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}	
	
	
	public function admin_logout() {
		$this->redirect($this->Auth->logout());
	}	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function register() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				
				
				$this->Session->setFlash(__('The user has been saved.'));
				
			   if ($this->request->data['User']['send_password'] == 1){
				   	
				$blogname = 'Radix';
				$admin_email = 'abder1432@gmail.com';
				 
				$Email = new CakeEmail();
				$Email->config('gmail');
				$Email->from(array('me@example.com' => 'My Site'));
				$Email->to($admin_email);
				$Email->subject( __('[%s] New User Registration', $blogname));
				
			   

				$message  = sprintf(__('New user registration on your site %s:'), $blogname) . "\r\n\r\n";
				$message .= sprintf(__('Username: %s'), $this->request->data['User']['username']) . "\r\n\r\n";
				$message .= sprintf(__('E-mail: %s'), $this->request->data['User']['email']) . "\r\n";
				
				
				$Email->send($message);
				
				
				
				$Email = new CakeEmail();
				$Email->config('gmail');
				$Email->from(array('me@example.com' => 'My Site'));
				$Email->to($this->request->data['User']['email']);
				$Email->subject( __('[%s] Your username and password', $blogname));
				
			   
				$message  = sprintf(__('Username: %s'), $this->request->data['User']['username']) . "\r\n";
				$message .= sprintf(__('Password: %s'), $this->request->data['User']['password']) . "\r\n";
				
				
				$Email->send($message);
				
			   }
				
				
				
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if (empty($this->request->data['User']['password']) && empty($this->request->data['User']['repeat_password'])){
				
				unset($this->request->data['User']['password']);
				unset($this->request->data['User']['repeat_password']);
				
				
				}
			
			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
