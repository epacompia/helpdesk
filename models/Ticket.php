<?php
class Ticket extends Conectar
{


    //1. FUNCION PARA INSERTAR TICEKT
    public function insert_ticket($usu_id,$cat_id,$tick_titulo,$tick_descrip){
        $conectar = parent::conexion();
        parent::set_names();
         $sql = "INSERT INTO tm_ticket(tick_id,usu_id,cat_id,tick_titulo,tick_descrip,tick_estado,fech_crea,usu_asig,fech_asig,est) VALUES (NULL,?,?,?,?,'Abierto',now(),NULL,NULL,'1');"; //now() es para obtener la fecha y hora actual del sistema , solo lo que hice fue agregar a la tabla tm_ticket un campo llamado fech_crea y luego  me vine aqui al modelo para agregar ese campo now() para agregar la fecha y hora donde se creo el ticket nada mas no he hecho cambios en otro lado
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
        tm_ticket.usu_asig, /*CAMPOS AGREGADOS PARA LA ASIGNACION DE TICKET* */
        tm_ticket.fech_asig, /*CAMPOS AGREGADOS PARA LA ASIGNACION DE TICKET* */
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
        tm_ticket.usu_asig, /*CAMPOS AGREGADOS PARA LA ASIGNACION DE TICKET* */
        tm_ticket.fech_asig, /*CAMPOS AGREGADOS PARA LA ASIGNACION DE TICKET* */
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


    //FUNCION PARA INSERTAR EL COMENTARIO EN EL TICKET esto sera dentro de ticketdetalle
    public function insert_ticketdetalle($tick_id,$usu_id,$tickd_descrip){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="INSERT INTO td_ticketdetalle(tickd_id,tick_id,usu_id,tickd_descrip,fech_crea,est) VALUES (NULL,?,?,?,now(),'1');";
         //$sql = "INSERT INTO td_ticketdetalle(tick_id,usu_id,cat_id,tick_titulo,tick_descrip,tick_estado,fech_crea,est) VALUES (NULL,?,?,?,?,'Abierto',now(),'1');"; //now() es para obtener la fecha y hora actual del sistema , solo lo que hice fue agregar a la tabla tm_ticket un campo llamado fech_crea y luego  me vine aqui al modelo para agregar ese campo now() para agregar la fecha y hora donde se creo el ticket nada mas no he hecho cambios en otro lado
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tick_id);
        $sql->bindValue(2, $usu_id);
        $sql->bindValue(3, $tickd_descrip);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //FUNCION PARA ACTUALZAR EL ESTADO DEL TICKET A CERRADO CUANDO SEA ELIMINADO
    public function update_ticket($tick_id){
        $conectar = parent::conexion();
        $sql = "UPDATE tm_ticket
        set tick_estado='Cerrado' where tick_id=?"; //aqui coloco el parametro del ususario
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$tick_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_ticketdetalle_cerrar($tick_id,$usu_id){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="call sp_i_ticketdetalle_01(?,?)";
         //$sql = "INSERT INTO td_ticketdetalle(tick_id,usu_id,cat_id,tick_titulo,tick_descrip,tick_estado,fech_crea,est) VALUES (NULL,?,?,?,?,'Abierto',now(),'1');"; //now() es para obtener la fecha y hora actual del sistema , solo lo que hice fue agregar a la tabla tm_ticket un campo llamado fech_crea y luego  me vine aqui al modelo para agregar ese campo now() para agregar la fecha y hora donde se creo el ticket nada mas no he hecho cambios en otro lado
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tick_id);
        $sql->bindValue(2, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //PAR LA VISTA DE SOPORTE AHORA CREAREMOS SU DASHBOARD
        //TOTAL TICKETS
        public function get_ticket_total(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT COUNT(*) AS TOTAL FROM tm_ticket";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        //TOTAL TICKETS ABIERTOS
        public function get_ticket_totalabiertos(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT COUNT(*) AS TOTAL FROM tm_ticket WHERE  tick_estado='Abierto'";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        //TOTAL TICKETS CERRADOS
        public function get_ticket_totalcerrados(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT COUNT(*) AS TOTAL FROM tm_ticket WHERE tick_estado='Cerrado'";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }


        //PARA EL GRAFICO AHORA DEL DASHBOARD
        //ESTE QUERY ME CUENTA POR CATEGORIA CUANTAS INCIDENCIAS HA HABIDO
        public function get_ticket_grafico(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT tm_categoria.cat_nom as nom, COUNT(*) AS total 
            FROM tm_ticket JOIN 
            tm_categoria ON tm_ticket.cat_id= tm_categoria.cat_id 
            WHERE tm_ticket.est =1 
            GROUP BY
            tm_categoria.cat_nom
            ORDER BY total DESC";

            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }



        //PARA ASIGNAR EL TICKET A UN USUARIO DE SOPORTE
        public function update_ticket_asignacion($tick_id,$usu_asig){
            $conectar = parent::conexion();
            $sql = "UPDATE tm_ticket
            set usu_asig=?,
            fech_asig= now()
            where
            tick_id=?"; //aqui coloco el parametro del ususario
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_asig);
            $sql->bindValue(2, $tick_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
}

?>