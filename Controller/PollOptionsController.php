<?php
App::uses('PollsAppController', 'Polls.Controller');
/**
 * PollOptions Controller
 *
 * @property PollOption $PollOption
 */
class PollOptionsController extends PollsAppController {
	
/**
 * Name
 *
 * @var string
 */
	public $name = 'PollOptions';

/**
 * Uses model
 *
 * @var string
 */
	public $uses = 'Polls.PollOption';


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PollOption->recursive = 0;
		$this->set('pollOptions', $this->paginate());
	}
		public function admin_index() {
		$this->PollOption->recursive = 0;
		$this->set('pollOptions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PollOption->id = $id;
		if (!$this->PollOption->exists()) {
			throw new NotFoundException(__('Invalid poll option'));
		}
		$this->set('pollOption', $this->PollOption->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PollOption->create();
			if ($this->PollOption->save($this->request->data)) {
				$this->Session->setFlash(__('The poll option has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll option could not be saved. Please, try again.'));
			}
		}
		$polls = $this->PollOption->Poll->find('list');
		$this->set(compact('polls'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->PollOption->id = $id;
		if (!$this->PollOption->exists()) {
			throw new NotFoundException(__('Invalid poll option'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PollOption->save($this->request->data)) {
				$this->Session->setFlash(__('The poll option has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll option could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PollOption->read(null, $id);
		}
		$polls = $this->PollOption->Poll->find('list');
		$this->set(compact('polls'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->PollOption->id = $id;
		if (!$this->PollOption->exists()) {
			throw new NotFoundException(__('Invalid poll option'));
		}
		if ($this->PollOption->delete()) {
			$this->Session->setFlash(__('Poll option deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Poll option was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
