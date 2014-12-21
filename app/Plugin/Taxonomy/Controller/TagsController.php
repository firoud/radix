<?php
App::uses('TaxonomyAppController', 'Taxonomy.Controller');
/**
 * Terms Controller
 *
 * @property Term $Term
 * @property PaginatorComponent $Paginator
 */
class TagsController extends TaxonomyAppController {

/**
 * Uses
 *
 * @var array
 */
	public $uses = array('Term');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	
/**
 * beforeFilter method
 *
 */

	public function beforeFilter() {
	
	     
            parent::beforeFilter();
			
			$title_for_layout = __('Tags');
			$screen_icon = 'tags';
			
			$this->set( compact('title_for_layout' ,'screen_icon') );
			
	}	
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Term->recursive = 0;
		$this->set('terms', $this->Paginator->paginate('Term', array('Term.taxonomy' => 'post_tag')));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Term->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}
		$options = array('conditions' => array('Term.' . $this->Term->primaryKey => $id));
		$this->set('term', $this->Term->find('first', $options));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Term->recursive = 0;
		$this->set('terms', $this->Paginator->paginate('Term', array('Term.taxonomy' => 'post_tag')));
	}



/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			
			
			
				if (!empty($this->request->data['Term']['name']) && empty($this->request->data['Term']['slug'])) {
						
						
						$name = strtolower($this->request->data['Term']['name']);
						$slug  = Inflector::slug($name, '-');
		
						$this->request->data['Term']['slug'] = $slug;
		
				}

			
			$this->Term->create();
			if ($this->Term->save($this->request->data)) {
				$this->Session->setFlash('<div class="alert alert-success">' . __('The tag has been saved.') . '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<div class="alert alert-danger">' . __('The tag could not be saved. Please, try again.')  . '</div>' );
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
		if (!$this->Term->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
						
				if (!empty($this->request->data['Term']['name']) && empty($this->request->data['Term']['slug'])) {
						
						
						$name = strtolower($this->request->data['Term']['name']);
						$slug  = Inflector::slug($name, '-');
		
						$this->request->data['Term']['slug'] = $slug;
		
				}
			

			
			if ($this->Term->save($this->request->data)) {
				$this->Session->setFlash('<div class="alert alert-success">' . __('The tag has been saved.') . '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<div class="alert alert-danger">' . __('The tag could not be saved. Please, try again.') . '</div>');
			}
		} else {
			$options = array('conditions' => array('Term.' . $this->Term->primaryKey => $id));
			$this->request->data = $this->Term->find('first', $options);
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
		$this->Term->id = $id;
		if (!$this->Term->exists()) {
			throw new NotFoundException(__('Invalid tag'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Term->delete()) {
			$this->Session->setFlash('<div class="alert alert-success">' . __('The tag has been deleted.'). '</div>');
		} else {
			$this->Session->setFlash('<div class="alert alert-danger">' . __('The tag could not be deleted. Please, try again.') . '</div>');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
