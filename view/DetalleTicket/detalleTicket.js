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


init();