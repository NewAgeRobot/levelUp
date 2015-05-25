$(document).ready(function(){
	$("a").each(function () { 
		if(this.href.indexOf("#")>=0) $(this).attr("data-ajax",false); 
	});
});