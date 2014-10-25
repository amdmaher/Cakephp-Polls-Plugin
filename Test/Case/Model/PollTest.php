<?php
/* Poll Test cases generated on: 2012-03-19 19:12:28 : 1332184348*/
App::uses('Poll', 'Polls.Model');

/**
 * Poll Test Case
 *
 */
class PollTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.polls.poll', 'app.creator', 'app.modifier', 'app.forum_poll_option', 'app.forum_poll_vote', 'app.poll_option', 'app.poll_vote', 'app.forum', 'app.forum_poll');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Poll = ClassRegistry::init('Poll');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Poll);

		parent::tearDown();
	}

}
