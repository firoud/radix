<?php
App::uses('PostsAppController', 'Posts.Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends PostsAppController {



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
		
		$this->Post->recursive = 2;
		
		$this->Paginator->settings = array(
		'conditions' => array( 
			'Post.type' => 'post', 
			'Post.status' => 'publish'
		 ), 
		'order' => array( 'Post.sticky' => 'desc', 'Post.id' => 'desc')
		);
		
		$this->set('posts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		
		
	    if ( $this->request->is('post') && !empty($this->request->data['Comment']) ) {
			$this->loadModel('Comment');
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		
		
		
		
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$parentPosts = $this->Post->ParentPost->find('list');
		$users = $this->Post->User->find('list');
		$terms = $this->Post->Term->find('list');
		$this->set(compact('parentPosts', 'users', 'terms'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$parentPosts = $this->Post->ParentPost->find('list');
		$users = $this->Post->User->find('list');
		$terms = $this->Post->Term->find('list');
		$this->set(compact('parentPosts', 'users', 'terms'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Post->recursive = 2;
		
		
		$this->Paginator->settings['conditions']['Post.type'] =  'post';
		$this->Paginator->settings['limit'] =  20;
		$this->Paginator->settings['order'] =  array(
												'Post.id' => 'desc'
											    );
		
		
		$posts = $this->Paginator->paginate();
	    $title_for_layout = __('Posts');
		$this->set(compact('posts' , 'title_for_layout'));	
		
		
				/**********************  UPDATE ************************/
		
		if ($this->request->is('get')) {
			
			
			if ( isset($this->request->data['operation']) && isset($this->request->data['posts']) ){
				
				switch( $this->request->data['operation'] ) {
					
					/**********************  DELETE ************************/
					
					case 'delete':
					
					foreach( $this->request->data['posts'] as $post ){
						
						$this->Post->delete($post);	
						
					}
					
				    $this->Session->setFlash('<div class="alert alert-success">' . __('Deleted %s posts.' , count($this->request->data['nodes'])) . '</div>');
				    return $this->redirect(array('action' => 'index'));
					

					break;	
					
									
					
				} // switch
				
				
						
						
			}
			

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
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$parentPosts = $this->Post->ParentPost->find('list');
		$users = $this->Post->User->find('list', array( 'fields' => array( 'id' , 'username') ));
		$terms = $this->Post->Term->find('list', array('conditions' => array('Term.taxonomy' => 'category')));
		$this->set(compact('parentPosts', 'users', 'terms'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$parentPosts = $this->Post->ParentPost->find('list');
		$users = $this->Post->User->find('list');
		$categories = $this->Post->Term->find('list', array( 'conditions' => array( 'taxonomy' => 'category' ) ));

		$this->loadModel('TermRelationship');
		$terms = $this->TermRelationship->find('all', array( 'conditions' => array( 'post_id' => $id) , 'fields' => array('term_id') ));
		
	
		
		$tags = array();
		
		foreach($terms as $term){
			
				$tag = $this->Post->Term->findById($term['TermRelationship']['term_id']);
				
				if (isset($tag['Term']['taxonomy']) && $tag['Term']['taxonomy'] == 'post_tag'){
					
					$tags[] = $tag['Term']['name'];
					
				}
				
			}		

		
		
		
				
		$this->set(compact('parentPosts', 'users', 'categories' , 'tags' ));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
