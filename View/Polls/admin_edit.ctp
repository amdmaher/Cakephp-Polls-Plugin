<div class="polls form">
<?php echo $this->Form->create('Poll');?>
	<fieldset>
		<legend><?php echo __('Edit Poll'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('question');
		echo $this->Form->input('model');

		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Polls',
		'items' => array(
			$this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Poll.id')), array('class' => 'delete'), __('Are you sure you want to delete # %s?', $this->Form->value('Poll.id'))),
			$this->Html->link(__('List'), array('action' => 'index'), array('class' => 'index')),
			$this->Html->link(__('List Options'), array('controller' => 'poll_options', 'action' => 'index'), array('class' => 'index')),
			$this->Html->link(__('New Option'), array('controller' => 'poll_options', 'action' => 'add'), array('class' => 'add')),
			$this->Html->link(__('List Votes'), array('controller' => 'poll_votes', 'action' => 'index'), array('class' => 'index'))
			),
		),
	))); ?>