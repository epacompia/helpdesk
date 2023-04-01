<?php
    class Documento extends Conectar {
        public function insert_documento($tick_id,$doc_nom){
            $conectar=parent::conexion();
            $sql="INSERT INTO td_documento(doc_id, tick_id,doc_nom,fech_crea,est) VALUES (null,?,?,now(),1);";
            $consulta=$conectar->prepare($sql);
            $consulta->bindParam(1,$tick_id);
            $consulta->bindParam(2,$doc_nom);
            $consulta->execute();
        }

        //obtener todos los documentos por ticket
        public function get_documento_x_ticket($tick_id){
            $conectar=parent::conexion();
            $sql="SELECT * FROM td_documento where tick_id =?";
            $sql=$conectar->prepare($sql);
            $sql->bindParam(1,$tick_id);
            $sql->execute();
            $resultado=$sql->fetchAll();
        }
    }

?>