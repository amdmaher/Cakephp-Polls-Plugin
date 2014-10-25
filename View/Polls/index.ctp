<div class="polls index">
	<h2><?php echo __('Polls');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('question');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($polls as $poll): ?>
	<tr>
		<td><?php echo h($poll['Poll']['id']); ?>&nbsp;</td>
		<td><?php echo h($poll['Poll']['question']); ?>&nbsp;</td>
		<td><?php echo h($poll['Poll']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $poll['Poll']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $poll['Poll']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $poll['Poll']['id']), null, __('Are you sure you want to delete # %s?', $poll['Poll']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>


<?php
echo $this->element('paging');
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Polls',
		'items' => array(
			$this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'add')),
			
			$this->Html->link(__('List Options'), array('controller' => 'poll_options', 'action' => 'index'), array('class' => 'index')),
			$this->Html->link(__('New Option'), array('controller' => 'poll_options', 'action' => 'add'), array('class' => 'add')),
			$this->Html->link(__('List Votes'), array('controller' => 'poll_votes', 'action' => 'index'), array('class' => 'index'))
			),
		),
	))); ?>


       <?php echo $this->element('vote', array('plugin'=>'Polls')); ?>
