<?php
// this should be at the top of every element created with format __ELEMENT_PLUGIN_ELEMENTNAME_instanceNumber.
// it allows a database driven way of configuring elements, and having multiple instances of that configuration.
if(!empty($instance) && defined('__POLLS_VOTE_'.$instance)) {
	extract(unserialize(constant('__POLLS_VOTE_'.$instance)));
} else if (defined('__POLLS_VOTE')) {
	extract(unserialize(__POLLS_VOTE));
}
extract($this->requestAction("polls/poll_votes/vote/{$model}/{$foreignKey}")); ?>
    
<div class="pollVotes formcont">
	<h2><?php echo $poll['Poll']['question']; ?></h2>
    <p><?php echo $poll['Poll']['description']; ?></p>


<?php
 if (!empty($votes)) {
	echo "<div class='formvot'>"; $i=0;
	foreach ($votes as $vote) { $i++; 
$tot=  ($vote['PollOption']['vote_count']/$voteTotal) * 100 ;
?>
    	<div class="pollVotes results"><span class="label optionName"><?php echo $vote['PollOption']['option']; ?></span> <span class="voteCount"><?php echo $vote['PollOption']['vote_count']; ?></span></div>

  <script type='text/javascript'> 
$(window).load(function(){
$(function () {
    $( ".pbchart<?php echo $i; ?> div" ).width("10%");
   
         var value = <?php echo $tot ; ?>;
        //var test = $( ".pbchart<?php echo $i; ?> div" ).css({width: (value) + '%'});
        
        $('.pbchart<?php echo $i; ?> div').animate({
            width: value+"%",
        }, 1000);
    });


}); 

</script>

            <div id="pb" class="pbchart<?php echo $i; ?>"><div></div></div>


<?php } // end vote loop ?>
    <div class="totalVotes"><span class="label voteTotal"><?php echo __('Total Votes'); ?></span> <span class="voteTotal"><?php echo $voteTotal; ?></span></div>
</div>

<?php
} else {
   echo '<div class="formrst">';

	echo $this->Form->create('PollVote', array('url' => '/polls/poll_votes/add/'.$poll['Poll']['id']));?>
	<fieldset>
	<?php
		echo $this->Form->input('PollVote.poll_id', array('type' => 'hidden', 'value' => $poll['Poll']['id']));
		echo $this->Form->input('PollVote.poll_option_id', array('type' => 'radio', 'options' => $pollOptions, 'legend' => false));
		echo $this->Form->input('PollVote.user_id', array('type' => 'hidden', 'value' => CakeSession::read('Auth.User.id')));
	//	echo $this->Form->input('PollOption.option', array('label' => 'Add Option'));
		echo $this->Form->input('PollOption.poll_id', array('type' => 'hidden', 'value' => $poll['Poll']['id'])); ?>
	</fieldset>
<?php 
	echo $this->Form->end(__('Vote')); 
echo "</div>";
} ?>

</div>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>	

	<?php
	$data = $this->Js->get('#PollVoteIndexForm')->serializeForm(array('isForm' => true, 'inline' => true));
		$this->Js->get('#PollVoteIndexForm')->event(
		   'submit',
		   $this->Js->request(
			array('action' => 'add', 'controller' => 'polls/poll_votes',$poll['Poll']['id']),
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