//CAPTURANDO EL ID QUE SE PASA POR AL URL 
function init(){

}



$(document).ready(function(){
 var id= getUrlParameter('ID');
 console.log(id);
});


//FUNCION PARA CAPTURAR EL APRAMETRO DEL ID QUE SE PASA POR AL URL CUANDO SE  DA CLIC EN EL OJITO
var getUrlParameter = function getUrlParameter(sParam){
    var sPageURL= decodeURIComponent(window.location.search.substring(1));
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