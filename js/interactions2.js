var main = function(){

	$("input:checkbox").click(function() {
		var bol = $("input:checkbox:checked").length >= 3;
		$("input:checkbox").not(":checked").attr("disabled",bol);
	});

	$("input[type=checkbox]").change(function() {
		if($("input[type=checkbox]:checked").length >= 1) {
			$("#submit").removeAttr("disabled");
		} else {
			$("#submit").attr("disabled", "disabled");
		}
	});

};

$(document).ready(main);