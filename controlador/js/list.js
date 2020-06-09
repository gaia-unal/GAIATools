$(document).ready(function(){
	$("#listado").show();
	$("#pagina").hide();
	$("#listado").click(function(){
		$("#pagina").show();
		$("#listado").hide();
	});
});