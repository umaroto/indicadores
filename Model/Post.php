<?php
App::uses('AppModel', 'Model');

class Post extends AppModel {

	public $displayField = 'title';

	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Record' => array(
			'className' => 'Record',
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
		'Value' => array(
			'className' => 'Value',
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
		)
	);

	public $hasAndBelongsToMany = array(
		'Filter' => array(
			'className' => 'Filter',
			'joinTable' => 'posts_filters',
			'foreignKey' => 'post_id',
			'associationForeignKey' => 'filter_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Year' => array(
			'className' => 'Year',
			'joinTable' => 'posts_years',
			'foreignKey' => 'post_id',
			'associationForeignKey' => 'year_id',
			'unique' => true,
			'conditions' => '',
			'fields' => 'id, title',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Zone' => array(
			'className' => 'Zone',
			'joinTable' => 'posts_zones',
			'foreignKey' => 'post_id',
			'associationForeignKey' => 'zone_id',
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
