<div class="pollVotes view">
<h2><?php  echo __('Poll Vote');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pollVote['PollVote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Poll'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pollVote['Poll']['question'], array('controller' => 'polls', 'action' => 'view', $pollVote['Poll']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Poll Option'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pollVote['PollOption']['option'], array('controller' => 'poll_options', 'action' => 'view', $pollVote['PollOption']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pollVote['User']['id'], array('controller' => 'users', 'action' => 'view', $pollVote['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator Id'); ?></dt>
		<dd>
			<?php echo h($pollVote['PollVote']['creator_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier Id'); ?></dt>
		<dd>
			<?php echo h($pollVote['PollVote']['modifier_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pollVote['PollVote']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($pollVote['PollVote']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Poll Vote'), array('action' => 'edit', $pollVote['PollVote']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Poll Vote'), array('action' => 'delete', $pollVote['PollVote']['id']), null, __('Are you sure you want to delete # %s?', $pollVote['PollVote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Votes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Vote'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Options'), array('controller' => 'poll_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Option'), array('controller' => 'poll_options', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
