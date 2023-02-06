
//METODO AJAX CREO EL INIT PARA GUARDAR EL TICKET
function init(){
	$("#ticket_form").on("submit", function(e){  //aqui va el id del formulario ticket_form
		guardaryeditar(e);
	});
} 
 
 
 $(document).ready(function() {
 	$('#tick_descrip').summernote({
		height:350,
		lang: "es-ES",  //ESTO ES PARA AGREGARLE A ESPAÑOL EL SUMMERNOTE ( AGREGO LA REFERENCIA EN EL js.php dentro de la carpeta mainJs)
	});

	//LLAMANDO AL SERVICIO combo que cree en mi categoria.php de la carpeta controller
	$.post("../../controller/categoria.php?op=combo", function(data,status ){
		 $('#cat_id').html(data);
	});
 });




 function guardaryeditar(e){
	e.preventDefault(); //para que no se dispare varias veces el boton
	var formData=new FormData($("#ticket_form")[0]);
	$.ajax({
		url:"../../controller/ticket.php?op=insert",
		type: "POST",
		data:formData,
		contentType:false,
		processData: false,
		success: function(datos){
			//console.log(datos);
			$('#tick_titulo').val(''); //AQUI LLAMO A LOS CAMPOS DESPUES DE QUE SE EJECUTO EL AJAX PARA LIMPIAR SUS CAJAS Y DEJARLO EN VACIO DESPUES DE AGREGAR
			$('#tick_descrip').summernote('reset'); //AQUI BORRO LA INFORMACION DEL TEXAREA LLAMANDO A SUMMERNOTE PARA LIMPIARLO Y RESET

			swal("Correcto!","Registrado Correctamente","success");  //con esta linea de codigo agrego el sweet alert
		}
	});
 }

//INICIALIZO EL INIT
 init();