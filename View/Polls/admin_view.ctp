<div class="polls view">
<h2><?php  echo __('Poll');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($poll['Poll']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo h($poll['Poll']['question']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($poll['Poll']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Key'); ?></dt>
		<dd>
			<?php echo h($poll['Poll']['foreign_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($poll['Poll']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator Id'); ?></dt>
		<dd>
			<?php echo h($poll['Poll']['creator_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier Id'); ?></dt>
		<dd>
			<?php echo h($poll['Poll']['modifier_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($poll['Poll']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($poll['Poll']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Poll'), array('action' => 'edit', $poll['Poll']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Poll'), array('action' => 'delete', $poll['Poll']['id']), null, __('Are you sure you want to delete # %s?', $poll['Poll']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Polls'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Options'), array('controller' => 'poll_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Option'), array('controller' => 'poll_options', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Votes'), array('controller' => 'poll_votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Vote'), array('controller' => 'poll_votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Poll Options');?></h3>
	<?php if (!empty($poll['PollOption'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Poll Id'); ?></th>
		<th><?php echo __('Option'); ?></th>
		<th><?php echo __('Vote Count'); ?></th>
		<th><?php echo __('Creator Id'); ?></th>
		<th><?php echo __('Modifier Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($poll['PollOption'] as $pollOption): ?>
		<tr>
			<td><?php echo $pollOption['id'];?></td>
			<td><?php echo $pollOption['poll_id'];?></td>
			<td><?php echo $pollOption['option'];?></td>
			<td><?php echo $pollOption['vote_count'];?></td>
			<td><?php echo $pollOption['creator_id'];?></td>
			<td><?php echo $pollOption['modifier_id'];?></td>
			<td><?php echo $pollOption['created'];?></td>
			<td><?php echo $pollOption['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'poll_options', 'action' => 'view', $pollOption['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'poll_options', 'action' => 'edit', $pollOption['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'poll_options', 'action' => 'delete', $pollOption['id']), null, __('Are you sure you want to delete # %s?', $pollOption['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Poll Option'), array('controller' => 'poll_options', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Poll Votes');?></h3>
	<?php if (!empty($poll['PollVote'])):?>
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
		foreach ($poll['PollVote'] as $pollVote): ?>
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
