function init(){
}



//Agregando el comando para colocar el boton y definir el rol para usuario y para soporte
$(document).on("click","#btnsoporte",function() { // este btnsoporte viene del index.php donde esta mi login, es el boton que en vista dice Acceso soporte
    
    if ($('#rol_id').val()=='1') {
        $('#lbltitulo').html("Acceso Soporte"); // esto hace que cuando de clic en Acceso soporte de mi ventana index.php de mi login, pues me cambie la vista como "Acceso soporte" osea cambia el nombre nada mas
        $('#btnsoporte').html("Acceso Usuario"); // esto hace que cuando este con perfil de soporte ahora me de chance d eregresar commo perfil de usuario
        $('#rol_id').val(2);    
    }else{
        $('#lbltitulo').html("Acceso Usuario");
        $('#btnsoporte').html("Acceso Soporte");
        $('#rol_id').val(1);
    }
    
});






init();