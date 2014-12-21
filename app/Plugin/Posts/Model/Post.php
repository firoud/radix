<?php
App::uses('PostsAppModel', 'Posts.Model');
/**
 * Post Model
 *
 * @property Post $ParentPost
 * @property User $User
 * @property Comment $Comment
 * @property Post $ChildPost
 * @property Term $Term
 */
class Post extends PostsAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentPost' => array(
			'className' => 'Post',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'post_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ChildPost' => array(
			'className' => 'Post',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Term' => array(
			'className' => 'Term',
			'joinTable' => 'term_relationships',
			'foreignKey' => 'post_id',
			'associationForeignKey' => 'term_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
	
	
	
	
	
	
/**
 * afterSave method
 *
 * @return boolean Always true
 */
    public function afterSave($created, $options = array()) {
		

        if (!empty($this->data[$this->alias]['tags'])) {
				
				
				$tags = explode(',' , $this->data[$this->alias]['tags']);
				
				foreach($tags as $tag){
					$tag = trim($tag);	
					
					if (!empty($tag)){
						
						$id = $this->Term->findByName($tag);
						
						if (empty($id)){
						
							$slug  = Inflector::slug(strtolower($tag), '-');
					
							
							$this->Term->create();
							$this->Term->save(array(
									'name' => $tag,
									'slug' => $slug,
									'taxonomy' => 'post_tag',
							
							));
							
							
							
							$this->TermRelationship->create();
							$this->TermRelationship->save(array(
									'post_id' => $this->id,
									'term_id' => $this->Term->getLastInsertId(),
							));
							
						
						} // if
						
						else {
							
							$this->TermRelationship->create();
							$this->TermRelationship->save(array(
									'post_id' => $this->id,
									'term_id' => $id['Term']['id'],
							));
							
						}
					   
					}  // if
					
					
				} // foreach
                 
				// debug($tags); die();
    
        }  // if

        return true;
    }	// function		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}
