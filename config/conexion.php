<?php
session_start();  //iniciamos la sesion del usuario 

class Conectar{
    protected $dbh;

    //Funcion para la conexion
    protected function Conexion(){
        try {
            $conectar = $this->dbh = new PDO("mysql:local=localhost::3306;dbname=HELPDESK", "root","");
            return $conectar;
        } catch (Exception $e) {
            print "Error en la BD" . $e->getMessage() . "<br/>";
            die();
        }
    }


    //Funcion para que no haya problemas con mayusculas tildes etc
    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }


    //Funcion para validar la ruta del proyecto
    public function ruta(){
        return "http://localhost/helpdesk/"; 
    }

}



?>