<?php
    
    require_once("../config/conexion.php");
    require_once("../models/Ticket.php");
    $ticket = new Ticket();

    switch ($_GET["op"]) {
    case "insert":
        $ticket->insert_ticket($_POST["usu_id"],$_POST["cat_id"],$_POST["tick_titulo"],$_POST["tick_descrip"]); //LLAMANDO A LOS DATOS DE Ticket.php para pasarlos como parametros
        
        break;

    
    case "listar_x_usu":
        $datos = $ticket->listar_ticket_x_usu($_POST["usu_id"]);
        $data = array();
        foreach($datos as $row){
            $sub_array=array();
            $sub_array[]=$row["tick_id"];
            $sub_array[]=$row["cat_nom"];
            $sub_array[]=$row["tick_titulo"];
            //Aqui agrego el campo de fecha de creacion dandole el formato de dia mes año y hora minuto segundos 
            $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"])); //agrego este campo para mostrar en mi datatble, de estos parametros depende los campos que se mostraran en la datatabla es dcir si agrego uno mas se agregara automaticamente al datatable
            $sub_array[] = '<button type="button" onClick="ver(' . $row["tick_id"] . ');" id="' . $row["tick_id"] . '" class="btn btn-inline btn-primary btn-sm ladda-buttom"><div><i class="fa fa-eye"></i></div></button>'; //CREO ESTE BOTON 
            $data[] = $sub_array;
        }
        //Para usar el DATATABLE
        $results= array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData" => $data);
        echo json_encode($results);
        break;
        
    }

?>