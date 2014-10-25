<div class="pollVotes formcont">
	<h2><?php echo $poll['Poll']['question']; ?></h2>
    <p><?php echo $poll['Poll']['description']; ?></p>


<?php
 if (!empty($votes)) {
	echo "<div class='formrst'>"; $i=0;
	foreach ($votes as $vote) { $i++; 
$tot=  ($vote['PollOption']['vote_count']/$voteTotal) * 100 ;
?>
    	<div class="pollVotes results"><span class="label optionName"><?php echo $vote['PollOption']['option']; ?></span> <span class="voteCount"><?php echo $vote['PollOption']['vote_count']; ?></span></div>

  <script type='text/javascript'> 
$(document).ready(function ()  {
    $( ".pbchart<?php echo $i; ?> div" ).width("10%");
   
         var value = <?php echo $tot ; ?>;
        //var test = $( ".pbchart<?php echo $i; ?> div" ).css({width: (value) + '%'});
        
        $('.pbchart<?php echo $i; ?> div').animate({
            width: value+"%",
        }, 1000);
    });



</script>

            <div id="pb" class="pbchart<?php echo $i; ?>"><div></div></div>


<?php } // end vote loop ?>
    <div class="totalVotes"><span class="label voteTotal"><?php echo __('Total Votes'); ?></span> <span class="voteTotal"><?php echo $voteTotal; ?></span></div>
</div>

<?php
 } else {
   echo '<div class="formvot">';

	echo $this->Form->create('PollVote');?>
	<fieldset>
	<?php
		echo $this->Form->input('PollVote.poll_id', array('type' => 'hidden', 'value' => $poll['Poll']['id']));
		echo $this->Form->input('PollVote.poll_option_id', array('type' => 'radio', 'legend' => false));
		echo $this->Form->input('PollVote.user_id', array('type' => 'hidden', 'value' => $user));
	//	echo $this->Form->input('PollOption.option', array('label' => 'Add Option'));
		echo $this->Form->input('PollOption.poll_id', array('type' => 'hidden', 'value' => $poll['Poll']['id'])); ?>
	</fieldset>
<?php 
	echo $this->Form->end(__('Vote')); 
} ?>
</div>
</div>
<?php  /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Poll Votes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Options'), array('controller' => 'poll_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Option'), array('controller' => 'poll_options', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>*/ ?>

	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>	

	<?php
	$data = $this->Js->get('#PollVoteAddForm')->serializeForm(array('isForm' => true, 'inline' => true));
		$this->Js->get('#PollVoteAddForm')->event(
		   'submit',
		   $this->Js->request(
			array('action' => 'add', 'controller' => 'poll_votes',$poll['Poll']['id']),
			array(
				'before'=>$this->Js->get('#Loading')->effect('fadeIn'),
        	  'success'=>   $this->Js->get('.formvot')->effect('fadeOut') ,
                  
		  'complete' =>  $this->Js->get('.formrst')->effect('fadeIn'),
                                'update' => '.formcont',
				'data' => $data,
				'async' => true,   
				'dataExpression'=>true,
				'method' => 'POST',
			)
		  )
		);
		echo $this->Js->writeBuffer();


		?>
<style>
#pb {
    width: 400px;
    margin-top: 30px;
background-color: #ccc;}

#pb div {
    background: orange;
    height: 10px;
}
</style>

