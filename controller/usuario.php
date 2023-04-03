<?php
    //LLENANDO COMBOBOX DE CATEGORIAS
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    switch ($_GET["op"]) {
    case "guardaryeditar":
        if (empty($_POST["usu_id"])) {

            $usuario->insert_usuario($_POST["usu_nom"],$_POST["usu_ape"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["rol_id"]);

        }
        else{
            $usuario->update_usuario($_POST["usu_id"],$_POST["usu_nom"],$_POST["usu_ape"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["rol_id"]);
        }
        break;



    case "listar":
        $datos = $usuario->get_usuario();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["usu_nom"];
            $sub_array[] = $row["usu_ape"];
            $sub_array[] = $row["usu_correo"];
            $sub_array[] = $row["usu_pass"];

            if ($row["rol_id"]==1) {
                $sub_array[]= '<span class="label label-pill label-primary">Usuario</span>';
            }else {
                $sub_array[]= '<span class="label label-pill label-danger">Soporte</span>';
            }


            $sub_array[] = '<button type="button" onClick="editar(' . $row["usu_id"] . ');" id="' . $row["usu_id"] . '" class="btn btn-inline btn-warning btn-sm ladda-buttom"><div><i class="fa fa-edit"></i></div></button>'; //CREO ESTE BOTON 
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["usu_id"] . ');" id="' . $row["usu_id"] . '" class="btn btn-inline btn-danger btn-sm ladda-buttom"><div><i class="fa fa-trash"></i></div></button>'; //CREO ESTE BOTON 
            $data[] = $sub_array;
        }
        //Para usar el DATATABLE
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

        case "eliminar":
            $usuario->delete_usuario($_POST["usu_id"]); //LLAMANDO A LOS DATOS DE Ticket.php para pasarlos como parametros
    
        break;

        case "mostrar":
            $datos = $usuario->get_usuario_x_id($_POST["usu_id"]);
            if(is_array($datos) == true and count($datos)>0){
                foreach($datos as $row){
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_ape"] = $row["usu_ape"];
                    $output["usu_correo"] = $row["usu_correo"];    
                    $output["usu_pass"] = $row["usu_pass"];   
                    $output["rol_id"] = $row["rol_id"];
                }
                echo json_encode($output);
            }
            break;



        //CASOS PARA EL DASHBOARD 3 CUADROS: TOTAL, ABIERTOS  Y CERRADOS
        case "total";
            $datos = $usuario->get_usuario_total_x_id($_POST["usu_id"]);
            if(is_array($datos) == true and count($datos)>0){
                foreach($datos as $row){
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
            break;

            case "totalabiertos";
            $datos = $usuario->get_usuario_totalabiertos_x_id($_POST["usu_id"]);
            if(is_array($datos) == true and count($datos)>0){
                foreach($datos as $row){
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
            break;

            case "totalcerrados";
            $datos = $usuario->get_usuario_totalcerrados_x_id($_POST["usu_id"]);
            if(is_array($datos) == true and count($datos)>0){
                foreach($datos as $row){
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
            break;

             //SERVICIO PARA LOS GRAFICOS PARA DIBUJAR LA GRAFICA
        case "grafico";
        $datos=$usuario->get_usuario_grafico($_POST["usu_id"]);
        echo json_encode($datos);
        break;


        case "combo";
            $datos=$usuario->get_usuario_x_rol();
            if(is_array($datos)==true and count($datos)>0){
                $html.="<option label='Seleccionar'></option>";
                foreach ($datos as $row) {
                    $html.="<option value='".$row['usu_id']."'>".$row['usu_nom'].' '. $row['usu_ape']."</option>";
                }
                echo $html;
            }
        break;

        // Controller para actualizar la contraseña
        case "password":
            $usuario->update_usuario_pass($_POST["usu_id"],$_POST["usu_pass"]); //LLAMANDO A LOS DATOS DE Ticket.php para pasarlos como parametros
        break;

    }
?>