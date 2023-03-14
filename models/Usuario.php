<?php

    class Usuario extends Conectar{

        public function login(){
        $conectar = parent::conexion();
        parent::set_names();

        if (isset($_POST["enviar"])) {
            $correo = $_POST["usu_correo"];
            $pass = $_POST["usu_pass"];
            $rol = $_POST["rol_id"];

            if (empty($correo) and empty($pass)) {
                header("Location:" . conectar::ruta() . "index.php?m=2"); //En caso este vacio los campos del formulario correo y pass
                exit();
            }else {
                //en la linea 19 encripto la contraseña cn md5 
                $sql = "SELECT * FROM tm_usuario WHERE  usu_correo=? and usu_pass=MD5(?) and rol_id=? and est=1"; //En caso si se encuentre el registro
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $correo); //bindvalue usa dos parametros el primero es para sustituir el primer signo de interogacion y sustituirlo por $correo
                $stmt->bindValue(2, $pass); //bindvalue usa dos parametros el primero es para sustituir el segundo signo de interogacion y sustituirlo por $pass
                $stmt->bindValue(3, $rol);
                $stmt->execute();
                $resultado = $stmt->fetch();

                //aqui analizamos las variables de sesion si en caso cumple con la condicion me direccionara a otra pagina
                if (is_array($resultado) and count($resultado)>0) {
                    $_SESSION["usu_id"] = $resultado["usu_id"];
                    $_SESSION["usu_nom"] = $resultado["usu_nom"];
                    $_SESSION["usu_ape"] = $resultado["usu_ape"];
                    $_SESSION["rol_id"] = $resultado["rol_id"];  //AGREGO EL ROL DEL USUSARIO
                    header("Location:" . Conectar::ruta() . "view/Home/");
                    exit();
                } else {
                    header("Location:" . Conectar::ruta() . "index.php?m=1");  //este uno idnica que el usuario y contraseña son incorrectos
                    exit();
                }
                
            }
        }
        }

        //ESTE ES UN CRUD PARA MIS FUNCIONES TODO U CRUD PARA USUARIOS

        public function insert_usuario($usu_nom,$usu_ape,$usu_correo,$usu_pass,$rol_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO tm_usuario(usu_id,usu_nom,usu_ape,usu_correo,usu_pass,rol_id,fech_crea,fech_modi,fech_elim,est) VALUES
            (NULL,?,?,?,MD5(?),?,now(),NULL,NULL,1);";
            
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_nom);
            $sql->bindValue(2,$usu_ape);
            $sql->bindValue(3,$usu_correo);
            $sql->bindValue(4,$usu_pass);
            $sql->bindValue(5,$rol_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }


        public function update_usuario($usu_id,$usu_nom,$usu_ape,$usu_correo,$usu_pass,$rol_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_usuario SET usu_nom=? , usu_ape=?, usu_correo=? , usu_pass=? , rol_id=? WHERE usu_id=?";
            
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_nom);
            $sql->bindValue(2,$usu_ape);
            $sql->bindValue(3,$usu_correo);
            $sql->bindValue(4,$usu_pass);
            $sql->bindValue(5,$rol_id);
            $sql->bindValue(6,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }


        public function delete_usuario($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_usuario set est=0, fech_elim=now() where usu_id=? ";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);   
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }


        public function get_usuario(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call sp_l_usuario_01()";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }


        public function get_usuario_x_id($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call sp_l_usuario_02(?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }


        //PARA EL DASHBOARD
        //TOTAL TICKETS
        public function get_usuario_total_x_id($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT COUNT(*) AS TOTAL FROM tm_ticket WHERE usu_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        //TOTAL TICKETS ABIERTOS
        public function get_usuario_totalabiertos_x_id($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT COUNT(*) AS TOTAL FROM tm_ticket WHERE usu_id=? AND tick_estado='Abierto'";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        //TOTAL TICKETS CERRADOS
        public function get_usuario_totalcerrados_x_id($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT COUNT(*) AS TOTAL FROM tm_ticket WHERE usu_id=? AND tick_estado='Cerrado'";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        //PARA EL GRAFICO AHORA DEL DASHBOARD
        //ESTE QUERY ME CUENTA POR CATEGORIA CUANTAS INCIDENCIAS HA HABIDO
        public function get_usuario_grafico($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT tm_categoria.cat_nom as nom, COUNT(*) AS total 
            FROM tm_ticket JOIN 
            tm_categoria ON tm_ticket.cat_id= tm_categoria.cat_id 
            WHERE tm_ticket.est =1 
            and tm_ticket.usu_id =?
            GROUP BY
            tm_categoria.cat_nom
            ORDER BY total DESC";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }


        //PARA LA ASIGNACION DE USUARIO SOPORTE A UN TICKET CREAMOS ESTA FUNCION ASIGNAR USUARIO POR ROL
        public function get_usuario_x_rol(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "select * from tm_usuario where est=1 and rol_id=2";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

    }


?>