<div class="pollOptions form">
<?php echo $this->Form->create('PollOption');?>
	<fieldset>
		<legend><?php echo __('Add Poll Option'); ?></legend>
	<?php
		echo $this->Form->input('poll_id');
		echo $this->Form->input('option');
		echo $this->Form->input('vote_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Poll Options'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Votes'), array('controller' => 'poll_votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Vote'), array('controller' => 'poll_votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
