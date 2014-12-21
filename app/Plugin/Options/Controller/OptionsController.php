<?php
App::uses('OptionsAppController', 'Options.Controller');
/**
 * Options Controller
 *
 * @property Option $Option
 * @property PaginatorComponent $Paginator
 */
class OptionsController extends OptionsAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Option->recursive = 0;
		$this->set('options', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Option->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		$options = array('conditions' => array('Option.' . $this->Option->primaryKey => $id));
		$this->set('option', $this->Option->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Option->create();
			if ($this->Option->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'));
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
		if (!$this->Option->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Option->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Option.' . $this->Option->primaryKey => $id));
			$this->request->data = $this->Option->find('first', $options);
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
		$this->Option->id = $id;
		if (!$this->Option->exists()) {
			throw new NotFoundException(__('Invalid option'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Option->delete()) {
			$this->Session->setFlash(__('The option has been deleted.'));
		} else {
			$this->Session->setFlash(__('The option could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_general() {
		
		if ($this->request->is(array('post'))) {
			
			    $options['site_name'] = $this->request->data['Option']['site_name'];
			    $options['site_slogan'] = $this->request->data['Option']['site_slogan'];
			    $options['site_mail'] = $this->request->data['Option']['site_mail'];
				
				foreach($options as $name=>$value ){
													
				$this->Option->update($name ,$value);		
				}
				$this->Session->setFlash(__('Changes saved.'));
		
		}
	
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Option->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		$options = array('conditions' => array('Option.' . $this->Option->primaryKey => $id));
		$this->set('option', $this->Option->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Option->create();
			if ($this->Option->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'));
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
		if (!$this->Option->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Option->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Option.' . $this->Option->primaryKey => $id));
			$this->request->data = $this->Option->find('first', $options);
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
		$this->Option->id = $id;
		if (!$this->Option->exists()) {
			throw new NotFoundException(__('Invalid option'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Option->delete()) {
			$this->Session->setFlash(__('The option has been deleted.'));
		} else {
			$this->Session->setFlash(__('The option could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
