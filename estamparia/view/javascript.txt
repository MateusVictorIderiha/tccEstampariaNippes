$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

$(document).ready(function(){
	$("#datepicker1").datepicker();
});

$(document).ready(function(){
	$("#datepicker2").datepicker();
});

$(document).ready(function(){
	$("#pedido").on("mousedown",function(){
		$(this).css({color: "#ff0000"});
	});
});


$(document).ready(function(){
	$(".dropdown-toggle").dropdown();
});