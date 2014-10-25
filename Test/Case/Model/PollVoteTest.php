<?php
/* PollVote Test cases generated on: 2012-03-19 19:14:27 : 1332184467*/
App::uses('PollVote', 'Polls.Model');

/**
 * PollVote Test Case
 *
 */
class PollVoteTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.polls.poll_vote', 'app.poll', 'app.poll_option', 'app.user', 'app.creator', 'app.modifier', 'app.forum', 'app.forum_poll_vote');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->PollVote = ClassRegistry::init('PollVote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PollVote);

		parent::tearDown();
	}

}
