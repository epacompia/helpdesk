<?php

require_once("../config/conexion.php");
require_once("../models/Ticket.php");
$ticket = new Ticket();

switch ($_GET["op"]) {
    case "insert":
        $ticket->insert_ticket($_POST["usu_id"], $_POST["cat_id"], $_POST["tick_titulo"], $_POST["tick_descrip"]); //LLAMANDO A LOS DATOS DE Ticket.php para pasarlos como parametros

        break;


    case "listar_x_usu":
        $datos = $ticket->listar_ticket_x_usu($_POST["usu_id"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["tick_id"];
            $sub_array[] = $row["cat_nom"];
            $sub_array[] = $row["tick_titulo"];

            if ($row["tick_estado"] == "Abierto") {
                $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
            } else {
                $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
            }

            //$sub_array[]=$row["tick_estado"];  /*Para listar el estado del tiket en el datatable agrego este campo tick_estado que agrege en mi tabla mysql */
            //Aqui agrego el campo de fecha de creacion dandole el formato de dia mes año y hora minuto segundos 
            $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"])); //agrego este campo para mostrar en mi datatble, de estos parametros depende los campos que se mostraran en la datatabla es dcir si agrego uno mas se agregara automaticamente al datatable
            $sub_array[] = '<button type="button" onClick="ver(' . $row["tick_id"] . ');" id="' . $row["tick_id"] . '" class="btn btn-inline btn-primary btn-sm ladda-buttom"><div><i class="fa fa-eye"></i></div></button>'; //CREO ESTE BOTON 
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

    case "listar":
        $datos = $ticket->listar_ticket();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["tick_id"];
            $sub_array[] = $row["cat_nom"];
            $sub_array[] = $row["tick_titulo"];


            if ($row["tick_estado"] == "Abierto") {
                $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
            } else {
                $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
            }


            //$sub_array[]=$row["tick_estado"];  /*Para listar el estado del tiket en el datatable agrego este campo tick_estado que agrege en mi tabla mysql */
            //Aqui agrego el campo de fecha de creacion dandole el formato de dia mes año y hora minuto segundos 
            $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"])); //agrego este campo para mostrar en mi datatble, de estos parametros depende los campos que se mostraran en la datatabla es dcir si agrego uno mas se agregara automaticamente al datatable
            $sub_array[] = '<button type="button" onClick="ver(' . $row["tick_id"] . ');" id="' . $row["tick_id"] . '" class="btn btn-inline btn-primary btn-sm ladda-buttom"><div><i class="fa fa-eye"></i></div></button>'; //CREO ESTE BOTON 
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

        //PARA LISTAR EL DETALLE DE TICKET 
    case "listardetalle":
        $datos = $ticket->listar_ticketdetalle_x_ticket($_POST["tick_id"]);
?>
        <?php
        foreach ($datos as $row) {
        ?>
            <article class="activity-line-item box-typical">
                <div class="activity-line-date">
                    <?php echo date("d/m/Y", strtotime($row["fech_crea"])); ?> <!-- aqui le coloco la fecha de creacion que tengo en mi tabla td_detalleticket-->
                </div>
                <header class="activity-line-item-header">
                    <div class="activity-line-item-user">
                        <div class="activity-line-item-user-photo">
                            <a href="#">
                                <img src="../../public/img/photo-64-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="activity-line-item-user-name"> <?php echo $row['usu_nom'] .' ' .$row['usu_ape'] ?></div>
                        <!--AQUI PARA DECIDIR SI ES SOPORTE O USUARIO ESTANDAR Y LO MUESTRE EN MI detalleticket.php-->
                        <div class="activity-line-item-user-status">
                            <?php
                                if($row['rol_id']==1){
                                echo 'Usuario';
                                }else{
                                echo 'Soporte';
                                }
                                
                             ?>
                        </div>
                    </div>
                </header>
                <div class="activity-line-action-list">
                    <section class="activity-line-action">
                        <div class="time"> <?php echo date("H:i:s", strtotime($row["fech_crea"])); ?></div>
                        <div class="cont">
                            <div class="cont-in">
                                <p> <?php echo $row['tickd_descrip'] ?></p>
                                
                            </div>
                        </div>
                    </section><!--.activity-line-action-->
                   
                </div><!--.activity-line-action-list-->
            </article><!--.activity-line-item-->
        <?php
        }
        ?>
<?php
        break;
}

?>