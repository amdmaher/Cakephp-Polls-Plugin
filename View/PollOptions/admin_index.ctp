<div class="pollOptions index">
	<h2><?php echo __('Poll Options');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('poll_id');?></th>
			<th><?php echo $this->Paginator->sort('option');?></th>
			<th><?php echo $this->Paginator->sort('vote_count');?></th>
			<th><?php echo $this->Paginator->sort('creator_id');?></th>
			<th><?php echo $this->Paginator->sort('modifier_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($pollOptions as $pollOption): ?>
	<tr>
		<td><?php echo h($pollOption['PollOption']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pollOption['Poll']['question'], array('controller' => 'polls', 'action' => 'view', $pollOption['Poll']['id'])); ?>
		</td>
		<td><?php echo h($pollOption['PollOption']['option']); ?>&nbsp;</td>
		<td><?php echo h($pollOption['PollOption']['vote_count']); ?>&nbsp;</td>
		<td><?php echo h($pollOption['PollOption']['creator_id']); ?>&nbsp;</td>
		<td><?php echo h($pollOption['PollOption']['modifier_id']); ?>&nbsp;</td>
		<td><?php echo h($pollOption['PollOption']['created']); ?>&nbsp;</td>
		<td><?php echo h($pollOption['PollOption']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pollOption['PollOption']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pollOption['PollOption']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pollOption['PollOption']['id']), null, __('Are you sure you want to delete # %s?', $pollOption['PollOption']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Poll Option'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Votes'), array('controller' => 'poll_votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Vote'), array('controller' => 'poll_votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
