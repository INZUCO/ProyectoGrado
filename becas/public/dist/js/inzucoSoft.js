/*Inzuco*/

$("#Municipio").change(function(event){
	//Hacer la peticion ajax
	/*Ruta donde se quiere ir..*/
	$.get("munici/"+event.target.value+"",function(respuestajson, municipio){
		cosole.log('hola');
	});
});