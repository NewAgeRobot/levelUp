var main = function(){

	$('input.avatarChoice').on('change', function() {
		$('input.avatarChoice').not(this).prop('checked', false);  
	});
};

$(document).ready(main);