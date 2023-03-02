//console.log("test");
function init(){

}



$(document).ready(function(){
    var usu_id=$('#user_idx').val();
    $.post("../../controller/usuario.php?op=total" , {usu_id:usu_id}, function (data){
        data= JSON.parse(data);
        console.log(data);
    });
});

init();