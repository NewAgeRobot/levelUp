var main = function(){

	$('input.avatarChoice').on('change', function() {
		$('input.avatarChoice').not(this).prop('checked', false);  
	});

	$("input:checkbox").click(function() {
		var bol = $("input:checkbox:checked").length >= 8;
		$("input:checkbox").not(":checked").attr("disabled",bol);
	});

	$("input[type=checkbox]").change(function() {
		if($("input[type=checkbox]:checked").length >= 6) {
			$("#submit").removeAttr("disabled");
		} else {
			$("#submit").attr("disabled", "disabled");
		}
	});

};

$(document).ready(main);