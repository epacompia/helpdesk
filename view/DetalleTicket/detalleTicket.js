//CAPTURANDO EL ID QUE SE PASA POR AL URL 
function init(){

}



$(document).ready(function() {
    var tick_id = getUrlParameter('ID');
    //console.log(id);
    //AQUI LE PASO ESTO PARA QUE SELECCIONE MI listardetalle de mi ticket.php y le paso como parametro el id del ticket  
     $.post("../../controller/ticket.php?op=listardetalle", {tick_id : tick_id}, function (data){
        //console.log(data);   // esto es para ver que me lo imprima 5 veces
        $('#lbldetalle').html(data);  //LLAMO  a mi section de mi index.php que conteinia a mi article
     });

     $.post("../../controller/ticket.php?op=mostrar",{tick_id : tick_id}, function (data) {
        data= JSON.parse(data);
        $('#lblestado').html(data.tick_estado);
        $('#lblnomusuario').html(data.usu_nom + ' '+ data.usu_ape);
        $('#lblfechcrea').html(data.fech_crea);       
        $('#lblnomidticket').html("Detalle Ticket -" + data.tick_id);       
        $('#cat_id').val(data.cat_nom);
        $('#tick_titulo').val(data.tick_titulo);
        $('#tickd_descripusu').summernote('code', data.tick_descrip);

        
     });

    

     //codigo para que funcione el sumernote en el archivo detalleticket.php donde se muestra el detalle del ticket
     $('#tickd_descrip').summernote({
        height: 250,
        lang: "es-ES",  //ESTO ES PARA AGREGARLE A ESPAÑOL EL SUMMERNOTE ( AGREGO LA REFERENCIA EN EL js.php dentro de la carpeta mainJs)
        callbacks: {
            onImageUpload: function(image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        }
     });


      //PARA MOSTRAR LA DESCRIPCION  DE MI FORMULARIO DE ARRIBA DONDE MUESTRO LOS DATOS PRINCIPALES EN EL DETALLETICKET.PHP
      $('#tickd_descripusu').summernote({
        height: 250,
        lang: "es-ES" //ESTO ES PARA AGREGARLE A ESPAÑOL EL SUMMERNOTE ( AGREGO LA REFERENCIA EN EL js.php dentro de la carpeta mainJs)
        
     });

     //ESTE CODIGO ES PARA DESHABILITAR EL EDITOR EN EL SUMMERNOTE EN LA VISTA detalleticket.js en la parte superior donde me trae los datos del ticket
     // en el index.php de detalleticket
     $('#tickd_descripusu').summernote('disable');


});





//FUNCION PARA CAPTURAR EL APRAMETRO DEL ID QUE SE PASA POR AL URL CUANDO SE  DA CLIC EN EL OJITO
var getUrlParameter = function getUrlParameter(sParam){
    //Declaracion de varialbes
    var sPageURL= decodeURIComponent(window.location.search.substring(1)),
    sURLVariables= sPageURL.split('&'),
    sParameterName,
    i;

    for(i=0; i< sURLVariables.length; i++){
        sParameterName=sURLVariables[i].split('=');

        if(sParameterName[0]===sParam){
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};


//CODIGO PARA LOS BOTONES ENVIAR Y CERRAR DE MI VISTA detalleticket (index) donde esatn los comentario sde los de soporte y del usuario
$(document).on("click","#btnenviar", function(){
    //parametros que se les pasara
    var tick_id= getUrlParameter('ID');
    var usu_id= $('#user_idx').val(); //este es el valor que esta en el main.php osea el mainheader  
    var tickd_descrip=$('#tickd_descrip').val(); //este es el valor que esta en el main.php osea el mainheader 
    $.post("../../controller/ticket.php?op=insertdetalle", {tick_id:tick_id, usu_id:usu_id, tickd_descrip:tickd_descrip}, function (data){
     console.log("test");
     });
});

$(document).on("click","#btncerrarticket", function(){

});



init();