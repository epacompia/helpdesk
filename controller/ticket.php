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
            $sub_array[]='<button type="button" onClick="ver(' . $row["tick_id"].');" id="'.$row["tick_id"] .'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>' //CREO ESTE BOTON 

        }

        //Para usar el DATATABLE
        $results= array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData" => $data);
        echo json_encode($results);
        )
        
    }

?>