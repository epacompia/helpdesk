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
                $sql = "SELECT * FROM tm_usuario WHERE  usu_correo=? and usu_pass=? and rol_id=? and est=1"; //En caso si se encuentre el registro
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
    }


?>