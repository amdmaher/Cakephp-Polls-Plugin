<?php
/* PollOption Test cases generated on: 2012-03-19 19:14:09 : 1332184449*/
App::uses('PollOption', 'Polls.Model');

/**
 * PollOption Test Case
 *
 */
class PollOptionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.polls.poll_option', 'app.poll', 'app.creator', 'app.modifier', 'app.forum_poll_vote', 'app.poll_vote', 'app.forum', 'app.forum_poll_option');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->PollOption = ClassRegistry::init('PollOption');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PollOption);

		parent::tearDown();
	}

}
