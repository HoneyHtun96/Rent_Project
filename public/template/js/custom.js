$(document).ready(function () {
	
	$(".navbar a").click(function(){
		var id = $(this).data('value');
		// alert(id);
 	    $("body,html").animate({
	 		scrollTop:$("#" +id).offset().top-50
	 	},1000)
  
 	});
})