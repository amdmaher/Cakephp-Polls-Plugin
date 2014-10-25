<?php
// this should be at the top of every element created with format __ELEMENT_PLUGIN_ELEMENTNAME_instanceNumber.
// it allows a database driven way of configuring elements, and having multiple instances of that configuration.
if(!empty($instance) && defined('__POLLS_RESULTS_'.$instance)) {
	extract(unserialize(constant('__POLLS_RESULTS_'.$instance)));
} else if (defined('__POLLS_RESULTS')) {
	extract(unserialize(__POLLS_RESULTS));
}
extract($this->requestAction("/polls/poll_votes/results/{$model}/{$foreignKey}"));
$showUserAnswers = isset($showUserAnswers) ? $showUserAnswers : true;
$answersTitle = isset($answersTitle) ? $answersTitle : 'Answers'; // string

// additional options that could be added http://code.google.com/apis/chart/interactive/docs/gallery/barchart.html
$chartType = !empty($chartType) ? $chartType : 'all'; // pie, bar, all
$chartLegendPosition = !empty($chartLegendPosition) ? $chartLegendPosition : 'right'; // right, top, bottom, in, none
$chartTitle = isset($chartTitle) ? $chartTitle : $poll['Poll']['question'];  // string
$chartWidth = !empty($chartWidth) ? $chartWidth : 400; // int
$chartHeight = !empty($chartHeight) ? $chartHeight : 300; // int
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$functionName = !empty($functionName) ? $functionName : substr( str_shuffle( $chars ), 0, 10); // so that multiple calls to this element work ?>
    
<div class="pollVotes results">
	<?php if ($chartType == 'pie' || $chartType == 'all') { ?><div style="width: <?php echo $chartWidth; ?>px; height: <?php echo $chartHeight; ?>px;" id="pie_div"></div><?php } ?>
	<?php if ($chartType == 'bar' || $chartType == 'all') { ?><div style="width: <?php echo $chartWidth; ?>px; height: <?php echo $chartHeight; ?>px;"  id="bar_div"></div><?php } ?>
    
    <?php
	if ($showUserAnswers !== false) { ?>
    <div id="voters">
    <?php echo __('<h3>%s</h3>', $answersTitle); ?>
	<?php
	foreach ($poll['PollOption'] as $option) { ?>
    	<div class="option">
			<?php echo $option['option']; ?>
            <ul>
            	<?php 
				foreach ($option['PollVote'] as $vote) { ?>
            	<li><?php echo $this->Html->link($vote['User']['full_name'], array('plugin' => 'users', 'controller' => 'users', 'action' => 'view', $vote['User']['id']), array('target' => '_blank')); ?></li>
                <?php
				} ?>
            </ul>
        </div>
	<?php
	} ?>
    </div>
    <?php
	} ?>
</div>


 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(<?php echo $functionName; ?>);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function <?php echo $functionName; ?>() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Answers');
        data.addRows([
		<?php
		foreach ($poll['PollOption'] as $option) { ?>
          ['<?php echo $option['option']; ?>', <?php echo $option['vote_count']; ?>],
		<?php
		} ?>
        ]);

        // Set chart options
        var options = {
			'titleTextStyle': {
				color: '#356B96',
				fontSize: 30,
				},
			'legend': {
				position: '<?php echo $chartLegendPosition; ?>',
				},
			'title':'<?php echo $chartTitle; ?>',
            'width':<?php echo $chartWidth; ?>,
            'height':<?php echo $chartHeight; ?>
			};

        // Instantiate and draw our chart, passing in some options.
        <?php if ($chartType == 'pie' || $chartType == 'all') { ?>
		var chart = new google.visualization.PieChart(document.getElementById('pie_div'));
		<?php } ?>
		
        <?php if ($chartType == 'bar' || $chartType == 'all') { ?>
		var bar = new google.visualization.BarChart(document.getElementById('bar_div'));
		<?php } ?>
		
        <?php if ($chartType == 'pie' || $chartType == 'all') { ?>
		chart.draw(data, options);
		<?php } ?>
		
        <?php if ($chartType == 'bar' || $chartType == 'all') { ?>
		bar.draw(data, options);
		<?php } ?>
      }
    </script>
<?php unset($showUserAnswers, $answersTitle, $chartTitle); ?>