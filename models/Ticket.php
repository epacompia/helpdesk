<?php
class Ticket extends Conectar
{


    //1. FUNCION PARA INSERTAR TICEKT
    public function insert_ticket($usu_id,$cat_id,$tick_titulo,$tick_descrip){
        $conectar = parent::conexion();
        parent::set_names();
         $sql = "INSERT INTO tm_ticket(tick_id,usu_id,cat_id,tick_titulo,tick_descrip,tick_estado,fech_crea,est) VALUES (NULL,?,?,?,?,'Abierto',now(),'1');"; //now() es para obtener la fecha y hora actual del sistema , solo lo que hice fue agregar a la tabla tm_ticket un campo llamado fech_crea y luego  me vine aqui al modelo para agregar ese campo now() para agregar la fecha y hora donde se creo el ticket nada mas no he hecho cambios en otro lado
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->bindValue(2, $cat_id);
        $sql->bindValue(3, $tick_titulo);
        $sql->bindValue(4, $tick_descrip);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //LISTAR TICKET
    public function listar_ticket_x_usu($usu_id){
        $conectar = parent::conexion();
        $sql = "SELECT 
        tm_ticket.tick_id,
        tm_ticket.usu_id,
        tm_ticket.cat_id,
        tm_ticket.tick_titulo,
        tm_ticket.tick_descrip,
        tm_ticket.tick_estado, /*AGREGO ESTE TICKET PARA DETERMINAR  EL ESTADO DEL TICKET ABIERTO O CERRADO*/ 
        tm_ticket.fech_crea,  /*AQUI AGREGO ESTE CAMPO TAMBIEN PARA MOSTRAR ESTE DATO EN MI QUERY*/
        tm_usuario.usu_nom,
        tm_usuario.usu_ape,
        tm_categoria.cat_nom
        FROM 
        tm_ticket
        INNER JOIN tm_categoria on tm_ticket.cat_id=tm_categoria.cat_id
        INNER JOIN tm_usuario ON tm_ticket.usu_id=tm_usuario.usu_id
        WHERE tm_ticket.est=1
        AND tm_usuario.usu_id=?"; //aqui coloco el parametro del ususario
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //AQUI LE CREO OTRA FUNCION PERO PARA LISTAR TODOS LOS TICKET PARA LA VISTA DE SOPORTE POR ESO NO LE PASO NINGUN usu_id como parametro en la funcion 
    public function listar_ticket(){
        $conectar = parent::conexion();
        $sql = "SELECT 
        tm_ticket.tick_id,
        tm_ticket.usu_id,
        tm_ticket.cat_id,
        tm_ticket.tick_titulo,
        tm_ticket.tick_descrip,
        tm_ticket.tick_estado, /*AGREGO ESTE TICKET PARA DETERMINAR  EL ESTADO DEL TICKET ABIERTO O CERRADO*/ 
        tm_ticket.fech_crea,  /*AQUI AGREGO ESTE CAMPO TAMBIEN PARA MOSTRAR ESTE DATO EN MI QUERY*/
        tm_usuario.usu_nom,
        tm_usuario.usu_ape,
        tm_categoria.cat_nom
        FROM 
        tm_ticket
        INNER JOIN tm_categoria on tm_ticket.cat_id=tm_categoria.cat_id
        INNER JOIN tm_usuario ON tm_ticket.usu_id=tm_usuario.usu_id
        WHERE tm_ticket.est=1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //PARA MI TABLE ticketdetalle , aqui me va listar el detalle de mi ticket
    public function listar_ticketdetalle_x_ticket($tick_id){
        $conectar = parent::conexion();
        $sql = "SELECT 
        td_ticketdetalle.tickd_id,
        td_ticketdetalle.tickd_descrip,
        td_ticketdetalle.fech_crea,
        tm_usuario.usu_nom,
        tm_usuario.usu_ape,
        tm_usuario.rol_id
        FROM 
        td_ticketdetalle 
        INNER JOIN tm_usuario on td_ticketdetalle.usu_id=tm_usuario.usu_id
        where tick_id=?";
        
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$tick_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    public function listar_ticket_x_id($tick_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT 
            tm_ticket.tick_id,
            tm_ticket.usu_id,
            tm_ticket.cat_id,
            tm_ticket.tick_titulo,
            tm_ticket.tick_descrip,
            tm_ticket.tick_estado,
            tm_ticket.fech_crea,
            tm_usuario.usu_nom,
            tm_usuario.usu_ape,
            tm_categoria.cat_nom
            FROM 
            tm_ticket
            INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
            INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
            WHERE
            tm_ticket.est = 1
            AND tm_ticket.tick_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $tick_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }


}

?>