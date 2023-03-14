var tabla;
var usu_id=$('#user_idx').val(); //LLAMO AL user_idx que esta en el header.php para saber que usuario esta logueandose y aparte este usu_id lo llevo a la linea 30 de este documento dentro del ajax
var rol_id=$('#rol_idx').val();
function init(){
    $("#ticket_form").on("submit", function(e){
        guardar(e);
    });
}

//ESTEE CODIGO ES PARA EL DATATABLE
$(document).ready(function(){
    //FUNCION PARA QUE ME CARGE EL COMBOBOX A PENAS SE CARGAE L DATATABLE POR ESO LO PONGO AQUI
    $.post("../../controller/usuario.php?op=combo", function (data) {
        $('#usu_asig').html(data);
    });
    
    
    //console.log(usu_id);  //esto es para probar si en la consola me trae el usu_id

    if (rol_id==1) {
        tabla=$('#ticket_data').dataTable({
            "aProcessing":true,
            "aServerSide":true,
            dom: 'Bfrtip',
            "searching":true,
            lengthChange:false,
            colReader:true,
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url:'../../controller/ticket.php?op=listar_x_usu',   //TENER EN CUENTA ESTE LLAMADO DEL AJAX
                type:"post",
                dataType:"json",
                data:{ usu_id : usu_id},  //TENER EN CUENTA ESTE LLAMADO aqui a el id de usuario
                error: function(e){
                    console.log(e.responseText);
                }
            },
            "bDestroy":true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength":10,
            "autoWidth":false,
            "language": {
                "sProcessing":      "Procesando...",
                "sLengthMenu":      "Mostrar _MENU_ registros",
                "sZeroRecords":     "No se encontraron resultados",
                "sEmptyTable":      "Ningun dato disponible en esta tabla",
                "sInfo":            "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":       "Mostrando un total de 0 registros",
                "sInfoFiltered":    "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":     "",
                "sSearch":          "Buscar:",
                "sUrl":             "",
                "sInfoThousands":    ",",
                "sLoadingRecords":  "Cargando...",
                "oPaginate":{
                    "sFirst":       "Primero",
                    "sLast":        "Último",
                    "sNext":        "Siguiente",
                    "sPrevious":    "Anterior"     
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending":  ": Activar para ordenar la columna de manera descendente",                
                }
            }
            
        }).DataTable();
    }else{
        tabla=$('#ticket_data').dataTable({
            "aProcessing":true,
            "aServerSide":true,
            dom: 'Bfrtip',
            "searching":true,
            lengthChange:false,
            colReader:true,
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url:'../../controller/ticket.php?op=listar',   //TENER EN CUENTA ESTE LLAMADO DEL AJAX
                type:"post",
                dataType:"json",                
                error: function(e){
                    console.log(e.responseText);
                }
            },
            
            "bDestroy":true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength":10,
            "autoWidth":false,
            "language": {
                "sProcessing":      "Procesando...",
                "sLengthMenu":      "Mostrar _MENU_ registros",
                "sZeroRecords":     "No se encontraron resultados",
                "sEmptyTable":      "Ningun dato disponible en esta tabla",
                "sInfo":            "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":       "Mostrando un total de 0 registros",
                "sInfoFiltered":    "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":     "",
                "sSearch":          "Buscar:",
                "sUrl":             "",
                "sInfoThousands":    ",",
                "sLoadingRecords":  "Cargando...",
                "oPaginate":{
                    "sFirst":       "Primero",
                    "sLast":        "Último",
                    "sNext":        "Siguiente",
                    "sPrevious":    "Anterior"     
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending":  ": Activar para ordenar la columna de manera descendente",                
                }
            }
            
        }).DataTable();
    }
   
});


    //CREO UNA FUNCION PARA DAR CLIC EN VER Y QUE SE VEA TODO EL DETALLE DEL TICKET DESDE SU CREACION, esta funcion es llamada en el controlador en case "listar_x_usu":
    function ver(tick_id){
        //console.log(tick_id);
        window.open('http://localhost/helpdesk/view/DetalleTicket/?ID='+ tick_id +''); //AQUI LE DIGO QUE AL DAR CLIC AL BOTON DEL OJITO ME REDIRECCIONE A ESTA PAGINA DETALLETICKET y le paso el tiket_id
        
    }

    //FUNCIN PARA ASIGNAR EL TICEKT AL USUARIO DE SOPORTE TECNICO 
    function asignar(tick_id){
        //console.log(tick_id);
        $.post("../../controller/ticket.php?op=mostrar", {tick_id:tick_id}, function (data){
            data=JSON.parse(data);
            $('#tick_id').val(data.tick_id);

            $('#mdltitulo').html('Asignar Soporte tecnico');
            $("#modalasignar").modal('show');
        });

    }


    //FUNCION GUARDAR EL TICKET DESPUES DE SER ASIGNADO A UN USUARIO DE SOPORTE
    function guardar(e){
        e.preventDefault();
        var formData = new FormData($("#ticket_form")[0]);
        $.ajax({
            url: "../../controller/ticket.php?op=asignar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){
                $("#modalasignar").modal('hide');
                $('#ticket_data').DataTable().ajax.reload();
            }
        });
    }

init();