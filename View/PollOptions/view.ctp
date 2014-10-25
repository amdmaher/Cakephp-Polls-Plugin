<div class="pollOptions view">
<h2><?php  echo __('Poll Option');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pollOption['PollOption']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Poll'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pollOption['Poll']['question'], array('controller' => 'polls', 'action' => 'view', $pollOption['Poll']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Option'); ?></dt>
		<dd>
			<?php echo h($pollOption['PollOption']['option']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vote Count'); ?></dt>
		<dd>
			<?php echo h($pollOption['PollOption']['vote_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator Id'); ?></dt>
		<dd>
			<?php echo h($pollOption['PollOption']['creator_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier Id'); ?></dt>
		<dd>
			<?php echo h($pollOption['PollOption']['modifier_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pollOption['PollOption']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($pollOption['PollOption']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Poll Option'), array('action' => 'edit', $pollOption['PollOption']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Poll Option'), array('action' => 'delete', $pollOption['PollOption']['id']), null, __('Are you sure you want to delete # %s?', $pollOption['PollOption']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Options'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Option'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Votes'), array('controller' => 'poll_votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Vote'), array('controller' => 'poll_votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Poll Votes');?></h3>
	<?php if (!empty($pollOption['PollVote'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Poll Id'); ?></th>
		<th><?php echo __('Poll Option Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Creator Id'); ?></th>
		<th><?php echo __('Modifier Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pollOption['PollVote'] as $pollVote): ?>
		<tr>
			<td><?php echo $pollVote['id'];?></td>
			<td><?php echo $pollVote['poll_id'];?></td>
			<td><?php echo $pollVote['poll_option_id'];?></td>
			<td><?php echo $pollVote['user_id'];?></td>
			<td><?php echo $pollVote['creator_id'];?></td>
			<td><?php echo $pollVote['modifier_id'];?></td>
			<td><?php echo $pollVote['created'];?></td>
			<td><?php echo $pollVote['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'poll_votes', 'action' => 'view', $pollVote['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'poll_votes', 'action' => 'edit', $pollVote['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'poll_votes', 'action' => 'delete', $pollVote['id']), null, __('Are you sure you want to delete # %s?', $pollVote['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Poll Vote'), array('controller' => 'poll_votes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
