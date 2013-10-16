<?php
App::uses('AppModel', 'Model');

class Filter extends AppModel {

	public $displayField = 'title';

	public $hasMany = array(
		'Value' => array(
			'className' => 'Value',
			'foreignKey' => 'filter_id',
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

	public $hasAndBelongsToMany = array(
		'Post' => array(
			'className' => 'Post',
			'joinTable' => 'posts_filters',
			'foreignKey' => 'filter_id',
			'associationForeignKey' => 'post_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
}
