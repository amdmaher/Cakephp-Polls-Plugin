<?php
App::uses('PollsAppController', 'Polls.Controller');
/**
 * Polls Controller
 *
 * @property Poll $Poll
 */
class PollsController extends PollsAppController {
	
/**
 * Name
 *
 * @var string
 */
	public $name = 'Polls';

/**
 * Uses model
 *
 * @var string
 */
	public $uses = 'Polls.Poll';


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Poll->recursive = 0;
		$this->set('polls', $this->paginate());
	}


/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Poll->id = $id;
		if (!$this->Poll->exists()) {
			throw new NotFoundException(__('Invalid poll'));
		}
		$poll = $this->Poll->find('first', array(
			'conditions' => array(
				'Poll.id' => $id,
				),
			'contain' => array(
				'PollOption',
				),
			));
		$this->set(compact('poll'));
	}


	public function admin_view($id = null) {
		$this->Poll->id = $id;
		if (!$this->Poll->exists()) {
			throw new NotFoundException(__('Invalid poll'));
		}
		$poll = $this->Poll->find('first', array(
			'conditions' => array(
				'Poll.id' => $id,
				),
			'contain' => array(
				'PollOption',
				),
			));
		$this->set(compact('poll'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Poll->create();
			if ($this->Poll->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The poll has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Poll->id = $id;
		if (!$this->Poll->exists()) {
			throw new NotFoundException(__('Invalid poll'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Poll->save($this->request->data)) {
				$this->Session->setFlash(__('The poll has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Poll->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
 	public function admin_index() {
		$this->Poll->recursive = 0;
		$this->set('polls', $this->paginate());
	}
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Poll->id = $id;
		if (!$this->Poll->exists()) {
			throw new NotFoundException(__('Invalid poll'));
		}
		if ($this->Poll->delete()) {
			$this->Session->setFlash(__('Poll deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Poll was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
