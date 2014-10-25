// JavaScript Document

$(document).ready(function() {

	$('.newOptionLink').live('click', function(e) {
		   e.preventDefault();		   
			$('input').FormModifier({
				actionElem		:		'.newOptionLink',
				cloneElem		:		'.pollOption',
				cloneRow		:		true,
				isParent		:		true,
				labelPrefix		:		null,
				labelDiv		:		'',
				child			:		'input',
				formid			:		'PollAddForm',
				canDeleteLast	:		true,
				appendTo		:		'fieldset'
			});
			$('#PollOption0Option').data('FormModifier').appendRow();		
	});
});