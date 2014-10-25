<div class="polls form">
<?php echo $this->Form->create('Poll');?>
	<fieldset>
		<legend><?php echo __('Add Poll'); ?></legend>
	<?php
		echo $this->Form->input('Poll.question');
		echo $this->Form->input('Poll.description');
		echo $this->Form->input('Poll.model',array('placeholder'=>'ÇÓã ÇáÇÓÊÝÊÇÁ'));

		echo $this->Form->input('PollOption.0.option', array('after' => $this->Html->link('Add (+)', array('#'), array('class' => 'newOptionLink')), 'div' => array('class' => 'input text pollOption')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Polls',
		'items' => array(
			$this->Html->link(__('List'), array('action' => 'index'), array('class' => 'index')),
			$this->Html->link(__('List Options'), array('controller' => 'poll_options', 'action' => 'index'), array('class' => 'index')),
			$this->Html->link(__('New Option'), array('controller' => 'poll_options', 'action' => 'add'), array('class' => 'add')),
			$this->Html->link(__('List Votes'), array('controller' => 'poll_votes', 'action' => 'index'), array('class' => 'index')),
			),
		),
	))); ?>
<?php echo $this->Html->script('/js/jquery.formmodifier.js');?>
<?php echo $this->Html->script('/polls/poll.js');?>