$(document).ready(function(){
	$(".servidor-subitem").hide(500);
	
	$(".financas-subitem").hide(500);
	
	$(".transparencia-subitem").hide(500);
	
	$(".patrimonio-subitem").hide(500);
		
	$("#servidor").click(function(){
		$(".servidor-subitem").slideToggle();
	});
	
	$("#financas").click(function(){
		$(".financas-subitem").slideToggle();
	});
	
	$("#transparencia").click(function(){
		$(".transparencia-subitem").slideToggle();
	});
	
	$("#patrimonio").click(function(){
		$(".patrimonio-subitem").slideToggle();
	});
	
});