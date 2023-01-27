<?php
class Ticket extends Conectar
{


    //1. FUNCION PARA INSERTAR TICEKT
    public function insert_ticket($usu_id,$cat_id,$tick_titulo,$tick_descrip)
    {
        $conectar = parent::conexion();
        parent::set_names();
         $sql = "INSERT INTO tm_ticket(tick_id,usu_id,cat_id,tick_titulo,tick_descrip,fech_crea,est) VALUES (NULL,?,?,?,?,now(),'1');"; //now() es para obtener la fecha y hora actual del sistema , solo lo que hice fue agregar a la tabla tm_ticket un campo llamado fech_crea y luego  me vine aqui al modelo para agregar ese campo now() para agregar la fecha y hora donde se creo el ticket nada mas no he hecho cambios en otro lado
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

}

?>