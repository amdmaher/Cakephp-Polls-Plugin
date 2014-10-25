<div class="pollVotes form">
<?php echo $this->Form->create('PollVote');?>
	<fieldset>
		<legend><?php echo __('Edit Poll Vote'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('poll_id');
		echo $this->Form->input('poll_option_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('creator_id');
		echo $this->Form->input('modifier_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PollVote.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PollVote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Poll Votes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Options'), array('controller' => 'poll_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Option'), array('controller' => 'poll_options', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
