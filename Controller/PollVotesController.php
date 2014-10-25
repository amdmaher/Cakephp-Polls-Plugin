<?php
App::uses('PollsAppController', 'Polls.Controller');
/**
 * PollVotes Controller
 *
 * @property PollVote $PollVote
 */
class PollVotesController extends PollsAppController {
	
/**
 * Name
 *
 * @var string
 */
	public $name = 'PollVotes';

/**
 * Uses model
 *
 * @var string
 */
	public $uses = 'Polls.PollVote';

/** 
 * Allowed actions
 * 
 * @var array
 */
	public $allowedActions = array('vote', 'results');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PollVote->recursive = 0;
		$this->set('pollVotes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PollVote->id = $id;
		if (!$this->PollVote->exists()) {
			throw new NotFoundException(__('Invalid poll vote'));
		}
		$this->set('pollVote', $this->PollVote->read(null, $id));
	}
	
/** 
 * vote method
 * 
 * @param string
 * @param mixed
 * @return array
 */
	public function vote($model = null, $foreignKey = null) {
		echo $model . $foreignKey . $poll_id ; 
		$id = $this->PollVote->Poll->field('id', array('Poll.model' => $model, 'Poll.foreign_key' => $foreignKey));

		if (!empty($id)) {
			return $this->add($id);
		} else {
			return null;
		}
	}
	
/**
 * results method
 *
 * @param string
 * @param mixed
 * @return array
 */
 	public function results($model = null, $foreignKey = null) {
		$poll = $this->PollVote->Poll->find('first', array(
			'conditions' => array(
				'Poll.model' => $model,
				'Poll.foreign_key' => $foreignKey,
				),
			'contain' => array(
				'PollOption' => array(
					'PollVote' => array(
						'User',
						),
					),
				),
			));
		
		return compact('poll');
	}
	

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->PollVote->Poll->id = $id;
		if (!$this->PollVote->Poll->exists()) {
			throw new NotFoundException(__('Invalid poll'));
		}
		
		if ($this->request->is('post')) {
			try {	
			$this->request->data['PollVote']['ipaddress'] = $_SERVER['REMOTE_ADDR'];		
				$this->PollVote->create();
				$this->PollVote->add($this->request->data);
				$this->Session->setFlash(__('The poll vote has been saved'));
			//	$this->redirect($this->referer());
			} catch (Exception $e) {
				$this->Session->setFlash($e->getMessage());
						echo 'The poll vote has not saved' ;
//print_r($this->PollVote->validationErrors);
		//		$this->redirect($this->referer());
			}
		}
		
	//	if (CakeSession::read('Auth.User.id') != '') {
			$votes = $this->PollVote->find('count', array(
				'conditions' => array('OR'=>array( 
					'PollVote.ipaddress' => $_SERVER['REMOTE_ADDR'],
					'PollVote.user_id' => CakeSession::read('Auth.User.id')),
					'PollVote.poll_id' => $id,
					),
				));
	//	} else {
	//		$votes = null;
	//	}
	//	print_r($votes);
		if (!empty($votes)) {
		
			$votes = $this->PollVote->PollOption->find('all', array(
				'conditions' => array(
					'PollOption.poll_id' => $id,
					),
				));
			$voteTotal = array_sum(Set::extract('/PollOption/vote_count', $votes));
		} else {
			$votes = null;
			$voteTotal = null;
		}
		
		$poll = $this->PollVote->Poll->find('first', array(
			'conditions' => array(
				'Poll.id' => $id,
				),
			));
		$pollOptions = $this->PollVote->PollOption->find('list', array(
			'conditions' => array(
				'PollOption.poll_id' => $id,
				),
			));
		$user = CakeSession::read('Auth.User.id');
		
		if (!empty($this->request->params['requested'])) {
			return compact('poll', 'user', 'pollOptions', 'votes', 'voteTotal'); // for requestAction
		} else {
			$this->set(compact('poll', 'user', 'pollOptions', 'votes', 'voteTotal'));
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->PollVote->id = $id;
		if (!$this->PollVote->exists()) {
			throw new NotFoundException(__('Invalid poll vote'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PollVote->save($this->request->data)) {
				$this->Session->setFlash(__('The poll vote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll vote could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PollVote->read(null, $id);
		}
		$polls = $this->PollVote->Poll->find('list');
		$pollOptions = $this->PollVote->PollOption->find('list');
		$users = $this->PollVote->User->find('list');
		$this->set(compact('polls', 'pollOptions', 'users'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->PollVote->id = $id;
		if (!$this->PollVote->exists()) {
			throw new NotFoundException(__('Invalid poll vote'));
		}
		if ($this->PollVote->delete()) {
			$this->Session->setFlash(__('Poll vote deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Poll vote was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
