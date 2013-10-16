<?php
App::uses('AppModel', 'Model');

class Year extends AppModel {

	public $displayField = 'title';

	public $hasMany = array(
		'Value' => array(
			'className' => 'Value',
			'foreignKey' => 'year_id',
			'dependent' => false,
		)
	);

	public $hasAndBelongsToMany = array(
		'Post' => array(
			'className' => 'Post',
			'joinTable' => 'posts_years',
			'foreignKey' => 'year_id',
			'associationForeignKey' => 'post_id',
			'unique' => true,
		)
	);

}
