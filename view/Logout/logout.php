<?php
    require_once("../../config/conexion.php");
    session_destroy();
    header("Location:"."http://localhost:80/helpdesk/"."index.php"); //codigo para redirigir a la pagina de login
    exit();
?>