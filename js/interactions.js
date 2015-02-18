var main = function(){

	$('input.avatarChoice').on('change', function() {
		$('input.avatarChoice').not(this).prop('checked', false);  
	});

	$("input:checkbox").click(function() {
		var bol = $("input:checkbox:checked").length >= 8;     
		$("input:checkbox").not(":checked").attr("disabled",bol);
	});

};

$(document).ready(main);