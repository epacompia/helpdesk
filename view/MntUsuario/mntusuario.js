var tabla;

function init(){

}

//ESTEE CODIGO ES PARA EL DATATABLE
$(document).ready(function(){

        tabla=$('#usuario_data').dataTable({
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
                url:'../../controller/usuario.php?op=listar',   //TENER EN CUENTA ESTE LLAMADO DEL AJAX
                type:"post",
                dataType:"json",                
                error: function(e){
                    console.log(e.responseText);
                }
            },
            "ordering": false,  // ESTO ES PARA ORDENAR LOS REGISTROS QUE TRAE DE MI BASE DE DATOS 
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
});

    function editar(usu_id){
        
        //llamo a mi modal pero le paso para el titulo editar registro y luego lo muestro con modal
        $('#mdltitulo').html('Editar registro');
        $('#modalmantenimiento').modal('show');
        console.log(usu_id);
    }

    function eliminar(usu_id){
        swal({
            title: "Informática - DIRCOCOR",
            text: "Esta seguro de eliminar el registro",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Si, eliminar registro",
            cancelButtonText: "No!",
            closeOnConfirm: false,
            //closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                //var tick_id = getUrlParameter('ID');
                //var usu_id = $('#user_idx').val(); // llamo este usu id para poder cerrar el ticekt y ver quien lo cerro 
                //ESTE CODIGO ES PARA ACTUALIZAR PRIMERO EL ESTADO A CERRADO DEL TICKET DESPUES DE CONFIRMAR EL CERRADO
                $.post("../../controller/usuario.php?op=eliminar",{usu_id : usu_id}, function (data) {
                    
                 });

                 //PARA RECARGAR LA TABLA NUEACMENTE QUE ME MUESTRE DESPUES DE HABER ELIMINADO EL REGISTRO USAMOS UNA FUNCION DE SWEEEALERT
                 $('#usuario_data').DataTable().ajax.reload();
    
                 
                swal({
                    title: "Registro eliminado!",
                    text: "Registro eliminado",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            } 
            // else {
            //     swal({
            //         title: "Cancelado",
            //         text: "Se canceló el cierre del ticket",
            //         type: "error",
            //         confirmButtonClass: "btn-danger"
            //     });
            // }
        });
    }

    //CODIGO PARA HACER FUNCIONAR EL MODAL DE MANTENIENTO USUARIO CUANDO LE DOY CLIC EN NUEVO USUARIO
    $(document).on("click","#btnnuevo", function(){
        // console.log("dfsdfsdf");
        $('#mdltitulo').html('Nuevo Registro');
        $('#modalmantenimiento').modal('show');
    });


init();