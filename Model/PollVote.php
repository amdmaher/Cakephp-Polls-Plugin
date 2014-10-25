<?php
App::uses('PollsAppModel', 'Polls.Model');
/**
 * PollVote Model
 *
 * @property Poll $Poll
 * @property PollOption $PollOption
 * @property User $User
 */
class PollVote extends PollsAppModel {
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'poll_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
		'poll_option_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
	/*	'user_id' => array(
			'rule' => '_validateUserVote',
			'message' => 'One vote per user per poll',
			),
			*/
		);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Poll' => array(
			'className' => 'Polls.Poll',
			'foreignKey' => 'poll_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			),
		'PollOption' => array(
			'className' => 'Polls.PollOption',
			'foreignKey' => 'poll_option_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => 'vote_count',
			),
		'User' => array(
			'className' => 'Users.User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			)
		);
	
/**
 * Add
 * 
 * @return bool
 */
	public function add($data) {
		$data = $this->_cleanData($data);
		
		if ($this->saveAll($data)) {
			return true;
		} else {
			$errors = '';
			foreach ($this->invalidFields() as $key => $error) :
				$errors .= $error[0];
			endforeach;
			throw new Exception(__('Error : %s', $errors));
		}
	}
	
/** 
 * Clean Data
 * 
 * @return array
 */
	protected function _cleanData($data) {
		if (empty($data['PollOption']['option'])) {
			// To remove the poll option if not adding a new one.
			unset($data['PollOption']);
		} 
		
		if (!empty($data['PollVote']['poll_option_id'])) {
			// Can't have a vote and add an option at the same time.
			unset($data['PollOption']);
			
		} else {
			// Remote an empty option id because we're probably adding a new one.
			unset($data['PollVote']['poll_option_id']);
		}
		
		if (empty($data['PollVote']['poll_option_id']) && empty($data['PollOption']['option'])) {
			throw new Exception(__('Empty vote'));
		}
		return $data;
	}
	
	protected function _validateUserVote($check) {
		$value = array_shift($check); // user_id field value
		if (!empty($value) && !empty($this->data['PollVote']['poll_id'])) {
			$count = $this->find('count', array(
				'conditions' => array(
					'PollVote.user_id' => $value,
					'PollVote.poll_id' => $this->data['PollVote']['poll_id'],
					),
				));
			if ($count > 0) {
				return false;
			}
		}
		
		return true;
	}
}
