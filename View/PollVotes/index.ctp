<div class="pollVotes index">
	<h2><?php echo __('Poll Votes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('poll_id');?></th>
			<th><?php echo $this->Paginator->sort('poll_option_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('creator_id');?></th>
			<th><?php echo $this->Paginator->sort('modifier_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($pollVotes as $pollVote): ?>
	<tr>
		<td><?php echo h($pollVote['PollVote']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pollVote['Poll']['question'], array('controller' => 'polls', 'action' => 'view', $pollVote['Poll']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pollVote['PollOption']['option'], array('controller' => 'poll_options', 'action' => 'view', $pollVote['PollOption']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pollVote['User']['id'], array('controller' => 'users', 'action' => 'view', $pollVote['User']['id'])); ?>
		</td>
		<td><?php echo h($pollVote['PollVote']['creator_id']); ?>&nbsp;</td>
		<td><?php echo h($pollVote['PollVote']['modifier_id']); ?>&nbsp;</td>
		<td><?php echo h($pollVote['PollVote']['created']); ?>&nbsp;</td>
		<td><?php echo h($pollVote['PollVote']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pollVote['PollVote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pollVote['PollVote']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pollVote['PollVote']['id']), null, __('Are you sure you want to delete # %s?', $pollVote['PollVote']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Poll Vote'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Options'), array('controller' => 'poll_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Option'), array('controller' => 'poll_options', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
