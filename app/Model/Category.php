<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Post $Post
 * @property Record $Record
 */
class Category extends AppModel {
	
	public $actsAs = array('Tree');
	public $displayField = 'title';
	
	public $belongsTo = array(
		'CategoryChildren' => array(
			'className' => 'Category',
			'foreignKey' => 'parent_id',
			'dependent' => false
		)
	);
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'category_id',
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

}
