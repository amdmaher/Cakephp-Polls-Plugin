<?php
App::uses('PollsAppModel', 'Polls.Model');
/**
 * Poll Model
 *
 * @property PollOption $PollOption
 * @property PollVote $PollVote
 */
class Poll extends PollsAppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'question';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'question' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PollOption' => array(
			'className' => 'Polls.PollOption',
			'foreignKey' => 'poll_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => 'vote_count'
		),
		'PollVote' => array(
			'className' => 'Polls.PollVote',
			'foreignKey' => 'poll_id',
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
